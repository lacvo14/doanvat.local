<!-- Breadcrumb -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-list">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li>contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End-->

<!--Service area-->
<div class="service-area"> 
    <div class="container">
        <div class="row">
            <!--Service list-->
            <div class="service-list" style="text-align: center;"> 
                <h1><a href="<?php echo base_url() ?>"><?php echo $name->content ?></a></h1>
                <!--single service  -->
                <div class="col-md-4 col-sm-4">
                    <div class="single-service">
                        <div class="service-icon"> 
                            <i class="pe-7s-phone"></i>
                        </div>
                        <div class="service-info">
                            <h4>Hotline</h4>
                            <p><?php echo $phone->content ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="pe-7s-map-marker"></i>
                        </div>
                        <div class="service-info">
                            <h4>Address</h4>
                            <p><?php echo $address->content ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="pe-7s-mail"></i>
                        </div>
                        <div class="service-info"> 
                            <h4>E-MAIL</h4>
                            <p><?php echo $email->content ?></p>
                        </div>
                    </div>
                </div>
                <!--/ single service  -->
            </div> 
            <!--/ Service list-->
        </div>
        <!--/ Row-->
    </div>
    <!--/ Container-->
</div> 
<!--/ Service area-->
<!-- Contact Form -->
<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-title">
                    <h4 class="form-title-text">LEAVE A MESSAGE</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="contacts">
                <form action="#" method="get">
                    <div class="col-md-5">
                        <div class="form-left-side">
                            <div class="s-data">
                                <input type="text" name="demo" id="demo1" class="required" placeholder="Your name"/>
                            </div>
                            <div class="s-data">
                                <input type="text" name="demo" id="demo2" class="required" placeholder="Your Email"/>
                            </div>
                            <div class="s-data">
                                <input type="text" name="demo" id="demo3" class="required" placeholder="Your Phone"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-right-side">
                            <div class="s-data">
                                <textarea name="demo" placeholder="Your Name"></textarea>
                            </div>
                            <div class="s-data">
                                <input type="submit" value="send message"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Contact Form -->
<!-- Contact Map area-->
<div class="contact-map-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1053049390134!2d106.70415631422654!3d10.803246192303323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b90de0190f%3A0x7b8be3f539221109!2zQuG6oWNoIMSQ4bqxbmcsIFBoxrDhu51uZyAyNCwgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1477888225752" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Contact Map area end-->