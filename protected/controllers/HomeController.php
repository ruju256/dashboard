<?php

class HomeController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
    {
    	$role = Yii::app()->user->getState('role');
    
    	if( $role  == 'admin'){
        	$arr = array('adminIndex','index');
    	}else if( $role == 'user'){
        	$arr =array('userIndex','index');
        }
        else{
        	$arr = array('');
        }
            
    	return array(                   
            array('allow',
            	'actions'=>$arr,
                'users'=>array('@'),
                'message'=>'You do not have permission to view this page.',
                ),
            array('deny',
                'users'=>array('*'),
                'message'=>'You do not have permission to view this page.',
            ),
        );
    }

	public function actionIndex()
	{
		$role = Yii::app()->user->getState('role');
		if($role == 'admin'){
			$this->redirect(Yii::app()->request->baseUrl.'/admin/home');
		}else if($role == 'user'){
			$this->redirect(Yii::app()->request->baseUrl.'/user/home');
		}else{
			$this->redirect(Yii::app()->homeUrl);
		}		
	}

	public function actionUserIndex()
	{
		$pageData = array('page'=>'home');
		$this->render('user/index', $pageData);
	}

	public function actionAdminIndex()
	{
		$detail_summary = Senders::model()->findAll(array('limit'=>5));

		$pageData = array(
			'page'=>'home',
			'detail_summary'=>$detail_summary
			);
		$this->render('admin/index', $pageData);
	}

	public function actionProfile()
	{
		print_r(Yii::app()->user);return;
		// To be done later
	}
}