<?php


include "./classCrud.php";



$userName = $_POST["nameUser"];
$userAddress = $_POST["userAddress"];
$userYear = $_POST["userYears"];

$new = new Users();
$new->setUserName($userName);
$new->setUserAddress($userAddress);
$new->setUserYear($userYear);

$new->insertInto();

//$new->insertInto();

