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
                    <th>#</th>
                    <th>Code</th>
                    <th>ราคา / บาท</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <tr id="tr000004">
                    <th scope="row">1</th>
                    <td>พาย1</td>
                    <td>20</td>
                    <td>พายอร่อยนะ</td>
                    <td><button class="btn btn-warning btn-sm" onclick="edit($(this))" attr-type="000003" attr-id="000004"><i class="fa fa-pencil-square-o"></i></button></td>
                    <td><button class="btn btn-danger btn-sm" onclick="del($(this))" attr-type="000003" attr-id="000004"><i class="fa fa-trash-o"></i></button></td>
                    <td>
                        <select class="form-control" onchange="best($(this))" attr-id="000004">
                        <option value="0" selected="selected">ปกติ</option>
                        <option value="1">ขายดี</option>
                    </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
