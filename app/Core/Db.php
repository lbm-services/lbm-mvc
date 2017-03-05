<?php


namespace Lbm\Mvc\Core;

class Db
{
    /**
     * @var null Database Connection
     */
    private static $_db = null;

  
    
    /**
     * makes "new" unavailable
     *
     * @return void
     */
    protected function __construct()
    {}
 
    /**
     * makes "clone" unavailable
     *
     * @return void
     */
    protected function __clone()
    {}
 
    /**
     * Returns an instance of DB
     *
     * Singleton pattern implementation
     *
     * @return Zend_Auth Provides a fluent interface
     */
    public static function getInstance()
    {
        if (null === self::$_db) {
            $options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            self::$_db = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME. ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        }
 
        return self::$_db;
    }
    
   
  
}
