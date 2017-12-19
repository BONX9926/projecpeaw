<h2>เลขที่บิล : <?=$num_bin;?></h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>รายการที่</th>
            <th>ชื่อ</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($row as $key => $list) {
    ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$list->pro_name;?></td>
            <td><?=$list->num;?></td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>