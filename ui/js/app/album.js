$("#new_album_form").submit(function(event) {
    event.preventDefault();
    
    var save_button = document.getElementById("album_save_button");
    var title = document.getElementById("albumTitle");
    var description = document.getElementById("albumDescription");
    var error_text = document.getElementById("album_error_text");

    var post_data = {
                        title: $('#albumTitle').val(),
                        description: $('#albumDescription').val()
                    };

    $('#form_loader').show();
    save_button.classList.add('disabled');

    var $form = $( this );
    var url = $form.attr( 'action' );

    $.ajax({
        type: "POST",
        url: $form.attr( 'action' ),
        dataType:'json',
        data: { albumForm: post_data },
        success: function (response) {
            if(response.status==true){ 
                save_button.classList.remove('disabled');
                $('#form_loader').hide();
                $('#albumTitle').val('');
                $('#albumDescription').val('');
                $('#album_success_alert').show();
                setTimeout(function(){
                    $('#album_success_alert').hide();
                    $('#new_album_form_modal').modal('hide');
                    window.location.replace(domain+'admin/album/'+response.album_id+'/view');
                }, 2000);
            }else{
                save_button.classList.remove('disabled');
                $('#form_loader').hide();
                $('#album_error_text')[0].innerText = response.error;
                $('#album_error_alert').show();
            }
        }
    });
});