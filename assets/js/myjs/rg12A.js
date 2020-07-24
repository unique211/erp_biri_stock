$(document).ready(function() {

    getdate();
    /*---------for getting data  ------------*/
    function getdate() {

        $.ajax({
            type: "POST",
            url: baseurl + "Rg12A/getfinacialdate",
            data: {

            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                if (data[0].fsdate != null) {
                    var fdateval = data[0].fsdate;
                    var fdateslt = fdateval.split('-');
                    var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    $("#fdate").val(fdate);

                }
            }
        });
    }

    $('#search').click(function() {

        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Rg12A/getsumofitem",
            data: {
                fdate: fdate,
                cdate: cdate,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                $('#tbody').html('');
                var html = "";
                var cdate = "";
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



                        // console.log(closeingloosepcsum+""+closeinglableboxsum+""+closeinglablepcsum);
                        html = '<tr class="names">' +
                            '<td  class="texes">' + cdate + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].loosepcs)).toFixed(3) + '</td>' +
                            '<td class="texes">' + opninglablebox + '</td>' +
                            '<td class="texes">' + (parseFloat(opninglablepcs)).toFixed(3) + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].reciveloosepc)).toFixed(3) + '</td>' +
                            '<td class="texes">' + receivelablebox + '</td>' +
                            '<td class="texes">' + (parseFloat(receivelablepcs)).toFixed(3) + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].totallosebalnce)).toFixed(3) + '</td>' +
                            '<td class="texes">' + data[i].totallablebox + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].totallabelinpc)).toFixed(3) + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].saleloses)).toFixed(3) + '</td>' +
                            '<td class="texes">' + salelablebox + '</td>' +
                            '<td class="texes">' + (parseFloat(salelablepcs)).toFixed(3) + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].closingloosepc)).toFixed(3) + '</td>' +
                            '<td class="texes">' + data[i].closinglabel + '</td>' +
                            '<td class="texes">' + (parseFloat(data[i].closingbalancelableinpc)).toFixed(3) + '</td>' +
                            '</tr>';

                        /* htm += '<tr class="names">'+
                         '<td  class="texes">' + data[i].date + '</td>' +
                         '<td class="texes">' + data[i-1].loosepcs + '</td>' +
                         '<td class="texes">' + data[i-1].opninglable + '</td>' +
                         '<td class="texes">' + data[i-1].alltotal + '</td>' +
                         '<td class="texes">' + data[i].reciveloosepc + '</td>' +
                         '<td class="texes">' + data[i].receivelable + '</td>' +
                         '<td class="texes">' + data[i].receivepcs + '</td>' +
                         '<td class="texes">' + data[i].totallosebalnce + '</td>' +
                         '<td class="texes">' + data[i].totallablebox + '</td>' +
                         '<td class="texes">' + data[i].totallabelinpc + '</td>' +
                         '<td class="texes">' + data[i].saleloses + '</td>' +
                         '<td class="texes">' + data[i].saleslablebox + '</td>' +
                         '<td class="texes">' + data[i].saleslableinpcs + '</td>' +
                         '<td class="texes">' + data[i].closingloosepc + '</td>' +
                         '<td class="texes">' + data[i].closinglabel + '</td>' +
                         '<td class="texes">' + data[i].closingbalancelableinpc + '</td>' +
                         '</tr>';  
                        }*/

                        $('#tbody').append(html);
                    }
                    var thtml = '<tr class="names">' +
                        '<td  class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '</tr>' +
                        '<tr class="names">' +
                        '<td  class="texes">Total</td>' +
                        '<td  class="texes">' + opningloosepcsum + '</td>' +
                        '<td class="texes">' + opninglableboxsum + '</td>' +
                        '<td class="texes">' + opninglablepcsum + '</td>' +
                        '<td class="texes">' + recriveloosepcsum + '</td>' +
                        '<td class="texes">' + recrivelableboxsum + '</td>' +
                        '<td class="texes">' + recrivelablepcsum + '</td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes"></td>' +
                        '<td class="texes">' + salesloosepcsum + '</td>' +
                        '<td class="texes">' + saleslableboxsum + '</td>' +
                        '<td class="texes">' + saleslablepcsum + '</td>' +
                        '<td class="texes">' + closeingloosepcsum + '</td>' +
                        '<td class="texes">' + closeinglableboxsum + '</td>' +
                        '<td class="texes">' + closeinglablepcsum + '</td>' +

                        '</tr>';
                    $('#tfoot').append(thtml);
                }
            }
        });

    });
    $("#btnExport").click(function() {
        $("#file_info").table2excel({
            exclude: ".noExl",
            name: "Recieved Report",
            filename: "Recieved Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });


});