<?php
$HOST_NAME = "localhost";
$DATABASE_NAME = "treaty";
$DATABASE_USERNAME = "root";
$DATABASE_PASSWORD = "";

//Database Connection
$mysqli = new mysqli($HOST_NAME, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE_NAME);
if (!$mysqli) {
    die('Could not connect: ' . mysql_error());
}
