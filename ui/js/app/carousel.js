$("#new_carousel_form").submit(function(event) {
    event.preventDefault();
    
    var save_button = document.getElementById("save_button");
    var title = document.getElementById("carouselTitle");
    var description = document.getElementById("carouselDescription");
    var image = document.getElementById("carouselImage");
    var error_text = document.getElementById("carousel_error_text");

    var post_data = {
                        title: $('#carouselTitle').val(),
                        description: $('#carouselDescription').val(),
                        img: $('#carouselImage').val()
                    };

    $('#form_loader').show();
    save_button.classList.add('disabled');

    var $form = $( this );
    var url = $form.attr( 'action' );

    $.ajax({
        type: "POST",
        url: $form.attr( 'action' ),
        dataType:'json',
        data: { carouselForm: post_data },
        success: function (response) {
            if(response.status==true){ 
                save_button.classList.remove('disabled');
                $('#form_loader').hide();
                $('#carouselTitle').val('');
                $('#carouselDescription').val('');
                $('#carouselImage').val('');
                $('#carousel_success_alert').show();
                setTimeout(function(){
                    $('#carousel_success_alert').hide();
                    $('#new_carousel_form_modal').modal('hide');
                }, 2000);
            }else{
                save_button.classList.remove('disabled');
                $('#form_loader').hide();
                $('#carousel_error_text')[0].innerText = response.error;
                $('#carousel_error_alert').show();
            }
        }
    });
});