$(function() {


    $('body').on('submit', 'form', function(){

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
                // Adicione algum feedback para o usuário aqui
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log('AJAX error: ' + textStatus + ' : ' + errorThrown);
        });


        return false;
    })
})