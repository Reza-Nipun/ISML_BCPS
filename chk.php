<?php
require_once('db_Class.php');
$obj = new db_class();
$obj->MySQL();

$style = $_POST['style'];

$SQL="SELECT * FROM `tb_vsfs_style` WHERE StyleCode='$style'";    //table name
$results = $obj->sql($SQL);

$data = array();
while ($row = mysql_fetch_assoc($results)){
    $data[] = $row;
}

echo json_encode($data);
?>