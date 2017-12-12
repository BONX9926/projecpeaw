<div id="content">
    <div id="carouselExampleIndicators" class="carousel slide form-group" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?=base_url();?>assets/img/background/bekery-bg1.jpg" alt="First slide" class="img-responsive" height="500px;">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h3>Background-bg1</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div> -->
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?=base_url();?>assets/img/background/bekery-bg2.jpg" alt="Second slide" class="img-responsive" height="500px;">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?=base_url();?>assets/img/background/bekery-bg3.jpg" alt="Third slide" class="img-responsive" height="500px;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
		$this->db->select('*');
        $this->db->from('products');
        $this->db->where('best_seller', '1');
        $query = $this->db->get();

        if ($query) {
            $rows = $query->result();
        }else{
            $rows = null;
		}
    ?>
    <div class="container">
        <div class="row text-center">
            <?php foreach ($rows as $key => $pro) { ?>
                <div class="col-md-4">
                    <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <p><h2><?=$pro->pro_name;?></h2> <span class="badge badge-danger">สินค้าขายดี</span></p>
                    <p><?=$pro->pro_detail;?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>