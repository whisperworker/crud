<?php

$connect = mysqli_connect('localhost', 'root', '', 'crud');

if(!$connect) {
    die('Error connect to DB');
}