<?php

require __DIR__ . '/../database.php';

class Models {


    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }



}