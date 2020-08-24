<div class='rating-widget'>
  <!-- Rating Stars Box -->
  <div class='rating-stars text-left'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
    (<?php echo floatval($sumRate / $totalRate); ?>/5 start - all rate <?php echo $totalRate ?>)
  </div>
</div>


<script>
  $(document).ready(function(){

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $.ajax({
      url: '<?php echo base_url('product/rating'); ?>',
      type: 'POST',
      dataType: 'json',
      data: { product: '<?php echo $product->id ?>', star: ratingValue},
    })
    .done(function() {
      alert('Cảm ơn bạn đã đánh giá');
    });
    
    
  });
  
  
});
</script>