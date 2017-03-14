<?php
$data = unserialize($home[0]['home_detail']);
$data_title = unserialize($home[0]['home_title']);
?>

<h1><?php echo $data_title[$this->session->userdata('lang')]; ?></h1>
<?php
//
echo $data[$this->session->userdata('lang')];


?>
 