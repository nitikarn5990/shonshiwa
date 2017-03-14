<?php
$data = unserialize($philosophy[0]['philosophy_detail']);
$data_title = unserialize($philosophy[0]['philosophy_title']);
?>

<h1><?php echo $data_title[$this->session->userdata('lang')] ;?></h1>
<?php
//
echo $data[$this->session->userdata('lang')];

?>
