<?php
/**
 * Class : Session
 * Manage all session operations.....
 *
 **/
class Session {
    const SESSION_STARTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;
    private $sessionState = self::SESSION_NOT_STARTED;
    private static $instance;
    private function __construct() {}

    // Get current class instance......   
    public static function getInstance() {
        if ( !isset(self::$instance)) {
            self::$instance = new self;
        }
        self::$instance->startSession();
        return self::$instance;
    }
    
    //Start session function....
    public function startSession() {
        if ( $this->sessionState == self::SESSION_NOT_STARTED ) {
            @$this->sessionState = session_start();
        }       
        return $this->sessionState;
    }
   
    //Set data into session......
    public function __set( $name , $value ) {
        $_SESSION[$name] = $value;
    }
   
   //Get session data...
    public function __get( $name ) {
        if ( isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }
    
    // setter method.....
    public function __isset( $name ) {
        return isset($_SESSION[$name]);
    }
    
    //getter method.......
    public function __unset( $name ) {
        unset( $_SESSION[$name] );
    }

    //
    public function getAllSession(){
        return $_SESSION;
    }
    
    // Destroy session.....
    public function destroy() {
        if ( $this->sessionState == self::SESSION_STARTED ) {
            $this->sessionState = !session_destroy();
            unset( $_SESSION );           
            return !$this->sessionState;
        }       
        return FALSE;
    }
}
