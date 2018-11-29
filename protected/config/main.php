<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Website',

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'dashboard',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	'components'=>array(

		'user'=>array(
			'allowAutoLogin'=>true,
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'/'=>'home/adminIndex',
				'/about'=>'site/about',
				'/contact-us'=>'site/contact',
				'/gallery'=>'site/gallery',
				'/login'=>'site/login',
				'/register'=>'site/register',
				'/login-request'=>'site/loginRequest',
				'/register-request'=>'site/signupRequest',
				'/carousel-item-request'=>'admin/carouselItemRequest',
				'/logout'=>'site/logout',
				'/home'=>'home/index',
				'/user/home'=>'home/userIndex',
				'/admin/home'=>'home/adminIndex',
				'/admin/create-album-request'=>'admin/createAlbumRequest',
				'/admin/album/<id:\d+>/view'=>'admin/viewAlbum',
				'/profile'=>'home/profile',
				'/add-sender'=>'admin/addSenderData',
				'/update-exchange-rate'=>'admin/updateForeignExchangeRate',
				'/send-money'=>'admin/sendMoney'
			),
		),
		
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
