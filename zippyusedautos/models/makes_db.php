<?php
require_once 'database.php';

function get_all_makes(){
    global $mysqli;
    $res = $mysqli->query("SELECT * FROM makes ORDER BY name");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function add_make($name){
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO makes (name) VALUES (?)");
    $stmt->bind_param("s",$name);
    $stmt->execute();
}

function delete_make($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM makes WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
}
?>