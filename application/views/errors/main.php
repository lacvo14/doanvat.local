<html>
    <head>
        <?php $this->load->view('admin/headadmin'); ?>
    </head>
    <body>
        <?php $this->load->view('admin/header'); ?>

        <?php $this->load->view('admin/sidebar'); ?>
        <div id="content">
            <?php $this->load->view($temp, $this->data) ?>
        </div>


        <?php $this->load->view('admin/footer'); ?>
    </body>
</html>

