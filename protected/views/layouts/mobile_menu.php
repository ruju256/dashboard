<!-----START - Mobile Menu-------------------->
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="index.html"><img src=""><span>Marias Cargo</span></a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="avatar-w">
                <img alt="" src="">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name"><?php echo Yii::app()->user->getState('name');?></div>
                <div class="logged-user-role"><?php echo Yii::app()->user->getState('role');?></div>
            </div>
        </div>
<!--------------------START - Mobile Menu List-------------------->
        <ul class="main-menu">
            <li class="has-sub-menu">
                <a href="index.html">
                    <div class="icon-w">
                        <div class="os-icon os-icon-layout"></div>
                    </div><span>Dashboard</span></a>
            </li>              
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-edit-32"></div>
                    </div><span>New Transaction</span></a>                        
            </li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-grid"></div>
                    </div><span>Tables</span></a>
                <ul class="sub-menu">
                    <li><a href="tables_regular.html">Regular Tables</a></li>
                    <li><a href="tables_datatables.html">Data Tables</a></li>
                    <li><a href="tables_editable.html">Editable Tables</a></li>
                </ul>
            </li>
            
        </ul>
<!--------------------END - Mobile Menu List-------------------->
    </div>
</div>
<!--------------------END - Mobile Menu-------------------->