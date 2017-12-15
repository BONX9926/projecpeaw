  <style>

.sidebar1 {
    background: #F17153;
    /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Firefox 3.6 to 15 */
    background: linear-gradient(#F17153, #F58D63, #f1ab53);
    /* Standard syntax */
    padding: 0px;
    min-height: 100%;
}
.logo {
    max-height: 130px;
}
.logo>img {
    margin-top: 30px;
    padding: 3px;
    border: 3px solid white;
    border-radius: 100%;
}
.list {
    color: #fff;
    list-style: none;
    padding-left: 0px;
}
.list::first-line {
    color: rgba(255, 255, 255, 0.5);
}
.list> li, h5 {
    padding: 5px 0px 5px 40px;
}
.list>li:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-left: 5px solid white;
    color: #000;
    font-weight: bolder;
    padding-left: 35px;
}.main-content{
/* text-align:center; */
}
.active{
    background-color: rgba(255, 255, 255, 0.2);
    border-left: 5px solid white;
    color: #000;
}



  </style>
<!-- <div id="wrapper" class="toggled">

    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    ระบบสมาชิก
                </a>
            </li>
            <li class="ac active" id="his">
                <a href="#">ประวัติการสั่งซื้อ</a>
            </li>
            <li class="ac" id="pay">
                <a href="#">แจ้งชำระเงิน</a>
            </li>
        </ul>
    </div>

    <div id="page-content-wrapper">
        <div class="container-fluid" id="content_databuy">
         
        </div>
    </div>
 -->

 <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <div class="left-navigation">
                    <ul class="list">
                        <h5 ><strong style="color:#000">ระบบสมาชิก</strong></h5>
                        <li class="ac active" id="his">ประวัติการสั่งซื้อ</li>
                        <li class="ac" id="pay">แจ้งชำระเงิน</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content" id="content_databuy">

            </div>
           
        </div>
    </div>

</div>


<script>
$('.ac').click(function(){
    $('.ac').removeClass('active');
    $(this).addClass('active');
    var id = $(this).attr('id');
    get_page(id);
});

get_page('his');

function get_page(id){
  if(id == 'his'){
    history_buy();
  }else if(id == 'pay'){
    payment();
  }
}

function payment(){
  // alert("pagePayment");
  $.get("<?=base_url();?>index.php/user/pagePayment",() => {
  }).done((data) => {
    $('#content_databuy').html(data);
  });
}

function history_buy(){
  // alert("pageHistory");
  $.get("<?=base_url();?>index.php/user/pageHistoryBuy",() => {
  }).done((data) => {
    $('#content_databuy').html(data);    
  });
}
</script>