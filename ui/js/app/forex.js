$("#foreign_exchange_rate").submit(function(event) {
    event.preventDefault();    
    var save = document.getElementById("save_forex");
    var rate = document.getElementById("signupFirstName");    
    var error_text = document.getElementById("signup_error_text");

    var post_data = {
                        rate: $('#rate').val()
                    };

    $('#form_loader').show();
    save.classList.add('disabled');

    var $form = $( this );
    var url = $form.attr( 'action' );

    $.ajax({
        type: "POST",
        url: $form.attr( 'action' ),
        dataType:'json',
        data: { forexRate: post_data },
        success: function (response) {
            if(response.status==true){ 
                save.classList.remove('disabled');
                $('#forexmodal').hide();
                swal("Updated", "New Forex exchange rate Updated!", "success");
                swal("Updated", "Foresign exchange exceeds set range", "Failure").show();
                
            }else{
                signup_button.classList.remove('disabled');
                $('#form_loader').hide();
                
                $('#signup_error_text')[0].innerText = response.error;
                $('#signup_error_alert').show();
            }
        }
    });
});