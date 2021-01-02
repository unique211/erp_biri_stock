$(document).ready(function() {
    var nowY = new Date().getFullYear();
    var options = "";
    var options2 = "";

    for (var Y = nowY; Y >= 2019; Y--) {
        var plus = Y + 1;
        options += "<option value=" + Y + '-' + plus + ">" + Y + '-' + plus + "</option>";
    }
    for (var Y = nowY; Y >= 2019; Y--) {
        // var plus = Y + 1;
        options2 += "<option value=" + Y + ">" + Y + "</option>";
    }

    $("#year1").append(options);
    $("#year2").append(options2);

    $(document).on('change', '#report_type', function() {
        var type = $('#report_type').val();
        $("#if_year").hide();
        $("#if_month").hide();
        $("#if_day").hide();
        $('#year1').val('').trigger('change');
        $('#year2').val('').trigger('change');
        $('#month').val('').trigger('change');
        if (type == "Financial_Year_Wise") {
            $("#if_year").show();
        } else if (type == "Financial_Month_Wise") {
            $("#if_month").show();
        } else if (type == "Financial_Day_Wise") {
            $("#if_day").show();
        }

    });
    var getDaysInMonth = function(month, year) {

        return new Date(year, month, 0).getDate();

    };

    $(document).on('click', '#search', function() {

        var year = $('#year1').val();
        var year2 = $('#year2').val();
        var month = $('#month').val();
        var item_name = $('#item_name').val();
        var monthname = $("#month option:selected").text();;

        console.log(year);
        if (year != null) {
            var findyear = year.split("-");

            var currentyear = findyear[0];
            var nextyear = findyear[1];

            var currentyeardate = currentyear + "-04-01";
            var nextyeardate = nextyear + "-03-31";


            $.ajax({
                type: "POST",
                url: baseurl + "Finishproductreport/getfinicialyearwisedata",
                data: {
                    // table_name: table_name,
                    currentyeardate: currentyeardate,
                    nextyeardate: nextyeardate,
                    item_name: item_name,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    $('#tbody').html('');
                    $('#tfootid').html('');
                    var html = "";
                    var totalopeningbal = 0;
                    var totalpurchase = 0;
                    var totalsale = 0;
                    var totalconsumption = 0;
                    var totalshortage = 0;
                    var totalclosebalance = 0;
                    var rowid = 0;
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            rowid = rowid + 1;
                            totalopeningbal = parseInt(totalopeningbal) + parseInt(data[i].openingbal);
                            totalpurchase = parseInt(totalpurchase) + parseInt(data[i].purchase);
                            totalsale = parseInt(totalsale) + parseInt(data[i].sales);
                            totalconsumption = parseInt(totalconsumption) + parseInt(data[i].consumption);
                            totalshortage = parseInt(totalshortage) + parseInt(data[i].shortage);
                            totalclosebalance = parseInt(totalclosebalance) + parseInt(data[i].closebalance);

                            html = '<tr>' +
                                '<td id="month_' + rowid + '">' + data[i].month + "'" + data[i].year + '</td>' +
                                '<td colspan="2" id="openingbal_' + rowid + '">' + parseInt(data[i].openingbal).toFixed(3) + '</td>' +
                                '<td colspan="2" id="purchase_' + rowid + '">' + parseInt(data[i].purchase).toFixed(3) + '</td>' +
                                '<td colspan="2" id="consumption_' + rowid + '">' + parseInt(data[i].consumption).toFixed(3) + '</td>' +
                                '<td colspan="2" id="sale_' + rowid + '">' + parseInt(data[i].sales).toFixed(3) + '</td>' +
                                '<td colspan="2" id="shortage_' + rowid + '">' + parseInt(data[i].shortage).toFixed(3) + '</td>' +
                                '<td  colspan="2" id="closeingbal_' + rowid + '">' + parseInt(data[i].closebalance).toFixed(3) + '</td>' +
                                '</tr>';
                            $('#tbody').append(html);

                        }
                        rowid = rowid + 1;
                        html = '<tr class="names">' +
                            '<td id="month_' + rowid + '"><b>' + findyear + '</td>' +
                            '<td colspan="2" id="openingbal_' + rowid + '"><b>' + parseInt(totalopeningbal).toFixed(3) + '</b></td>' +
                            '<td colspan="2" id="purchase_' + rowid + '"><b>' + parseInt(totalpurchase).toFixed(3) + '</b></td>' +
                            '<td colspan="2" id="consumption_' + rowid + '"><b>' + parseInt(totalconsumption).toFixed(3) + '</b></td>' +
                            '<td colspan="2" id="sale_' + rowid + '"><b>' + parseInt(totalsale).toFixed(3) + '</b></td>' +
                            '<td colspan="2" id="shortage_' + rowid + '"><b>' + parseInt(totalshortage).toFixed(3) + '</b></td>' +
                            '<td  colspan="2" id="closeingbal_' + rowid + '"><b>' + parseInt(totalclosebalance).toFixed(3) + '</b></td>' +
                            '</tr>';
                        $('#tfootid').append(html);
                    }

                }
            });
        } else if (year2 != null && month != null) {


            var day = getDaysInMonth(month, year2);
            startdate = year2 + '-' + month + '-' + '1';
            enddate = year2 + '-' + month + '-' + day;

            console.log(startdate + "" + enddate);
            $.ajax({
                type: "POST",
                url: baseurl + "Itemwisestockmonthly/getfinicialmonthwise",
                data: {
                    // table_name: table_name,
                    startdate: startdate,
                    enddate: enddate,
                    item_name: item_name,
                },
                dataType: "JSON",
                async: false,
                success: function(data1) {
                    $('#tfootid').html('');
                    $('#tbody').html('');
                    var html = "";
                    var totalopeningbal = 0;
                    var totalpurchase = 0;
                    var totalsale = 0;
                    var totalconsumption = 0;
                    var totalshortage = 0;
                    var totalclosebalance = 0;
                    var rowid = 0;
                    if (data1.length > 0) {
                        rowid = rowid + 1;
                        for (var i = 0; i < data1.length; i++) {
                            totalopeningbal = parseFloat(totalopeningbal) + parseFloat(data1[i].openingbal);
                            totalpurchase = parseFloat(totalpurchase) + parseFloat(data1[i].purchase);
                            totalsale = parseFloat(totalsale) + parseFloat(data1[i].sales);
                            totalconsumption = parseFloat(totalconsumption) + parseFloat(data1[i].consumption);
                            totalshortage = parseFloat(totalshortage) + parseFloat(data1[i].shortage);
                            totalclosebalance = parseFloat(totalclosebalance) + parseFloat(data1[i].closebalance);

                            var fdateslt = data1[i].date.split('-');
                            var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                            html = '<tr >' +
                                '<td id="month_' + rowid + '">' + cdate + '</td>' +
                                '<td colspan="2" id="openingbal_' + rowid + '">' + parseFloat(data1[i].openingbal).toFixed(3) + '</td>' +
                                '<td colspan="2" id="purchase_' + rowid + '">' + parseFloat(data1[i].purchase).toFixed(3) + '</td>' +
                                '<td colspan="2" id="consumption_' + rowid + '">' + parseFloat(data1[i].consumption).toFixed(3) + '</td>' +
                                '<td colspan="2" id="sale_' + rowid + '">' + parseFloat(data1[i].sales).toFixed(3) + '</td>' +
                                '<td colspan="2" id="shortage_' + rowid + '">' + parseFloat(data1[i].shortage).toFixed(3) + '</td>' +
                                '<td  colspan="2" id="closeingbal_' + rowid + '">' + parseFloat(data1[i].closebalance).toFixed(3) + '</td>' +
                                '</tr>';
                            $('#tbody').append(html);
                        }
                    }
                    rowid = rowid + 1;
                    html = '<tr  class="names">' +
                        '<td id="month_' + rowid + '"><b>' + monthname + "'" + year2 + '</b></td>' +
                        '<td colspan="2" id="openingbal_' + rowid + '"><b>' + parseFloat(totalopeningbal).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="purchase_' + rowid + '"><b>' + parseFloat(totalpurchase).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="consumption_' + rowid + '"><b>' + parseFloat(totalconsumption).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="sale_' + rowid + '"><b>' + parseFloat(totalsale).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="shortage_' + rowid + '"><b>' + parseFloat(totalshortage).toFixed(3) + '</b></td>' +
                        '<td  colspan="2" id="closeingbal_' + rowid + '"><b>' + parseFloat(totalclosebalance).toFixed(3) + '</b></td>' +
                        '</tr>';
                    $('#tfootid').append(html);

                }
            });
        } else {

            var fromdate = $('#fdate').val();
            var todate = $('#date').val();

            var fdateslt = fromdate.split('/');
            fromdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

            var fdateslt = todate.split('/');
            var todate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

            //  console.log(startdate + "" + enddate);
            $.ajax({
                type: "POST",
                url: baseurl + "Itemwisestockmonthly/getfinicialmonthwise",
                data: {
                    // table_name: table_name,
                    startdate: fromdate,
                    enddate: todate,
                    item_name: item_name,
                },
                dataType: "JSON",
                async: false,
                success: function(data1) {
                    $('#tfootid').html('');
                    $('#tbody').html('');
                    var html = "";
                    var totalopeningbal = 0;
                    var totalpurchase = 0;
                    var totalsale = 0;
                    var totalconsumption = 0;
                    var totalshortage = 0;
                    var totalclosebalance = 0;
                    var rowid = 0;
                    if (data1.length > 0) {
                        rowid = rowid + 1;
                        for (var i = 0; i < data1.length; i++) {

                            var fdateslt = data1[i].date.split('-');
                            var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                            totalopeningbal = parseFloat(totalopeningbal) + parseFloat(data1[i].openingbal);
                            totalpurchase = parseFloat(totalpurchase) + parseFloat(data1[i].purchase);
                            totalsale = parseFloat(totalsale) + parseFloat(data1[i].sales);
                            totalconsumption = parseFloat(totalconsumption) + parseFloat(data1[i].consumption);
                            totalshortage = parseFloat(totalshortage) + parseFloat(data1[i].shortage);
                            totalclosebalance = parseFloat(totalclosebalance) + parseFloat(data1[i].closebalance);

                            html = '<tr>' +
                                '<td id="month_' + rowid + '">' + cdate + '</td>' +
                                '<td colspan="2" id="openingbal_' + rowid + '">' + parseFloat(data1[i].openingbal).toFixed(3) + '</td>' +
                                '<td colspan="2" id="purchase_' + rowid + '">' + parseFloat(data1[i].purchase).toFixed(3) + '</td>' +
                                '<td colspan="2" id="consumption_' + rowid + '">' + parseFloat(data1[i].consumption).toFixed(3) + '</td>' +
                                '<td colspan="2" id="sale_' + rowid + '">' + parseFloat(data1[i].sales).toFixed(3) + '</td>' +
                                '<td colspan="2" id="shortage_' + rowid + '">' + parseFloat(data1[i].shortage).toFixed(3) + '</td>' +
                                '<td  colspan="2" id="closeingbal_' + rowid + '">' + parseFloat(data1[i].closebalance).toFixed(3) + '</td>' +
                                '</tr>';
                            $('#tbody').append(html);
                        }
                    }
                    rowid = rowid + 1;
                    html = '<tr  class="names">' +
                        '<td id="month_' + rowid + '"></td>' +
                        '<td colspan="2" id="openingbal_' + rowid + '"><b>' + parseFloat(totalopeningbal).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="purchase_' + rowid + '"><b>' + parseFloat(totalpurchase).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="consumption_' + rowid + '"><b>' + parseFloat(totalconsumption).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="sale_' + rowid + '"><b>' + parseFloat(totalsale).toFixed(3) + '</b></td>' +
                        '<td colspan="2" id="shortage_' + rowid + '"><b>' + parseFloat(totalshortage).toFixed(3) + '</b></td>' +
                        '<td  colspan="2" id="closeingbal_' + rowid + '"><b>' + parseFloat(totalclosebalance).toFixed(3) + '</b></td>' +
                        '</tr>';
                    $('#tfootid').append(html);

                }
            });
        }
    });


    //  getMastercont('item_master', '#item_name', 'type="RAW"')
    getMastercont('packingbatch', '#item_name', 'type="RAW"')
        /*--------------get Item Dropdown Start---------------------------*/

    function getMastercont(table_name, selecter, where) {

        $.ajax({
            type: "POST",
            url: baseurl + "Finishproductreport/getdropdown",
            data: {
                table_name: table_name,
                where: where,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);

                html = '';
                var name = '';
                html += '<option selected disabled value="" >Select</option>';
                for (i = 0; i < data.length; i++) {
                    var id = '';
                    name = data[i].name + "" + data[i].ratio1 + "X" + data[i].ratio2 + "X" + data[i].ratio3;
                    id = data[i].id;
                    html += '<option value="' + id + '">' + name + '</option>';
                }
                $(selecter).html(html);
            }
        });
    }



    /*--------------get Item Dropdown Start---------------------------*/

    /*----------------Click Event OF Export  Start--------------------------*/
    $("#btnExport").click(function() {
        $("#dataTable").table2excel({
            exclude: ".noExl",
            name: "ItemWise Stock Monthly",
            filename: "ItemWise Stock Monthly",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    /*----------------Click Event OF Export  End--------------------------*/


});