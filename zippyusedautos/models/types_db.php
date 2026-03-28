<?php
require_once 'database.php';

// Get all types
function get_all_types() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM types ORDER BY type_name");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Add type
function add_type($name) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO types (type_name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
}

// Delete type
function delete_type($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM types WHERE type_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>