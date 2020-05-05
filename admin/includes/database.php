<?php 

    require_once("new_config.php");

//===================== database connection class

class Database {

    public $connection;


    public function db_connection(){

    // $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if($this->connection->connect_errno){

        die("DATABASE CONNECTION FAILED" . $this->connection->connect_error);

            }

    // if(mysqli_connect_errno()){

    //     die("DATABASE CONNECTION FAILED" . mysqli_error($this->connection));

    //         }


     }

    //================= automatically opening the database

    function __construct(){
        
        $this->db_connection();
    }

    // ======================== query method

    public function query($sql){

      $result = $this->connection->query($sql);
      $this->confirm_query($result);

     
        return $result;

    }

    // ========================confirm query=========

    public function confirm_query($result){

        if(!$result){

            die("QUERY FAILED" . $this->connection->error);
            
                }


    }

// =====================real escape string helper function=============

//     public function escape_string($string){

//        $escaped_string = mysqli_real_escape_string($this->connection,$string);

//        return $escaped_string;
//     }

// }

// or

public function escape_string($string){

    $escaped_string = $this->connection->real_escape_string($string);

    return $escaped_string;
 }

// =======================================insert id========================
 public function the_insert_id(){

    //  return $this->connection->insert_id;
     return mysqli_insert_id($this->connection);

 }

}


// instatiate the class
$database = new Database();
