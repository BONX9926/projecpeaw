
<br><br><br>
<h1 align="center">แก้ไขรายการขนมปัง</h1>
<form id="fromba1" method="POST" enctype="multipart/formdata">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>ชื่อสินค้า</label>
            <input type="hidden" name="pro_id" value="<?=$rows[0]->pro_id;?>">
            <input type="text" class="form-control" name="pro_name" id="" value="<?=$rows[0]->pro_name;?>" placeholder="ชื่อสินค้า">
        </div>
        <div class="form-group col-md-6">
            <label>ราคา / ชิ้น</label>
            <input type="text" class="form-control" name="pro_price" id="" value="<?=$rows[0]->pro_price;?>" placeholder="ราคา">
        </div>
    </div>
    <div class="form-group">
        <label>รูปสินค้า</label>
        <input type="file" name="pro_pic" class="form-control">
    </div>
    <div class="form-group">
        <label>รายละเอียด</label>
        <textarea name="pro_detail" id="" rows="8" class="form-control"  placeholder="รายละเอียด"><?=$rows[0]->pro_detail;?></textarea>
    </div>
    <button type="button" id="submit" class="btn btn-primary">บันทึก</button>
</form>

<script>
    $('#submit').click(function(event) {
		var formData = new FormData($("form#fromba1")[0]);
		$.ajax({
	        url: '<?=base_url();?>index.php/bakery1/update',
	        type: 'POST',
	        data: formData,
	        async: false,
	        success: function (data) {
                console.log(data);
                try{
                    let json_res = jQuery.parseJSON(data);

                    if(json_res.status == true) {
                        $.simplyToast(json_res.message, 'success');
                    } else {
                        $.simplyToast(json_res.message, 'danger');
                    }
                }catch(e){
                    $.simplyToast(e, 'danger');
                }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
		
	});
</script>