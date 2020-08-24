(function($){
    $(document).ready(function(){
        //xoa nhieu du lieu
        $('#delete_all').click(function(){
            if(!confirm('Bạn chắc chắn muốn xóa tất cả dữ liệu ?')){
                return false;
            }

            var ids = new Array();
            $('[id="id[]"]:checked').each(function(){
                ids.push($(this).val());
            });

            if (!ids.length) return false;

            //link xoa du lieu
            var url  = $(this).attr('url');
            
            //ajax để xóa
            $.ajax({
                url: url,
                type: 'POST',
                data : {'ids': ids},
                success: function(){
                    $(ids).each(function(id, val){
                        $('tr.row_'+val).fadeOut();
                    });
                }
            })
            return false;
        });

    });
})(jQuery);