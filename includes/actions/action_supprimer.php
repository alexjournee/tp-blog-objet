<?php
require_once '../config.php';

$id = $_POST['id'];
$pt = new PostTable();
$pt->delete($id);
header('Location: ../../public/index.php');

?>