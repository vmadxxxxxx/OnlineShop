<?php

class User extends activeRecord implements JsonSerializable {

    private $name;
    private $surname;
    private $email;
    private $passwordHash;

    public function __construct() {
        parent::__construct();
        $this->name = '';
        $this->surname = '';
        $this->email = '';
        $this->passwordHash = '';
    }

    public function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
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

    function setSurname($surname) {
        $this->surname = $surname;
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
                $sql = "INSERT INTO User (name, surname, email, passwordHash) values (:name, :surname, :email, :passwordHash)";
                $stmt = self::$db->conn->prepare($sql); //MySQL inejction preventing during registering new user
                $result = $stmt->execute([
                    'name' => $this->name,
                    'surname' => $this->surname,
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
                $sql = "UPDATE User SET name = :name, surname = :surname, email = :email, passwordHash = :passwordHash WHERE id = $this->id";

                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'name' => $this->name,
                    'surname' => $this->surname,
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

    public function delete() {
        $id = $this->getId();
        $sql = "DELETE FROM User WHERE id=:id";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result === true) {
            $this->id = -1;
            return [$this];
        } else {
            return [];
        }
        
    }

    static public function loadAll() {
        self::connect();
        $sql = "SELECT * FROM User";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->name = $row['name'];
                $loadedUser->surname = $row['surname'];
                $loadedUser->passwordHash = $row['passwordHash'];
                $loadedUser->email = $row['email'];
                $returnTable[] = $loadedUser;
            }
        }
        return $returnTable;
    }

    static public function loadById($id) {
        self::connect();
        $sql = "SELECT * FROM User WHERE id=$id";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->name = $row['name'];
            $loadedUser->surname = $row['surname'];
            $loadedUser->passwordHash = $row['passwordHash'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }


    static public function loadByEmail($email) {
        self::connect();
        $sql = "SELECT id FROM User WHERE email='$email'";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        return null;
    }

    static public function verifyPassword($password, $email) {
        $sql = "SELECT passwordHash FROM User WHERE email = '$email'";
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
    
    public function jsonSerialize() {
        //metoda interfejsu
        //ta tablica bedzie zwrocona przy przekazaniu obiektu do json_encode()
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'passwordHash' => $this->passwordHash
        ];
    }
}

//sql query for creating table for users
//
/*
 CREATE TABLE User (
         id int AUTO_INCREMENT,
         name text(20) NOT NULL,
         surname text(20) NOT NULL,
         email varchar(50) NOT NULL UNIQUE,
         passwordHash varchar(100) NOT NULL,
         PRIMARY KEY(id)
         );
         */
