<body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <div class="layout-w">
        <?php $this->renderPartial("//layouts/mobile_menu", array('page'=>$page));?>

            <!--------------------START - Main Menu-------------------->
            <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <?php $this->renderPartial("//layouts/dashboard_menu", array('page'=>$page));?>
            </div>
            <!--------------------END - Main Menu-------------------->
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
                </div>
                <!--------------------END - Top Bar-------------------->                
                <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="element-wrapper">                     
                                    <h6 class="element-header">Real Time Dashboard</h6>
                                    <div class="element-content">
                                        <div class="row">
                                            <div class="col-sm-4 col-xxxl-3">
                                                <a class="element-box el-tablo" href="#">
                                                    <div class="label">EXCHANGE RATE ON <?php echo date('Y-m-d') ?></div>
                                                    <div class="value">57</div>                                  
                                                </a>
                                            </div>
                                            <div class="col-sm-4 col-xxxl-3">
                                                <a class="element-box el-tablo" href="#">
                                                    <div class="label">TRANSACTIONS ON <?php echo date('Y-m-d') ?></div>
                                                    <div class="value">125</div>
                                                    <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                                                </a>                                                
                                            </div>
                                            <div class="col-sm-4 col-xxxl-3">
                                                <a class="element-box el-tablo" href="#">
                                                    <div class="label">GROSS PROFIT ON  <?php echo date('Y-m-d') ?></div>
                                                    <div class="value"><small>UGX</small>457</div>
                                                </a>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Recent Transactions</h6>
                                    <div class="element-box">
                                        <div class="table-responsive">                                       
                                            <table class="table table-lightborder">
                                                <thead>
                                                    <tr>
                                                        <th>Sender Name</th>
                                                        <th>Sender Contact</th>
                                                        <th>Amount</th>
                                                        <th>Receiver Name</th>
                                                        <th>Receiver Contact</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detail_summary as $detail) :?>
                                                    <tr>
                                                        <td><?php echo $detail->sender_name; ?></td>
                                                        <td><?php echo $detail->sender_phone_no; ?></td>
                                                        <td><?php echo $detail->amount; ?></td>
                                                        <td><?php echo $detail->receiver_name;?></td>
                                                        <td class="text-right"><?php echo $detail->receiver_phone_no; ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        <!--------------------END - Basic Table-------------------->
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>                       

                    </div>
                    <!--------------------START - Sidebar-------------------->
                    <div class="content-panel">
                        <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
                        <div class="element-wrapper">
                            <h6 class="element-header">Quick Links</h6>
                            <div class="element-box-tp">
                                <div class="el-buttons-list full-width"><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"></i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i><span>Store Settings</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="display-type"></div>
        </div>