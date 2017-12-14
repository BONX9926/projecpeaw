<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <form action="<?=base_url();?>index.php/products/order" method="post">
                <table class="table table-striped" id="tblProducts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">ชื่อสินค้า</th>
                            <th class="text-center">ราคา / บาท</th>
                            <th class="text-center">-2</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-center">+1</th>
                            <th class="text-center">ราคา</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if (count($_SESSION['bag']) > 0) {
                    $i = 1; 
                    ?>
                    <?php foreach ($_SESSION['bag'] as $key => $value) { ?>
                        <tr id="bag<?=$key;?>" class="body">
                            <th scope="row" class="text-center"><?=$i;?></th>
                            <td class="text-center">
                                <?=$value['name'];?>
                                <input type="hidden" name="pro_id[]" value="<?=$key;?>">
                                <input type="hidden" name="pro_price[]" value="<?=$value['price'];?>">
                                <input type="hidden" id="num<?=$key;?>" name="pro_num[]" value="<?=$value['num'];?>">
                            </td>
                            <td class="pro_pic text-center" id="pic<?=$key;?>"><?=$value['price'];?></td>
                            <td class="text-center"><button type="button" class="btn btn-default btn-sm" attr-type="minus" attr-id="<?=$key;?>" onclick="renderTb($(this))">-</button></td>
                            <td class="pro_num text-center"><?=$value['num'];?></td>
                            <td class="text-center"><button type="button" class="btn btn-default btn-sm" attr-type="plus" attr-id="<?=$key;?>" attr-pic="" onclick="renderTb($(this))">+</button></td>
                            <td class="total text-center"><?=$value['price'] * $value['num'];?></td>
                            <td class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="del($(this))" attr-id="<?=$key;?>"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                    <?php $i++; ?>
                    <?php 
                        } 
                    }
                    ?>
                        <tr>
                            <th scope="row">รวม</th>
                            <td></td>
                            <td id="sum_pro_pic"></td>
                            <td></td>
                            <td id="sum_pro_num" class="text-center"></td>
                            <td></td>
                            <td id="sum_total" class="text-center"></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">สั่งซื้อ</button>
                <a href="<?=base_url();?>index.php/user/cancel_bin" class="btn btn-danger">ยกเลิกการสั่งซื้อทั้งหมด</a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
//คำนวนตาราง
function total(myClass, MyId){
    var sum = 0;
    $("."+myClass).each(function (index) {
        sum += $(this).text()*1;
        console.log(sum);
        $('#'+MyId).html(sum);
    });
}

//คำนวนสินค้าในตะกร้าทั้งหมด
function renderTb(el){
    // .next();
    var type = el.attr('attr-type');
    var id = el.attr('attr-id');
    if(type == "plus"){
        //ปุ่มเพิ่ม
        var val = el.parent().prev().html()*1; // ดึงค่าช่องจำนวน
        // alert(val+1)
        var pic = $('#pic'+id).html()*1;
        var numNew = val+1;
        if(numNew < 99){
            el.parent().prev().html(numNew); //ใส่ค่าช่องจำนวน
            $('#num'+id).val(numNew); //ใส่ค่าจำนวนใหม่

            var totalNew = el.parent().prev().html()*1*pic; // จำนวนปัจจบุัน * ราคาต่อชิ้น
            el.parent().next().html(totalNew);
        }else{
            el.parent().prev().html(99);
            $('#num'+id).val(99);
        }

        sum();
    }else{
    //ปุ่มลบ
        var val = el.parent().next().html()*1; //ดึงค่าช่องจำนวน
        var pic = $('#pic'+id).html()*1;
        var numNew = val-2;
        if(numNew > 0){
            el.parent().next().html(numNew); //ใส่ค่าช่องจำนวน
            $('#num'+id).val(numNew);//ใส่ค่าจำนวนใหม่

            var totalNew = el.parent().next().html()*1*pic; // จำนวนปัจจบุัน * ราคาต่อชิ้น
            el.parent().next().next().next().html(totalNew);
        }else{
            el.parent().next().html(1)
            $('#num'+id).val(1);
        }

        sum();
    }
}
sum();
function sum(){
    total('pro_num', 'sum_pro_num');
    total('total', 'sum_total');
}

function del(el){
    var id = el.attr('attr-id');
    var r = confirm("ต้องการลบรายการนี้ใช่ไหม");
    if (r == true) {
        $.post("<?=base_url();?>index.php/products/del_itemByBag/"+id, ()=> {       
        }).done((data) => {
            console.log(data);
            // try {
            //     let json_res = jQuery.parseJSON(data);

            //     if(json_res.status == true) {
            //         $.simplyToast(json_res.message, 'success');
            //         $('#bag'+json_res.id).remove();
            //         location.reload();
            //     } else {
            //         $.simplyToast(json_res.message, 'danger');
            //     }
            // } catch (e) {
            //     $.simplyToast(e, 'danger');
            // }
        });
    } else {
        alert("ยกเลิกการลบรายการนี้");
    }  
}
</script>
<!-- data-toggle="modal" data-target=".bd-example-modal-lg" -->