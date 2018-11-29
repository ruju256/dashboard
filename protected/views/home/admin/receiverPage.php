<body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <div class="layout-w">
        <?php $this->renderPartial('//layouts/mobile_menu', array('page'=>$page));?>

<!--------------------
START - Main Menu
-------------------->
            <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <div class="logo-w">
                    <a class="logo" href="index.html">
                        <div class="logo-element"></div>
                        <div class="logo-label">Marias Cargo</div>
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
                                <li><a  href="<?php echo Yii::app()->request->baseUrl;?>/logout"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
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
                            </div><span>Dashboard</span></a>                        
                    </li>
                    
                    <li class="sub-header"><span>OPTIONS</span></li>
                    
                    
                    <li class=" has-sub-menu">
                        <a href="#" data-target=".new_sender_information" data-toggle="modal">
                            <div class="icon-w">
                                <div class="os-icon os-icon-edit-32"></div>
                            </div>
                            <span>New Sender Transaction</span>
                        </a>
                    </li>
                    <li class=" has-sub-menu">
                        <a href="#">
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
                            </div><span>Update Exchange Rate</span></a>             
                    </li>                     
                </ul>
            </div>
            <!--------------------
END - Main Menu
-------------------->
            <div class="content-w">
                <!--------------------START - Top Bar-------------------->
                <div class="top-bar color-scheme-transparent">
                    <!--------------------START - Top Menu Controls-------------------->
                    <div class="top-menu-controls">
                       <!--------------------START - Settings Link in secondary top menu-------------------->
                        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-ui-46"></i>
                            <div class="os-dropdown">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-ui-46"></i>
                                </div>
                                <ul>                                    
                                    <li><a href="<?php echo Yii::app()->request->baseUrl;?>/logout"><i class="os-icon os-icon-ui-15"></i><span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--------------------END - Settings Link in secondary top menu-------------------->

                    </div>
                    <!--------------------END - Top Menu Controls-------------------->
                </div><!--------------------END - Top Bar-------------------->                
                <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <form method="POST" action="<?php echo Yii::app()->request->baseUrl;?>/add-sender" id="new_sender">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="senderName">Sender's Name</label>
                                                        <input class="form-control" name="Senders['sender_name']" placeholder="e.g John Smith" type="text" id="senderName" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="senderNumber">Sender's Phone Number</label>
                                                        <input class="form-control"  name="Senders['sender_phone_no']" placeholder="e.g +256756192842 / +1(805) 342122" type="text" id="senderNumber" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="amount">Amount Being Sent</label>
                                                        <input class="form-control" name="Senders['sender_phone_no']"  placeholder="e.g 1000000" type="text" id="amount" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="receiverName">Receiver's Name</label>
                                                        <input class="form-control" name="Senders['receiver_name']" placeholder="e.g Jane Smith" type="text" id="receiverName" required>
                                                    </div>
                                                </div>
                                            </div>                    
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="receiverNumber">Receiver's Phone Number</label>
                                                        <input class="form-control"  name="Senders['receiver_phone_no']" placeholder="e.g +256756192842 / +1(805) 342122" type="text" id="receiverNumber" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="transactionCharges">Transaction Charges</label>
                                                        <input class="form-control" name="Senders['charges']" placeholder="e.g 5000" type="text" id="transactionCharges" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="senderCountry">Sender's Country</label>
                                                        <select class="form-control" name="Senders['sender_country']" type="text" id="senderCountry" required>
                                                            <option value="">Select Country</option>
                                                            <?php foreach ($countries as $country): ?>
                                                            <option value="<?php echo $country['country']; ?>"><?php echo $country['country']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                        <!-- <input class="form-control" name="Senders['sender_country']" placeholder="e.g China" type="text" id="senderCountry" required> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="receiverCountry">Receiver's Country</label>
                                                        <select class="form-control" name="Senders['receiver_country']" type="text" id="receiverCountry" required>
                                                            <option value="">Select Country</option>
                                                            <?php foreach($countries as $country): ?>
                                                                <option value="<?php echo $country['country'];?>">
                                                                    <?php echo $country['country']; ?>
                                                                </option>
                                                            <?php endforeach;?>
                                                        </select>                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="Submit" id="save_sender"> Submit Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="display-type"></div>
            </div>