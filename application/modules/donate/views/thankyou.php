<!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
    <div class="shortcodes_area section_padding_0 ">
        <div class="breadcumb_area section_padding_50 background-overlay" style="background-image: url(<?= base_url() ?>assets/imgg/bg-img/deals.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb d-inline-block">
                        	
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>

                            <li class="breadcrumb-item"><a href="<?= base_url() ?>contactus">Contact Us</a></li>
                            <li class="breadcrumb-item active">Success</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

    <!-- >>>>>>>>>>>>>>>> Not Found Area Start <<<<<<<<<<<<<<<< -->
    <section class="error_page text-center section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--  Not Found Text Start -->
                    <div class="not-found-text">
                        <h1>Thank You</h1>
                        <?php if(isset($flash)){
							echo $flash;
						}?>
                        <a class="btn" href="<?= base_url() ?>" role="button"><i class="fa fa-home" aria-hidden="true"></i> GO HOME</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- >>>>>>>>>>>>>>>> Not Found Area End <<<<<<<<<<<<<<<< -->	

