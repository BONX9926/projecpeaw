<div class="col-lg-12">
    <div class="card">
    <!-- <div class="card-close">
        <div class="dropdown">
        <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
        </div>
    </div> -->
    <div class="card-header d-flex align-items-center">
        <h3 class="h4">สินค้าขายดี</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา / บาท</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $key => $pro) { ?>
                    <tr id="<?=$pro->pro_id;?>">
                        <th scope="row"><?=$key+1?></th>
                        <td><?=$pro->pro_name;?></td>
                        <td><?=$pro->pro_price;?></td>
                        <td><?=$pro->pro_detail;?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>