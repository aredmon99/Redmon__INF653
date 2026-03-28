<?php
require_once __DIR__ . '/../models/vehicles_db.php';
require_once __DIR__ . '/../models/makes_db.php';
require_once __DIR__ . '/../models/types_db.php';
require_once __DIR__ . '/../models/classes_db.php';

$sort = $_GET['sort'] ?? 'price';
$make_id = $_GET['make_id'] ?? null;
$type_id = $_GET['type_id'] ?? null;
$class_id = $_GET['class_id'] ?? null;

$filter_col = null;
$filter_val = null;

if ($make_id) {
    $filter_col = 'v.make_id';
    $filter_val = $make_id;
} elseif ($type_id) {
    $filter_col = 'v.type_id';
    $filter_val = $type_id;
} elseif ($class_id) {
    $filter_col = 'v.class_id';
    $filter_val = $class_id;
}

$vehicles = get_vehicles($sort,$filter_col,$filter_val);
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

include __DIR__ . '/../views/vehicles_list.php';
?>