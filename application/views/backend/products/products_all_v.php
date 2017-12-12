<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">สินค้าทั้งหมด</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12" align="center">
                <button class="btn btn-primary" id="bakery-btn1" url="index.php/products/pageBakery1">ขนมปัง</button>
                <button class="btn btn-secondary" id="bakery-btn2" url="index.php/products/pageBakery2">เค้ก</button>
                <button class="btn btn-success" id="bakery-btn3" url="index.php/products/pageBakery3">พายชั้น</button>
                <button class="btn btn-danger" id="bakery-btn4" url="index.php/products/pageBakery4">เดนนิส/ครัวซอง</button>
                <button class="btn btn-warning" id="bakery-btn5" url="index.php/products/pageBakery5">ชอร์ตโด, คุกกี้, พายร่วน และทาร์ต</button>
                <button class="btn btn-info" id="bakery-btn6" url="index.php/products/pageBakery6">ชูเพสต์/เอแคร์</button>
                <button class="btn btn-default" id="bakery-btn7" url="index.php/products/pageBakery7">ครีมคัสตาด ไส้ขนมต่างๆ</button>
            </div>
            <div class="col-md-12" id="content_products">
            
            </div>
        </div>
    </div>
</div>

<script>
$('.btn').click(function(){
    var id = $(this).attr('id');
    var url = $(this).attr('url');
    pagebakery(url);
});

function pagebakery(url){
    $.get("<?=base_url();?>"+url,
        function () {        
        }
    ).done(function(data){
        $('#content_products').html(data);
    });
}
</script>