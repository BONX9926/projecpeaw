<h1>แจ้งชำระเงิน</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>เลขที่บิล</th>
            <th class="text-center">หลักฐานการชำระ</th>
            <th>วันที่สั่งซื้อ</th>
            <th>แจ้งชำระเงิน</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($rows as $key => $bin) { ?>
    <tr>
        <td><?=$bin->bin_id;?></td>
        <td>
        <form id="<?=$bin->bin_id;?>" method="POST" enctype="multipart/formdata">
            <div class="input-group input-group-sm">
                <input type="file" name="img" class="form-control input-sm">
                <input type="text" name="bin_id" class="form-control input-sm" value="<?=$bin->bin_id;?>">
            </div>
        </form>
        </td>
        <td><?=$bin->created_at;?></td>
        <td><button class="btn btn-success btn-sm" attr-id="<?=$bin->bin_id;?>" onclick="payment_send($(this))"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> แจ้งชำระเงิน</button></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<script>
function payment_send(el){
    var id = el.attr('attr-id');
    var formData = new FormData($("form#"+id)[0]);
		// alert(formData);
		console.log(id);
		$.ajax({
	        url: '<?=base_url();?>index.php/user/payment',
	        type: 'POST',
	        data: formData,
	        async: false,
	        success: function (data) {
            console.log(data);
            // alert(data);
            let json_res = jQuery.parseJSON(data);
            // // alert(json_res.status);
            if(json_res.status == true) {
	            $.simplyToast(json_res.message, 'success');
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
            	$.simplyToast(json_res.message, 'danger');
            // alert('66666');
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
}
	// $('#submit').click(function(event) {
	// 	// var data = $('form').serializeArray();
	// 	var formData = new FormData($("form#files")[0]);
	// 	alert(data[0]['value']);
	// 	// console.log(data);
	// 	// console.log(formData);
	// 	$.ajax({
	//         url: 'add_item_save.php',
	//         type: 'POST',
	//         data: formData,
	//         async: false,
	//         success: function (data) {
    //         // console.log(data);
    //         // alert(data);
    //         let json_res = jQuery.parseJSON(data);
    //         // // alert(json_res.status);
    //         if(json_res.status == true) {
	//             $.simplyToast(json_res.message, 'success');
	//             $('input').val("");
	//             $('#show-img').attr('src', '');
    //         } else {
    //         	$.simplyToast(json_res.message, 'danger');
    //         // alert('66666');
    //         }
    //     },
    //     cache: false,
    //     contentType: false,
    //     processData: false
    // });
    // return false;
		
	// });

</script>