$("#login_form").submit(function(event) {
    event.preventDefault();
    
    var login_button = document.getElementById("login_button");
    var login_email = document.getElementById("loginEmail");
    var login_password = document.getElementById("loginPassword");
    var error_text = document.getElementById("error_text");

    $('#form_loader').show();
    login_button.classList.add('disabled');

    var $form = $( this );
    var url = $form.attr( 'action' );

    $.ajax({
        type: "POST",
        url: $form.attr( 'action' ),
        dataType:'json',
        data: { username: $('#loginEmail').val(), password: $('#loginPassword').val() },
        success: function (response) {
            if(response.status==true){ 
                login_button.classList.remove('disabled');
                $('#form_loader').hide();
                window.location.replace(domain+'home');
            }else{
                login_button.classList.remove('disabled');
                $('#form_loader').hide();
                login_email.classList.add('is-invalid');
                login_password.classList.add('is-invalid');
                $('#error_text')[0].innerText = response.error;
                $('#login_error_alert').show();
            }
        }
    });
});