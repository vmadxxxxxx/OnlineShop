<?php

class Message extends activeRecord implements JsonSerializable {

    private $sender;
    private $receiver;
    private $content;
    private $date;

    public function __construct() {
        parent::__construct();
        $this->sender = '';
        $this->receiver = '';
        $this->content = '';
        $this->date = '';
    }

    public function getId() {
        return $this->id;
    }

    function getSender() {
        return $this->sender;
    }

    function getReceiver() {
        return $this->receiver;
    }

    function getContent() {
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

    function setSender($sender) {
        $this->sender = $sender;
    }

    function setReceiver($receiver) {
        $this->receiver = $receiver;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setDate($date) {
        $this->date = $date;
    }

    //creating new Item and updating Item that already exists
    public function save() {
        if (self::$db->conn != null) {
            if ($this->id == -1) {
                $sql = "INSERT INTO Message (sender, receiver, content, date) values (:sender, :receiver, :content, :date)";
                $stmt = self::$db->conn->prepare($sql);  //MySQL inejction preventing during registering new user
                $result = $stmt->execute([
                    'sender' => $this->sender,
                    'receiver' => $this->receiver,
                    'content' => $this->content,
                    'date' => $this->date
                ]);

                if ($result == true) {
                    $this->id = self::$db->conn->lastInsertId();
                    return true;
                } else {
                    echo self::$db->conn->error;
                }
            } else {
                $sql = "UPDATE Message SET sender = :sender, receiver = :receiver, content = :content, date = :date WHERE id = $this->id";

                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'name' => $this->sender,
                    'receiver' => $this->receiver,
                    'content' => $this->content,
                    'date' => $this->date
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
        $sql = "DELETE FROM Message WHERE id=:id";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result === true) {
            $this->id = -1;
            return [json_encode($this)];
        } else {
            return [];
        }
    }

    static public function loadAll() {
        self::connect();
        $sql = "SELECT * FROM Message";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedMessage = new Item();
                $loadedMessage->id = $row['id'];
                $loadedMessage->sender = $row['sender'];
                $loadedMessage->receiver = $row['receiver'];
                $loadedMessage->content = $row['content'];
                $loadedMessage->date = $row['date'];
                $returnTable[] = $loadedMessage;
            }
        }
        return $returnTable;
    }

    static public function loadById($id) {
        self::connect();
        $sql = "SELECT * FROM Message WHERE id=$id";
        $result = self::$db->conn->query($sql);
        if ($result && $result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $loadedMessage = new Item();
            $loadedMessage->id = $row['id'];
            $loadedMessage->sender = $row['sender'];
            $loadedMessage->receiver = $row['receiver'];
            $loadedMessage->content = $row['content'];
            $loadedMessage->date = $row['date'];
            return $loadedMessage;
        }
        return null;
    }
    
    static public function loadAllByReceiverId($id) {
        self::connect();
        $sql = "SELECT * FROM Message where receiver=$id";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->sender = $row['sender'];
                $loadedMessage->receiver = $row['receiver'];
                $loadedMessage->content = $row['content'];
                $loadedMessage->date = $row['date'];
                $returnTable[] = $loadedMessage;
            }
        }
        return $returnTable;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->sender,
            'receiver' => $this->receiver,
            'content' => $this->content,
            'date' => $this->date
        ];
    }

}

// sql query for creating table for Items

  /*
   CREATE TABLE Message (
           id int AUTO_INCREMENT,
           sender int NOT NULL,
           receiver int NOT NULL,
           content varchar(255),
           date date,
           PRIMARY KEY(id),
           FOREIGN KEY(receiver) REFERENCES User(id) ON DELETE CASCADE,
           FOREIGN KEY(sender) REFERENCES Admin(id)
           );
           */
