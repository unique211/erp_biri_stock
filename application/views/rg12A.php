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
	  
	  if(($val->menu_id==5 && $val->submenu_id==27) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

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
                                                    <label>From Date</label>
                                                    <div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="fdate" name="fdate">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>To Date</label>
                                                    <div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="date" name="date">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="form">
													<?php 	if($export_p==1){ ?>
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
                                                   <input type="button" id="btnExportpdf" class="btn btn-primary pull-right" value="ExportPdf" />
													<?php } ?>
												</div>
                                                </div>
                                            </div>
										</div><br>
									<?php } ?>
                                        <div class="col-sm-12">
                                        <div class="table-responsive" id="show_master" style="overflow-x: auto;">
											
                                           
                                    <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;">
                                            <thead id="thead">
                                                <tr>
                                                    <th width="5%" ></th>
                                                    <th width="19%" colspan="3" style="text-align:center;"><b><font color="black">Opening Balance</font></b></th>
                                                  <!--  <th width="5%" rowspan="2">Time</th> -->
                                                    <th width="19%" colspan="3" style="text-align:center;"><b><font color="black"> Received</font></b> </th>
                                                    <th width="19%" colspan="3" style="text-align:center;"><b><font color="black">Total</font></b></th> 
                                                    <th width="19%" colspan="3" style="text-align:center;"><b><font color="black">Sales</font></b></th>
                                                    <th width="19%" colspan="3" style="text-align:center;"><b><font color="black">Closing Balance</font></b></th>
                                                   
                                                </tr>
                                                <tr>
                                                    
                                                    <th>Date</th>

                                                    <th  class="clr1">Loose (Pcs in 1000)</th>
                                                    <th  class="clr1">Lable (Box)</th>
                                                    <th  class="clr1">Lable (Pcs in 1000)</th>

                                                    <th>Loose (Pcs in 1000)</th>
                                                     <th>Lable (Box)</th>
                                                    <th>Lable (Pcs in 1000)</th>
                                                  
                                                    <th  class="clr2" >Loose (Pcs in 1000)</th>
                                                    <th  class="clr2" >Lable (Box)</th>
                                                     <th  class="clr2" >Lable (Pcs in 1000)</th>

                                                    <th>Loose (Pcs in 1000)</th>
                                                    <th>Lable (Box)</th>
                                                    <th>Lable (Pcs in 1000)</th>
                                                   
                                                    <th class="clr3">Loose (Pcs in 1000)</th>
                                                    <th class="clr3">Lable (Box)</th>
                                                    <th class="clr3">Lable (Pcs in 1000)</th>
                                                    
                                                </tr>   
                                            </thead>
                                            <tbody id="tbody"></tbody>
                                            <tfoot id="tfoot"></tfoot>
                                        </table>
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
        <script src="<?php echo base_url(); ?>assets/js/myjs/rg12A.js"></script>
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
