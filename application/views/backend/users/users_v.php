<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">สมาชิกทั้งหมด</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>เบอรโทรศัพท์</th>
                    <th>อีเมล์</th>
                    <th>เป็นสมาชิกเมื่อ</th>
                    <th>แก้ไขข้อมูลเมื่อ</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $key => $user) { ?>
                    <tr>
                        <th scope="row"><?=$key+1;?></th>
                        <td><?=$user->u_name;?></td>
                        <td><?=$user->u_phone;?></td>
                        <td><?=$user->u_email;?></td>
                        <td><?=$user->created_at;?></td>
                        <td><?=$user->updated_at;?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>