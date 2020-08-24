<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 no-padding-xs no-padding-sm no-padding-left-md">
  <div class="column-right">
    <div class="headline"><h1>Thông tin thành viên</h1></div>
    <div class="content">
      <div class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-info" >
            <div class="row" style="padding: 10px">
              <div class="col-sm-5"> <b>Họ tên:</b> </div>
              <div class="col-sm-5"><?php echo $user->name ?></div>
            </div>
            <div class="row" style="padding: 10px">
              <div class="col-sm-5"><b> Email: </b></div>
              <div class="col-sm-5"><?php echo $user->email ?></div>
            </div>
            <div class="row" style="padding: 10px">
              <div class="col-sm-5"><b>Số điện thoại:</b> </div>
              <div class="col-sm-5"><?php echo $user->phone ?></div>
            </div>
            <div class="row" style="padding: 10px">
              <div class="col-sm-5"><b> Địa chỉ: </b></div>
              <div class="col-sm-5"><?php echo $user->address ?></div>
            </div>
            <div class="row" style="padding: 10px">
              <div class="col-sm-8"><a href="/doanvat.local/order/history">Lịch sử đặt hàng </a></div>
              <div class="col-sm-3"><a href="/doanvat.local/user/edit">Chỉnh sửa thông tin </a></div>
            </div>
          </div>  
        </div>
    </div>
  </div>
</div>