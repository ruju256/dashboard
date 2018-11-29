$("#signup_form").submit(function(event) {
    event.preventDefault();    
    var signup_button = document.getElementById("signup_button");
    var signup_first_name = document.getElementById("signupFirstName");    
    var signup_email = document.getElementById("signupEmail");
    var signup_password = document.getElementById("signupPassword");
    var error_text = document.getElementById("signup_error_text");

    var post_data = {
                        firstname: $('#signupFirstName').val(),                        
                        email: $('#signupEmail').val(),
                        password: $('#signupPassword').val()
                    };

    $('#form_loader').show();
    signup_button.classList.add('disabled');

    var $form = $( this );
    var url = $form.attr( 'action' );

    $.ajax({
        type: "POST",
        url: $form.attr( 'action' ),
        dataType:'json',
        data: { signupForm: post_data },
        success: function (response) {
            if(response.status==true){ 
                signup_button.classList.remove('disabled');
                $('#form_loader').hide();
                window.location.replace('http://localhost/dashboard/home');
            }else{
                signup_button.classList.remove('disabled');
                $('#form_loader').hide();
                if(response.field=='email'){signup_email.classList.add('is-invalid');}
                $('#signup_error_text')[0].innerText = response.error;
                $('#signup_error_alert').show();
            }
        }
    });
});