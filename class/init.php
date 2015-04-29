<?php
//Define base path of project
//for local

//define( "BASE_PATH", "".$_SERVER['DOCUMENT_ROOT']."/" );

//for server
//define( "BASE_PATH", "".$_SERVER['DOCUMENT_ROOT']."/" );


//Define base url of project
//for local
define('BASE_URL', 'http://localhost/praysocially');

//for server
//define('BASE_URL', '');

//connection file

include_once("connection.php");
//redirect class
include_once("redirect.php");
//common class for session
include_once("session.php");
//Users class
include_once("users.php");

class Init {
    
    protected $redirect;
    protected $session;
    protected $dbh;
    private static $instance=NULL;
    
    function __construct() {
        $dbObject = DatabaseConnection::getInstance();
        $this->_dbh = $dbObject->getConnection();
        $this->_redirect = URLRedirect::getInstance();
        $this->_session = Session::getInstance();
    }
    
    //get object of current class...
    public static function getInstance() { 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }
  
    //get redirect object
    public function getRedirect(){
        return $this->_redirect;
    }

    //get session object
    public function getSession(){
        return $this->_session;
    }

}
$init = Init::getInstance();

