<div class="col-lg-12">
    <div class="card">
    <!-- <div class="card-close">
        <div class="dropdown">
        <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
        </div>
    </div> -->
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">รายการสั่งซื้อ</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>เลขที่บิล</th>
                    <th>วันที่สั่งซื้อ</th>
                    <th>ลูกค้า</th>
                    <th>เบอร์โทรศัทพ์</th>
                    <th>สถานะแจ้งชำระ</th>
                    <th>อัพเดทสถานะ</th>
                    <th>ยกเลิก</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $key => $order) { ?>
                <tr id="bin<?=$order->bin_id;?>">
                    <td scope="row"><a href="#" onclick="showBin($(this))"><?=$order->bin_id;?></a></td>
                    <td><?=$order->created_at;?></td>
                    <td><?=$order->u_name;?></td>
                    <td><?=$order->u_phone;?></td>
                    <td>
                    <?= ($order->pay_status =='1') ? "<sapn class='text-success'>แจ้งชำระแล้ว <a href='#' attr-id='".$order->bin_id."' onclick='check($(this))' style='font-size:20px;'>คลิก</a></span>" : "<sapn class='text-danger'>ยังไม่ได้แจ้งชำระ</span>";?>
                    </td>
                    <td>
                        <select class="form-control" onchange="update_status_bin($(this))" attr-id="<?=$order->bin_id;?>">
                        <?php foreach ($status_bin as $key => $st_bin) { ?>
                            <option value="<?=$st_bin->id;?>" <?= ($order->ref_status_bin == $st_bin->id) ? "selected='selected'" : "" ?> ><?=$st_bin->name;?></option>
                        <?php } ?>
                        </select>
                    </td>
                    <td><button class="btn btn-danger btn-sm" onclick="del_bin($(this))" attr-id="<?=$order->bin_id;?>"><i class="fa fa-trash-o"></i></button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Modal -->
<div class="mdCheck modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>


<div class="mdBin modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เลขที่บิล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<script>
function check(el){
    var bin_id = el.attr('attr-id');
    alert(bin_id);
    $('.mdCheck').modal('show');
}

function showBin(el){
    var bin_id = el.text();
    alert(bin_id);
    $('.mdBin').modal('show');
}
function update_status_bin(el){
    var bin_id = el.attr('attr-id');
    var status = el.val();

    $.post("<?=base_url();?>index.php/order/update_status_bin/"+bin_id+'/'+status,() => {
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

function del_bin(el){
    var bin_id = el.attr('attr-id');
    $.post("<?=base_url();?>index.php/order/del_bin/"+bin_id,() => {
    }).done((data) => {
            try {
                let json_res = jQuery.parseJSON(data);

                if(json_res.status == true) {
                    $.simplyToast(json_res.message, 'success');
                    $("#bin"+json_res.id).remove();
                } else {
                    $.simplyToast(json_res.message, 'danger');
                }
            } catch (e) {
                $.simplyToast(e, 'danger');
            }
    });
}
</script>
