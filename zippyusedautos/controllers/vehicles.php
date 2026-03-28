<?php
require_once __DIR__ . '/../models/vehicles_db.php';
require_once __DIR__ . '/../models/makes_db.php';
require_once __DIR__ . '/../models/types_db.php';
require_once __DIR__ . '/../models/classes_db.php';

$sort = $_GET['sort'] ?? 'price';
$make_id = $_GET['make_id'] ?? null;
$type_id = $_GET['type_id'] ?? null;
$class_id = $_GET['class_id'] ?? null;

$filter_col = $make_id ? 'v.make_id' : ($type_id ? 'v.type_id' : ($class_id ? 'v.class_id' : null));
$filter_val = $make_id ?? ($type_id ?? ($class_id ?? null));

$vehicles = get_vehicles($sort,$filter_col,$filter_val);
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

include '../views/vehicles_list.php';
?>