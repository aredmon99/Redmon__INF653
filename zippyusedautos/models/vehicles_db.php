<?php
require_once 'database.php';

function get_vehicles($sort='price', $filter_col=null, $filter_val=null){
    global $mysqli;

    $allowed_sort = ['price','year'];
    $sort_col = in_array($sort,$allowed_sort) ? $sort : 'price';

$sql = "SELECT v.vehicle_id, v.year, v.model, v.price, 
        m.make_name, t.type_name, c.class_name
        FROM vehicles v
        JOIN makes m ON v.make_id = m.make_id
        JOIN types t ON v.type_id = t.type_id
        JOIN classes c ON v.class_id = c.class_id";
        
if (!empty($filter_col) && !empty($filter_val)) {
    $clean_val = $mysqli->real_escape_string($filter_val);
    $sql .= " WHERE $filter_col = '$clean_val'"; 
}

    $sql .= " ORDER BY $sort_col DESC";
    $result = $mysqli->query($sql);

    if (!$result) {
        die("Query Failed: " . $mysqli->error . " | SQL: " . $sql);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

function add_vehicle($year,$model,$price,$type_id,$class_id,$make_id){
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO vehicles (year,model,price,type_id,class_id,make_id) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isdiii",$year,$model,$price,$type_id,$class_id,$make_id);
    $stmt->execute();
}

function delete_vehicle($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM vehicles WHERE vehicle_id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
}
?>