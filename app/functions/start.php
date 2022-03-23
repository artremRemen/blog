<?php 
require_once('./functions/files.php');
require_once('./functions/verifForm.php');
define('DIR', './datas/posts');

$cats = array();
$action = null;
$id = null;
$content = null;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if (isset($_SESSION['cats'])) {
    $cats = $_SESSION['cats'];
    echo'transfereTable';
}
else {
    $cats = listCat(DIR);
}

if ($action === 'create') {
    
}
elseif ($action === 'show') {
    $id = $_GET['id'];
    $content = ReadData($id, DIR);
}

$_SESSION = [];
