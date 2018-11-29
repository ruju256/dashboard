$("#new_sender").submit(function(event) {
    event.preventDefault();    
    var save = document.getElementById("save_sender");
    var sender_name = document.getElementById("senderName");    
    var sender_no = document.getElementById("senderNumber");
    var amount = document.getElementById("amount");
    var receiver_name = document.getElementById("receiverName");
    var receiver_no = document.getElementById("receiverNumber");
    var charges = document.getElementById("transactionCharges");
    var sender_country =  document.getElementById("senderCountry");
    var receiver_country = document.getElementById("receiverCountry");
    var error_text = document.getElementById("signup_error_text");

    var post_data = {
                        sender: $('#senderName').val(),                        
                        senderNo: $('#senderNumber').val(),
                        amount: $('#amount').val(),
                        receiver: $('#receiverName').val(),
                        receiverNo:$('#receiverNumber').val(),
                        charges: $('#transactionCharges').val(),
                        senderCountry:$('#senderCountry').val(),
                        receiverCountry: $('#receiverCountry').val()
                    };

    $('#form_loader').show();
    save.classList.add('disabled');

    var $form = $( this );
    var url = $form.attr( 'action' );

    $.ajax({
        type: "POST",
        url: $form.attr( 'action' ),
        dataType:'json',
        data: { sender: post_data },
        success: function (response) {
            if(response.status==true){ 
                save.classList.remove('disabled');
                $('#senderModal').hide();
                window.location.replace('http://localhost/dashboard/home');
            }else{
                save.classList.remove('disabled');
                $('#form_loader').hide();
                if(response.field=='email'){signup_email.classList.add('is-invalid');}
                $('#signup_error_text')[0].innerText = response.error;
                $('#signup_error_alert').show();
            }
        }
    });
});