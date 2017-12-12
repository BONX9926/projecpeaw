<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">สินค้าทั้งหมด</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12 form-group" align="center">
                <?php foreach ($pro_type as $key => $type) { ?>
                    <button class="ba <?=$btnColor[$key]?>" id="<?=$type->protype_id;?>" url="index.php/products/pageBakery"><?=$type->name;?></button>
                <?php } ?>
            </div>
            <div class="col-md-12">
                <button class="btn btn-success" onclick="add()" style="float:right">เพิ่มสินค้า</button>
                <!-- &nbsp;
                <button class="btn btn-primary" onclick="back()">กลับ</button> -->
            </div>
            <br><br><br>
            <div class="col-md-12" id="content_products">
            
            </div>
        </div>
    </div>
</div>

<script>
function add(){
    $.get("<?=base_url();?>index.php/bakery1/page_add", () => {
    }).done((data) => {
        $('#content_products').html('<h1>Loading...</h1>');
        $('#content_products').html(data);
    });
}

$('.ba').click(function(){
    var url = $(this).attr('url');
    var type = $(this).attr('id');
    pagebakery(url, type);
});

function pagebakery(url, type){
    $.get("<?=base_url();?>"+url+'/'+type,
        function () {        
        }
    ).done(function(data){
        $('#content_products').html(data);
    });
}
// pagebakery('index.php/products/pageBakery1');
</script>