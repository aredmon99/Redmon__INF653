<?php
require_once 'database.php';

function get_vehicles($sort='price', $filter_col=null, $filter_val=null){
    global $mysqli;

    $allowed_sort = ['price','year'];
    $sort_col = in_array($sort,$allowed_sort)?$sort:'price';

    $sql = "SELECT v.id, v.year, v.model, v.price,
            m.name AS make_name, t.name AS type_name, c.name AS class_name
            FROM vehicles v
            JOIN makes m ON v.make_id=m.id
            JOIN types t ON v.type_id=t.id
            JOIN classes c ON v.class_id=c.id";

    if($filter_col && $filter_val){
        $sql .= " WHERE $filter_col = $filter_val";
    }

    $sql .= " ORDER BY $sort_col DESC";

    $result = $mysqli->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function add_vehicle($year,$model,$price,$type_id,$class_id,$make_id){
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO vehicles (year,model,price,type_id,class_id,make_id) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isdiid",$year,$model,$price,$type_id,$class_id,$make_id);
    $stmt->execute();
}

function delete_vehicle($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM vehicles WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
}
?>