<?php

# Inclusion of classes

include "./classCrud.php";


# Getting the data by post

$userName = $_POST["nameUser"];
$userAddress = $_POST["userAddress"];
$userYear = $_POST["userYears"];

# Instantiating the class responsible for system functions

$new = new Users("root", "localhost", "", "dbname");

$new->setUserName($userName);
$new->setUserAddress($userAddress);
$new->setUserYear($userYear);

$new->insertInto();


