<?php
namespace classes\DBconnection;

use mysqli;

class DBconnection {
    private $HOST = 'localhost';
    private $USER = 'betina';
    private $PASSWORD = 'betina';
    private $DB;
    private $CONNECTION;

    public function __construct($db)
    {
        $this->DB = $db;
    }

    public function connect() {
        $conn = new mysqli(
            $this->HOST, $this->USER, $this->PASSWORD, $this->DB
        );

        if ($conn->connect_errno) {
            return 'Connection à la DB échouée : ' . $conn->connect_error;
        } else {
            $this->CONNECTION = $conn;
            return $this->CONNECTION;
        }
    }

    public function close() {
        $this->CONNECTION->close();
    }
}