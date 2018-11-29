<div class="modal fade" tabindex="-1" role="dialog" id="new_album_form_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div id="form_loader" style="display: none;">
				<img class="img-fluid mx-auto d-block" alt="Loading" src="<?php echo Yii::app()->request->baseUrl; ?>/ui/img/loading.gif">
			</div>
			<div id="form_content">
				<div class="modal-header">
					<h5 class="modal-title">Create Album</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/create-album-request" method="post" id="new_album_form">
					<div class="modal-body">
						<div id="album_success_alert" class="alert alert-success" role="alert"  style="display: none;">
						 	The album has been saved!!!
						</div>
						<div class="alert alert-danger" role="alert" id="album_error_alert" style="display: none;">
							<span id="album_error_text">Invalid album name</span>
						</div>
						<div class="form-group row">
							<label for="albumTitle" class="col-sm-3 col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" name="AlbumForm[title]" class="form-control" id="albumTitle" placeholder="Title">
							</div>
						</div>
						<div class="form-group row">
							<label for="albumDescription" class="col-sm-3 col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea name="AlbumForm[description]" class="form-control" id="albumDescription" placeholder="Description"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="album_save_button" type="submit" class="btn btn-primary">Create</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/app/album.js", CClientScript::POS_END); ?>