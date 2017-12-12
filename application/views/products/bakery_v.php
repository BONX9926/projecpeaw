<div class="container">
    <div class="row form-group text-center">
        <h1>ขนมปัง</h1>
    </div>
    <div class="row">
        <?php foreach ($rows as $key => $pro) { ?>
            <div class="col-md-4 form-group">

                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="..." alt="Card image cap" height="100px;" width="100%">
                    <div class="card-body">
                        <h4 class="card-title"><?=$pro->pro_name;?></h4>
                        <p class="card-text"><?=$pro->pro_detail;?></p>
                        <p>
                            <div class="input-group">
                                <span class="input-group-addon">จำนวน</span>
                                <input type="number" attr-id="<?=$pro->pro_id;?>" class="form-control" onchange="numitem($(this))" value="1">
                            </div>
                            <label for="">ราคา : <?=$pro->pro_price;?> ต่อหน่วย</label>
                        </p>
                        <!-- <p><label for="">จำนวน</label><input type="number" class="form-control input-xxs col-md-3" value="1" size="10"></p> -->
                        <a href="#" class="btn btn-primary" onclick="add_chart($(this))" id="<?=$pro->pro_id;?>" num="1" name="<?=$pro->pro_name;?>" price="<?=$pro->pro_price;?>">หยิบใส่ตระกร้า</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="">

function add_chart(el){
    var id = el.attr('id');
    var num = el.attr('num');
    var name = el.attr('name');
    var price = el.attr('price');
}

function numitem(el){
    var id = el.attr('attr-id');
    var val = el.val();
    console.log(id);
    $('#'+id).attr('num',val);
}
</script>