<?php
require_once __DIR__ . '/../models/vehicles_db.php';
require_once __DIR__ . '/../models/makes_db.php';
require_once __DIR__ . '/../models/types_db.php';
require_once __DIR__ . '/../models/classes_db.php';

$action = $_GET['action'] ?? 'list';

if($action=='list'){
    $vehicles = get_vehicles();
    include '../views/vehicles_list.php';
}elseif($action=='add' && $_SERVER['REQUEST_METHOD']=='POST'){
    add_vehicle($_POST['year'],$_POST['model'],$_POST['price'],$_POST['type_id'],$_POST['class_id'],$_POST['make_id']);
    header('Location:vehicles.php');
}elseif($action=='delete'){
    delete_vehicle($_GET['id']);
    header('Location:vehicles.php');
}
?>