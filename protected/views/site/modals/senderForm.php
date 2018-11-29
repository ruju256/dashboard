<div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade new_sender_information" role="dialog" tabindex="-1" id="senderModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Sender Information</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo Yii::app()->request->baseUrl;?>/add-sender" id="new_sender">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="senderName">Sender's Name</label>
                                <input class="form-control" name="Senders['sender_name']" placeholder="e.g John Smith" type="text" id="senderName">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="senderNumber">Sender's Phone Number</label>
                                <input class="form-control"  name="Senders['sender_phone_no']" placeholder="e.g +256756192842 / +1(805) 342122" type="text" id="senderNumber">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="amount">Amount Being Sent</label>
                                <input class="form-control" name="Senders['sender_phone_no']"  placeholder="e.g 1000000" type="text" id="amount">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="receiverName">Receiver's Name</label>
                                <input class="form-control" name="Senders['receiver_name']" placeholder="e.g Jane Smith" type="text" id="receiverName">
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="receiverNumber">Receiver's Phone Number</label>
                                <input class="form-control"  name="Senders['receiver_phone_no']" placeholder="e.g +256756192842 / +1(805) 342122" type="text" id="receiverNumber">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="transactionCharges">Transaction Charges</label>
                                <input class="form-control" name="Senders['charges']" placeholder="e.g 5000" type="text" id="transactionCharges" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="senderCountry">Sender's Country</label>
                                <input class="form-control" name="Senders['sender_country']" placeholder="e.g China" type="text" id="senderCountry">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="receiverCountry">Receiver's Country</label>
                                <input class="form-control" name="Senders['receiver_country']" placeholder="e.g Uganda" type="text" id="receiverCountry">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                        <button class="btn btn-primary" type="Submit" id="save_sender"> Save changes</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/app/senders.js", CClientScript::POS_END); ?>