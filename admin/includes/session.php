<?php


class Session {

    private $signed_in = false;
    public $user_id;
    public $message;
    public $count;

    // auto call the function in the whole system
   public function __construct(){

    session_start();
    $this->check_the_login();
    $this->visitor_count();
    $this->check_message();
   }


   public function visitor_count() {

    if(isset($_SESSION['count'])) {

        return $this->count = $_SESSION['count']++;
    } else {
        return $_SESSION['count'] = 1;
    }

   }


    //=============================================== checking whether the user is signed in
   public function is_signed_in(){

      return $this->signed_in;
   }


   //=============================================== login user
   public function login($user){
       if($user){
           $this->user_id = $_SESSION['user_id'] = $user->user_id;
           $this->signed_in = true;
       }
   }


   //===============================================logout user 
   public function logout(){

       unset($_SESSION['user_id']);
       unset($this->user_id);
       $this->signed_in = false;

   }


   //=============================================== check the login
   private function check_the_login(){

       if(isset($_SESSION['user_id'])){

           $this->user_id   = $_SESSION['user_id'];
           $this->signed_in = true;
       }else{
           unset($this->user_id);
           $this->signed_in = false;
       }
   }
   //=============================================== message function or method
   public function message($msg=''){
       if(!empty($msg)){
           $_SESSION['message'] = $msg;
       } else {
           return $this->message;
       }
   }

   private function check_message(){

       if(isset($_SESSION['message'])){

           $this->message = $_SESSION['message'];
           unset($_SESSION['message']);

       } else {

           $this->message = "";

       }
   }



}


$session = new Session();
$message = $session->message();


?>