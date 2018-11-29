<?php $this->pageTitle=Yii::app()->name." | Register"; ?>
<body>
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w wider">
            <div class="logo-w">
                <a href="index.html"><img alt="" src="img/logo-big.png"></a>
            </div>
            <h4 class="auth-header">Create new account</h4>
            <div id="form_loader" style="display: none;">
                <img class="img-fluid mx-auto d-block" alt="Loading" src="<?php echo Yii::app()->request->baseUrl; ?>/ui/img/loading.gif">
            </div>
            <form action="<?php echo Yii::app()->request->baseUrl; ?>/register-request" method="post" id="signup_form">
                <div class="alert alert-danger" role="alert" id="signup_error_alert" style="display: none;">
                    <span id="signup_error_text">Invalid username or password</span>
                </div>
                <div class="form-group">
                    <label for="signupEmail"> Email address</label>
                    <input type="email" name="SignUpForm[email]" class="form-control" id="signupEmail" placeholder="Email" required>
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="signupFirstName">Name</label>
                            <input type="text" name="SignUpForm[first_name]" class="form-control" id="signupFirstName" placeholder="First Name" required>
                            <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="signupPassword">Password</label>
                            <input type="password" name="SignUpForm[password]" class="form-control" id="signupPassword" placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="buttons-w">
                    <button  id="signup_button" type="submit" class="btn btn-primary">Register Now</button>
                        <p>Already have an account, you can <a href="<?php echo Yii::app()->request->baseUrl ?>/login">Login here!!</a></p>    
                </div>
            </form>
        </div>
    </div>
</body>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/jquery.min.js", CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/ui/js/app/signup.js", CClientScript::POS_END); ?>