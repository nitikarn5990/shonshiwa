<?php
$data = unserialize($contact[0]['contact_detail']);
$data_title = unserialize($contact[0]['contact_title']);
?>

<h1><?php echo $data_title[$this->session->userdata('lang')] ;?></h1>
<?php
//
echo $data[$this->session->userdata('lang')];

?>
