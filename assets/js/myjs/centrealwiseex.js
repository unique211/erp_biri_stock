$(document).ready(function() {
    $("#btnExport").click(function() {
        $("#file_info").table2excel({
            exclude: ".noExl",
            name: "Date Wise Report",
            filename: "Date Wise Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });







    $(document).on('change', ".monthdata", function(e) {
        e.preventDefault();
        var month = $('#monthnm').val();
        var yearnm = $('#yearnm').val();
        if ((month > 0) && (yearnm > 0)) {
            var end = new Date(yearnm, month, 0).getDate();
            if (month < 10) {
                month = '0' + month;
            }
            var startdate = yearnm + "-" + month + "-" + 01;
            var enddate = yearnm + "-" + month + "-" + end;




            $.ajax({
                type: "POST",
                url: baseurl + "Rg12A/getsumofitem",
                data: {
                    fdate: startdate,
                    cdate: enddate
                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    if (data.length > 0) {
                        var loosepcs = 0;
                        var recriveloosepcsum = 0;
                        var recrivelableboxsum = 0;
                        var recrivelablepcsum = 0;

                        var salesloosepcsum = 0;
                        var saleslableboxsum = 0;
                        var saleslablepcsum = 0;

                        var opningloosepcsum = 0;
                        var opninglableboxsum = 0;
                        var opninglablepcsum = 0;

                        var closeingloosepcsum = 0;
                        var closeinglableboxsum = 0;
                        var closeinglablepcsum = 0;
                        var salelablebox = 0;
                        var salelablepcs = 0;
                        var opninglablebox = 0;
                        var opninglablepcs = 0;
                        var receivelablebox = 0;
                        var receivelablepcs = 0;
                        var lengthdata = data.length;

                        console.log("lengthdata" + lengthdata);
                        opningloosepcsum = (parseFloat(opningloosepcsum) + (parseFloat(data[0].loosepcs))).toFixed(3);
                        opninglableboxsum = (parseFloat(opninglableboxsum) + (parseFloat(data[0].opninglable)));
                        opninglablepcsum = (parseFloat(opninglablepcsum) + (parseFloat(data[0].alltotal))).toFixed(3);

                        closeingloosepcsum = (parseFloat(closeingloosepcsum) + (parseFloat(data[lengthdata - 1].closingloosepc))).toFixed(3);
                        closeinglableboxsum = (parseFloat(closeinglableboxsum) + (parseFloat(data[lengthdata - 1].closinglabel)));
                        closeinglablepcsum = (parseFloat(closeinglablepcsum) + (parseFloat(data[lengthdata - 1].closingbalancelableinpc))).toFixed(3);
                        for (var i = 0; i < data.length; i++) {


                            var fdateslt = data[i].date.split('-');
                            var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                            if (cdate == '11/07/2019') {
                                console.log(data[i].saleslableinpcs);

                            }

                            if (data[i].saleslablebox != null) {
                                salelablebox = data[i].saleslablebox;
                            } else {
                                salelablebox = 0;
                            }
                            if (data[i].saleslableinpcs != null) {

                                salelablepcs = data[i].saleslableinpcs;
                            } else {
                                salelablepcs = 0;
                            }
                            recriveloosepcsum = (parseFloat(recriveloosepcsum) + (parseFloat(data[i].reciveloosepc))).toFixed(3);
                            recrivelableboxsum = (parseFloat(recrivelableboxsum) + (parseFloat(data[i].receivelable)));
                            recrivelablepcsum = (parseFloat(recrivelablepcsum) + (parseFloat(data[i].receivepcs))).toFixed(3);

                            salesloosepcsum = (parseFloat(salesloosepcsum) + (parseFloat(data[i].saleloses))).toFixed(3);
                            saleslableboxsum = (parseFloat(saleslableboxsum) + (parseFloat(salelablebox)));
                            saleslablepcsum = (parseFloat(saleslablepcsum) + (parseFloat(salelablepcs))).toFixed(3);



                            if (data[i].opninglable != null) {

                                opninglablebox = data[i].opninglable;
                            } else {
                                opninglablebox = 0;
                            }

                            if (data[i].alltotal != null) {

                                opninglablepcs = data[i].alltotal;
                            } else {
                                opninglablepcs = 0;
                            }
                            if (data[i].receivelable != null) {

                                receivelablebox = data[i].receivelable;
                            } else {
                                receivelablebox = 0;
                            }
                            if (data[i].receivepcs != null) {

                                receivelablepcs = data[i].receivepcs;
                            } else {
                                receivelablepcs = 0;
                            }
                        }
                        $('#openingbal').html(opninglablepcsum);
                        $('#manufacturing').html(recrivelablepcsum);
                        $('#clearence').html(saleslablepcsum);
                        $('#closeingbal').html(closeinglablepcsum);
                    }

                }
            });

            $.ajax({
                type: "POST",
                url: baseurl + "Centerexreportcon/showdata",
                data: {
                    fdate: startdate,
                    cdate: enddate
                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    var data = eval(data);
                    var grtotal = 0;
                    var nccdtotalamt = 0;
                    var basictotal = 0;
                    console.log('data' + data);
                    var sr = 0;
                    var html = '';
                    html += '<table id="myTable" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +

                        '<th><font style="font-weight:bold">Sale Date</font></th>' +
                        '<th ><font style="font-weight:bold">Invoce No</font></th>' +
                        '<th ><font style="font-weight:bold">No Of Box</font></th>' +
                        '<th style="display:none;">bill id</th>' +
                        '<th style="display:none;">bill date</th>' +
                        '<th style="display:none;">Party id</th>' +
                        '<th><font style="font-weight:bold">Party Name</font></th>' +
                        '<th><font style="font-weight:bold">Taxable Amount</font></th>' +
                        '<th><font style="font-weight:bold">SGST(%)</font></th>' +
                        '<th><font style="font-weight:bold">CGST(%)</font></th>' +
                        '<th  style="display:none;"><font style="font-weight:bold">IGST(%)</font></th>' +
                        '<th><font style="font-weight:bold">IGST(%)</font></th>' +
                        '<th><font style="font-weight:bold">Total Amount</font></th>' +
                        '<th style="display:none;"><font style="font-weight:bold">Basic </font></th>' +
                        '<th><font style="font-weight:bold">Basic </font></th>' +
                        '<th  style="display:none;"><font style="font-weight:bold">NCCD</font></th>' +
                        '<th><font style="font-weight:bold">NCCD</font></th>' +
                        '<th ><font style="font-weight:bold">Truck No.</font></th>' +
                        '<th ><font style="font-weight:bold">Cess</font></th>' +
                        '<th ><font style="font-weight:bold">Freight</font></th>' +
                        '<th style="display:none;"><font style="font-weight:bold">Freight</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var tot = Math.round(data[i].total);
                        var sgst = Math.round(data[i].sgst);
                        var cgst = Math.round(data[i].cgst);
                        var igst = Math.round(data[i].igst);

                        var sgst_amt = parseFloat(tot) * parseFloat(sgst) / 100;
                        var cgst_amt = parseFloat(tot) * parseFloat(cgst) / 100;
                        var igst_amt = parseFloat(tot) * parseFloat(igst) / 100;

                        var grand_total = parseFloat(tot) + parseFloat(igst_amt) + parseFloat(sgst_amt) + parseFloat(cgst_amt);
                        var grand_tot = Math.round(grand_total);
                        var basic_amt = (parseFloat(data[i].qtysum) * parseFloat(data[i].basic)).toFixed(2);
                        var nccd_amt = (parseFloat(data[i].qtysum) * parseFloat(data[i].nccd)).toFixed(2);

                        var fdateval = data[i].voucher_date;
                        var fdateslt = fdateval.split('-');
                        var voucher_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var fdateval = data[i].bill_date;
                        var fdateslt = fdateval.split('-');
                        var bill_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        sr = parseFloat(sr) + 1;

                        grtotal = parseFloat(grtotal) + parseFloat(tot);
                        nccdtotalamt = parseFloat(nccdtotalamt) + parseFloat(nccd_amt);
                        basictotal = parseFloat(basictotal) + parseFloat(basic_amt);
                        html += '<tr>' +

                            '<td id="voucher_date_' + data[i].id + '">' + voucher_date + '</td>' +
                            '<td id="billno_' + data[i].id + '">' + data[i].sale_id + '</td>' +
                            '<td id="packsum_' + data[i].id + '">' + data[i].packsum + '</td>' +
                            '<td style="display:none;"id="bill_date_' + data[i].id + '">' + bill_date + '</td>' +
                            '<td style="display:none;"id="party_id_' + data[i].id + '">' + data[i].party_id + '</td>' +
                            '<td style="display:none;"id="sale_id_' + data[i].id + '">' + data[i].sale_id + '</td>' +
                            '<td id="party_name_' + data[i].id + '">' + data[i].party_name + '</td>' +
                            '<td id="total_' + data[i].id + '">' + data[i].total + '</td>' +
                            '<td id="sgst_' + data[i].id + '">' + data[i].sgst + '</td>' +
                            '<td id="cgst_' + data[i].id + '">' + data[i].cgst + '</td>' +
                            '<td  style="display:none;" id="igst_' + data[i].id + '">' + data[i].igst + '</td>' +
                            '<td  id="igstamt_' + data[i].id + '">' + igst_amt + '</td>' +
                            '<td id="gtotal_' + data[i].id + '">' + grand_tot + '</td>' +
                            '<td style="display:none;" id="basicper_' + data[i].id + '">' + data[i].basic + '</td>' +
                            '<td id="basicamt_' + data[i].id + '">' + basic_amt + '</td>' +
                            '<td  style="display:none;" id="nccd1_' + data[i].id + '">' + data[i].nccd + '</td>' +
                            '<td id="nccdamt_' + data[i].id + '">' + nccd_amt + '</td>' +
                            '<td  id="truck_' + data[i].id + '">' + data[i].truck_no + '</td>' +
                            '<td  id="truck_' + data[i].id + '">0</td>' +
                            '<td  id="freight_' + data[i].id + '">' + data[i].freight + '</td>' +
                            '<td  style="display:none;"  id="gst_invoice_no_' + data[i].id + '">' + data[i].gst_invoice_no + '</td>' +
                            '</tr>';

                    }
                    var total11 = parseFloat(basictotal) + parseFloat(nccdtotalamt);
                    $('#valueofgood').html(grtotal.toFixed(2))
                    $('#nccdamt').html(nccdtotalamt.toFixed(2))
                    $('#nccdamt1').html(nccdtotalamt.toFixed(2))
                    $('#basicamt').html(basictotal.toFixed(2))
                    $('#basicamt1').html(basictotal.toFixed(2))
                    $('#chessamt').html(0.0)
                    $('#chessamt1').html(0.0)
                    $('#totalamt').html(total11.toFixed(2))
                    $('#totalamt1').html(total11.toFixed(2))
                    html += '</tbody></table>';

                    $('#show_master').html(html);
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdfHtml5',
                                title: 'DB Stock-Raw Item Purchase & Sales',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [0, 1, 2, 7, 8, 9, 11, 12, 14, 16, 17, 18]
                                },
                            },
                            {
                                title: 'DB Stock-Raw Item Purchase & Sales',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 7, 8, 9, 11, 12, 14, 16, 17, 18]
                                }
                            }
                        ]
                    });

                }

            });

        } else {
            $('#openingbal').html('0');
            $('#manufacturing').html('0');
            $('#clearence').html('0');
            $('#closeingbal').html('0');
        }

    });



    $('#search').click(function() {
        var table_name = 'con-party_master';
        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Date_Report/showData",
            data: {
                table_name: table_name,
                fdate: fdate,
                date: cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                var html = '';
                var sr = 0;
                var totalaslbiri = 0;
                var totalchatbiri = 0;
                var totaltotalBiri = 0;
                var totalobtob = 0;
                var totaloblev = 0;
                var totalitob = 0;
                var totalcLev = 0;
                var totalileave = 0;
                var totalsmTob = 0;
                var totalsmLev = 0;
                var totalclosingtobacco = 0;
                var totalclosingleaves = 0;
                var totalTotalTobbaco = 0;
                var totalTotalLeaves = 0;
                var totalcTob = 0;

                for (var i = 1; i < data.length; i++) {


                    totalaslbiri = (parseFloat(totalaslbiri) + parseFloat(data[i].asalbiri)).toFixed(3);
                    totalchatbiri = (parseFloat(totalchatbiri) + parseFloat(data[i].chatbiri)).toFixed(3);
                    totaltotalBiri = (parseFloat(totaltotalBiri) + parseFloat(data[i].totalBiri)).toFixed(3);
                    totalobtob = (parseFloat(totalobtob) + parseFloat(data[i].obtob)).toFixed(3);
                    totaloblev = (parseFloat(totaloblev) + parseFloat(data[i].oblev)).toFixed(3);
                    totalitob = (parseFloat(totalitob) + parseFloat(data[i].itob)).toFixed(3);
                    totalileave = (parseFloat(totalileave) + parseFloat(data[i].ileave)).toFixed(3);
                    totalTotalTobbaco = (parseFloat(totalTotalTobbaco) + parseFloat(data[i].TotalTobbaco)).toFixed(3);
                    totalTotalLeaves = (parseFloat(totalTotalLeaves) + parseFloat(data[i].TotalLeaves)).toFixed(3);
                    totalcTob = (parseFloat(totalcTob) + parseFloat(data[i].cTob)).toFixed(3);
                    totalcLev = (parseFloat(totalcLev) + parseFloat(data[i].cLev)).toFixed(3);
                    totalsmTob = (parseFloat(totalsmTob) + parseFloat(data[i].smTob)).toFixed(3);
                    totalsmLev = (parseFloat(totalsmLev) + parseFloat(data[i].smLev)).toFixed(3);
                    totalclosingtobacco = (parseFloat(totalclosingtobacco) + parseFloat(data[i].closingtobacco)).toFixed(3);
                    totalclosingleaves = (parseFloat(totalclosingleaves) + parseFloat(data[i].closingleaves)).toFixed(3);

                    if (data[i].asalbiri == 0 && data[i].chatbiri == 0 && data[i].totalBiri == 0 && data[i].obtob == 0 && data[i].oblev == 0 && data[i].itob == 0 && data[i].ileave == 0 && data[i].TotalTobbaco == 0 && data[i].TotalLeaves && data[i].cTob == 0 && data[i].cLev == 0 && data[i].smLev == 0 && data[i].closingtobacco == 0 && data[i].closingleaves == 0) {

                    } else {
                        sr = sr + 1;
                        html += '<tr>' +
                            '<td>' + sr + '</td>' +
                            '<td>' + data[i].contractorname + '</td>' +
                            //  '<td>'+sr+'</td>'+
                            '<td style="text-align:right">' + data[i].asalbiri + '</td>' +
                            '<td  style="text-align:right">' + data[i].chatbiri + '</td>' +
                            '<td  style="text-align:right">' + data[i].totalBiri + '</td>' +
                            '<td  style="text-align:right">' + data[i].obtob + '</td>' +
                            '<td  style="text-align:right">' + data[i].oblev + '</td>' +
                            //'<td>'+data[i].obbags+'</td>'+
                            '<td  style="text-align:right">' + data[i].itob + '</td>' +
                            '<td  style="text-align:right">' + data[i].ileave + '</td>' +
                            //'<td>'+data[i].ibag+'</td>'+
                            '<td  style="text-align:right">' + data[i].TotalTobbaco + '</td>' +
                            '<td  style="text-align:right">' + data[i].TotalLeaves + '</td>' +
                            // '<td>'+data[i].TotalBag+'</td>'+
                            '<td  style="text-align:right">' + data[i].cTob + '</td>' +
                            '<td  style="text-align:right">' + data[i].cLev + '</td>' +
                            //'<td>'+data[i].cBag+'</td>'+
                            '<td  style="text-align:right">' + data[i].smTob + '</td>' +
                            '<td  style="text-align:right">' + data[i].smLev + '</td>' +
                            // '<td>'+data[i].smBag+'</td>'+
                            '<td  style="text-align:right">' + data[i].closingtobacco + '</td>' +
                            '<td  style="text-align:right">' + data[i].closingleaves + '</td>' +
                            '<td></td>' +
                            '</tr>';
                    }
                }
                html += '<tr>' +
                    '<td></td>' +
                    '<td  class="names">Total ===></td>' +
                    //  '<td>'+sr+'</td>'+
                    '<td style="text-align:right" class="names">' + totalaslbiri + '</td>' +
                    '<td style="text-align:right" class="names">' + totalchatbiri + '</td>' +
                    '<td style="text-align:right" class="names">' + totaltotalBiri + '</td>' +
                    '<td style="text-align:right" class="names">' + totalobtob + '</td>' +
                    '<td style="text-align:right" class="names">' + totaloblev + '</td>' +
                    //'<td>'+data[i].obbags+'</td>'+
                    '<td style="text-align:right" class="names">' + totalitob + '</td>' +
                    '<td style="text-align:right" class="names">' + totalileave + '</td>' +
                    //'<td>'+data[i].ibag+'</td>'+
                    '<td style="text-align:right" class="names">' + totalTotalTobbaco + '</td>' +
                    '<td style="text-align:right" class="names">' + totalTotalLeaves + '</td>' +
                    // '<td>'+data[i].TotalBag+'</td>'+
                    '<td style="text-align:right" class="names">' + totalcTob + '</td>' +
                    '<td style="text-align:right" class="names">' + totalcLev + '</td>' +
                    //'<td>'+data[i].cBag+'</td>'+
                    '<td style="text-align:right" class="names">' + totalsmTob + '</td>' +
                    '<td style="text-align:right" class="names">' + totalsmLev + '</td>' +
                    // '<td>'+data[i].smBag+'</td>'+
                    '<td style="text-align:right" class="names">' + totalclosingtobacco + '</td>' +
                    '<td style="text-align:right" class="names">' + totalclosingleaves + '</td>' +
                    '<td></td>' +
                    '</tr>';

                $('#tbody').html(html);
            },
            error: function() {

            }
        });
    });

    $(document).on('click', "#btnExportpdf", function(e) {
        e.preventDefault();
        Export1();
    });

    function Export1() {
        html2canvas($('#file_info')[0], {
            onrendered: function(canvas) {


                var data = canvas.toDataURL();
                var docDefinition = {
                    pageOrientation: 'landscape',
                    content: [{
                        image: data,
                        width: 750
                    }],

                };
                pdfMake.createPdf(docDefinition).download("Table.pdf");
            }
        })
    }

});