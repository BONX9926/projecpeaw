<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">สินค้าทั้งหมด</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12" align="center">
                <button class="btn btn-primary" id="bakery-btn1">ขนมปัง</button>
                <button class="btn btn-secondary" id="bakery-btn2">เค้ด</button>
                <button class="btn btn-success" id="bakery-btn3">พายชั้น</button>
                <button class="btn btn-danger" id="bakery-btn4">เดนนิส/ครัวซอง</button>
                <button class="btn btn-warning" id="bakery-btn5">ชอร์ตโด, คุกกี้, พายร่วน และทาร์ต</button>
                <button class="btn btn-info" id="bakery-btn6">ชูเพสต์/เอแคร์</button>
                <button class="btn btn-default" id="bakery-btn7">ครีมคัสตาด ไส้ขนมต่างๆ</button>
            </div>
            <div class="col-md-12" id="content_best_seller">
            
            </div>
        </div>
    </div>
</div>

<script>
$('.btn').click(function(){
    var id = $(this).attr('id');
    // alert(id);
});

function bakery1(){
$.get("<?=base_url();?>index.php/products/pageBakery1", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){
    $('#content_base_seller');
});
}
function bakery2(){
$.get("<?=base_url();?>index.php/products/pageBakery2", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){

});
}
function bakery3(){
$.get("<?=base_url();?>index.php/products/pageBakery3", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){

});
}
function bakery4(){
$.get("<?=base_url();?>index.php/products/pageBakery4", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){

});
}
function bakery5(){
$.get("<?=base_url();?>index.php/products/pageBakery5", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){

});
}
function bakery6(){
$.get("<?=base_url();?>index.php/products/pageBakery6", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){

});
}
function bakery7(){
$.get("<?=base_url();?>index.php/products/pageBakery7", data,
    function (data, textStatus, jqXHR) {        
    }
).done(function(data){

});
}
</script>