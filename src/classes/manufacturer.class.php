<?php

require __DIR__ . '/../database.php';

class Manufacturer
{

    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    /**
     * @param $mfgName
     * @return bool
     */

    public function addNewManufacturer($mfgName)
    {

        try{

            $stmt = $this->db->prepare("INSERT INTO car_manufacturers (manufacturer_name) VALUES (:mname)");
            $stmt->bindValue(':mname', $mfgName);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        }catch (PDOException $e){

            echo $e->getMessage();
            return false;

        }



    }


}

$manufacturer = new Manufacturer($DB_con);