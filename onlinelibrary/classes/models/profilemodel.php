<?php
//model class for profiles
class Profilemodel{
    //gets all info of the current user based on it's username and password
    public static function getProfileInfo($con,$username, $password){
        $query=$con->prepare(
            "SELECT name, password FROM users
            WHERE name=:username AND password=:password;"
        );

        $query->bindParam(':username',$username);
        $query->bindParam(':password',$password);

        $query->execute();
    
        if($query->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    //gets all info of the current admin based on it's username and password
    public static function getAdminProfileInfo($con,$adminname,$adminpw){
        $query=$con->prepare(
            "SELECT adminname, adminpw FROM admins
            WHERE adminname=:adminname AND adminpw=:adminpw;"
        );

        $query->bindParam(':adminname',$adminname);
        $query->bindParam(':adminpw',$adminpw);

        $query->execute();

        if($query->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
}