<div style="height:60px;background-color:#F8BBD0;">
    <h1 align="center"><img src="<?=base_url()?>assets/img/logo/peaw.png" height="40px;"/>PEAW Bekery SHOP </h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>"> หน้าหลัก<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>index.php/package"> แพคเก็ตของเรา<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            สินค้าของเรา
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">ขนมปัง</a>
            <a class="dropdown-item" href="#">เค้ก</a>
            <a class="dropdown-item" href="#">พายชั้น</a>
            <a class="dropdown-item" href="#">เดนนิส/ครัวซอง</a>
            <a class="dropdown-item" href="#">ชอร์ตโด, คุกกี้, พายร่วน และทาร์ต</a>
            <a class="dropdown-item" href="#">ชูเพสต์ / เอแคร์</a>
            <a class="dropdown-item" href="#">ครีมคัสตาด ไส้ขนมต่างๆ</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div> -->
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>index.php/about">เกี่ยวกับเรา</a>
        </li>
        </ul>
    </div>
    <div class="form-inline mt-2 mt-md-0">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="<?=base_url();?>index.php/user/register" class="nav-link btn btn-outline-success">สมัครสมาชิก</a></li>
            &nbsp;
            <li class="nav-item"><a href="<?=base_url();?>index.php/user/login" class="nav-link btn btn-outline-success">เข้าสู่ระบบ</a></li>
        </ul>
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </div>
</nav>
