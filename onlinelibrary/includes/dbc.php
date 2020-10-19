<?php
//database connenction class
class Dbc{
    //connects to the database with PDO
    public static function connect(){
        //these variables should be custom based on your database settings and database name
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname ="onlinelibrary";

        try{
            $con = new PDO("mysql:host=".$host.";dbname=".$dbname, $user,$password);

            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Connection failed " . $e->getMessage();
        }
        return $con;
    }
}