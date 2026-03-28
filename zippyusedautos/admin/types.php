<?php
require_once '../models/types_db.php';

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $types = get_all_types();
    include '../views/types_list.php';

} elseif ($action == 'add') {
    add_type($_POST['name']);
    header("Location: types.php");

} elseif ($action == 'delete') {
    delete_type($_GET['id']);
    header("Location: types.php");
}
?>