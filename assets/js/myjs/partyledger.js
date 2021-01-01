$(document).ready(function() {
    $("#btnExport").click(function() {
        $("#file_info").table2excel({
            exclude: ".noExl",
            name: "Contractor Ledger",
            filename: "Contractor Ledger",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });

    getDate();
    var fromdate1 = "";

    function getDate() {
        $.ajax({
            type: "POST",
            url: baseurl + "Contractor_ledger/getdata",
            data: {
                table_name: 'financial_period'
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                var fdateslt = data[0].psdate.split('-');
                var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                var fdateslt = data[0].pedate.split('-');
                var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                fromdate1 = fdate;

                $('#fdate').val(fdate);
                $('#date').val(cdate);
            },
            error: function() {
                errorTost("Error");
            }
        });
    }


    $.ajax({
        type: 'POST',
        url: baseurl + "company/get_master",
        async: false,
        dataType: 'json',
        success: function(data) {
            $('#companynm').html(data[0].company_name);
            $('#comaddress').html(data[0].address);
        }
    });



    $('#search').on('click', function() {
        var table_name = 'con-party_master';
        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var contractor = $('#contractor').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];





        $.ajax({
            type: "POST",
            url: baseurl + "Party_ledger/showData",
            data: {
                table_name: table_name,
                where: contractor,
                fdate: fdate,
                date: cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                $('#tfoot').html('');
                $('#tbody').html('');
                var html = "";
                var totaldebit = 0;
                var totalcredit = 0;
                var totalbalance = 0;




                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    totaldebit = (parseFloat(data[i].debit) + parseFloat(totaldebit)).toFixed(2);
                    totalcredit = (parseFloat(data[i].credit) + parseFloat(totalcredit)).toFixed(2);

                    html += '<tr>' +
                        '<td id="date_' + data[i].ref_id + '">' + date + '</td>' +
                        '<td id="batch_' + data[i].ref_id + '">' + data[i].description + '</td>' +
                        '<td style="text-align:right;" id="cartons_' + data[i].ref_id + '">' + (data[i].debit).toFixed(2) + '</td>' +
                        '<td style="text-align:right;" id="total_bidi_' + data[i].ref_id + '">' + (data[i].credit).toFixed(2) + '</td>' +
                        '<td style="text-align:right;"  id="ref_id_' + data[i].id + '">' + (data[i].balance).toFixed(2) + '</td>' +

                        '</tr>';
                }
                $('#tbody').html(html);
                totalbalance = (parseFloat(totaldebit) - parseFloat(totalcredit)).toFixed(2);

                var html1 = '<tr>' +
                    '<td></td>' +
                    '<td><b>Total</b></td>' +
                    '<td style="text-align:right;" ><b>' + totaldebit + '</b></td>' +
                    '<td style="text-align:right;" ><b>' + totalcredit + '</b></td>' +
                    '<td style="text-align:right;" ><b>' + totalbalance + '</b></td>' +

                    '</tr>';
                $('#tfoot').html(html1);



            },
            error: function() {
                errorTost("Error");
            }
        });
    });

    $(document).on('change', "#contractor", function(e) {
        var con = $(this).val();
        $.ajax({
            type: 'POST',
            url: baseurl + "Party_ledger/getpartyinfo",
            data: {
                con: con,
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('#partydata').html("Party Name & Address:" + data[0].name + "," + data[0].address + "," + data[0].postoffice + "," + data[0].district + "," + data[0].pin);

            }
        });



    });

    $(document).on('click', "#btnExportpdf", function(e) {
        e.preventDefault();
        Export1();
    });


    function Export1() {
        html2canvas($('#dataTable')[0], {
            onrendered: function(canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("Contractorledger.pdf");
            }
        })
    }

    // $(document).on('change', "#contractor", function(e) {
    //     e.preventDefault();

    //     var con = $(this).val();

    //     $.ajax({
    //         type: "POST",
    //         url: baseurl + "Contractor_ledger/getpayinfo",
    //         data: {
    //             table_name: 'financial_period',
    //             con: con,
    //         },
    //         dataType: "JSON",
    //         async: false,
    //         success: function(data) {
    //             if (data != "") {
    //                 var fdateslt = data.split('-');
    //                 var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

    //                 $('#fdate').val(fdate);
    //             } else {

    //                 getDate();
    //             }
    //         }
    //     });
    // });



});