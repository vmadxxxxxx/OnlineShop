<?php

class Image extends activeRecord {

    private $name;
    private $source;
    private $itemId;


    public function __construct() {
        parent::__construct();
        $this->name = '';
        $this->source = '';
        $this->itemId = '';

    }

    public function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSource() {
        return $this->source;
    }

    function getItemId() {
        return $this->itemId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSource($source) {
        $this->source = $source;
    }

    function setItemId($itemId) {
        $this->itemId = $itemId;
    }

    //creating new Image and updating Image that already exists
    public function save() {
        if (self::$db->conn != null) {
            if ($this->id == -1) {
                $sql = "INSERT INTO Image (name, source, itemId) values (:name, :source, :itemId)";
                $stmt = self::$db->conn->prepare($sql);  //MySQL inejction preventing during registering new user
                $result = $stmt->execute([
                    'name' => $this->name,
                    'source' => $this->source,
                    'itemId' => $this->itemId
                ]);

                if ($result == true) {
                    $this->id = self::$db->conn->lastInsertId();
                    return true;
                } else {
                    echo self::$db->conn->error;
                }
            } else {
                $sql = "UPDATE Image SET name = :name, source = :source, itemId = :itemId WHERE id = $this->id";

                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'name' => $this->name,
                    'source' => $this->source,
                    'itemId' => $this->itemId
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
    public function delete() {
        if ($this->id != -1) {
            if (self::$db->conn->query("DELETE FROM Image WHERE id=$this->id")) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }


    static public function loadAll() {
        self::connect();
        $sql = "SELECT * FROM Image";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedImage = new Image();
                $loadedImage->id = $row['id'];
                $loadedImage->name = $row['name'];
                $loadedImage->source = $row['source'];
                $loadedImage->itemId = $row['itemId'];
                $returnTable[] = $loadedImage;
            }
        }
        return $returnTable;
    }

    static public function loadById($id) {
        self::connect();
        $sql = "SELECT * FROM Image WHERE id=$id";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $loadedImage = new Image();
            $loadedImage->id = $row['id'];
            $loadedImage->source = $row['source'];
            $loadedImage->itemId = $row['itemId'];
            return $loadedImage;
        }
        return null;
    }

    static public function loadByItemId($id) {
        self::connect();
        $sql = "SELECT * FROM Image WHERE itemId like $id";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $loadedImage = new Image();
            $loadedImage->id = $row['id'];
            $loadedImage->source = $row['source'];
            $loadedImage->itemId = $row['itemId'];
            return $loadedImage;
        }
        return null;
    }

    static public function loadAllById($id) {
        self::connect();
        $sql = "SELECT * FROM Image WHERE itemId LIKE $id";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedImage = new Image();
                $loadedImage->id = $row['id'];
                $loadedImage->name = $row['name'];
                $loadedImage->source = $row['source'];
                $loadedImage->itemId = $row['itemId'];
                $returnTable[] = $loadedImage;
            }
        }
        return $returnTable;
    }



  }

  // sql query for creating table for Image

  /*
CREATE TABLE Image (
           id int AUTO_INCREMENT PRIMARY KEY,
           name text(20),
           source varchar(250),
           itemId int NOT NULL,
           FOREIGN KEY(itemId) REFERENCES Item(id) ON DELETE CASCADE
           );
           */
