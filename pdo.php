<?php

/**
 * 
 */
class MyPDO
{
    static private $pdo = null;
    function __construct()  //构造函数
    {
        if(is_null($this::$pdo)){   //如果静态变量$pdo为空  pdo未连接时
            try {
                if(!file_exists('./config.php')){     //如果没有config.ini文件
                    throw new Exception("AJiu", 1);   //抛出异常
                }
                $config = require dirname(__FILE__) . '/config.php';   //解析config.ini文件
                /*
                    $pdo = new PDO(mysql:host=localhost;dbname=ajiu,'root','')
                */
                    $this::$pdo = new PDO('mysql:host='.$config['host']
                        .';dbname='.$config['db'],
                        $config['user'],
                        $config['psd']
                    );
                    //设置字符集，预处理为false
                    array($this::$pdo->exec("set users utf8"),PDO::ATTR_EMULATE_PREPARES=>false); 
                } catch (Exception $e) {
                    $this::$pdo = null;
                    die($e);
                }

            }
            return $this::$pdo;
        }

    /**
    *   insert 插入数据
    *   @param $table str 待查询的表
    *   @param $arr['列名'=>'键值',...]
    */
//     public final function insert($table,$arr){        //公有不可被继承的Insert类
//         $value = '';
//         $sql = "INSERT INTO ".$table($arr)."VALUE(". $value .")";
//         $res = $this::$pdo->exec($sql);
//         var_dump($table($arr));
//     }
 }
       return new MyPDO();
//     $row = $a->insert('yolo',1);

    // $sql = "SELECT * FROM yolo";
    // $res = $this::$pdo->query($sql);
    // $row = $res->fetchAll();
    // var_dump('<pre>');
    // var_dump($this::$pdo);