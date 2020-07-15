$(document).ready(function() {
    setdate();

    function setdate() {
        $.ajax({
            type: "POST",
            url: baseurl + "Issue_Report/setDate",
            data: {
                table_name: 'financial_period',
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                data = data.split('-');
                data = data[2] + '/' + data[1] + '/' + data[0];
                $('#fdate').val(data);
            }
        });
    }

    $("#btnExport").click(function() {
        $("#file_info").table2excel({
            exclude: ".noExl",
            name: "Issue Report",
            filename: "Issue Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    $('#search').click(function() {
        var table_name = 'con-party_master';
        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var where = fdate;
        var tdate = cdate;
        $.ajax({
            type: "POST",
            url: baseurl + "Issue_Report/showData",
            data: {
                table_name: table_name,
                fdate: fdate,
                tdate: cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                var tbody;
                var cname = '';
                console.log(data);
                $('#tbody').html('');
                $('#tfoot').html('');
                for (var i = 0; i < data.length; i++) {
                    if (cname == data[i].contractor) {
                        cname = data[i].contractor;
                        if (data[i].tobacco == 0 && data[i].tob_bag == 0 && data[i].leaves == 0 && data[i].leaves_bag == 0 && data[i].bl_yarn == 0 && data[i].wh_yarn == 0 && data[i].filter == 0 && data[i].disc == 0 && data[i].other == 0) {

                        } else {
                            tbody += '<tr>' +
                                '<td></td>' + //' + data[i].contractor + '
                                '<td>' + data[i].batch + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].tobacco + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].tob_bag + '</td>' +
                                '<td  style="text-align:right;" class="texes">' + data[i].leaves + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].leaves_bag + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].bl_yarn + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].wh_yarn + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].filter + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].disc + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].other + '</td>' +
                                '</tr>';
                        }
                    } else {
                        cname = data[i].contractor;
                        if (data[i].tobacco == 0 && data[i].tob_bag == 0 && data[i].leaves == 0 && data[i].leaves_bag == 0 && data[i].bl_yarn == 0 && data[i].wh_yarn == 0 && data[i].filter == 0 && data[i].disc == 0 && data[i].other == 0) {

                        } else {
                            tbody += '<tr>' +
                                '<td>' + data[i].contractor + '</td>' +
                                '<td>' + data[i].batch + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].tobacco + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].tob_bag + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].leaves + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].leaves_bag + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].bl_yarn + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].wh_yarn + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].filter + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].disc + '</td>' +
                                '<td style="text-align:right;" class="texes">' + data[i].other + '</td>' +
                                '</tr>';
                        }
                    }

                }
                $('#tbody').html(tbody);
                var batch = '';
                var abidi = 0;
                var cbidi = 0;
                var cbidikg = 0;
                var tob = 0;
                var tbag = 0;
                var lev = 0;
                var lbag = 0;
                var by = 0;
                var wy = 0;
                var fil = 0;
                var dis = 0;
                var carton = 0;
                var htm = '';
                $.ajax({
                    type: "POST",
                    url: baseurl + "Issue_Report/getbatch",
                    data: {
                        where: where,
                        tdate: tdate,
                        table_name: table_name,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        //var data = eval(data);
                        console.log(data);
                        var count = data.length;
                        console.log(count);
                        html = '';
                        //htm+=;
                        var sumoftob = 0;
                        var sumoftobbag = 0;
                        var sumofleaves = 0;
                        var sumofleavesbag = 0;
                        var sumofbl = 0;
                        var sumofwh = 0;
                        var sumofother = 0;
                        var sumofdisc = 0;
                        var sumoffil = 0;
                        for (i = 0; i < data.length; i++) {
                            sumoftob = parseFloat(sumoftob) + parseFloat(data[i].tob);
                            sumoftobbag = parseFloat(sumoftobbag) + parseFloat(data[i].tob_bag);
                            sumofleaves = parseFloat(sumofleaves) + parseFloat(data[i].leaves);
                            sumofleavesbag = parseFloat(sumofleavesbag) + parseFloat(data[i].leaves_bag);
                            sumofbl = parseFloat(sumofbl) + parseFloat(data[i].bl_yarn);
                            sumofwh = parseFloat(sumofwh) + parseFloat(data[i].wh_yarn);
                            sumoffil = parseFloat(sumoffil) + parseFloat(data[i].filter);
                            sumofdisc = parseFloat(sumofdisc) + parseFloat(data[i].disc);
                            sumofother = parseFloat(sumofother) + parseFloat(data[i].cartons);
                            htm += '<tr class="names texes"><td>Sub Total--</td>' +
                                '<td class="boldness">' + data[i].batch + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].tob + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].tob_bag + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].leaves + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].leaves_bag + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].bl_yarn + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].wh_yarn + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].filter + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].disc + '</td>' +
                                '<td style="text-align:right;" class="boldness">' + data[i].cartons + '</td>' +
                                '<td class="boldness"></td></tr>';
                            // console.log(htm);
                        }
                        htm += '<tr class="names texes"><td>Grand Total--</td><td></td>' +
                            '<td style="text-align:right;">' + sumoftob.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumoftobbag.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumofleaves.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumofleavesbag.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumofbl.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumofwh.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumoffil.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumofdisc.toFixed(3) + '</td>' +
                            '<td style="text-align:right;">' + sumofother.toFixed(3) + '</td>' +
                            '</tr>';
                        //$('#TRS').append(html);
                        $('#tfoot').append(htm);
                        $('.TRS').insertBefore('#total');
                        //$('#TRS').insertBefore('#total');
                    },
                    error: function() {
                        //alert("Error");
                    }
                });
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
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("Issuereport.pdf");
            }
        })
    }

});