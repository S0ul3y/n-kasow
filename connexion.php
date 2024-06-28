<?php
try {
    $bd = new PDO("mysql:host=localhost;dbname=nkaso_bd", "root", "");
} catch (Exception $e) {
    die($e->getMessage());
}

