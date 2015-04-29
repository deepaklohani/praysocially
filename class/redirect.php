<?php 
class URLRedirect {

private static $instance=NULL;   
    public static function getInstance(){ 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function redirect($url){
	    header("location:".$url);
    }
}