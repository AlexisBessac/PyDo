<?php

require '../src/data/db-connect.php';

$query = $dbh->query("SELECT * FROM role");
$role = $query->FETCHALL();