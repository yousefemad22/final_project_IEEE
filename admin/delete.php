<?php
require_once("includes/connectDB.php");
session_start();
    if(isset($_SESSION['name'])){
global $con;
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['cat_id'])) {
        $stmt = $con->prepare('DELETE FROM menu_categories WHERE category_id=?');
        $stmt->execute(array($_GET['cat_id']));
        header('location:menu_categories.php');
    }
    elseif(isset($_GET['menu_id'])){
        $stmt = $con->prepare('DELETE FROM menus WHERE menu_id=?');
        $stmt->execute(array($_GET['menu_id']));
        header('location:menus.php');
    }
    elseif(isset($_GET['img_id'])){
        $stmt = $con->prepare('DELETE FROM images WHERE imge_id=?');
        $stmt->execute(array($_GET['img_id']));
        header('location:gallery.php');
    }
}
}else{
    header('location:login.php');
}
?>