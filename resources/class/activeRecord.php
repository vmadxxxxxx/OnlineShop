<?php

abstract class activeRecord implements activeRecordInterface {
    protected $id;
    protected static $db;
    public function __construct(){
        self::connect();
        $this->id = -1;
    }

    public static function connect(){
        if(!self::$db){
            self::$db = new Database();
            self::$db->changeDB('OnlineShop');
        }
        return true;
    }

    public function save(){}
}
