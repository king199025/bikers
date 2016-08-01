jQuery(document).ready(function($){
    $('#saveInfo').on('click', function(e){


            $('#input-5').fileinput('upload');
        //return false;

        });


    $(document).on('click','#more-news', function(){
        var page = parseInt($(this).attr('data-count'),10);
        var csrf = $(this).attr('data-csrf');
        // $(this).remove();
        $(this).attr('data-count', page + 1);
        $.ajax({
            type: 'POST',
            url: "/news/default/ajax_get_news/",
            data: 'page=' + page + '&_csrf=' + csrf,
            success: function (data) {

                $( ".news__box" ).append( data  );
            }
        });
        return false;
    });

});
