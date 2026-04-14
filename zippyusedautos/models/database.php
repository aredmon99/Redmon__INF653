<?php
$mysqli = new mysqli("localhost","root","","zippyusedautos");
if ($mysqli->connect_error) {
    die("Connection failed: ".$mysqli->connect_error);
}
?>