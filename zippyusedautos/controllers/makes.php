<?php
require_once __DIR__ . '/../models/makes_db.php';
$action = $_GET['action'] ?? 'list';

if($action=='list'){
    $makes = get_all_makes();
    include '../views/makes_list.php';
}elseif($action=='add' && $_SERVER['REQUEST_METHOD']=='POST'){
    add_make($_POST['name']);
    header('Location:makes.php');
}elseif($action=='delete'){
    delete_make($_GET['id']);
    header('Location:makes.php');
}
?>