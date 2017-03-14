<?php
$data = unserialize($footer[0]['footer_detail']);
//$dataTitle = unserialize($home[0]['home_detail']);
?>

<?php
//
echo $data[$this->session->userdata('lang')];

?>
