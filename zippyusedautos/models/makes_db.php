<?php
require_once 'database.php';

function get_all_makes(){
    global $mysqli;
    $res = $mysqli->query("SELECT * FROM makes ORDER BY make_name");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function add_make($make_name){
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO makes (make_name) VALUES (?)"); 
    $stmt->bind_param("s", $make_name); 
    $stmt->execute();
}

function delete_make($make_id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM makes WHERE make_id=?"); 
    $stmt->bind_param("i", $make_id);
    $stmt->execute();
}
?>