<?php


class User {

    public $user_id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    //=============================================== helper method for the query

    public static function find_this_query($sql){

        global $database;

       $result_set = $database->query($sql);
       $the_object_array = array();
       while($row = mysqli_fetch_array($result_set)){

        $the_object_array[] = self::instatiation($row);
       }
       return $the_object_array;
    }

    // public static function find_this_query($sql){

    //     global $database;

    //    $result_set = $database->query($sql);
    //    return $result_set;
    // }

// ===============================================helper method to find all users

    public static function find_all_users(){

      return self::find_this_query("SELECT * FROM users");

    }

    //=============================================== helper method to find the user id
    public static function find_user_by_id($user_id){


        $the_result_array = self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        // if(!empty($the_result_array)){

        //    $the_first_item = array_shift($the_result_array);
        //    return $the_first_item;
        // }else{
        //     return false;
        // }
        // return $found_user_id;


    }

    // public static function find_user_by_id($user_id){


    //     $result_set = self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
    //     $found_user_id = mysqli_fetch_array($result_set);
    //     return $found_user_id;


    // }

    public static function instatiation($the_record){

        $the_object = new self;
        foreach ($the_record as $the_attribute => $value){

            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;

            }

        }
        // $the_object->user_id      = $result_user_id['user_id'];
        // $the_object->username     = $result_user_id['username'];
        // $the_object->password     = $result_user_id['password'];
        // $the_object->first_name   = $result_user_id['first_name'];
        // $the_object->last_name    = $result_user_id['last_name'];

        return $the_object;
    }

    private function has_the_attribute($the_attribute){

       $object_properties = get_object_vars($this);
       return array_key_exists($the_attribute,$object_properties);
    }


}



?>