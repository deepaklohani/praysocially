<?php
class Users extends Init{
   protected $userName;
   protected $passWord;
   protected $id;
   protected static $tableName="Users";
  
   private static $instance=NULL;   
   public static function getInstance(){ 
     if( self::$instance === NULL ) { 
         self::$instance = new self();
     }
      return self::$instance;
   }
   //Setters
   public function setUsername ($userName){
      $this->userName = $userName;  
   }
  
   public function setPassword ($passWord){
      $this->passWord = $passWord;  
   }
   
	public function setId ($id){
      $this->id = $id;  
   }


   //Getters
   public function getUsername ($userName){
      return $this->userName;  
   }

   public function getPassword ($passWord){
      return $this->passWord;  
   }
  
   public function getId ($id){
      return $this->$id;  
   }
   

   //Functions
   public function getAllUsers(){

   }

   //Function for login user 
   public function login($array){
      $user=$this->_dbh->query("select * from Users where 
         username='".$array['username']."' and
         password='".md5($array['password'])."'
         ")->fetch(PDO::FETCH_ASSOC);
      if($user)
         return $user;
      else
         return false;
   }
   
   //Function for registration user
   public function registration($array){
      $user=$this->_dbh->exec("insert into Users(username,password,email) values('".$array['username']."','".md5($array['password'])."','".$array['email']."')");
	  if($user)
        return true;
      else
         return false;
	   }
	   //Function Check register username do not exist in database 
   public function registerCheck($array){

      $user=$this->_dbh->query("select * from Users	 where username='".$array['username']."' ")->fetchAll(PDO::FETCH_ASSOC);
      if($user)
         return true;
      else
         return false;
   }

   //Function for Insert Pray 
   public function pray($array){
       $user=$this->_dbh->exec("insert into praytb(title,pray) values('".$array['title']."','".$array['pray']."')");
        if($user)
           return true;
         else
            return false;
      }
      //function call for show all pray    
      function showPray($getLimit) {
      
      $limit=$getLimit;

      return $this->_dbh->query("select * from praytb LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
      }
      
      //function call for show  pray By Id    
      function showPrayByid($id){
       return $this->_dbh->query("select * from praytb where id='$id'")->fetch(PDO::FETCH_ASSOC);
      }
 public function countPray($prayId){
    $value=$this->_dbh->query("select pray_id from countPray where pray_id='$prayId'")->fetchAll(PDO::FETCH_ASSOC);
    if($value)
    {
      return count($value);
    } else {
      return 0;
    }
  }
    //Function for Insert Pray 
    public function addPray($prayId,$uerId){
    $value=$this->_dbh->query("select * from countPray where pray_id='$prayId' and user_id='$uerId'")->fetch(PDO::FETCH_ASSOC);
    if($value)
    {
      $success=0;
    }else{
    $success=$this->_dbh->exec("insert into countPray(pray_id,user_id,date) values('".$prayId."','".$uerId."','".date('d-M-Y')."')");
    }
    if($success==1)
       return true;
     else
        return false;
    }
    //show today  pray
    public function todayPray() {
      return $this->_dbh->query("select COUNT(id) from countPray where date='".date('d-M-Y')."'")->fetch(PDO::FETCH_ASSOC);
    }
    //show today  Single  pray
    public function singlePray($pray_id) {
      $value=$this->_dbh->query("select * from countPray where pray_id='$pray_id 'and date='".date('d-M-Y')."'")->fetchAll(PDO::FETCH_ASSOC);
      if ($value)
      {
      return count($value);
      } else {
        return 0;
      }
    }  

}

?>