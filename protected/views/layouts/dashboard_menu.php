<div class="logo-w">
    <a class="logo" href="index.html">
        <div class="logo-element"></div>
        <div class="logo-label">Kalist Services</div>
    </a>
</div>
<div class="logged-user-w avatar-inline">
    <div class="logged-user-i">
        <div class="avatar-w"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/ui/img/avatar1.jpg"></div>
        <div class="logged-user-info-w">
            <div class="logged-user-name"><?php echo Yii::app()->user->getState('name');?></div>
            <div class="logged-user-role"><?php echo Yii::app()->user->getState('role');?></div>
        </div>
        <div class="logged-user-toggler-arrow">
            <div class="os-icon os-icon-chevron-down"></div>
        </div>
        <div class="logged-user-menu color-style-bright">
            <div class="logged-user-avatar-info">
                <div class="avatar-w"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/ui/img/avatar1.jpg"></div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name"><?php echo Yii::app()->user->getState('name');?></div>
                    <div class="logged-user-role"><?php echo Yii::app()->user->getState('role');?></div>
                </div>
            </div>
            <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
            <ul>                                
                <li>
                    <a  href="<?php echo Yii::app()->request->baseUrl;?>/logout">
                        <i class="os-icon os-icon-signs-11"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<h1 class="menu-page-header">Page Header</h1>
<ul class="main-menu">
    <li class="sub-header"><span>Home</span></li>
    <li class="selected has-sub-menu">
        <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/home">
            <div class="icon-w">
                <div class="os-icon os-icon-layout"></div>
            </div><span>Dashboard</span>
        </a>                        
    </li>
    
    <li class="sub-header"><span>OPTIONS</span></li>
    
    
    <li class=" has-sub-menu">
        <a href="<?php echo Yii::app()->request->baseUrl;?>/send-money">
            <div class="icon-w">
                <div class="os-icon os-icon-edit-32"></div>
            </div>
            <span>New Sender Transaction</span>
        </a>
    </li>
    <li class=" has-sub-menu">
        <a href="<?php echo Yii::app()->request->baseUrl;?>/send-money">
            <div class="icon-w">
                <div class="os-icon os-icon-grid"></div>
            </div>
            <span>Receiver Records</span>
        </a>                        
    </li>
    <li class=" has-sub-menu">
        <a href="#" data-target=".new_foreign_exchange_value" data-toggle="modal">
            <div class="icon-w">
                <div class="os-icon os-icon-fire"></div>
            </div><span>Update Exchange Rate</span>
        </a>             
    </li>                     
</ul>