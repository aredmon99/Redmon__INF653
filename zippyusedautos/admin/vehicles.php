<?php
require_once('../models/vehicles_db.php');


$sort = $_GET['sort'] ?? 'price'; 
$make_id = $_GET['make_id'] ?? null;
$type_id = $_GET['type_id'] ?? null;
$class_id = $_GET['class_id'] ?? null;


$filter_col = null; $filter_val = null;
if ($make_id) { $filter_col = 'v.make_id'; $filter_val = $make_id; }
elseif ($type_id) { $filter_col = 'v.type_id'; $filter_val = $type_id; }
elseif ($class_id) { $filter_col = 'v.class_id'; $filter_val = $class_id; }

$vehicles = get_vehicles($sort, $filter_col, $filter_val);
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

include('views/vehicles_list.php');


 elseif ($action == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        add_vehicle($_POST['year'], $_POST['model'], $_POST['price'], $_POST['type_id'], $_POST['class_id'], $_POST['make_id']);
        header("Location: vehicles.php");
    } else {
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include '../views/add_vehicle_form.php';
    }

} elseif ($action == 'delete') {
    $id = $_GET['id'] ?? null; 
    if ($id) {
        delete_vehicle($id);
    }
    header("Location: vehicles.php");
    exit();
}
?>
<?php include 'admin_footer.php'; ?>