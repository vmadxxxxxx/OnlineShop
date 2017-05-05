<?php


class Order extends activeRecord implements JsonSerializable
{
    private $customer;
    private $summary;
    private $charge;
    private $date;

    public function getId()
        {
        return $this->id;
        }

    public function getCustomer()
        {
        return $this->customer;
        }

    public function setCustomer($customer)
        {
          $this->customer = $customer;
        }

     public function getSummary()
        {
        return $this->summary;
        }

    public function setSummary($summary)
        {
        $this->summary = $summary;
        }

    public function getCharge()
        {
        return $this->charge;
        }

    public function setCharge($charge)
        {
        $this->charge = $charge;
        }

    public function getDate()
        {
        return $this->date;
        }

    public function setDate($date)
        {
        $this->date = $date;
        }

    public function save()
        {
            if (self::$db->conn != null) {
                if ($this->id == -1) {
                    $sql = "INSERT INTO Order (customer, summary, charge, date) values (:customer, :summary, :charge, :date)";
                    $stmt = self::$db->conn->prepare($sql);  //MySQL inejction preventing during registering new user
                    $result = $stmt->execute([
                        'customer' => $this->customer,
                        'summary' => $this->summary,
                        'charge' => $this->charge,
                        'date' => $this->date
                    ]);

                    if ($result == true) {
                        $this->id = self::$db->conn->lastInsertId();
                        return true;
                    } else {
                        echo self::$db->conn->error;
                        }
                    } else {
                    $sql = "UPDATE Order SET customer = :customer, summary = :summary, charge = :charge, date = :date WHERE id = $this->id";

                    $stmt = self::$db->conn->prepare($sql);
                    $result = $stmt->execute([
                        'customer' => $this->customer,
                        'summary' => $this->summary,
                        'charge' => $this->charge,
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
    public function delete()
        {
            $id = $this->getId();
            $sql = "DELETE FROM Order WHERE id=:id";
            $stmt = self::$db->conn->prepare($sql);
            $result = $stmt->execute(['id' => $id]);
            if ($result === true) {
                $this->id = -1;
                return [json_encode($this)];
            } else {
                return [];
            }

        }
    static public function loadAll()
        {
            self::connect();
            $sql = "SELECT * FROM `Order`";
            $returnTable = [];
            if ($result = self::$db->conn->query($sql)) {
                foreach ($result as $row) {
                    $loadedOrder = new Order();
                    $loadedOrder->id = $row['id'];
                    $loadedOrder->customer = $row['customer'];
                    $loadedOrder->summary = $row['summary'];
                    $loadedOrder->charge = $row['charge'];
                    $loadedOrder->date = $row['date'];
                    $returnTable[] = $loadedOrder;
                }
            }
            return $returnTable;
        }
    static public function loadById($id)
        {
            self::connect();
            $sql = "SELECT * FROM Order WHERE id=$id";
            $result = self::$db->conn->query($sql);
            if ($result && $result->rowCount() == 1) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $loadedOrder = new Order();
                $loadedOrder->id = $row['id'];
                $loadedOrder->customer = $row['customer'];
                $loadedOrder->summary = $row['summary'];
                $loadedOrder->charge = $row['charge'];
                $loadedOrder->date = $row['date'];
                return $loadedOrder;
            }
            return null;
        }
    public function jsonSerialize()
        {
            return [
                'id' => $this->id,
                'customer' => $this->customer,
                'summary' => $this->summary,
                'charge' => $this->charge,
                'date' => $this->date
            ];
        }
}


// sql query for creating table for Orders

    /*
     CREATE TABLE `Order` (
             id int AUTO_INCREMENT,
             customer int NOT NULL,
             summary varchar(255),
             charge float NOT NULL,
             date date,
             PRIMARY KEY(id),
             FOREIGN KEY(customer) REFERENCES User(id)
             );
             */