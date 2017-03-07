<?php include('');
header('Content-Type: application/json');
$ty = $_GET['ty'];

$sql = "select * from 'tbl_product_group' where product_type_ID = '$ty' order by 'product_group_ID' ";
$query = $mysqli->query($sql);
$tbl_product_group = array();
if($query->num_rows > 0){
    while($resultLists = $query->fetch_assoc()){
        $tbl_product_group[] = $resultLists;
    }
}
$d['data'] = $tbl_product_group;
echo json_encode($d);