<div style="height:60px;background-color:#F8BBD0;">
    <h1><img src="<?=base_url()?>assets/img/logo/peaw.png" height="40px;"/>PEAW Bakery Shop <button class="btn btn-success"><span class="fa fa-shopping-bag"></span> <span class="items"><?=var_dump($_SESSION['bag'])?></span></button></h1>
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
            <?php 
                $this->db->select('*');
                $this->db->from('product_type');
                $query = $this->db->get(); 

                if($query){
                    $data = $query->result();
                }else{
                    $data = null;
                }

            ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($data as $key => $type) { ?>
                <a class="dropdown-item" href="<?=base_url();?>index.php/products/pro/<?=$type->protype_id;?>"><?=$type->name;?></a>
            <?php } ?>
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
            &nbsp;
            <!-- <li class="nav-item"><?php var_dump($_SESSION)?></li> -->
            <?php if (isset($_SESSION['sessed_in'])){ ?>
            <li class="nav-item">ยินดีต้อนรับ :<?=$_SESSION['sessed_in'][0]['u_email'];?></li>
            &nbsp;
            <?php if($_SESSION['sessed_in'][0]['u_type'] == 'a') { ?>
            <li class="nav-item"><a href="<?=base_url();?>index.php/backend" class="nav-link btn btn-outline-success">ระบบจัดการ</a></li>
            &nbsp;
            <?php } ?>
            <li class="nav-item"><a href="<?=base_url();?>index.php/user/logout" class="nav-link btn btn-outline-success">ออกจากระบบ</a></li>
            <?php }else{ ?>
            <li class="nav-item"><a href="<?=base_url();?>index.php/user/from_register" class="nav-link btn btn-outline-success">สมัครสมาชิก</a></li>
            &nbsp;
            <li class="nav-item"><a href="<?=base_url();?>index.php/user/from_login" class="nav-link btn btn-outline-success">เข้าสู่ระบบ</a></li>
            <?php } ?>
        </ul>
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </div>
</nav>
