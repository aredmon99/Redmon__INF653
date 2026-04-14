<?php
require_once 'database.php';

function get_all_classes() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM classes ORDER BY class_name");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function add_class($name) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO classes (class_name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
}


function delete_class($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM classes WHERE class_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>