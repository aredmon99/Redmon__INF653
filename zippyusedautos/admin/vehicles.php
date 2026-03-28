<?php
require_once '../models/vehicles_db.php';
require_once '../models/makes_db.php';
require_once '../models/types_db.php';
require_once '../models/classes_db.php';

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $vehicles = get_vehicles();
    include '../views/vehicles_list.php';

} elseif ($action == 'add') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        add_vehicle(
            $_POST['year'],
            $_POST['model'],
            $_POST['price'],
            $_POST['type_id'],
            $_POST['class_id'],
            $_POST['make_id']
        );
        header("Location: vehicles.php");
    } else {
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include '../views/add_vehicle_form.php';
    }

} elseif ($action == 'delete') {
    delete_vehicle($_GET['id']);
    header("Location: vehicles.php");
}
?>