    <link rel="stylesheet" href="<?=base_url();?>assets/backend/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/css/fontastic.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Poppins -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"> -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/css/custom.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/css/simply-toast.min.css">
    <!-- Favicon-->
    <!-- <link rel="shortcut icon" href="favicon.png"> -->
    <style>
        @font-face {
            font-family: 'Itim';
            font-style: normal;
            font-weight: 400;
            src: local('Itim'), local('Itim-Regular'), url("<?=base_url();?>assets/fonts/Itim/K0fGzmj4WhCGfRyqF-GWtw.woff2") format('woff2');
            unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Itim';
            font-style: normal;
            font-weight: 400;
            src: local('Itim'), local('Itim-Regular'), url("<?=base_url();?>assets/fonts/Itim/1qW4J4UyzYGwACm7jNIVfA.woff2") format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Itim';
            font-style: normal;
            font-weight: 400;
            src: local('Itim'), local('Itim-Regular'), url("<?=base_url();?>assets/fonts/Itim/cuu6XUTU27h0qA5IMLw1Mg.woff2") format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Itim';
            font-style: normal;
            font-weight: 400;
            src: local('Itim'), local('Itim-Regular'), url("<?=base_url();?>assets/fonts/Itim/5IelbqBx4_S0xbIFnyjCdg.woff2") format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }
        body {
            font-family: 'Itim', cursive;
            font-size: 18px;
        }
        .active{ 
          /* border-left: 4px solid #3b25e6; */

        }

        nav.side-navbar ul li.active a {
            /* background: #796AEE; */
            /* color: #ffffff; */
        }
    </style>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">

          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big"><span>Peaw </span><strong>Bakery</strong></div>
                  <div class="brand-text brand-small"><strong>PB</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="<?=base_url();?>index.php/user/logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <!-- <div class="avatar"><img src="<?=base_url();?>asstes/backend/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
            <div class="title">
            <?php if (isset($_SESSION['sessed_in'])){ ?>
              <h1 class="h4"><?=$_SESSION['sessed_in'][0]['u_email'];?></h1>
              <p><?= ($_SESSION['sessed_in'][0]['u_type'] == 'a') ? 'Admin' : ''; ?></p>
            <?php } ?>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="ac active" id="users"> <a href="#"><i class="icon-user"></i>สมาชิก</a></li>
            <li class="ac"> <a href="#"><i class="icon-home"></i>รายการสั่งซื้อ</a></li>
            <!-- <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Dropdown </a>
              <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li> -->
            <li class="ac" id="best_seller"> <a href="#"> <i class="icon-grid"></i>สินค้าขายดี </a></li>
            <li class="ac" id="products_all"> <a href="#"> <i class="fa fa-bar-chart"></i>สินค้าทั้งหมด</i> </a></li>
            <li class="ac"> <a href="#"> <i class="icon-padnote"></i>Forms </a></li>
            <li class="ac"> <a href="#"> <i class="icon-interface-windows"></i>Login Page</a></li>
          </ul>
          <!-- <span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
          </ul> -->
        </nav>
        <div class="content-inner" id="content">
              
        </div>
      </div>
    </div>
<script src="<?=base_url();?>assets/js/jquery-3.2.1.js"></script>
<script src="<?=base_url();?>assets/backend/vendor/popper.js/umd/popper.min.js"> </script>
<script src="<?=base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/backend/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?=base_url();?>assets/backend/vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- <script src="<?=base_url();?>assets/backend/js/Chart.min.js"></script> -->
<!-- <script src="<?=base_url();?>assets/backend/js/charts-home.js"></script> -->
<script src="<?=base_url();?>assets/backend/js/front.js"></script>
<script src="<?=base_url();?>assets/backend/js/simply-toast.min.js"></script>
<script>

$('.ac').click(function(){
  $('.ac').removeClass('active');
  $(this).addClass('active');
  var id = $(this).attr('id');
  getpage(id);
});

function getpage(id){
  if (id == 'users') {
    member();
  }else if (id == 'best_seller'){
    // best_seller();
  }else if (id == 'products_all'){
    products_all();
  }
}

function member(){
  $.get("<?=base_url();?>index.php/user/get_user",
    function () { 
    }
  ).done(function(data){
    $('#content').html('<h1>Loading...</h1>');
    $('#content').html(data);
    // $('#users').click();
  });
}

member();

function products_all(){
  $.get("<?=base_url();?>index.php/products",
    function () { 
    }
  ).done(function(data){
    $('#content').html('<h1>Loading...</h1>');
    $('#content').html(data);
  });
}
</script>
