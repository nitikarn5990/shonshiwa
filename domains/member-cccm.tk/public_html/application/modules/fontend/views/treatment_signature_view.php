<?php
$data = unserialize($treatment_signature[0]['treatment_detail']);
$data_title = unserialize($treatment_signature[0]['treatment_title']);
?>





<table width="633" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
            <td align="left" valign="top">
               
<h1><?php echo $data_title[$this->session->userdata('lang')]; ?></h1>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top" class="browntext">
                <div align="justify">
                    <?php
//
                    echo $data[$this->session->userdata('lang')];
                    ?>
                </div>                                    
            </td>
        </tr>
    </tbody>
</table>

