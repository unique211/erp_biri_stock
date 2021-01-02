<!DOCTYPE html>
<style>
.clr1{
    background-color: lightblue;
}
.clr2{
    background-color: #93C158;
}
.clr3{
    background-color: #D4E882;  
}
</style>
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
$export_p=0;
?>
 <?php foreach($sidebar as $val){ 
	  
	  if(($val->menu_id==5 && $val->submenu_id==28) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

		$create_p=$val->create_p;
		$edit_p=$val->edit_p;
		$delete_p=$val->delete_p;
		$read_p=$val->read_p;
		$export_p=$val->export_p;

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
    .names { font-weight: bold; }
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
							    </div>
                                <div class="panel-body ">
                                    <div class="row " id="documents">
									<?php if($create_p==1 || $edit_p ==1){ ?>
                                        <div class="col-sm-12">
                                        <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Year</label>
                                                   <select id="year" name="year" class="form-control">
                                                    <option selected disabled>Select</option>
                                                   <!-- <option value="1">2018-2019</option>
                                                    <option value="2">2019-2020</option>-->
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="input-group">
                                                        <input type="submit" class="btn btn-info" id="search" name="search">
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-sm-3"></div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="form">
													<?php 	if($export_p==1){ ?>
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
													<?php }?>
												</div>
                                                </div>
                                            </div>
										</div><br>
									<?php } ?>
                                        <div class="col-sm-12">
                                        <!-- <div class="table-responsive" id="show_master" style="overflow-x: auto;"> -->
											<div class="table-responsive" id="show_master">
						<!--	<table id="dataTable" class="table table-striped table-bordered">
                                           
                                    <!-- <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;"> -->
                                            <!--<thead id="thead">
                                                <tr>
                                                    <th  >Month/Year</th>
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">BIDI (Box)</font></b></th>
                                                  <!--  <th width="5%" rowspan="2">Time</th> -->
                                                  <!--  <th  colspan="2" style="text-align:center;"><b><font color="black"> Clearance (Pcs)</font></b> </th>
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">Sale Value (Rs.)</font></b></th> 
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">NCCD</font></b></th>
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">CGST</font></b></th>
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">SGST</font></b></th>
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">IGST</font></b></th>
                                                    <th  colspan="2" style="text-align:center;"><b><font color="black">Total GST</font></b></th>
                                                   
                                                </tr>
                                                  
                                            </thead>
                                            <tbody id="tbody">
												<tr>
													<td >Apr'2019</td>
													<td colspan="2">7689.500</td>
													<td colspan="2">4365.600</td>
													<td colspan="2">1527960.00</td>
													<td colspan="2">69850.00</td>
													<td colspan="2">0.00</td>
													<td colspan="2">0.00</td>
													<td colspan="2">0.00</td>
													<td colspan="2">0.00</td>
												</tr>
												<tr>
													<td >Apr'2019</td>
													<td colspan="2">7689.500</td>
													<td colspan="2">4365.600</td>
													<td colspan="2">1527960.00</td>
													<td colspan="2">69850.00</td>
													<td colspan="2">0.00</td>
													<td colspan="2">0.00</td>
													<td colspan="2">0.00</td>
													<td colspan="2">0.00</td>
												</tr>
											</tbody>
                                            <tfoot id="tfoot">
												<tr>
													<td ></td>
													<td colspan="2"><b>91857.500</b></td>
													<td colspan="2"><b>94047.840</b></td>
													<td colspan="2"><b>30141394.00</b></td>
													<td colspan="2"><b>1504767.00</b></td>
													<td colspan="2"><b>0.00</b></td>
													<td colspan="2"><b>0.00</b></td>
													<td colspan="2"><b>0.00</b></td>
													<td colspan="2"><b>0.00</b></td>
												</tr>
											</tfoot>
                                        </table>-->
</div> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /main-container -->
            <!-- Footer -->
            <!--  ================================================== -->
            <?php include "includes/footer.php"; ?>    
        </div><!-- /wrapper -->
        <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include "includes/footerlink.php"; ?>   
        <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/bidisalesmonthly.js"></script>
        <script>
            $('#date').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
            $('#fdate').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
            var date = new Date();
            var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
            lastDay = lastDay.toString('dd/MM/yyyy');
           //
            date = date.toString('dd/MM/yyyy');
          
            $("#date").val(lastDay);
           // $("#fdate").val();
        </script>
    </body>
</html>
