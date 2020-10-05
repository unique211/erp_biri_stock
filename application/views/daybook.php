<!DOCTYPE html>
<?php
	$title = '';
	$title1 = '';
if(isset($title_name)){
	$title = $title_name;
	$title1 = $title_name1;
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php include "includes/headerlink.php"; ?>    
    </head>
    <body class="overflow-hidden"  >
        <!-- Overlay Div -->
        <div id="overlay" class="transparent"></div>
        <div id="wrapper" class="preload">
		<?php include "includes/header.php"; ?>    
		<?php include "includes/sidebar.php"; ?>    
            <div id="main-container">
                <div id="breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>contiloe/dashboard"> Home</a></li>
                        <li class="active"><?php echo $title1 ?></li>   
                    </ul>
                </div><!-- /breadcrumb-->
                <div class="padding-md">
                    <div class="row">
					    <div class="col-md-12">
						    <div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo "Contractor Issue Receive"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    <div class="row " id="documents">
                                    <form id="master_form" method="POST" name="master_form">
                                    <div class="col-sm-12">
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>Date*</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="input-group date doj" data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date" name="date" placeholder="Date" autocomplete="off" required  >
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
												<button type="submit" id="btnsave" class="btn btn-sm btn-success btn-sm pull-right">Search</button>                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                      
                                        <!-- <div class="col-lg-12" >
                                            <input type="hidden" id="save_update" value="" >
                                                &nbsp;	&nbsp;	
                                                &nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
                                        </div> -->
                                        </form>
                                    </div>
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master">
                                            <!-- <table id="example" class="display nowrap " width="100%" cellspacing="0">
                                                <thead>
                                                    <th><font style="font-weight:bold">From</font></th>
                                                    <th><font style="font-weight:bold">To</font></th>
                                                    <th><font style="font-weight:bold">Type</font></th>
                                                    <th><font style="font-weight:bold">Amount</font></th>
                                                    <th><font style="font-weight:bold">Remark</font></th>
                                                    <th><font style="font-weight:bold">Operations </font></th> 
                                                </thead>
                                                <tbody>
                                                </tbody>
											</table> -->
                                        </div>
                                        </div>
                                    </div>
								</div><!-- /panel -->
								
								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo "Contractor Adjustment"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master1">
                                            
                                        </div>
                                        </div>
                                    </div>
								</div><!-- /panel -->
								
								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo "Voucher Entry"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master2">
                                          
                                        </div>
                                        </div>
                                    </div>
                                </div><!-- /panel -->

								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo "Finished Product"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master3">

                                        </div>
                                        </div>
                                    </div>
								</div><!-- /panel -->
								
								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo " Raw Item Purchase & Sales"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master4">
                                            
                                        </div>
                                        </div>
                                    </div>
								</div><!-- /panel -->
								
								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo " Finish Product Sale"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master5">
                                           
                                        </div>
                                        </div>
                                    </div>
								</div><!-- /panel -->
								
								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo " Raw Item Transfer"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master6">
                                          
                                        </div>
                                        </div>
                                    </div>
								</div><!-- /panel -->
								
								<div class="panel panel-default">
							    <div class="panel-heading">
							        <b><?php echo "  Tobacco Mixing"; ?></b>
							    </div>
                                <div class="panel-body ">
                                    
									<br/>
									<hr>

								
                                    <div class="col-lg-12 ">


									
                                        <div class="table-responsive" id="show_master7">
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div><!-- /panel -->



                                <div class="panel-body ">
                                    <div class="col-md-12">
                                        <div class="container pull-left" style="padding:20px;max-width:100%; overflow:auto;">
                                        </div>
                                    </div><!--col-->
                                </div><!--panel body-->
						    </div><!-- /panel -->
					    </div><!-- /.col -->
                    </div>
                </div><!-- /.padding-md -->
            </div><!-- /main-container -->
        <!-- Footer-->
       <!-- ================================================== -->
        <?php include "includes/footer.php"; ?>    
        </div><!-- /wrapper -->
        <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include "includes/footerlink.php"; ?>   
        <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/daybookrep.js"></script>
        <script>
            $('.doj').datepicker({
            'todayHighlight':true,
            });
            var date = new Date();
            date = date.toString('dd/MM/yyyy');
            $("#date").val(date);
            $("#fromdate").val(date);
            $("#todate").val(date);
        </script>
    </body>
</html>
