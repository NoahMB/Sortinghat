<?php

//Connecteren met de server

$servername = "ID362507_sortinghat.db.webhosting.be";
$root = "ID362507_sortinghat";
$password = "Ikeetgraagpizza1";

$conn = new mysqli($servername, $root, $password, "ID362507_sortinghat", 3306);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>