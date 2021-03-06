<?php

class User
{
    // function that log in the user
    static public function login($data)
    {
        $username = $data["username"];
        try {
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    // function that register the user
    static public function createUser($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO users (fullname,username,email,password) VALUES (:fullname,:username,:email,:password)');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }


    // function that updates the user informations
    static function update($data)
    {
        $stmt = DB::connect()->prepare('UPDATE users SET fullname = :fullname, username = :username, email = :email WHERE `user_id` = :user_id');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':user_id', $data['user_id']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }

    // function that get all the users in the admin dashboard
    static public function getAllClients()
    {
        // function that counts all the clients in the database 
        $query = "SELECT * FROM users WHERE admin = 0";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        $clients = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $clients;
    }
    // function that get all the users in the clients section in the admin dashboard
    static public function ShowUsers()
    {
        // function that counts all the clients in the database 
        $query = "SELECT * FROM users WHERE admin = 0";
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        $clients = $stmt->fetchAll();
        return $clients;
    }
}
