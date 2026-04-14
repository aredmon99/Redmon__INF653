<?php
require_once ('../models/classes_db.php');
$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $classes = get_all_classes(); 
    include '../views/classes_list.php';

} elseif ($action == 'add') {
    add_class($_POST['name']);
    header("Location: classes.php");

} elseif ($action == 'delete') {
    delete_class($_GET['id']);
    header("Location: classes.php");
}
?>