<?php
class Database
{
    private static $dbName = 'epiz_32743718_cyclecycle';
    private static $dbHost = 'sql303.epizy.com';
    private static $dbUsername = 'epiz_32743718';
    private static $dbUserPassword = '3T8mKGz6jPUG';
    private static $port = '3306';
    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {
        try
        {
          self::$cont =  new PDO("mysql:host=".self::$dbHost.";port=".self::$port.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
       }
       return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
