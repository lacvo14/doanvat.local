<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 no-padding-xs no-padding-sm no-padding-left-md">
  <div class="column-right">
    <div class="headline"><h1>Chi tiết đơn hàng</h1></div>
    <div class="content">
        <table class="table table-condensed">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Sản phẩm</th>
		        <th>Số tiền</th>
		        <th>Số lượng</th>
		        <th>Thời gian</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($orders as $order):?>
		    		<?php //if($orders->user_id = $user_info->id) redirect(base_url()) ?>
		      <tr>
		        <td><?php echo $order->product_id ?></td>
		        <td><a href="<?php echo base_url('product/view/'.$order->product_id) ?>" target="_blank"><?php echo $order->product_name ?></a></td>
		        <td><?php echo $order->amount ?></td>
		        <td><?php echo $order->qty ?></td>
		        <td><?php echo mdate('%d-%m-%Y %h:%i',$order->created) ?></td>
		      </tr>
		      <?php endforeach ?>
		    </tbody>
		</table>
    </div>
</div>
</div>