<?php
require_once __DIR__ . '/../models/classes_db.php';

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $classes = get_all_classes();
    include __DIR__ . '/../views/classes_list.php';

} elseif ($action == 'add') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        add_class($_POST['name']);
        header("Location: classes.php");
        exit;
    }

} elseif ($action == 'delete') {
    if (isset($_GET['id'])) {
        delete_class($_GET['id']);
    }
    header("Location: classes.php");
    exit;
}