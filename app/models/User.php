<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // hae käyttäjä sähköpostilla
    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM hallitsija WHERE sahkoposti = :email";

        $this->db->query($sql);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM hallitsija WHERE sahkoposti = :email";

        $this->db->query($sql);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if (password_verify($password, $row->password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM hallitsija WHERE hallitsijaID = :id";

        $this->db->query($sql);
        $this->db->bind(":id", $id);

        return $this->db->single();
    }

    public function register($data)
    {

        $sql = "INSERT INTO hallitsija (etunimi, sahkoposti, salasana) VALUES (:name, :email, :password)";

        $this->db->query($sql);

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
