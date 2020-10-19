<?php
//model for login and signup pages
class Loginsignupmodel{
    //checks if the user exists in the database
    //checks if the password of the user is correct
    public static function checkLogin($con,$username,$password){
        $query = $con->prepare(
            "SElECT * FROM users
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
    //checks if the admin exists in the database
    //checks if the password of the admin is correct
    public static function checkAdminLogin($con,$adminname,$password){
        $query = $con->prepare(
            "SElECT * FROM admins
            WHERE adminname=:adminname AND adminpw=:password;"
        );
    
        $query->bindParam(':adminname',$adminname);
        $query->bindParam(':password',$password);
    
        $query->execute();
    
        if($query->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    //checks if the user exists in the database
    public static function checkUser($con,$username){
        $query = $con->prepare(
            "SElECT * FROM users
            WHERE name=:username;"
        );
    
        $query->bindParam(':username',$username);
    
        $query->execute();
    
        if($query->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    //gets the user's user id from the users table based on the user's username
    public static function getId($con,$username){
        $query=$con->prepare(
            "SELECT * FROM users
            WHERE name=:username;"
        );

        $query->bindParam(':username',$username);

        $query->execute();

        if($query->rowCount()<=0){
            return;
        }else{
            $result = $query->fetch();
            $userId = $result['id'];
    
            return $userId;
        }
    }
    //gets the admin's admin id from the admins table based on the admin's adminname
    public static function getAdminId($con,$adminname){
        $query=$con->prepare(
            "SELECT * FROM admins
            WHERE adminname=:adminname;"
        );

        $query->bindParam(':adminname',$adminname);

        $query->execute();

        if($query->rowCount()<=0){
            return;
        }else{
            $result = $query->fetch();
            $adminId = $result['adminid'];
    
            return $adminId;
        }
    }
}