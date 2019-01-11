<?php
/**
 * PDO-MySQL数据库操作类
 */
class MySQLPDO{
	//数据库默认连接信息

	//单例模式 本类对象引用
    private static $instance;
	//PDO实例
	/**
	 * 私有构造方法
	 * @param $params array 数据库连接信息
	 */
	private function __construct($params){
		//初始化属性
		$this->dbConfig = array_merge($this->dbConfig,$params);
		//连接服务器
		$this->connect();
	}
	/**
	 * 获得单例对象
	 * @param $params array 数据库连接信息
	 * @return object 单例的对象
	 */

	/**
	 * 私有克隆
	 */
    private function __clone() {}
	/**
	 * 连接目标服务器
	 */
	private function connect(){
		try{
			//连接信息
			$dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};
			port={$this->dbConfig['host']};
			dbname={$this->dbConfig['dbname']};
			charset={$this->dbConfig['charset']}";
			//实例化PDO
            //==========================================================================================================
            //真实的数据库连接操作就下面一句话起作用，
            //注意在实例化pdo 对象时 添加以下参数 array(PDO::ATTR_PERSISTENT => true) 可将请求的连接变为长连接
			$this->db = new PDO(
			    $dsn,
                $this->dbConfig['user'],
                $this->dbConfig['pass'],
                array(PDO::ATTR_PERSISTENT => true));
			//==========================================================================================================


			$this->db->query("set names {$this->dbConfig['charset']}");
		}catch (PDOException $e){
			//错误提示
			die("数据库操作失败：{$e->getMessage()}");
		}
	}
	/**
	 * 执行SQL
	 * @param $sql string 执行的SQL语句
	 * @return object PDOStatement
	 */
	public function query($sql){
		$rst = $this->db->query($sql);
		if($rst===false){
			$error = $this->db->errorInfo();
			die("数据库操作失败：ERROR {$error[1]}({$error[0]}): {$error[2]}");
		}
		return $rst;
	}

	/**
	 * 执行SQL
	 * @param $sql string 执行的SQL语句
	 * @return object PDOStatement
	 */
	public function exec($sql){
		$rst = $this->db->exec($sql);
		if($rst===false){
			$error = $this->db->errorInfo();
			die("数据库操作失败：ERROR {$error[1]}({$error[0]}): {$error[2]}");
		}
		return $rst;
	}

	/**
	 * 取得一行结果
	 * @param $sql string 执行的SQL语句
	 * @return array 关联数组结果 
	 */
	public function fetchRow($sql){
		return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
	}
	/**
	 * 取得所有结果
	 * @param $sql string 执行的SQL语句
	 * @return array 关联数组结果 
	 */
	public function fetchAll($sql){
		return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

    public function lastInsertKey(){
        return $this->db->lastInsertId();
    }
}
