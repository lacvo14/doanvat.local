<html lang="en">
    <head>
        <?php $this->load->view('site/head'); ?>
    </head>
    <body>
        <div class="header-area">
            <?php $this->load->view('site/nav'); ?>
        </div>

        <?php if ($this->uri->rsegment(1) == 'contact' || $this->uri->rsegment(1) == 'cart' || $this->uri->rsegment(2) == 'checkout' || $this->uri->rsegment(2) == 'done') : ?>
            <?php $this->load->view($temp, $this->data); ?>
        <?php else : ?>
            <div class="slider-area">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view($temp, $this->data); ?>
                        <?php $this->load->view('site/left', $this->data); ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <?php $this->load->view('site/footer'); ?>
    </body>
</html>