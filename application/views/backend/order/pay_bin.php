<?php
    foreach ($row as $key => $pay) {
?>
<center>
<img src="<?=base_url();?>assets/img/payments/<?=$pay->file;?>" alt="">
</center>

<?php
        # code...
    }
?>