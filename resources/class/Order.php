<?php


class Order extends activeRecord implements JsonSerializable
{
    private $customer;
    private $summary;
    private $charge;
    private $date;

    public function getId()
        {

        }
    public function save()
        {

        }
    public function delete()
        {

        }
    static public function loadAll()
        {

        }
    static public function loadById($id)
        {

        }
    public function jsonSerialize()
        {

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