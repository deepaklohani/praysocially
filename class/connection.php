<?php
class DatabaseConnection {
    private static $instance=NULL;
    
    public static function getInstance(){ 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection(){
       	$dbh = new PDO("mysql:host=localhost;dbname=PraySocially", "root", "") or die(mysql_error());
        return $dbh;
    } 

    public function select($table, $join, $columns = null, $where = null){
        
        $query = $this->query($this->select_context($table, $join, $columns, $where));

        return $query ? $query->fetchAll(
            (is_string($columns) && $columns != '*') ? PDO::FETCH_COLUMN : PDO::FETCH_ASSOC
        ) : false;
    }   
}
