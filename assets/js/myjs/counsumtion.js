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
            name: "Consumtion Report",
            filename: "Consumtion Report",
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
        var fdate = fdate;
        var tdate = cdate;

        $.ajax({
            type: "POST",
            url: baseurl + "Consumtion_Report/showData",
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
                var batch = '';
                $('#tfoot').html('');
                var sumofnetbiri = 0;
                var sumoflev = 0;
                var sumoftob = 0;
                var sumofbly = 0;
                var sumofwhy = 0;
                var sumoffil = 0;
                for (var i = 0; i < data.length; i++) {
                    //if (cname == data[i].contractor) {
                    batch = data[i].batch;
                    sumofnetbiri = parseFloat(sumofnetbiri) + parseFloat(data[i].netbiri);
                    sumoflev = parseFloat(sumoflev) + parseFloat(data[i].leaves);
                    sumoftob = parseFloat(sumoftob) + parseFloat(data[i].tobacco);
                    sumofbly = parseFloat(sumofbly) + parseFloat(data[i].blackyarn);
                    sumofwhy = parseFloat(sumofwhy) + parseFloat(data[i].whiteyarn);
                    sumoffil = parseFloat(sumoffil) + parseFloat(data[i].filter);
                    cname = data[i].contractor;

                    dt = data[i].date.split('-');
                    dt = dt[2] + '-' + dt[1] + '-' + dt[0];

                    console.log(dt);
                    tbody += '<tr>' +
                        '<td>' + dt + '</td>' +
                        '<td>' + data[i].batch + '</td>' +
                        '<td style="text-align:right" class="texes">' + data[i].netbiri.toFixed(3) + '</td>' +
                        '<td style="text-align:right" class="texes">' + data[i].leaves.toFixed(3) + '</td>' +
                        '<td style="text-align:right" class="texes">' + data[i].tobacco.toFixed(3) + '</td>' +
                        '<td style="text-align:right" class="texes">' + data[i].blackyarn.toFixed(3) + '</td>' +
                        '<td style="text-align:right" class="texes">' + data[i].whiteyarn.toFixed(3) + '</td>' +
                        '<td style="text-align:right" class="texes">' + data[i].filter.toFixed(3) + '</td>' +
                        '</tr>';

                }
                $('#tbody').html(tbody);
                $.ajax({
                    type: "POST",
                    url: baseurl + "Consumtion_Report/getbatch",
                    data: {
                        fdate: fdate,
                        tdate: tdate,
                        table_name: table_name,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var data = eval(data);
                        console.log('Consumption:' + data);
                        var count = data.length;
                        console.log(count);
                        htm = '';
                        //htm+=;
                        var sumofasb = 0;
                        var sumofleaves = 0;
                        var sumoftobacco = 0;
                        var sumofblackyarn = 0;
                        var sumofwhiteyarn = 0;
                        var sumoffilter = 0;
                        for (i = 0; i < data.length; i++) {
                            console.log('sum:' + sumofasb + " " + 'asal:' + data[i].sumnetbiri);
                            sumofasb = parseFloat(sumofasb) + parseFloat(data[i].sumnetbiri);
                            sumofleaves = parseFloat(sumofleaves) + parseFloat(data[i].sumleaves);
                            sumoftobacco = parseFloat(sumoftobacco) + parseFloat(data[i].sumtobacco);
                            sumofblackyarn = parseFloat(sumofblackyarn) + parseFloat(data[i].sumblackyarn);
                            sumofwhiteyarn = parseFloat(sumofwhiteyarn) + parseFloat(data[i].sumwhiteyarn);
                            sumoffilter = parseFloat(sumoffilter) + parseFloat(data[i].sumfilter);
                            var batch = data[i].bat;
                            htm += '<tr class="names"><td>Sub Total--</td>' +
                                '<td class="boldness">' + data[i].bat + '</td>' +
                                '<td style="text-align:right" class="texes">' + data[i].sumnetbiri.toFixed(3) + '</td>' +
                                '<td style="text-align:right" class="texes">' + data[i].sumleaves.toFixed(3) + '</td>' +
                                '<td style="text-align:right" class="texes">' + data[i].sumtobacco.toFixed(3) + '</td>' +
                                '<td style="text-align:right" class="texes">' + data[i].sumblackyarn.toFixed(3) + '</td>' +
                                '<td style="text-align:right" class="texes">' + data[i].sumwhiteyarn.toFixed(3) + '</td>' +
                                '<td style="text-align:right" class="texes">' + data[i].sumfilter.toFixed(3) + '</td>' +
                                '<td></td></tr>';
                            console.log('asal:' + data[i].sumnetbiri);
                        }
                        htm += '<tr class="names "><td>Grand Total--</td><td></td>' +
                            '<td  style="text-align:right"  class="texes">' + sumofasb.toFixed(3) + '</td>' +
                            '<td  style="text-align:right"  class="texes">' + sumofleaves.toFixed(3) + '</td>' +
                            '<td  style="text-align:right"  class="texes">' + sumoftobacco.toFixed(3) + '</td>' +
                            '<td  style="text-align:right"  class="texes">' + sumofblackyarn.toFixed(3) + '</td>' +
                            '<td style="text-align:right"   class="texes">' + sumofwhiteyarn.toFixed(3) + '</td>' +
                            '<td  style="text-align:right"  class="texes">' + sumoffilter.toFixed(3) + '</td>' +

                            '<td></td>' +
                            '</tr>';
                        $('#tfoot').html(htm);
                    },
                    error: function() {}
                });
            }
        });
    });
});