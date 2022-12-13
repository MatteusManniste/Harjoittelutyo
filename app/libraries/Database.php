<?php

namespace App;

use PDO, PDOException;

class Database
{
    private $host = "localhost";
    private $user = "diegomerch";
    private $pass = "DLy9fbc1Hp4wX0Tp";
    private $dbname = "diegomerch";

    private $error;

    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();

            echo "Error: Yhteys hylätty." . "<br>" . $this->error;
        }
    }
}
