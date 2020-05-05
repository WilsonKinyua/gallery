<?php



class Db_object {

    protected static $db_table = "";
    protected static $db_table_fields = array();

        // ===============================================helper method to find all users

    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
  
      }
  
      //=============================================== helper method to find the user id
      public static function find_by_id($user_id){
  
  
          $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table ." WHERE user_id = $user_id LIMIT 1");
  
          return !empty($the_result_array) ? array_shift($the_result_array) : false;
  
          // if(!empty($the_result_array)){
  
          //    $the_first_item = array_shift($the_result_array);
          //    return $the_first_item;
          // }else{
          //     return false;
          // }
  
  
      }
  
      // public static function find_user_by_id($user_id){
  
  
      //     $result_set = static::find_by_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
      //     $found_user_id = mysqli_fetch_array($result_set);
      //     return $found_user_id;
  
  
      // }

          //=============================================== helper method for the query

    public static function find_by_query($sql){

        global $database;

       $result_set = $database->query($sql);
       $the_object_array = array();
       while($row = mysqli_fetch_array($result_set)){

        $the_object_array[] = static::instatiation($row);
       }
       return $the_object_array;
    }

    // public static function find_by_query($sql){

    //     global $database;

    //    $result_set = $database->query($sql);
    //    return $result_set;
    // }

    public static function instatiation($the_record){

        $calling_class = get_called_class();
        $the_object = new $calling_class;
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


    protected function properties(){

        //    return get_object_vars($this);
    
        $properties = array();
    
        foreach (static::$db_table_fields  as $db_field) {
    
            if(property_exists($this,$db_field)){
    
                $properties[$db_field] =  $this->$db_field;
            }
            
        }
            return $properties;
        }
     //========================cleaning the data to avoid mysql injection===================================

    protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {

            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }


    // ========================================method to check whether the user exists===================
    public function save(){

        global $database;

        return (isset($this->user_id)) ? $this->update() : $this->create();

        

    }

    // =============================================method to insert users into the database
    public function create(){
        global $database;

        $properties = $this->clean_properties();
        $sql    = "INSERT INTO " . static::$db_table ."(" . implode(",", array_keys($properties)) .")";
        $sql   .= "VALUES ('". implode("','", array_values($properties)) ."')";


        ////OR YOU CAN USE THIS INSTEAD OF THE ABOVE ABSTRATION===========================
        // $sql    = "INSERT INTO " .static::$db_table ." (username, password, first_name, last_name)";
        // $sql   .= "VALUES ('";
        // $sql   .= $database->escape_string($this->username) .   "' , '";
        // $sql   .= $database->escape_string($this->password) .   "' , '";
        // $sql   .= $database->escape_string($this->first_name).  "' , '";
        // $sql   .= $database->escape_string($this->last_name) .  "')   ";

      

        if($database->query($sql)){

            $this->user_id = $database->the_insert_id();
            return true;
        } else {

            return false;
        }

    }//============================================end of create======================== 

    public function update(){
        
        global $database;

        $properties = $this->clean_properties();
        $properties_pairs = array();


        foreach ($properties as $key => $value) {
            
            $properties_pairs[] = "{$key}='{$value}'";
        }


        $sql  = "UPDATE " .static::$db_table ." SET ";
        $sql  .= implode(", ", $properties_pairs);
        $sql .= " WHERE user_id= " . $database->escape_string($this->user_id);

        // $sql  = "UPDATE " .static::$db_table ." SET ";
        // $sql .= "username= '" . $database->escape_string($this->username) .   "',";
        // $sql .= "password= '" . $database->escape_string($this->password) .   "',";
        // $sql .= "first_name= '" . $database->escape_string($this->first_name)."',";
        // $sql .= "last_name= '" . $database->escape_string($this->last_name) .  "'";
        // $sql .= " WHERE user_id= " . $database->escape_string($this->user_id);

        $database->query($sql); 


        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }//============================================end of update======================== 

    public function delete(){

        global $database;

        $sql  = "DELETE FROM " .static::$db_table ." ";
        $sql .= " WHERE user_id =" . $database->escape_string($this->user_id);
        $sql .= " LIMIT 1";

        $database->query($sql); 
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }//============================================end of delete======================== 
 
  
  
}



?>