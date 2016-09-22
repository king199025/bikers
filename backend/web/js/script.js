$(document).ready(function(){
    $('#reservation').datepicker({
        format: 'yyyy-mm-dd',
        language: 'ru'
    });

    $(".timepicker").timepicker({
        showInputs: false,
        maxHours: 24,
        showMeridian: false
    });


    $(document).on('change','.itemImg',function(){
        var path = $('.itemImg').val();
        $('.media__upload_img').html('<img src="' +path + '" width="100px"/> <br>');
    });

    $(document).on('change', '.selectLang', function(){
        var langId = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/secure/news/news/get_categ",
            data: 'langId=' + langId,
            success: function (data) {
                $(".selectCat").html(data);
            }
        });
    });

    $(document).on('click', '.select_status', function(){
        var eventId = $(this).data('id'),
            status = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/secure/events/events/edit_status",
            data: 'eventId=' + eventId + '&status=' + status,
            success: function (data) {

            }
        });

    });

});