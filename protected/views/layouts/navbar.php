<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($page=='home'){echo 'active';} ?>">
                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page=='about'){echo 'active';} ?>">
                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/about">About Us</a>
            </li>
            <li class="nav-item <?php if($page=='gallery'){echo 'active';} ?>">
                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/gallery">Gallery</a>
            </li>
            <li class="nav-item <?php if($page=='contact'){echo 'active';} ?>">
                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/contact-us">Contact Us</a>
            </li>
            <?php if(Yii::app()->user->isGuest): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#login_form_modal">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#signup_form_modal">Sign Up</a>
                </li>
            <?php endif;?>
        </ul>
        <ul class="navbar-nav">
            <?php if(!Yii::app()->user->isGuest): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo Yii::app()->user->getState('name');?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/profile">Profile</a>
                        <a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/logout">Logout</a>
                    </div>
                </li>
            <?php endif;?>
        </ul>
    </div>
</nav>