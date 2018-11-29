<div aria-hidden="true" aria-labelledby="mySmallModalLabel" class="modal fade new_foreign_exchange_value" role="dialog" tabindex="-1" id="forexmodal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">XE - Manager</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo Yii::app()->request->baseUrl; ?>/update-exchange-rate" id="foreign_exchange_rate">
                    <div class="form-group">
                        <label for="">New Exchange Rate</label>
                        <input class="form-control" placeholder="Enter New Rate" type="text" name="ForeignExchange['rate']" id="rate">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                        <button class="btn btn-primary" type="submit" id="save_forex">Save New Rate</button>
                    </div>                   
                </form>
            </div>
            
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/app/forex.js", CClientScript::POS_END); ?>