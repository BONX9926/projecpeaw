<div class="container-fuild">
    <div id="content_bakery1">
        <!-- <br><br><br> -->
        <h1 align="center">รายการเบเกอรรี่</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา / บาท</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $key => $pro) { ?>
                    <tr id="tr<?=$pro->pro_id;?>">
                        <th scope="row"><?=$key+1?></th>
                        <td><?=$pro->pro_name;?></td>
                        <td><?=$pro->pro_price;?></td>
                        <td><?=$pro->pro_detail;?></td>
                        <td><button class="btn btn-warning btn-sm" onclick="edit($(this))" attr-type="<?=$pro->pro_type;?>" attr-id="<?=$pro->pro_id;?>"><i class="fa fa-pencil-square-o"></i></button></td>
                        <td><button class="btn btn-danger btn-sm" onclick="del($(this))" attr-type="<?=$pro->pro_type;?>" attr-id="<?=$pro->pro_id;?>"><i class="fa fa-trash-o"></i></button></td>
                        <td>
                            <select class="form-control" onchange="best($(this))" attr-id="<?=$pro->pro_id;?>">
                            <?php 
                                $status = array('ปกติ','ขายดี');
                                foreach ($status as $key => $value) { 
                            ?>
                                <option value="<?=$key;?>"<?= ($key == $pro->best_seller) ? 'selected="selected"' : '';?>><?=$value;?></option>
                            <?php 
                                } 
                            ?>
                            </select>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
function best(el){
    var id = el.attr('attr-id');
    var val = el.val();
    // alert(val);
    $.post("<?=base_url();?>index.php/products/up_st_best/"+id+'/'+val, () => {
    }).done((data) => {
        try {
            let json_res = jQuery.parseJSON(data);

            if(json_res.status == true) {
                $.simplyToast(json_res.message, 'success');
            } else {
                $.simplyToast(json_res.message, 'danger');
            }
        } catch (e) {
            $.simplyToast(e, 'danger');
        }
    });
}

function edit(el){
    var id = el.attr('attr-id');
    var type = el.attr('attr-type');
    // alert(id);
    $.post("<?=base_url();?>index.php/bakery1/page_edit/"+id+'/'+type, () => {
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
            // console.log(data);
            try {
                let json_res = jQuery.parseJSON(data);
    
                if(json_res.status == true) {
                    $.simplyToast(json_res.message, 'success');
                    $('#tr'+json_res.id).remove();
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