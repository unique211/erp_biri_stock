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


    $.ajax({
        type: 'POST',
        url: baseurl + "company/get_master",
        async: false,
        dataType: 'json',
        success: function(data) {
            $('#companynm').html(data[0].company_name);
        }
    });


    $('#search').click(function() {
        var table_name = 'con-party_master';
        var sdate = $('#fdate').val();
        var date = $('#date').val();

        $('#dfromdate').html(sdate)
        $('#dtodate').html(date)

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


                    totalaslbiri = (parseFloat(totalaslbiri) + parseFloat((data[i].asalbiri).replace(/,/g, ""))).toFixed(3);
                    totalchatbiri = (parseFloat(totalchatbiri) + parseFloat((data[i].chatbiri).replace(/,/g, ""))).toFixed(3);
                    totaltotalBiri = (parseFloat(totaltotalBiri) + parseFloat((data[i].totalBiri).replace(/,/g, ""))).toFixed(3);
                    totalobtob = (parseFloat(totalobtob) + parseFloat((data[i].obtob).replace(/,/g, ""))).toFixed(3);
                    totaloblev = (parseFloat(totaloblev) + parseFloat((data[i].oblev).replace(/,/g, ""))).toFixed(3);
                    totalitob = (parseFloat(totalitob) + parseFloat((data[i].itob).replace(/,/g, ""))).toFixed(3);
                    totalileave = (parseFloat(totalileave) + parseFloat((data[i].ileave).replace(/,/g, ""))).toFixed(3);
                    totalTotalTobbaco = (parseFloat(totalTotalTobbaco) + parseFloat((data[i].TotalTobbaco).replace(/,/g, ""))).toFixed(3);
                    totalTotalLeaves = (parseFloat(totalTotalLeaves) + parseFloat((data[i].TotalLeaves).replace(/,/g, ""))).toFixed(3);
                    totalcTob = (parseFloat(totalcTob) + parseFloat((data[i].cTob).replace(/,/g, ""))).toFixed(3);
                    totalcLev = (parseFloat(totalcLev) + parseFloat((data[i].cLev).replace(/,/g, ""))).toFixed(3);
                    totalsmTob = (parseFloat(totalsmTob) + parseFloat((data[i].smTob).replace(/,/g, ""))).toFixed(3);
                    totalsmLev = (parseFloat(totalsmLev) + parseFloat((data[i].smLev).replace(/,/g, ""))).toFixed(3);
                    totalclosingtobacco = (parseFloat(totalclosingtobacco) + parseFloat((data[i].closingtobacco).replace(/,/g, ""))).toFixed(3);
                    totalclosingleaves = (parseFloat(totalclosingleaves) + parseFloat((data[i].closingleaves).replace(/,/g, ""))).toFixed(3);

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
        $('#file_info').css('width:80%');
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
        $('#file_info').css('width:90%');
    }

});
