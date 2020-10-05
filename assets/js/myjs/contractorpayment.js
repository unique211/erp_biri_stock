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

    $(document).on("submit", "#contractorpayment", function(e) {
        e.preventDefault();
        var sdate = $('#fdate').val();

        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Contractor_payment/showData",
            data: {

                fdate: fdate,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var html = "";

                var table = $('#dataTable').DataTable();
                table.destroy();
                $('#tbody').html('');
                var sr = 0;
                for (var i = 0; i < data.length; i++) {
                    var grosstotal = 0;
                    var lev = 0;
                    var tob = 0;
                    var blsutta = 0;
                    var whsutta = 0;
                    var bag = 0;
                    var dice = 0;
                    var tsort = 0;
                    var advance = 0;
                    var pf = 0;
                    var sumoftotal = 0;
                    var finalTot = 0;
                    var finalth = 0;
                    sr = sr + 1;
                    grosstotal = parseFloat(grosstotal) + parseFloat(data[i].gtotal.replace(/,/g, ""));


                    lev = parseFloat(lev) + parseFloat(data[i].tLev.replace(/,/g, ""));
                    tob = parseFloat(tob) + parseFloat(data[i].tTob.replace(/,/g, ""));
                    blsutta = parseFloat(blsutta) + parseFloat(data[i].blsutta.replace(/,/g, ""));
                    whsutta = parseFloat(whsutta) + parseFloat(data[i].whsutta.replace(/,/g, ""));
                    bag = parseFloat(bag) + parseFloat(data[i].bags.replace(/,/g, ""));
                    dice = parseFloat(dice) + parseFloat(data[i].dice.replace(/,/g, ""));
                    tsort = parseFloat(tsort) + parseFloat(data[i].tsort.replace(/,/g, ""));
                    advance = parseFloat(advance) + parseFloat(data[i].advance.replace(/,/g, ""));
                    pf = parseFloat(pf) + parseFloat(data[i].pf.replace(/,/g, ""));

                    sumoftotal = parseFloat(lev) + parseFloat(tob) + parseFloat(blsutta) + parseFloat(whsutta) + parseFloat(bag) + parseFloat(dice) + parseFloat(tsort) + parseFloat(advance) + parseFloat(pf);
                    finalTot = grosstotal - sumoftotal;

                    var amountth = (finalTot - (finalTot % 1000));

                    //var amountth = amountth + "000";
                    //finalth = (parseFloat(finalTot) / parseFloat(1000)).toFixed(3);

                    html += '<tr class="names">' +
                        '<td style="text-align:center;">' + sr + '</td>' +
                        '<td style="text-align:left;">' + data[i].ifsc + '</td>' +

                        '<td style="text-align:left;">' + data[i].bankac + '</td>' +
                        '<td style="text-align:left;">' + data[i].conname + '</td>' +
                        '<td style="text-align:left;"><select class="checkpayment" id="pay_' + data[i].id + '"><option value="select">Select</option><option value="yes">Yes</option><option value="no">No</option></select></td>' +
                        '<td style="text-align:right;">' + Math.round(finalTot).toFixed(2) + '</td>' +

                        '<td style="text-align:right;">' + Math.round(amountth) + '</td>' +

                        '</tr>';
                }
                $('#tbody').html(html);
                $('#dataTable').DataTable({
                    "pageLength": 200,
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            // orientation: 'landscape',
                            title: 'Contractor Payment List',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 6]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Contractor Payment List',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 6]
                            },
                        }
                    ]
                });


            }
        });
    });

    $(document).on("change", ".checkpayment", function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var val = $(this).val();
        var sdate = $('#fdate').val();
        id = id.split("_");
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        if (val == "yes") {
            $.ajax({
                type: "POST",
                url: baseurl + "Contractor_payment/storepayment",
                data: {

                    fdate: fdate,
                    id: id[1],
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    successTost("Data Save Successfully");

                }

            });
        }
    });

    $("#btnExport").click(function() {
        $("#dataTable").table2excel({
            exclude: ".noExl",
            name: "Contractor Trial Report",
            filename: "Contractor Trial Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });


});