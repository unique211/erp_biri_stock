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
$export_p=0;
?>
 <?php foreach($sidebar as $val){ 
	  
	  if(($val->menu_id==5 && $val->submenu_id==34) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

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
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="fdate" name="fdate" required>
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
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="date" name="date" required>
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Select Party</label>
                                                    <select class="form-control party" id="contractor" name="contractor" required></select>
                                                </div>
                                            </div> 
                                           <!-- <div class="col-sm-1"></div>-->
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="input-group">
                                                        <input type="submit" class="btn btn-info pull-right" id="search" name="search">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="form">
														<?php if($export_p==1){ ?>
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
													<!-- <input type="button" id="btnExportpdf" class="btn btn-primary pull-right" value="ExportPdf" /> -->
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
                                                    <th colspan="5" style="text-align:center">Ledger</th>
                                                   
                                                    
												</tr>
												<tr>
													<th colspan="5" id="companynm" style="text-align:left">BRIJBASHI TRADERS</th>
	
                                                    
												</tr>
												<tr>
													<th colspan="5" id="comaddress" style="text-align:left">Bandha Ghat, Jhalda</th>
                                                   
                                                    
												</tr>
												<tr>
                                                    <th colspan="5" id="partydata" style="text-align:left"></th>
                                                   
                                                    
												</tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    
                                                    <th style="text-align:center;" >Debit </th>
                                                    <th style="text-align:center;" >Credit </th>
                                                    <th style="text-align:center;" >Balance </th>
                                                    
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
        <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/myjs/partyledger.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> 
        <script>
            $('#date').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
				autoclose: true,
				autoHide: true

				
            });
            $('#fdate').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
				autoclose: true,
			    autoHide: true

			});
			$(".datepicker-input").each(function() {
    $(this).datepicker();
});

$(".datepicker-input").click(function() {
    $(".datepicker-days .day").click(function() {
        $('.datepicker').hide();
    });
});
			
			
            var date = new Date();
            date = date.toString('dd/MM/yyyy');
            $("#date").val(date);
			$("#fdate").val(date);
			
			
        </script>
    </body>
</html>
