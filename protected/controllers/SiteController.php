<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$carousels = Carousels::model()->findAllByAttributes(array('is_active'=>1));
		$pageData = array('page'=>'home', 'carousel'=>$carousels);
		$this->render('pages/index', $pageData);
	}

	public function actionAbout(){
		$pageData = array('page'=>'about');
		$this->render('pages/about', $pageData);
	}

	public function actionGallery(){
		$pageData = array('page'=>'gallery');
		$this->render('pages/gallery', $pageData);
	}

	public function actionContact()
	{
		$pageData = array('page'=>'contact');
		$this->render('pages/contact', $pageData);
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionSignupRequest(){
		$error = "Try again.";
		$field = 'all';
		if(isset($_POST['signupForm']) && !empty($_POST['signupForm'])){
			if($this->emailExists($_POST['signupForm']['email'])){
				$error = "That email already exists";
				$field = 'email';
				echo json_encode(array('status'=>false, 'error'=>$error, 'field'=>$field));
				return;
			}

			$user = new User;
			$user->first_name = $_POST['signupForm']['firstname'];			
			$user->email = $_POST['signupForm']['email'];
			$user->password = $_POST['signupForm']['password'];
			$user->role_id = 1;
			if($user->save()){
				echo json_encode(array('status'=>true));
				return;
			}
			
			echo json_encode(array('status'=>false, 'error'=>$user->getErrors(), 'field'=>'all'));
			return;
		}
		echo json_encode(array('status'=>false, 'error'=>$error, 'field'=>$field));
		return;
	}

	public function actionLoginRequest(){
		$error = "Try again.";
		if(isset($_POST['username']) && isset($_POST['password'])){
			$model = new LoginForm;
			$model->username = $_POST['username'];
			$model->password = $_POST['password'];
			if($model->validate() && $model->login()){
				echo json_encode(array('status'=>true));
				return;
			}
			$error = "Invalid username or password.";
		}
		echo json_encode(array('status'=>false, 'error'=>$error));
		return;
	}

	public function actionLogin(){
		$this->render('login');
	}

	public function actionRegister(){
		$this->render('register');
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	private function emailExists($email){
		$users = User::model()->findAllByAttributes(array('email'=>$email));
		if(count($users)>0){
			return true;
		}
		return false;
	}
}