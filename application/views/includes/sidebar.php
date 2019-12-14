        <aside class="fixed skin-6">
            <div class="sidebar-inner scrollable-sidebar">
                <div class="size-toggle">
                    <a class="btn btn-sm" id="sizeToggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="btn btn-sm pull-right logoutConfirm_open" href="#logoutConfirm">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div><!-- /size-toggle -->

                <div class="main-menu">

                    <ul>
                        <li class="<?php if ($active_menu == 'd') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url(); ?>/contiloe/dashboard">
                                <span class="menu-icon">
                                    <i class="fa fa-desktop fa-lg"></i>
                                </span>
                                <span class="text">
                                    Dashboard
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                        </li>

                        <li class="openable open <?php if ($active_menu == 'm') {
                                                        echo 'active';
                                                    } ?>">
                            <a href="#">
                                <span class="menu-icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Master
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                            <ul class="submenu">
                                <!--                            <li><a href="form_wizard.html"><span class="submenu-label">Budgets</span></a></li>
 -->
                                <li><a href="<?php echo base_url(); ?>contiloe/contractor_partyMaster"><span class="submenu-label">Contractor/Party Master </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/Item"><span class="submenu-label">Item </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/batchwisestock"><span class="submenu-label">Batch Wise Stock </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/wagesfixation"><span class="submenu-label">Wages Fixation </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/batchcreation"><span class="submenu-label">Batch Creation </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/ratemaster"><span class="submenu-label">Rate Master </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/packingbatch_lable"><span class="submenu-label">Packing Batch/Lable </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/checker_master"><span class="submenu-label">Checker Master</span></a></li>


                            </ul>
                        </li>

                        <li class="openable open <?php if ($active_menu == 't') {
                                                        echo 'active';
                                                    } ?>">
                            <a href="#">
                                <span class="menu-icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Transaction
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                            <ul class="submenu">
                                <!--                            
 -->
                                <li><a href="<?php echo base_url(); ?>contiloe/cont_issue"><span class="submenu-label">Contractor Issue Receive </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/cont_adj"><span class="submenu-label">Contractor Adjustment </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/voucher_entry"><span class="submenu-label">Voucher Entry </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/finished_product"><span class="submenu-label">Finished Product </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/Raw_pur_sales"><span class="submenu-label">Raw Item Purchase & Sales</span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/finish_pro_sell"><span class="submenu-label">Finish Product Sale</span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/Raw_trancefer"><span class="submenu-label">Raw Item Transfer</span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/Tobacco_Mixing"><span class="submenu-label">Tobacco Mixing</span></a></li>


                            </ul>
                        </li>

                        <li class="openable open <?php if ($active_menu == 'u') {
                                                        echo 'active';
                                                    } ?>">
                            <a href="#">
                                <span class="menu-icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Utility
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                            <ul class="submenu">
                                <!--                            
 -->
                                <li><a href="<?php echo base_url(); ?>contiloe/weekly_received_adjustment"><span class="submenu-label">Weekly Received Adjustment </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/financial_and_period"><span class="submenu-label">Financial & Period </span></a></li>


                            </ul>
                        </li>

                        <li class="openable open <?php if ($active_menu == 'r') {
                                                        echo 'active';
                                                    } ?>">
                            <a href="#">
                                <span class="menu-icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Report
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?php echo base_url(); ?>contiloe/Contractor_report"><span class="submenu-label">Contractor Trial Report </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/DatewiseReport"><span class="submenu-label">Date Wise Report </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/contractor_sheet"><span class="submenu-label">Contractor Sheet </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/contractor_ledger"><span class="submenu-label">Contractor Ledger </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/issue"><span class="submenu-label"> Issue Report </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/recieved"><span class="submenu-label"> Received Report </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/consumtion"><span class="submenu-label"> Consumtion Report </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/item_wisereport"><span class="submenu-label"> RG-12A Report </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/bidi_sales_monthly"><span class="submenu-label"> Bidi Sales Monthly </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/itemwise_stock_monthly"><span class="submenu-label"> ItemWise Stock Monthly </span></a></li>
                            </ul>
                        </li>

                        <li class="openable open <?php if ($active_menu == 's') {
                                                        echo 'active';
                                                    } ?>">
                            <a href="#">
                                <span class="menu-icon">
                                    <i class="fa fa-cog fa-lg"></i>
                                </span>
                                <span class="text">
                                    Settings
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                            <ul class="submenu">
                                <!--                            <li><a href="form_wizard.html"><span class="submenu-label">Budgets</span></a></li>
 -->
                                <li><a href="<?php echo base_url(); ?>contiloe/companyManagement"><span class="submenu-label">Company Management </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/roleMaster"><span class="submenu-label">Role Master </span></a></li>
                                <li><a href="<?php echo base_url(); ?>contiloe/userManagement"><span class="submenu-label">User Management </span></a></li>

                            </ul>
                        </li>


                        <!--                        <li class="<?php if ($active_menu == 'im') {
                                                                    echo 'active';
                                                                } ?>">
                            <a href="<?php echo base_url(); ?>wadhawa/importMaster">
                                <span class="menu-icon">
                                    <i class="fa fa-send fa-lg"></i> 
                                </span>
                                <span class="text">
                                    Import Master
                                </span>
                                <span class="menu-hover"></span>
                            </a>
                        </li>
-->
                    </ul>

                </div><!-- /main-menu -->




            </div><!-- /sidebar-inner -->
        </aside>