<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 no-padding-xs no-padding-sm no-padding-left-md">
  <div class="column-right">
    <div class="headline"><h1>Lịch sử đơn hàng</h1></div>
    <div class="content">
    	<?php if($transaction): ?>
        <table class="table table-condensed">
		    <thead>
		      <tr>
		        <th>Mã đơn hàng</th>
		        <th>Họ tên</th>
		        <th>Tiền hàng</th>
		        <th>Tổng tiền thanh toán</th>
		        <th>Trạng thái</th>
		        <th>Hành động</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($transaction as $transaction):?>
		    	$tienhang = explode('.', $transaction->amount);
	    		$tienhang = $tienhang[0];
	    		$tongtien = $tienhang;
		      <tr>
		        <td><?php echo $transaction->id ?></td>
		        <td><?php echo $transaction->user_name ?></td>
		        <td><?php echo $tienhang ?>.000 vnđ</td>
		        <td><?php echo $tongtien ?>.000 vnđ</td>
		        <td>
		        	<?php if($transaction->status == 0) echo 'Chờ xử lý'; if($transaction->status == 1) echo 'Đã giao hàng'; if($transaction->status == 2) echo 'Đã hủy';  ?>
		        </td>
		        <td><a href="/doanvat.local/order/view/<?php echo $transaction->id ?>">Xem chi tiết</td>
		      </tr>
		      <?php endforeach ?>
		    </tbody>
		</table>
		<?php else: ?>
		<h3>Bạn chưa mua hàng lần nào, vui lòng chọn sản phẩm và đặt hàng</h3>
	<?php endif ?>
    </div>
</div>
</div>