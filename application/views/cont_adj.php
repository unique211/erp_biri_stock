<!DOCTYPE html>
<?php
	$title = '';
	$title1 = '';
if(isset($title_name)){
	$title = $title_name;
	$title1 = $title_name1;
}
?>
<?php
$edit_p=0;
$delete_p=0;
$read_p=0;
$create_p=0;

?>
 <?php foreach($sidebar as $val){ 
	  
	  if(($val->menu_id==3 && $val->submenu_id==11) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1)){

		$create_p=$val->create_p;
		$edit_p=$val->edit_p;
		$delete_p=$val->delete_p;
		$read_p=$val->read_p;

	  }
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
							<b><?php echo $title1 ?></b>
								<!--	<button type="button" class="btn btn-primary btn-xs pull-right btnhideshow"><i class="fa fa-plus"></i>  Add New</button>	-->
							</div>
							
						<div class="panel-body ">
						<?php if($create_p==1 || $edit_p ==1){ ?>
							<div class="row " id="documents">
									
								   <form id="master_form" name="master_form">
                                   <div class="col-sm-12">
                                         <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Date*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                       <div class="input-group date doj" data-provide="datepicker">
                                                            <input type="text" class="form-control input-sm placeholdesize datepicker"  id="tdate" name="tdate" placeholder="To Date" readonly required  >
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-calender"></span>
                                                            </div>
											            </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Contractor Name*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                       <select class="form-control input-sm  placeholdesize cont"  id="cont_name" name="cont_name" autocomplete="off" required>
                                                       
                                                       </select>
                                                </div>
                                        </div>
									
									</div>
                                    <table id="file_info" class="table table-striped" width="100%" cellspacing="0">
                                        	<thead>
												
												<tr>
                                                                 <th><font style="font-weight:bold">Batch </font></th>
                                                                 <th><font style="font-weight:bold">Tobacco </font></th>
                                                                 <th><font style="font-weight:bold">Leaves </font></th>
                                                                 <th><font style="font-weight:bold">Black Yarn </font></th>
                                                                 <th><font style="font-weight:bold">White Yarn </font></th>
                                                                 <th><font style="font-weight:bold">Filter </font></th>
                                                   
												</tr>
												<tr>
                                                   
                                                                 <td style="text-align:right;">
                                                                      <div class="form-group">
                                                                           <select class="form-control input-sm  placeholdesize batch" id="batch" name="batch" autocomplete="off" required>
                                                                           
                                                                           </select>
                                                                      </div>
													</td> 
                                                                 <td style="text-align:right;">
                                                                       <div class="form-group">
                                                                           <input type="number" class="form-control input-sm placeholdesize" id="tobacco" name="tobacco" placeholder="Tobacco"  >
                                                                      </div>
													</td> 
        		                                                  <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="leaves" name="leaves" placeholder="Leaves"  >
													</td> 
                                		           
                                        		                <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="bl_yarn" name="bl_yarn"  placeholder="Black Yarn" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="wh_yarn" name="wh_yarn"  placeholder="White Yarn" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="filter" name="filter"  placeholder="Filter" >
													</td> 
												</tr>
                                                            <tr>
                                                   
                                                                 <td style="text-align:right;">
                                                                      <div class="form-group">
                                                                          
                                                                      </div>
													</td> 
                                                                 <td style="text-align:right;">
                                                                       <div class="form-group">
                                                                           <input type="number" class="form-control input-sm placeholdesize" value="0" id="tobacco2" name="tobacco2" placeholder="Tobacco" >
                                                                      </div>
													</td> 
        		                                                  <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="leaves2" name="leaves2" value="0" placeholder="Leaves" >
													</td> 
                                		           
                                        		                <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="bl_yarn2" name="bl_yarn2" value="0"  placeholder="Black Yarn" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="wh_yarn2" value="0" name="wh_yarn2"  placeholder="White Yarn" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="filter2" value="0" name="filter2"  placeholder="Filter"  >
													</td> 
												</tr>
										   	</thead>
                    	                   
                                    	</table>
									
							

						<div class="col-lg-12" >
											<input type="hidden" id="save_update" value="" >
												&nbsp;	&nbsp;	<button type="submit" id="btnsave" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
												&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
						</div>

									</form>
				</div>
						<?php } ?>
                <br/>
                <div class="col-lg-12" id="div">
                    <!-- <table id="file_info" class="table table-striped" width="100%" cellspacing="0">
                        <thead id="thead">
                            <tr>
                                <th width="10%">SL No</th>
                                <th width="20%">Contractor Name</th>
<th width="10%">Time</th><th width="10%">Batch</th><th width="10%">Tobacco</th><th width="10%">Leaves</th><th width="10%">Black Yarn</th><th width="10%">White Yarn</th><th width="10%">Filter</th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                        <tfoot id="tfoot"></tfoot></table>-->
                </div><br/> 
                <div class="col-lg-12" >
                                   
                                   <div class="form-group">
                                       <div class="col-sm-1">
                                               <label>Date</label>
                                       </div>
                                       <div class="col-sm-3">
                                               <div class="input-group date doj" data-provide="datepicker">
                                                   <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date2" name="date2" placeholder="Date" autocomplete="off" required  >
                                                   <div class="input-group-addon">
                                                       <span class="fa fa-calender"></span>
                                                   </div>
                                               </div><br/> <br/>
                                       </div>
                                   </div>
                           </div>

						<div class="col-lg-12 ">
										<div class="table-responsive" id="show_master">
                                                      
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
        <!-- Footer
        ================================================== -->
    <?php include "includes/footer.php"; ?>    
        
        
    </div><!-- /wrapper -->

    <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
    </div><!-- /wrapper -->
    
    <!-- Logout confirmation -->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include "includes/footerlink.php"; ?>   
	<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
	<script>
	var editrt="<?php  echo $edit_p; ?>";
var delrt="<?php  echo $delete_p; ?>";
var read_p="<?php  echo $read_p; ?>";
var create_p="<?php  echo $create_p; ?>";
	
	</script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/cont_adj.js"></script>
	
 
 
<script>
$('#tdate #date2').datepicker({
           'todayHighlight':true,
       });
var date = new Date();
        date = date.toString('dd/MM/yyyy');
        
       $("#tdate").val(date);
       $("#date2").val(date);
	   
	   
</script>

    
  </body>
</html>
