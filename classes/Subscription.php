<?php

namespace classes\Subscription;

class Subscription {
    private $name;
    private $surname;
    private $contact;
    private $pwd;
    private $phone_no;
    private $email;
    private $birthday;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->contact = $data['contact'];
        $this->pwd = $data['pwd'];
        $this->genre = $data['genre'];
        $this->birthday = $data['day'] . " " . $data['month'] . " " . $data['year'];
        $this->setContact();
        $this->hashPwd();
    }

    private function setContact() {
        if (str_contains($this->contact, "@")) {
            $this->email = $this->contact;
        } else {
            $this->phone_no = intval($this->contact);
        }
    }

    public function hashPwd() {
        $this->pwd = md5($this->pwd);
    }

    public function addToDB($connection) {
        $query = "INSERT INTO fb (name, surname, phone_no, email, pwd, birth_date, genre) VALUES ('$this->name', '$this->surname', '$this->phone_no', '$this->email', '$this->pwd', '$this->birthday', '$this->genre')";
        if ($connection->query($query)) {
            return 1;
        } else return 0;
    }
}