$(document).ready(function() {
    var table_name = "item_master";
    var date = new Date();
    var fromdate = date.toString('dd/MM/yyyy');
    var todate = date.toString('dd/MM/yyyy');
    datashow(fromdate, todate);
    $(document).on('change', '#type', function() {
        var type = $('#type').val();
        if (type == 'Payment') {
            $('#file_info').hide();
            $('#hide').show();
            var table_name = "con-party_master";
            var ledger = "ledger";
            html = '';
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getnamebywhere",
                data: {
                    table_name: table_name,
                    ledger: ledger,
                    where: 'bank_account',
                    where1: 'cash_in_hand'
                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log("Name is: " + data);
                    //alert("success");
                    html = '';
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        html += '<option value="' + id + '">' + name + '</option>';
                        //alert(id);
                    }
                    $('#from').html(html);
                },
                error: function() {
                    errorTost("errror");
                }
            });
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getname",
                data: {
                    table_name: table_name,
                    ledger: ledger
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    //alert("success");
                    html = '';
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        html += '<option value="' + id + '">' + name + '</option>';
                        //alert(id);
                    }
                    $('#to').html(html);
                },
                error: function() {
                    errorTost("errror");
                }
            });
        } else if (type == 'Received') {
            $('#file_info').hide();
            $('#hide').show();
            var table_name = "con-party_master";
            var ledger = "ledger";
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getnamebywhere",
                data: {
                    table_name: table_name,
                    ledger: ledger,
                    where: 'bank_account',
                    where1: 'cash_in_hand'
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    console.log("Name is: " + data);
                    //alert("success");
                    html = '';
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        html += '<option value="' + id + '">' + name + '</option>';
                        //alert(id);
                    }
                    $('#to').html(html);
                },
                error: function() {
                    errorTost("errror");
                }
            });

            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getname",
                data: {
                    table_name: table_name,
                    ledger: ledger
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    //alert("success");
                    html = '';
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                    $('#from').html(html);
                },
                error: function() {
                    errorTost("errror");
                }
            });
        } else if (type == 'Journal') {
            $('#file_info').hide();
            $('#hide').show();
            var table_name = "con-party_master";
            var ledger = "ledger";
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getname",
                data: {
                    table_name: table_name,
                    ledger: ledger
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    //alert("success");
                    html = '';
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                    $('#to').html(html);
                    $('#from').html(html);
                },
                error: function() {
                    errorTost("errror");
                }
            });
        } else if (type == 'Contractor') {
            $('#to').val('');
            //$('#from').val('');
            $('#amount').val('0');
            $('#remark').val('')
            $('#hide').hide();
            $('#file_info').show();
            //$('#hide').show();
            var table_name = "con-party_master";
            var ledger = "ledger";
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getnamebywhere",
                data: {
                    table_name: table_name,
                    ledger: ledger,
                    where: 'bank_account',
                    where1: 'cash_in_hand'
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    console.log("Name is: " + data);
                    //alert("success");
                    html = '';
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        html += '<option value="' + id + '">' + name + '</option>';
                        //alert(id);
                    }
                    $('#from').html(html);
                },
                error: function() {
                    errorTost("errror");
                }
            });
            var table_name = "con-party_master";
            var contractor = "contractor";
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/getparty",
                data: {
                    table_name: table_name,
                    contractor: contractor
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var rowid = $('#row').val();
                    var row_id = parseInt(rowid) + 1;
                    // alert("success");
                    head = '';
                    body = '';
                    foot = '';
                    $(document).on("blur", ".amount", function() {
                        // alert("HEy");
                        getTotal();
                    });
                    html = '';
                    htm = '';
                    head += '<tr>' +
                        '<th style="display:none">ID</th>' +
                        '<th>Name</th>' +
                        '<th>Amount</th>' +
                        '<th>Remark</th>' +
                        '</tr>';
                    $('#thead').html(head);
                    for (i = 0; i < data.length; i++) {
                        var row = data[i].id;
                        body += '<tr id="' + row + '">' +
                            '<td hidden id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="name_' + row + '">' + data[i].name + '</td>' +
                            '<td id="amount1_' + row + '"><input type="text" class="form-control amount" value="0" style="width:65%;" name="amount"/></td>' +
                            '<td id="remark1_' + row + '"><input type="text" class="form-control" name="remark"/></td>' +
                            '</tr>';
                    }
                    foot += '<tr><td>Total:</td><td id="total">0</td><td></td></tr>';
                    $('#tbody').html(body);
                    $('#tfoot').html(foot);
                },
                error: function() {
                    errorTost("errror");
                }
            });
            //$('#file_info').html(htm);
        } else {
            html = '';
            html += '<option value=""selected disabled >--Select--</option>';
            $('#to').html(html);
            $('#from').html(html);
        }
    });
    //$('#')
    function getTotal() {
        var r1 = $('#file_info').find('tbody').find('tr');
        var r = r1.length;
        totalamt = 0;
        var cartons = 0;
        $('#file_info tr .amount').each(function() {
            cartons = $(this).val();
            if (cartons == "") {
                cartons = 0;
            }
            totalamt = parseFloat(totalamt) + parseFloat(cartons);
        });
        $('#total').html(totalamt);

    }
    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        //alert(id);
        var date = $('#date').val();
        var type = $('#type').val();
        var from = $('#from').val();
        var to = $('#to').val();
        var amount = $('#amount').val();
        var remark = $('#remark').val();
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var table_name = 'vouchar';
        //alert(cdate+" / "+type+" / "+from+" / "+to+" / "+amount+" / "+remark);
        $.ajax({
            type: "POST",
            url: baseurl + "Vouchar/addData",
            data: {
                id: id,
                date: cdate,
                type: type,
                from: from,
                to: to,
                amount: amount,
                remark: remark,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                if (type == 'Contractor') {
                    id1 = id;
                    var refid;
                    console.log(data);
                    if (data == true) {
                        refid = id1;
                    } else {
                        refid = data;
                    }
                    var r1 = $('table#file_info').find('tbody').find('tr');
                    var r = r1.length;
                    for (var i = 0; i < r; i++) {

                        //alert(refid+" ID "+id);
                        name = $(r1[i]).find('td:eq(0)').html();
                        amount = $(r1[i]).find("td:eq(2) input[type='text']").val();
                        remark = $(r1[i]).find('td:eq(3)  input[type="text"]').val();

                        $.ajax({
                            type: "POST",
                            url: baseurl + "Vouchar/addData",
                            data: {
                                id: id,
                                refid: refid,
                                name: name,
                                amount: amount,
                                remark: remark,
                                table_name: 'information'
                            },
                            dataType: 'json',
                            async: false,
                            success: function(data) {
                                successTost("Data Saved Successfully");

                            },
                            error: function() {
                                errorTost("error from success");
                            }
                        });
                    }
                } else {
                    successTost('Operation Successfull');
                }
                $('#master_form')[0].reset();
                $('#save_update').val("");
                $('#saveupdate').val("");
                $(".btnhideshow").show();
                $(".tablehideshow").show();
                $(".formhideshow").hide();
                $('#file_infobody').html('');
                $('#file_info').hide();
                $('#hide').show();
                $('.doj').datepicker({
                    'todayHighlight': true,
                });
                var date = new Date();
                date = date.toString('dd/MM/yyyy');
                $("#date").val(date);
                datashow(fromdate, todate);

            },
            error: function() {
                errorTost("Error");
            }

        });

    });
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('#saveupdate').val("");
        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#file_infobody').html('');
        $('#file_info').hide();
        $('#hide').show();
        $('.doj').datepicker({
            'todayHighlight': true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
        $("#date").val(date);

        $('#tbody').html(body);
        $('#tfoot').html(foot);
    });

    $(document).on("submit", "#search_form", function(e) {
        e.preventDefault();
        var fdate = $('#fromdate').val();
        var fdateslt = fdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        fromdate = fdate;

        var tdate = $('#todate').val();
        var fdateslt = tdate.split('/');
        var tdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        todate = tdate;
        datashow(fdate, tdate);
    });

    //----------------------submit form code end------------------------------

    //----------------show data in the tabale code start-----------------------
    function datashow(fromdate, todate) {
        var table_name = 'vouchar';
        $.ajax({
            type: "POST",
            url: baseurl + "Vouchar/showData",
            data: {
                table_name: table_name,
                fromdate: fromdate,
                todate: todate,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);

                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Id</font></th>' +
                    '<th><font style="font-weight:bold">Date</font></th>' +
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th hidden><font style="font-weight:bold">From1</font></th>' +
                    '<th><font style="font-weight:bold">From</font></th>' +
                    '<th hidden><font style="font-weight:bold">To1</font></th>' +
                    '<th><font style="font-weight:bold">To</font></th>' +
                    '<th><font style="font-weight:bold">Amount</font></th>' +
                    '<th><font style="font-weight:bold">Remark</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody >';
                for (var i = 1; i < data.length; i++) {
                    var fdateslt = data[i].date.split('-');
                    var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="date_' + data[i].id + '">' + cdate + '</td>' +
                        '<td id="type_' + data[i].id + '">' + data[i].type + '</td>' +
                        '<td hidden id="from_' + data[i].id + '">' + data[i].from + '</td>' +
                        '<td>' + data[i].contractor + '</td>' +
                        '<td hidden id="to_' + data[i].id + '">' + data[i].to + '</td>' +
                        '<td >' + data[i].tcontractor + '</td>' +
                        '<td id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                        '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }

                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            //orientation: 'landscape',
                            title: 'DB Stock-Voucher Entry',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Voucher Entry',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            },
                        }
                    ]
                });

            }

        });

    }
    //------------------show data in the tabale code end-----------------------------------------------

    //-----------------------delete data code start-----------------------------------


    $(document).on('click', '.delete_data', function() {
        var table_name = 'vouchar';
        var id1 = $(this).attr('id');
        // alert(id1);
        if (id1 != "") {
            swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this Data !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    closeOnConfirm: false
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "Vouchar/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {
                            var table_name = 'information';
                            $.ajax({
                                type: "POST",
                                url: baseurl + "Vouchar/deletedata",
                                dataType: "JSON",
                                data: {
                                    id: id1,
                                    table_name: table_name,
                                },
                                success: function(data) {
                                    if (data == true) {
                                        swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                        $('.closehideshow').trigger('click');
                                        $('#save_update').val("");
                                        datashow(fromdate, todate);
                                        //call function show all data	
                                    } else {
                                        errorTost("Data Delete Failed");
                                    }
                                }
                            });
                        }
                    });
                    return false;

                });

        }


    });
    //-----------------------delete data code end-----------------------------------
    //-----------------------edit data code start-----------------------------------
    $(document).on("click", ".edit_data", function() {

        $('.formhideshow').show();
        $('.tablehideshow').show();
        $(".btnhideshow").hide();

        // $('#btnsave').text('Update');

        var id = $(this).attr('id');
        //alert(id);
        $('#save_update').val(id);
        var type = $('#type_' + id).html();
        if (type == 'Contractor') {

            //alert("From IF");
            $('#amount').val('');
            $('#remark').val('');
            var date = $('#date_' + id).html();
            var from = $('#from_' + id).html();

            $('#date').val(date);
            $('#type').val(type).trigger('change');
            $('#from').val(from);

            var table_name = 'information';
            $.ajax({
                type: "POST",
                url: baseurl + "Vouchar/showData",
                data: {
                    id: id,
                    table_name: table_name,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    //console.log('data'+data[0].refid);
                    var data = eval(data);
                    head = '';
                    body = '';
                    foot = '';
                    $(document).on("blur", ".amount", function() {
                        // alert("HEy");

                    });
                    head += '<tr>' +
                        '<th style="display:none">Id</th>' +
                        '<th>Name</th>' +
                        '<th>Amount</th>' +
                        '<th>Remark</th>' +
                        '</tr>';
                    $('#thead').html(head);
                    var amt = 0;
                    for (i = 0; i < data.length; i++) {
                        var row = data[i].id;
                        amt = parseFloat(amt) + parseFloat(data[i].amount);
                        body += '<tr id="' + row + '">' +
                            '<td hidden id="id_' + row + '">' + data[i].name + '</td>' +
                            '<td id="name_' + row + '">' + data[i].contractor + '</td>' +
                            '<td id="amount1_' + row + '"><input type="text" class="form-control amount" style="width:65%;" value="' + data[i].amount + '" name="amount"/></td>' +
                            '<td id="remark1_' + row + '"><input type="text" class="form-control" value="' + data[i].remark + '" name="remark"/></td></tr>';;
                    }

                    foot += '<tr><td>Total:</td><td id="total">0</td><td></td></tr>';
                    $('#tbody').html(body);
                    $('#tfoot').html(foot);
                    console.log("Total " + amt);
                    getTotal();
                },
                error: function() {
                    errorTost("Error in code");
                }
            });

        } else {

            //alert("From else");
            $('#file_info').hide();
            $('#hide').show();
            $('#type').val(type).trigger('change');
            var date = $('#date_' + id).html();
            var from = $('#from_' + id).html();
            var to = $('#to_' + id).html();
            var amount = $('#amount_' + id).html();
            var remark = $('#remark_' + id).html();
            $('#date').val(date);
            $('#type').val(type).trigger('change');
            $('#from').val(from);
            $('#to').val(to);
            $('#amount').val(amount);
            $('#remark').val(remark);
        }



    });
});