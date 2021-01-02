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
					<?php  $sidebar= $this->session->userdata('permission'); ?>

						<?php if($sidebar !=""){ foreach($sidebar as $val){ ?>

							<?php if(($val['menu_id']==1) && ($val['menuper']==1)){ ?>
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
							<?php } ?>
							<?php if(($val['menu_id']==2) && ($val['menuper']==1)){ ?>
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
 -->								<?php  foreach($val['submenudata'] as $subval){?>
									<?php  if(($subval['submenuid']==1) && ($subval['submenuper']==1)){ ?>
                                <li><a href="<?php echo base_url(); ?>contiloe/contractor_partyMaster"><span class="submenu-label">Contractor/Party Master </span></a></li>
									 <?php } ?>
									 <?php  if(($subval['submenuid']==2) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/Item"><span class="submenu-label">Item </span></a></li>
								<?php } ?>
								<?php  if(($subval['submenuid']==3) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/batchwisestock"><span class="submenu-label">Batch Wise Stock </span></a></li>
								<?php } ?>
								<?php  if(($subval['submenuid']==4) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/wagesfixation"><span class="submenu-label">Wages Fixation </span></a></li>
								<?php } ?>
								<?php  if(($subval['submenuid']==5) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/batchcreation"><span class="submenu-label">Batch Creation </span></a></li>
								<?php } ?>
								<?php  if(($subval['submenuid']==6) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/ratemaster"><span class="submenu-label">Rate Master </span></a></li>
								<?php } ?>
								<?php  if(($subval['submenuid']==7) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/packingbatch_lable"><span class="submenu-label">Packing Batch/Lable </span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==8) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/checker_master"><span class="submenu-label">Checker Master</span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==9) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/contractorbillmaster"><span class="submenu-label">Contractor Bill Master</span></a></li>
								<?php } }?>

                            </ul>
						</li>
												<?php } ?>

												<?php if(($val['menu_id']==3) && ($val['menuper']==1)){ ?>

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
                                 <?php  foreach($val['submenudata'] as $subval){?>                      
 									<?php  if(($subval['submenuid']==10) && ($subval['submenuper']==1)){ ?>

                                <li><a href="<?php echo base_url(); ?>contiloe/cont_issue"><span class="submenu-label">Contractor Issue Receive </span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==11) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/cont_adj"><span class="submenu-label">Contractor Adjustment </span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==12) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/voucher_entry"><span class="submenu-label">Voucher Entry </span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==13) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/finished_product"><span class="submenu-label">Finished Product </span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==14) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/Raw_pur_sales"><span class="submenu-label">Raw Item Purchase & Sales</span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==15) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/finish_pro_sell"><span class="submenu-label">Finish Product Sale</span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==16) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/Raw_trancefer"><span class="submenu-label">Raw Item Transfer</span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==17) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/Tobacco_Mixing"><span class="submenu-label">Tobacco Mixing</span></a></li>
								<?php } } ?>

                            </ul>
						</li>
						<?php }  ?>
						<?php if(($val['menu_id']==4) && ($val['menuper']==1)){ ?>

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
 <?php  foreach($val['submenudata'] as $subval){?>  
 <?php  if(($subval['submenuid']==18) && ($subval['submenuper']==1)){ ?>
                                <li><a href="<?php echo base_url(); ?>contiloe/weekly_received_adjustment"><span class="submenu-label">Weekly Received Adjustment </span></a></li>
								<?php } ?><?php  if(($subval['submenuid']==19) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/financial_and_period"><span class="submenu-label">Financial & Period </span></a></li>
								<?php } } ?>

                            </ul>
                        </li>
						<?php } ?>
						<?php if(($val['menu_id']==5) && ($val['menuper']==1)){ ?>

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
							<?php  foreach($val['submenudata'] as $subval){?>  

							<?php  if(($subval['submenuid']==20) && ($subval['submenuper']==1)){ ?>
								 <li><a href="<?php echo base_url(); ?>contiloe/Contractor_report"><span class="submenu-label">Contractor Trial Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==21) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/DatewiseReport"><span class="submenu-label">Date Wise Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==22) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/contractor_sheet"><span class="submenu-label">Wages Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==23) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/contractor_ledger"><span class="submenu-label">Contractor Ledger </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==24) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/issue"><span class="submenu-label"> Issue Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==25) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/recieved"><span class="submenu-label"> Received Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==26) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/consumtion"><span class="submenu-label"> Consumtion Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==27) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/item_wisereport"><span class="submenu-label"> RG-12A Report </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==28) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/bidi_sales_monthly"><span class="submenu-label"> Bidi Sales Monthly </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==29) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/itemwise_stock_monthly"><span class="submenu-label"> ItemWise Stock Monthly </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==30) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/centralexciseer"><span class="submenu-label"> Central Excise ER-1 </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==31) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/controctorbill"><span class="submenu-label"> Contractor Bill</span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==32) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/contractorpayment"><span class="submenu-label"> Contractor Payment List</span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==33) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/daybookrep"><span class="submenu-label">Day Book</span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==34) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/party_ledger"><span class="submenu-label">Party Ledger</span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==35) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>contiloe/finishproductreport"><span class="submenu-label">Finish Product Stock </span></a></li>
								 <?php } ?><?php  if(($subval['submenuid']==36) && ($subval['submenuper']==1)){ ?>

								 <li><a href="<?php echo base_url(); ?>Finished_product/downlpaddb"><span class="submenu-label">Database Backup</span></a></li>
								 <?php }} ?>
							</ul>
                        </li>
						<?php } ?>
						<?php if(($val['menu_id']==6) && ($val['menuper']==1)){ ?>

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
 -->								<?php  foreach($val['submenudata'] as $subval){?>  
  <?php  if(($subval['submenuid']==37) && ($subval['submenuper']==1)){ ?>

                                <li><a href="<?php echo base_url(); ?>contiloe/companyManagement"><span class="submenu-label">Company Management </span></a></li>
								<?php } ?> <?php  if(($subval['submenuid']==38) && ($subval['submenuper']==1)){ ?>
								<li><a href="<?php echo base_url(); ?>contiloe/roleMaster"><span class="submenu-label">Role Master </span></a></li>
								<?php } ?> <?php  if(($subval['submenuid']==39) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/userManagement"><span class="submenu-label">User Management </span></a></li>
								<?php } ?> <?php  if(($subval['submenuid']==40) && ($subval['submenuper']==1)){ ?>

								<li><a href="<?php echo base_url(); ?>contiloe/userpermission"><span class="submenu-label">User Permission </span></a></li>
								<?php } } ?>
                            </ul>
						</li>
						
												<?php } } }?>


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
