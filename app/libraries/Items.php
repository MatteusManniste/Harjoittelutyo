<?php

class Items
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function listItems()
    {
        $sql = "SELECT * FROM tavara";

        $this->db->query($sql);

        $row = $this->db->resultSet();

        foreach ($row as $item) :
            echo "<div class='categories-item'>";
            echo "<h3 class='categories-item-title'>$item->nimi</h3>";
            echo "<img class='categories-item-img' src='$item->kuva' alt='$item->nimi'>";
            echo "<p class='categories-item-price'>$item->hinta</p>";
            echo "</div>";
        endforeach;
    }
}
