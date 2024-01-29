$(function() {


    $('body').on('submit', 'form.ajax-form', function(){

        var form = $(this);

        
        $.ajax({
            beforeSend: function(){
                $('.overlay-loading').fadeIn();
            },
            url: 'http://localhost/ProjetoDC/ajax/formularios.php',
            method: 'post',
            dataType: 'json',
            data: form.serialize()
        }).done(function(data){
            $('.overlay-loading').fadeOut();
            if (data.sucesso) {
                $('.sucesso').fadeIn();
                setTimeout(function(){
                    $('.sucesso').fadeOut();
                }, 3000);
            } else if (data.erro) {
               $('.erro').fadeIn();
                setTimeout(function(){
                    $('.erro').fadeOut();
                }, 3000);
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log('AJAX error: ' + textStatus + ' : ' + errorThrown);
        });


        return false;
    })
})