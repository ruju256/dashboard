<div class="modal fade" tabindex="-1" role="dialog" id="new_carousel_form_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div id="form_loader" style="display: none;">
				<img class="img-fluid mx-auto d-block" alt="Loading" src="<?php echo Yii::app()->request->baseUrl; ?>/ui/img/loading.gif">
			</div>
			<div id="form_content">
				<div class="modal-header">
					<h5 class="modal-title">Add Carousel</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form" action="<?php echo Yii::app()->request->baseUrl; ?>/carousel-item-request" method="post" id="new_carousel_form">
					<div class="modal-body">
						<div id="carousel_success_alert" class="alert alert-success" role="alert"  style="display: none;">
						 	The carousel has been saved!!!
						</div>
						<div class="alert alert-danger" role="alert" id="carousel_error_alert" style="display: none;">
							<span id="carousel_error_text">Invalid image size</span>
						</div>
						<div class="form-group row">
							<label for="carouselTitle" class="col-sm-3 col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" name="CarouselForm[title]" class="form-control" id="carouselTitle" placeholder="Title">
							</div>
						</div>
						<div class="form-group row">
							<label for="carouselDescription" class="col-sm-3 col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea name="CarouselForm[description]" class="form-control" id="carouselDescription" placeholder="Description"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="carouselImage" class="col-sm-3 col-form-label">Image</label>
							<div class="col-sm-9">
								<input type="text" name="CarouselForm[img]" class="form-control" id="carouselImage" placeholder="Image">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="save_button" type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/app/carousel.js", CClientScript::POS_END); ?>