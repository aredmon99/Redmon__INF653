<?php
require_once('../models/database.php');
require_once('../models/vehicles_db.php');
require_once('../models/makes_db.php');
require_once('../models/types_db.php');
require_once('../models/classes_db.php');

$sort = $_GET['sort'] ?? 'price'; 
$make_id = $_GET['make_id'] ?? null;
$type_id = $_GET['type_id'] ?? null;
$class_id = $_GET['class_id'] ?? null;


$vehicles = get_vehicles($sort, $make_id, $type_id, $class_id); 
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

include('../views/vehicles_list.php');
?>