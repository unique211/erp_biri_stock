<!DOCTYPE html>
<style>
    .clr1 {
        background-color: lightblue;
    }

    .clr2 {
        background-color: #93C158;
    }

    .clr3 {
        background-color: #D4E882;
    }
</style>
<?php
$title = '';
$title1 = '';
if (isset($title_name)) {
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
        .names {
            font-weight: bold;
        }
        
    </style>
</head>

<body class="overflow-hidden">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <select id="item_name" name="item_name" class="form-control">
                                                    <option selected disabled>Select</option>
                                                    <option value="Item1">Item1</option>
                                                    <option value="Item2">Item2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Report Type</label>
                                                <select id="report_type" name="report_type" class="form-control">
                                                    <option value="" selected disabled>Select Report Type</option>
                                                    <option value="Financial_Year_Wise">Financial Year Wise</option>
                                                    <option value="Financial_Month_Wise">Financial Month Wise</option>
                                                    <option value="Financial_Day_Wise">Financial Day Wise</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">

                                        </div>
                                    </div><br>
                                    <div class="col-sm-12" id="if_year" style="display:none">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Financial Year</label>
                                                <select id="year1" name="year1" class="form-control">
                                                <option value="" selected disabled>Select Financial Year</option>
                                                 
                                                </select>
                                            </div>
                                        </div>


                                    </div><br>
                                    <div class="col-sm-12" id="if_month" style="display:none">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Financial Year</label>
                                                <select id="year2" name="year2" class="form-control">
                                                    <option value="" selected disabled>Select Financial Year</option>
                                                 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Financial Month</label>
                                                <select id="month" name="month" class="form-control">
                                                <option value="" selected disabled>Select Financial Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">Febuary</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>

                                                </select>
                                            </div>
                                        </div>
                          

                                    </div><br>
                                    <div class="col-sm-12" id="if_day" style="display:none">
                                     
                                    
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <div class="input-group date " data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker doj" id="fdate" name="fdate">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <div class="input-group date " data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker doj" id="date" name="date">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><br>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3" style="margin-left:3%;">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-info" id="search" name="search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3" style="float:right;">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="form">
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table table-striped table-bordered">

                                                <!-- <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;"> -->
                                                <thead id="thead">
                                                    <tr>
                                                        <th>Month/Year</th>
                                                        <th colspan="2" style="text-align:center;"><b>
                                                                <font color="black">Opening Bal.</font>
                                                            </b></th>
                                                        <!--  <th width="5%" rowspan="2">Time</th> -->
                                                        <th colspan="2" style="text-align:center;"><b>
                                                                <font color="black">Finish product</font>
                                                            </b> </th>
                                                       
                                                        <th colspan="2" style="text-align:center;"><b>
                                                                <font color="black">Sales</font>
                                                            </b></th>
                                                       
                                                        <th colspan="2" style="text-align:center;"><b>
                                                                <font color="black">Closing Bal.</font>
                                                            </b></th>

                                                    </tr>

                                                </thead>
                                                <tbody id="tbody">
                                                  <!--  <tr>
                                                        <td>Apr'2015</td>
                                                        <td colspan="2">48896.870</td>
                                                        <td colspan="2">0.000</td>
                                                        <td colspan="2">4998.175</td>
                                                        <td colspan="2">1215.000</td>
                                                        <td colspan="2">122.000</td>
                                                        <td colspan="2">42561.695</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Apr'2015</td>
                                                        <td colspan="2">48896.870</td>
                                                        <td colspan="2">0.000</td>
                                                        <td colspan="2">4998.175</td>
                                                        <td colspan="2">1215.000</td>
                                                        <td colspan="2">122.000</td>
                                                        <td colspan="2">42561.695</td>
                                                    </tr>-->
                                                </tbody>
                                                <tfoot id="tfootid">
                                                   <!-- <tr>
                                                        <td>2019-20</td>
                                                        <td colspan="2"><b>48896.870</b></td>
                                                        <td colspan="2"><b>136315.000</b></td>
                                                        <td colspan="2"><b>59707.375</b></td>
                                                        <td colspan="2"><b>18316.000</b></td>
                                                        <td colspan="2"><b>294.000</b></td>
                                                        <td colspan="2"><b>106894.495</b></td>
                                                    </tr>-->
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
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
    <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/finishproductreport.js"></script>
    <script>
        $('#date #fdate').datepicker({
            'todayHighlight': true,
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
       
        var date = new Date();
        // var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        // lastDay = lastDay.toString('dd/MM/yyyy');
        //
        date = date.toString('dd/MM/yyyy');

        $("#date").val(date);
        $("#fdate").val(date);
        // $("#fdate").val();
    </script>
</body>

</html>
