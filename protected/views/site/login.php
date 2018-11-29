<?php $this->pageTitle=Yii::app()->name." | Home"; ?>


<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="index.html"><img alt="" src="img/logo-big.png"></a>
            </div>
            <h4 class="auth-header">Login Form</h4>
            <div id="form_loader" style="display: none;">
				<img class="img-fluid mx-auto d-block" alt="Loading" src="<?php echo Yii::app()->request->baseUrl; ?>/ui/img/loading.gif">
			</div>
            <form action="<?php echo Yii::app()->request->baseUrl; ?>/login-request" method="post" id="login_form">
            	<div class="alert alert-danger" role="alert" id="login_error_alert" style="display: none;">
					<span id="error_text">Invalid username or password</span>
				</div>
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input name="LoginForm[username]" class="form-control" id="loginEmail" placeholder="Enter your email" type="email">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input class="form-control" placeholder="Enter your password" type="password" name="LoginForm[password]" id="loginPassword">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary" id="login_button" type="submit" >Log me in</button>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">Remember Me</label>
                    </div>
                    <div>
                    	<p>If you don't have an account, you can <a href="<?php echo Yii::app()->request->baseUrl ?>/register">Register with us?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/jquery.min.js", CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/app/login.js", CClientScript::POS_END); ?>