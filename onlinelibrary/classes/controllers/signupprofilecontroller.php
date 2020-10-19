<?php

class Signupprofilecontroller{

    public static function addNewUser($con,$username,$password){
        $query = $con->prepare("
            INSERT INTO users (name, password)
            VALUES(:username, :password);
        ");
    
        $query->bindParam(':username',$username);
        $query->bindParam(':password',$password);
    
        return $query->execute();
    }

    public static function addNewAdmin($con,$adminname,$adminpw){
        $query=$con->prepare("
            INSERT INTO admins(adminname, adminpw)
            VALUES (:adminname, :adminpw);
        ");

        $query->bindParam(':adminname',$adminname);
        $query->bindParam(':adminpw',$adminpw);

        return $query->execute();
    }

    public static function updateProfile($con,$username,$password,$passwordRepeat,$id){
        if($username!=''&&$password!=''&&$password==$passwordRepeat){
            $query=$con->prepare(
                "UPDATE users SET name=:username, password=:password
                WHERE id=:id;"
            );

            $query->bindParam(':username',$username);
            $query->bindParam(':password',$password);
            $query->bindParam(':id',$id);

            return $query->execute();
        }

        if($username!=''&&$password==''){
            $query=$con->prepare(
                "UPDATE users SET name=:username
                WHERE id=:id;"
            );

            $query->bindParam(':username',$username);
            $query->bindParam(':id',$id);

            return $query->execute();
        }

        if($username==''&&$password!=''&&$password==$passwordRepeat){
            $query=$con->prepare(
                "UPDATE users SET password=:password
                WHERE id=:id;"
            );

            $query->bindParam(':password',$password);
            $query->bindParam(':id',$id);

            return $query->execute();
        }
    }

    public static function updateAdmin($con,$adminname,$adminpw,$adminpwRepeat,$adminId){
        if($adminname!=''&&$adminpw!=''&&$adminpw==$adminpwRepeat){
            $query=$con->prepare(
                "UPDATE admins SET adminname=:adminname, adminpw=:adminpw
                WHERE adminid=:id;"
            );

            $query->bindParam(':adminname',$adminname);
            $query->bindParam(':adminpw',$adminpw);
            $query->bindParam(':id',$adminId);

            return $query->execute();
        }

        if($adminname!=''&&$adminpw==''){
            $query=$con->prepare("
                UPDATE admins SET adminname=:adminname
                WHERE adminid=:id;
            ");

            $query->bindParam(':adminname',$adminname);
            $query->bindParam(':id',$adminId);

            return $query->execute();
        }

        if($adminname==''&&$adminpw!=''&&$adminpw==$adminpwRepeat){
            $query=$con->prepare(
                "UPDATE admins SET adminpw=:adminpw
                WHERE adminid=:id;"
            );

            $query->bindParam(':adminpw',$adminpw);
            $query->bindParam(':id',$adminId);

            return $query->execute();
        }
    }
}