<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">

	
		<!-- CSS -->
		<link href="http://fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
	    <link href="<?php echo Yii::app()->request->baseUrl; ?>/ui/css/maince5a.css?version=4.4.1" rel="stylesheet">

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body>

		<?php echo $content; ?>
		<?php $this->renderPartial('//site/modals/senderForm');?>
		<?php $this->renderPartial('//site/modals/exchangeValue');?>

		<!-- <div id="tracenode_copyright">
			Copyright &copy; <?php echo date('Y'); ?> by Tracenode.<br/>
			All Rights Reserved.<br/>
		</div> -->

		
		<!-- Js -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/ui/js/jquery.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/popper.js/dist/umd/popper.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/moment/moment.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/chart.js/dist/Chart.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ckeditor/ckeditor.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap-validator/dist/validator.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/dropzone/dist/dropzone.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/editable-table/mindmup-editabletable.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/tether/dist/js/tether.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/slick-carousel/slick/slick.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/util.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/alert.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/button.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/carousel.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/collapse.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/dropdown.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/modal.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/tab.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/tooltip.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/dist/popover.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ui/js/demo_customizerce5a.js?version=4.4.1"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ui/js/knockout.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ui/js/sweetalert.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ui/js/maince5a.js?version=4.4.1"></script>
	</body>
</html>