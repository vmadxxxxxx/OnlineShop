<?php

class Admin extends activeRecord {

    private $name;
    private $email;
    private $passwordHash;

    public function __construct() {
        parent::__construct();
        $this->name = '';
        $this->email = '';
        $this->passwordHash = '';
    }

    public function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->passwordHash;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($passwordHash) {
        $this->passwordHash = md5($passwordHash);
    }

    //creating new user and updating user that already exists
    public function save() {
        if (self::$db->conn != null) {
            if ($this->id == -1) {
                $sql = "INSERT INTO Admin (name, email, passwordHash) values (:name, :email, :passwordHash)";
                $stmt = self::$db->conn->prepare($sql); //MySQL inejction preventing during registering new user
                $result = $stmt->execute([
                    'name' => $this->name,
                    'email' => $this->email,
                    'passwordHash' => $this->passwordHash
                ]);

                if ($result == true) {
                    $this->id = self::$db->conn->lastInsertId();
                    return true;
                } else {
                    echo self::$db->conn->error;
                }
            } else {
                $sql = "UPDATE User SET name = :name, email = :email, passwordHash = :passwordHash WHERE id = $this->id";

                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'name' => $this->name,
                    'email' => $this->email,
                    'passwordHash' => $this->passwordHash
                ]);

                if ($result == true) {
                    return true;
                }
            }
        } else {
            echo "Brak polaczenia\n";
        }
        return false;
    }

    //delete function avalible only for admin users
    public function deleteUser() {
        if ($this->id != -1) {
            if (self::$db->conn->query("DELETE FROM User WHERE id=$this->id")) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

    //delete function avalible only for admin users
    public function delete() {
        if ($this->id != -1) {
            if (self::$db->conn->query("DELETE FROM Admin WHERE id=$this->id")) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

    static public function loadAll() {
        self::connect();
        $sql = "SELECT * FROM Admin";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedUser = new Admin();
                $loadedUser->id = $row['id'];
                $loadedUser->name = $row['name'];
                $loadedUser->passwordHash = $row['passwordHash'];
                $loadedUser->email = $row['email'];
                $returnTable[] = $loadedUser;
            }
        }
        return $returnTable;
    }

    static public function loadById($id) {
        self::connect();
        $sql = "SELECT * FROM Admin WHERE id=$id";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->name = $row['name'];
            $loadedUser->passwordHash = $row['passwordHash'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }


    static public function loadByEmail($email) {
        self::connect();
        $sql = "SELECT email FROM Admin WHERE email='$email'";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $loadedEmail = new Admin();
            $loadedEmail->email = $row['email'];
            return $loadedEmail;
        }
        return null;
    }

    static public function verifyPassword($password, $email) {
        $sql = "SELECT passwordHash FROM Admin WHERE email = '$email'";
        $result = self::$db->conn->query($sql);

        if ($result->rowCount() == 1) {
            $pass = md5($password);
            $dbPass = $result->fetch();
            if ($dbPass['passwordHash'] == $pass) {
                return true;
            }
        }
        return false;
    }
}
//
//sql query for creating table for admins
//
/*
CREATE TABLE Admin (
         id int AUTO_INCREMENT,
         name text(20) NOT NULL,
         email varchar(50) NOT NULL UNIQUE,
         passwordHash varchar(100) NOT NULL,
         PRIMARY KEY(id)
         );

         */
