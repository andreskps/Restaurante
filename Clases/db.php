<?php
class DataBase{

    public static function connect(){
        $host= 'localhost';
        $user= 'root';
        $pass= '';
        $db= 'restaurantebd';
        $db = new mysqli( $host,$user,$pass,$db);
        
        if($db){
            // echo "Connecting to database";
        }
        else{
            echo "Error connecting to database";
        }

        return $db;
    
    }
}
?>