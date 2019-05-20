<?php
/**
* 连接数据库并返回连接句柄
* pdo类,返回资源连接对象，具有PDO类的方法
* 基本数据库连接
* export insert、update、delete、select
*/
class mypdo
{
	static private $conn = null;    // 资源对象,避免单进程重复连接,开放给外部使用
	public $_pdo = null;			// 返回原对象给外部调用

	// 私有构造方法，打开资源链接，单例模式执行
	private function __construct()
	{
		if (is_null($this::$conn))    // 连接未建立，新建连接
		{
			// 开始建立连接，并把资源维护给$conn
			try {
				if (!file_exists('./config.ini'))   //如果没有config.ini文件
					throw new Exception("配置文件缺失", 1);    //抛出异常 跳到catch

				$config = parse_ini_file('./config.ini',true); //解析config.ini文件

				//连接数据库
				$this::$conn = 
					new PDO('mysql:host='.$config['sqlInfo']['host'] 
						.';dbname='.$config['sqlInfo']['db'],
						$config['sqlInfo']['user'],
						$config['sqlInfo']['psd'],
						array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8",PDO::ATTR_EMULATE_PREPARES=>false)
					);
				// 错误机制
				$this::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				$this::$conn = null;
				$this->_pdo = null;
				die($e);
			}
		}

		return $this->_pdo = $this::$conn;	
	}

	/**
	* getInstance 静态方法实例化对象
	* @return obj mysql类对象
	******************************/
	public static function getInstance()
	{
		if (is_null(self::$conn))
		{
			return new mypdo();
		}

		return $this->_pdo;	
	}
	
	/**
	* getAll 查询所有数据
	* @param $table str 待查询的表
	* @param $arr array['列名'=>'键值',...]
	* @return array 查询结果二维数组$res
	******************************/

	public final function getAll($table, Array $arr=['1'=>'1'],Array $order=[], Array $limit = [])
	{
		$str = '';
		foreach ($arr as $key => $value) {
			$str .= "`$key` = :$key AND ";
		}

		$str = substr($str, 0, strlen($str) - 4);
		// 构造基础sql语句
		$sql = "SELECT * FROM `$table` where $str";

		// 如果存在排序规则，添加排序
		if (!empty($order) && in_array(strtolower($order[array_keys($order)[0]]), ['asc', 'desc'])){
			$sql .= strtolower($order[array_keys($order)[0]]) == 'asc' ? ("ORDER BY :order asc") : ("ORDER BY :order desc");
		}

		// 如果存在limit限制，添加limit
		if (!empty($limit)){
			$sql .= (sizeof($limit) == 1) ? (" limit 0,".(int) $limit[0]) : (" limit ".(int) $limit[0].','.(int) $limit[1]);
		}

		$stmt = $this->_pdo->prepare($sql);
		for ($i = 0; $i < sizeof($arr); $i ++) {
			$stmt->bindParam(':'.array_keys($arr)[$i], $arr[array_keys($arr)[$i]]);
		}

		if (!empty($order) && in_array(strtolower($order[array_keys($order)[0]]), ['asc', 'desc'])){
			$stmt->bindParam(':order', array_keys($order)[0]);
		}


		if(!$stmt->execute())
			throw new Exception("数据库执行失败", 500);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
	}
	/**
	* getOne 查询一行数据
	* @param $table str 待查询的表
	* @param $arr array['列名'=>'键值',...]
	* @return array 查询结果一维数组$res
	******************************/

	public final function getOne($table, Array $arr=['1'=>'1'], Array $order=[])
	{
		$result = $this->getAll($table, $arr, $order, [1]);

		return empty($result) ? [] : $result[0];
	}

	/**
	* insert 插入新行到指定表
	* @param $table str 待查询的表
	* @param $arr array['列名'=>'键值',...]
	* @return bool 执行结果
	******************************/
	public final function insert($table, Array $arr)
	{
		$keys = $values = '';

		foreach ($arr as $k=>$v)
		{
			$keys .= "`$k`,";
			$values .= ":$k,";
		}
		$keys = rtrim($keys,',');
		$values = rtrim($values,',');
		$sql = "insert into `$table` ($keys) values ($values)";
		$stmt = $this->_pdo->prepare($sql);
		for ($i = 0; $i < sizeof($arr); $i ++) {
			$stmt->bindParam(':'.array_keys($arr)[$i], $arr[array_keys($arr)[$i]]);
		}
		if(!$stmt->execute())
			throw new Exception("数据库插入失败", 500);

		return $arr;
	}
	/**
	* update 更新数据
	* @param $table str 待查询的表
	* @param $set 将要设置的列和值 array['列名'=>'键值',...]
	* @param $arr 更新的条件数组 array['列名'=>'键值',...]
	* @return array 查询结果一维数组$res
	******************************/

	public final function update($table,Array $set,Array $arr=['1'=>'1'])
	{
		$sets = '';
		$where = '';
		foreach ($set as $key => $value) {
			$sets .= "`$key` = :$key,";
		}
		foreach ($arr as $key => $value) {
			$where .= "`$key` = :$key AND ";
		}
		$sets = rtrim($sets,',');
		$where = substr($where, 0, strlen($where) - 4);
		$sql = "UPDATE `$table` SET $sets WHERE $where";

		$stmt = $this->_pdo->prepare($sql);

		for ($j = 0; $j < sizeof($set); $j ++)
		{
			$key = array_keys($set)[$j];
			$stmt->bindParam(':'.$key, $set[$key]);
		}

		for ($i = 0; $i < sizeof($arr); $i ++)
		{
			$key = array_keys($arr)[$i];
			$stmt->bindParam(':'.$key, $arr[array_keys($arr)[$i]]);
		}

		if(!$stmt->execute())
			throw new Exception("数据库插入失败", 500);

		return $arr;
	}

	public final function delete($table,Array $arr)
	{
		$where = '';
		foreach ($arr as $key => $value) {
			$where .= "`$key` = :$key AND ";
		}
		$where = substr($where, 0, strlen($where) - 4);
		$sql = "DELETE FROM `$table` WHERE $where";

		$stmt = $this->_pdo->prepare($sql);

		for ($i = 0; $i < sizeof($arr); $i ++)
		{
			$key = array_keys($arr)[$i];
			$stmt->bindParam(':'.$key, $arr[array_keys($arr)[$i]]);
		}

		if(!$stmt->execute())
			throw new Exception("数据库执行失败！", 500);

		return $arr;
	}

	// 析构方法，关闭资源连接,PDO类自带析构

	/**
	* exec 转化关联数组为键值sql
	* @param $arr str 待查询的表
	* @param $set 将要设置的列和值 array['列名'=>'键值',...]
	* @param $arr 更新的条件数组 array['列名'=>'键值',...]
	* @return array 查询结果一维数组$res
	******************************/	
}

return mypdo::getInstance();

//$pdo = new PDO('mysql:host=bdm316868294.my3w.com;dbname=bdm316868294_db','bdm316868294','987654321o',array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8",PDO::ATTR_EMULATE_PREPARES=>false));

//return $pdo;
