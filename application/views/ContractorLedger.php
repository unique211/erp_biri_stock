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
                                                    <label>Select contractor</label>
                                                    <select class="form-control cont" id="contractor" name="contractor"></select>
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
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="col-sm-12">
                                        <div class="table-responsive" id="show_master" style="overflow-x: auto;">
											
                                           
                                    <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;">
                                            <thead id="thead">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Batch</th>
                                                    <th></th>
                                                    <th>Net Biri</th>
                                                    <th>Home Ch.</th>
                                                    <th>Fact.Ch.</th>
                                                    <th>Leaves</th>
                                                    <th>Tobacco</th>
                                                    <th>Black Yarn</th>
                                                    <th>White Yarn</th>
                                                    <th>Filter</th>
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
        <script src="<?php echo base_url(); ?>assets/js/myjs/con_ledger.js"></script>
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
