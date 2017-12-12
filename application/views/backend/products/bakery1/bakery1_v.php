<div class="container-fuild">
    <br>
    <h1 align="center">ขนมปัง</h1>
    <div class="row form-group" style="float:right">
        <button class="btn btn-success" onclick="add()">เพิ่มสินค้า</button>
        &nbsp;
        <button class="btn btn-primary" onclick="back()">กลับ</button>
    </div>
    <div id="content_bakery1">
        <br><br><br>
        <h1 align="center">รายการขนมปังทั้งหมด</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา / บาท</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $key => $pro) { ?>
                    <tr id="<?=$pro->pro_id;?>">
                        <th scope="row"><?=$key+1?></th>
                        <td><?=$pro->pro_name;?></td>
                        <td><?=$pro->pro_price;?></td>
                        <td><?=$pro->pro_detail;?></td>
                        <td><button class="btn btn-warning btn-sm" onclick="edit($(this))" attr-id="<?=$pro->pro_id;?>"><i class="fa fa-pencil-square-o"></i></button></td>
                        <td><button class="btn btn-danger btn-sm" onclick="del($(this))" attr-id="<?=$pro->pro_id;?>"><i class="fa fa-trash-o"></i></button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
function add(){
    $.get("<?=base_url();?>index.php/bakery1/page_add", () => {
    }).done((data) => {
        $('#content_bakery1').html('<h1>Loading...</h1>');
        $('#content_bakery1').html(data);
    });
}

function back(){
    $('#bakery-btn1').click();
}

function edit(el){
    var id = el.attr('attr-id');
    // alert(id);
    $.post("<?=base_url();?>index.php/bakery1/page_edit/"+id, () => {
    }).done((data) => {
        $('#content_bakery1').html('<h1>Loading...</h1>');
        $('#content_bakery1').html(data);
    });
}

function del(el){
    var id = el.attr('attr-id');
    // alert(id);

    var r = confirm("ต้องการลบรายการนี้ใช่ไหม!");
    if (r == true) {
        $.post("<?=base_url();?>index.php/bakery1/del/"+id, () => {
        }).done((data) => {
            console.log(data);
            try {
                let json_res = jQuery.parseJSON(data);
    
                if(json_res.status == true) {
                    $.simplyToast(json_res.message, 'success');
                    $('#'+json_res.id).remove();
                } else {
                    $.simplyToast(json_res.message, 'danger');
                }
            } catch (e) {
                $.simplyToast(e, 'danger');
            }
        });
    } else {
        alert("ยกเลิกการลบรายการนี้");
    }
}
</script>