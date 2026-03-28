<?php
require_once __DIR__ . '/../models/types_db.php';

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $types = get_all_types();
    include __DIR__ . '/../views/types_list.php';

} elseif ($action == 'add') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        add_type($_POST['name']);
        header("Location: types.php");
        exit;
    }

} elseif ($action == 'delete') {
    if (isset($_GET['id'])) {
        delete_type($_GET['id']);
    }
    header("Location: types.php");
    exit;
}