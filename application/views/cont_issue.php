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
	  
	  if(($val->menu_id==3 && $val->submenu_id==10) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1)){

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
<style>
    .boldness { font-weight: bold; }
    </style>
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
                                   <div class="col-lg-12" >
                                   
                                        <div class="form-group">
                                            <div class="col-sm-1">
                                                    <label>Date*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                    <div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date" name="date" placeholder="Date" autocomplete="off" required  >
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div><br/>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
									<table id="file_info" class="table table-striped" width="100%" cellspacing="0">
                                        <thead>
											<tr>
                                           		<th><font style="width:120px;font-weight:bold">Contractor Name* </font></th>
                                                <th><font style="width:120px;font-weight:bold">Checker Name* </font></th>
                                                <th><font style="width:80px;font-weight:bold">Batch* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Asal Bidi* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Chant Bidi (Pcs)* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Chant Bidi (Kgs)* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Wages Group* </font></th>
                                                <th><font style="width:80px;font-weight:bold">Quality* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Tobacco Weight* </font></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<tr>
                                                <td style="text-align:right;">
                                                    <select class="form-control input-sm  placeholdesize cont" style="width:120px;" id="cont_name" name="cont_name" autocomplete="off" required>
                                                    </select>
												</td>
                                            	<td style="text-align:right;">
                                                    <select class="form-control input-sm  placeholdesize checker" style="width:120px;" id="checker" name="checker" autocomplete="off" required>
                                                    </select>
												</td> 
                		                        <td style="text-align:right;">
                                                    <select class="form-control input-sm  placeholdesize batch" style="width:100px;" id="batch" name="batch" autocomplete="off" required>
											        </select>
												</td> 
                                        		<td style="text-align:right;">
													<input type="text" class="form-control input-sm placeholdesize"  style="width:110px;"id="asal_bidi" name="asal_bidi"  value="0" required />
												</td> 
                                            	<td style="text-align:right;">
													<input type="text" class="form-control input-sm placeholdesize" style="width:110px;" id="chant_bidi_pcs" name="chant_bidi_pcs"  value="0" required>
												</td> 
        		                                <td style="text-align:right;">
													<input type="text" class="form-control input-sm placeholdesize" style="width:110px;" id="chant_bidi_kgs" name="chant_bidi_kgs" value="0" required >
												</td> 
                                		        <td style="text-align:right;">
                                                    <select class="form-control input-sm  placeholdesize wages" style="width:110px;" id="wages" name="wages" autocomplete="off" required>
                                                    </select>
												</td> 
                		                        <td style="text-align:right;">
                                                    <select class="form-control input-sm  placeholdesize"style="width:80px;" id="qlty" name="qlty" required >
                                                        <option value=""selected disabled >Select</option>
                                                        <option value="A">A</option>
                                                        <option value="AB">AB</option>
                                                        <option value="B" selected>B</option>
                                                        <option value="BC">BC</option>
                                                        <option value="C">C</option>
                                                    </select>
												</td> 
                                        		<td style="text-align:right;">
													<input type="text" class="form-control input-sm placeholdesize"style="width:110px;" id="tob_wt" name="tob_wt"  placeholder="0"  required>
												</td> 
											</tr>
										</tbody>
                                    </table>
                                    <table id="file_info1" class="table table-striped" width="100%" cellspacing="0">
                                        <thead>
											<tr>
                                           		<th><font style="width:80px;font-weight:bold">Batch* </font></th>
                                                <th><font style="width:100px;font-weight:bold">Tobacco* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Tobacco Bag* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Leaves* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Leaves Bag* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Black Yarn* </font></th>
                                                <th><font style="width:110px;font-weight:bold">White Yarn* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Filter* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Disc* </font></th>
                                                <th><font style="width:110px;font-weight:bold">Other* </font></th>
											</tr>
                                        </thead>
                                        <tbody>
											<tr>
                                                <td style="text-align:right;">
                                                    <select class="form-control input-sm  placeholdesize batch"style="width:100px" id="batch2" name="batch2" required>
											        </select>
												</td> 
                                                <td style="text-align:right;">
													<input type="text"style="width:100px;" class="form-control input-sm placeholdesize" id="tobacco" name="tobacco"  value="0" required>
												</td> 
                                                <td style="text-align:right;">
													<input type="text" style="width:110px;" class="form-control input-sm placeholdesize" id="tobacco_bag" name="tobacco_bag"  value="0" required>
												</td> 
                                        		<td style="text-align:right;">
													<input type="text" style="width:80px;" class="form-control input-sm placeholdesize" id="leaves" name="leaves"  value="0" required>
												</td> 
                                            	<td style="text-align:right;">
													<input type="text" style="width:110px;"class="form-control input-sm placeholdesize" id="leaves_bag" name="leaves_bag"  value="0" required>
												</td> 
        		                                <td style="text-align:right;">
													<input type="text" style="width:110px;"class="form-control input-sm placeholdesize" id="b_yarn" name="b_yarn" value="0" required >
												</td> 
                                		        <td style="text-align:right;">
													<input type="text"style="width:110px;" class="form-control input-sm placeholdesize" id="w_yarn" name="w_yarn"  value="0" required>
												</td> 
                                                <td style="text-align:right;">
													<input type="text"style="width:80px;" class="form-control input-sm placeholdesize" id="filter" name="filter"  value="0" required>
												</td> 
                                        		<td style="text-align:right;">
													<input type="text"style="width:80px;" class="form-control input-sm placeholdesize" id="disk" name="disk"  value="0" required>
												</td> 
                                                <td style="text-align:right;">
													<input type="text" style="width:80px;"class="form-control input-sm placeholdesize" id="cartons" name="cartons"  value="0" required>
												</td> 
											</tr>
										</tbody>
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
                        <div style="border-bottom: 2px solid;"></div>
                        <br/>
                        <div class="col-lg-12" >
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>From Date</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group date doj" data-provide="datepicker">
                                        <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date2" name="date2" placeholder="Date" autocomplete="off" required  >
                                        <div class="input-group-addon">
                                            <span class="fa fa-calender"></span>
                                        </div>
                                    </div><br/> <br/>
                                </div>
                                <div class="col-sm-2">
                                    <label>To Date</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group date doj" data-provide="datepicker">
                                        <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date3" name="date3" placeholder="Date" autocomplete="off" required  >
                                        <div class="input-group-addon">
                                            <span class="fa fa-calender"></span>
                                        </div>
                                    </div><br/> <br/>
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" id="filter" name="filter" value="Filter" class="btn btn-primary" />
                                </div>
                            </div>
                        </div>
						<div class="col-lg-12 ">
							<div class="table-responsive" style="overflow-x:auto;" id="show_master">
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/cont_issue.js"></script>
	
 
    
    <script>
    $('#date #date2').datepicker({
            'todayHighlight':true,
        });
    var date = new Date();
            date = date.toString('dd/MM/yyyy');
            
        $("#date").val(date);
        $("#date2").val(date);
        $("#date3").val(date);
        
    </script>

    
  </body>
</html>
