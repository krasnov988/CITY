<?php
include '../template/database.php';
$sql = "SELECT count(*) FROM `applications` WHERE status = 2";
$result = $mysqli->query($sql);
$count = $result->fetch_array();
print $count[0];