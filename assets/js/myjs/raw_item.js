$(document).ready(function() {
    var table_name = "raw_item";

    defaultdate();
    latestdata();

    function latestdata() {


        $.ajax({
            type: "POST",
            url: baseurl + "Raw_IT/filtertoday",
            data: {

                //  where: where,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    if (data[i].date != null) {
                        var fdateval = data[i].date;
                        var fdateslt = fdateval.split('-');
                        var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    }
                }
                $("#date2").val(fdate);

            }
        });
    }
    $(document).on("change", "#date2", function() {

        datashow();
    });

    function defaultdate() {
        $('.doj').datepicker({
            'todayHighlight': true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');

        $("#date").val(date);
        $("#date2").val(date);


    }
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('.batch').val("").trigger('change');
        $('.cont').val("").trigger('change');
        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $("#b_qty").val(0);
        $("#t_qty").val(0);
        $("#bags").val(0);
        defaultdate();
        $('#btnsave').text('Save');
    });

    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var date1 = $('#date').val();
        var t_from = $('#t_from').val();
        var batch1 = $('#batch1').val();
        var b_qty = $('#b_qty').val();
        var t_qty = $('#t_qty').val();
        var t_to = $('#t_to').val();
        var bags = $('#bags').val();
        var batch2 = $('#batch2').val();
        var id = $('#save_update').val();
        console.log("bags:" + bags);
        var fdateslt = date1.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

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
                url: baseurl + "Raw_IT/adddata",

                data: {
                    id: id,
                    date: date,
                    t_from: t_from,
                    batch1: batch1,
                    b_qty: b_qty,
                    t_qty: t_qty,
                    t_to: t_to,
                    bags: bags,
                    batch2: batch2,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    datashow();
                    console.log(data);
                    if (data == true) {
                        if (id != "") {
                            successTost("Data Update Successfully");
                        } else {
                            successTost("Data Save Successfully");
                        }
                        $('#master_form')[0].reset();
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
        var date2 = $('#date2').val();
        var fdateslt = date2.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var where = date;

        $.ajax({
            type: "POST",
            url: baseurl + "Raw_IT/showdata",
            data: {
                table_name: table_name,
                where: where,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);


                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Transfer Date</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Transfer From</font></th>' +
                    '<th><font style="font-weight:bold">Transfer From</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Batch 1</font></th>' +
                    '<th><font style="font-weight:bold">Batch 1</font></th>' +
                    '<th><font style="font-weight:bold">Biri Leaves Qty</font></th>' +
                    '<th><font style="font-weight:bold">Tobacco Qty</font></th>' +
                    '<th><font style="font-weight:bold">Transfer To </font></th>' +
                    '<th><font style="font-weight:bold">Batch 2</font></th>' +
                    '<th><font style="font-weight:bold">Bags</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Transfer To</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Batch 2</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';

                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html += '<tr>' +
                        '<td id="date_' + data[i].id + '">' + date + '</td>' +
                        '<td style="display:none" id="t_from_' + data[i].id + '">' + data[i].t_from + '</td>' +
                        '<td id="name_' + data[i].id + '">' + data[i].t_from_name + '</td>' +
                        '<td style="display:none" id="batch1_' + data[i].id + '">' + data[i].batch1 + '</td>' +
                        '<td id="type_' + data[i].id + '">' + data[i].batch1_name + '</td>' +
                        '<td id="b_qty_' + data[i].id + '">' + data[i].b_qty + '</td>' +
                        '<td id="t_qty_' + data[i].id + '">' + data[i].t_qty + '</td>' +
                        '<td id="alt_unit_' + data[i].id + '">' + data[i].t_to_name + '</td>' +
                        '<td id="alt_qty_' + data[i].id + '">' + data[i].batch2_name + '</td>' +
                        '<td id="bags_' + data[i].id + '">' + data[i].bags + '</td>' +
                        '<td style="display:none" id="t_to_' + data[i].id + '">' + data[i].t_to + '</td>' +
                        '<td style="display:none" id="batch2_' + data[i].id + '">' + data[i].batch2 + '</td>' +
                        //'<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
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
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            title: 'DB Stock-Raw Item Transfer',
                            exportOptions: {
                                columns: [0, 2, 4, 5, 6, 7, 8]
                            }
                        },
                        {
                            title: 'DB Stock-Item',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 2, 4, 5, 6, 7, 8]
                            }




                        }
                    ]
                });

            }

        });

    }
    //------------------show data in the tabale code end-----------------------------------------------

    //-----------------------delete data code start----------------------------------------------------


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
                        url: baseurl + "Raw_IT/deletedata",
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


        var date1 = $('#date_' + id).html();
        var t_from = $('#t_from_' + id).html();
        var batch1 = $('#batch1_' + id).html();
        var b_qty = $('#b_qty_' + id).html();
        var t_qty = $('#t_qty_' + id).html();
        var t_to = $('#t_to_' + id).html();
        var batch2 = $('#batch2_' + id).html();

        $('#date').val(date1);
        $('#t_from').val(t_from);
        $('#batch1').val(batch1);
        $('#b_qty').val(b_qty);
        $('#t_qty').val(t_qty);
        $('#t_to').val(t_to);
        $('#batch2').val(batch2);
        $('#bags').val($('#bags_' + id).html());
        $('#save_update').val(id);


    });
});