<style>
    .plus{
        cursor: pointer;
    }
    .plus:hover{
        cursor: pointer;
        background-color: #F8BBD0;
    }
</style>
<div class="container">
    <div class="row form-group text-center">
        <!-- <h1>ขนมปัง</h1> -->
    </div>
    <div class="row">
     <!-- <?php echo '<pre>';var_dump($_SESSION); ?> -->
        <?php foreach ($rows as $key => $pro) { ?>
            <div class="col-md-4 form-group">

                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="<?=base_url();?>assets/img/products/<?=$pro->pro_pic;?>"  class="img-responsive" height="235.66px;" width="100%">
                    <div class="card-body">
                        <h4 class="card-title"><?=$pro->pro_name;?></h4>
                        <p class="card-text" style="font-size:16px;"><?=$pro->pro_detail;?></p>
                        <p>
                            <div class="input-group">
                                <span class="input-group-addon">จำนวน</span>
                                <input type="number" id="num<?=$pro->pro_id;?>" attr-id="<?=$pro->pro_id;?>" class="form-control num" value="1"/>
                                <span class="input-group-addon plus" onclick="minus($(this))" input_id="<?=$pro->pro_id;?>">-</span>
                                <span class="input-group-addon plus" onclick="plus($(this))" input_id="<?=$pro->pro_id;?>">+</span>
                            </div>
                            <label for="">ราคา : <?=$pro->pro_price;?> ชิ้น</label>
                        </p>
                        <!-- <p><label for="">จำนวน</label><input type="number" class="form-control input-xxs col-md-3" value="1" size="10"></p> -->
                        <button class="btn btn-primary" onclick="add_itemTobag($(this))"  <?= (isset($_SESSION['sessed_in'])) ? '' : 'disabled="disabled"' ;?>  id="<?=$pro->pro_id;?>" num="1" attr-name="<?=$pro->pro_name;?>" price="<?=$pro->pro_price;?>">หยิบใส่ตระกร้า</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
function plus(el){
    var id = el.attr('input_id');
    var num = $('#num'+id).val();
    var sum = num*1+2;
    if (sum > 99) { 
        $('#num'+id).val(99);
        $('#'+id).attr('num', 99);
    }else{
        $('#num'+id).val(sum);
        $('#'+id).attr('num', sum);
    }
}

function minus(el){
    var id = el.attr('input_id');
    var num = $('#num'+id).val();
    var sum = num*1-1;
    if (sum < 1) { 
        $('#num'+id).val(1);
        $('#'+id).attr('num', 1);
    }else{
        $('#num'+id).val(sum);
        $('#'+id).attr('num', sum);
    }
}

function add_chart(el){
    var id = el.attr('id');
    var num = el.attr('num');
    var name = el.attr('name');
    var price = el.attr('price');
}

$( ".num" ).bind( "change keyup", function() {
    var id = $(this).attr('attr-id');
    var val = $(this).val();
    if(val > 99){
        val = 99;
    }else if (val < 1){
        val = 1;
    }

    // if(val > 0 && val < 100){
    $('#'+id).attr('num', val);
    $(this).val(val);
});

function add_itemTobag(el) { 

    var id = el.attr('id');
    var num = el.attr('num');
    var name = el.attr('attr-name');
    var price = el.attr('price');
    // alert("ID : "+id +"  จำนวน : "+num+" ชื่อ : "+name+" ราคา : "+price);   
    // console.log(num_new+' '+num_before);
    $.post("<?=base_url();?>index.php/products/add_itemTobag", 
    { 
        id: id,
        num: num,
        name: name,
        price: price,
    }, () => {
    }).done((data) => {
        console.log(data);
        try {
            let json_res = jQuery.parseJSON(data);

            if(json_res.status == true) {
                $.simplyToast(json_res.message, 'success');
                if(json_res.new == true){
                    var num_before = $('#shopping-bag').html()*1;
                    var num_new = num_before +1;
                    $('#shopping-bag').html(num_new);
                }
            } else {
                $.simplyToast(json_res.message, 'danger');
            }
        } catch (e) {
            $.simplyToast(e, 'danger');
        }
    });
}
</script>