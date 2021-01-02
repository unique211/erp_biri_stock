$(document).ready(function() {
    var table_name = "weekly_adjustment";

    defaultdate();

    function defaultdate() {
        var table_name = "financial_period";

        $.ajax({
            type: "POST",
            url: baseurl + "Weekly_adjustment/showdata",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].psdate;
                    var fdateslt = fdateval.split('-');
                    var edate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].pedate;
                    var fdateslt = fdateval.split('-');
                    var tdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    $('#edate').val(edate);
                    $('#tdate').val(tdate);
                }

            }
        });

    }

    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");

        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        //window.location.reload();
        defaultdate();
    });




    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var entry_date1 = $('#edate').val();
        var to_date1 = $('#tdate').val();
        var qty = $('#qty').val();
        var id = $('#save_update').val();

        var fdateslt = entry_date1.split('/');
        var entry_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = to_date1.split('/');
        var to_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        var flg = 0;

        if (create_p > 0) {
            flg = 1;
        } else if (editrt > 0) {
            if (id > 0) {
                flg = 1;
            }
        }

        if (flg == 1) {

            $.ajax({
                type: "POST",
                url: baseurl + "Weekly_adjustment/adddata",

                data: {
                    id: id,
                    entry_date: entry_date,
                    to_date: to_date,
                    qty: qty,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    if (data == true) {
                        if (id != "") {
                            successTost("Data Update Successfully");
                        } else {
                            successTost("Data Save Successfully");
                        }
                        $('#master_form')[0].reset();
                        $('.formhideshow').hide();
                        $('.tablehideshow').show();
                        $(".btnhideshow").show();
                        datashow();
                        $('.closehideshow').trigger('click');
                    } else {
                        errorTost("Data Cannot Save");
                    }


                }

            });
        } else {
            swal("You Not Have This Permission!", "success");
        }
    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Weekly_adjustment/showdata",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                var sr = 0;

                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Id</font></th>' +
                    '<th><font style="font-weight:bold">Entry Date</font></th>' +
                    '<th><font style="font-weight:bold">From Date</font></th>' +
                    '<th><font style="font-weight:bold">Item Quantity</font></th>' +
                    '<th><font style="font-weight:bold">Operations </font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].entry_date;
                    var fdateslt = fdateval.split('-');
                    var entry = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].to_date;
                    var fdateslt = fdateval.split('-');
                    var to = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    sr = parseFloat(sr) + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td id="entry_' + data[i].id + '">' + entry + '</td>' +
                        '<td id="to_' + data[i].id + '">' + to + '</td>' +
                        '<td id="qty_' + data[i].id + '">' + data[i].qty + '</td>' +
                        // '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '<td class="not-export-column" >';
                    if (editrt == 1) {
                        html += '<button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>';
                    }
                    if (delrt == 1) {
                        html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>';
                    }
                    html += '</td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                if (export_p == 1) {
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdfHtml5',
                                pageSize: 'A4',
                                //orientation: 'landscape',
                                title: 'DB Stock-Weekly Received Adjustment',
                                exportOptions: {
                                    columns: [0, 1, 2, 3]
                                },
                            },
                            {
                                extend: 'excelHtml5',
                                title: 'DB Stock-Weekly Received Adjustment',
                                exportOptions: {
                                    columns: [0, 1, 2, 3]
                                },
                            }
                        ]
                    });
                } else {
                    $('#myTable').DataTable({});
                }

            }

        });

    }
    //------------------show data in the tabale code end-----------------------------------------------

    //-----------------------delete data code start-----------------------------------


    $(document).on('click', '.delete_data', function() {

        var id1 = $(this).attr('id');



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
                        url: baseurl + "Weekly_adjustment/deletedata",
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
                                datashow();; //call function show all data	


                            } else {
                                errorTost("Data Delete Failed");
                            }

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

        $('#btnsave').text('Update');

        var id = $(this).attr('id');

        var entry = $('#entry_' + id).html();
        var to = $('#to_' + id).html();
        var qty = $('#qty_' + id).html();


        $('#edate').val(entry);
        $('#tdate').val(to);
        $('#qty').val(qty);

        $('#save_update').val(id);


    });
});