$(document).ready(function() {
    var table_name = "batch_wise_stock";

    $("#item_name").change(function() {
        var table_name = "item_master";
        var table_name2 = "batch_wise_stock"
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: baseurl + "Batch_wise_stock/fetch_qty",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,
                table_name2: table_name2

            },
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {

                    var qty = data[i].total_qty;
                    var alt_qty = data[i].total_alt_qty;
                    var item_qty = data[i].qty;
                    var item_alt_qty = data[i].alt_qty;
                    var tot_qty = (item_qty - qty);
                    var tot_alt_qty = (item_alt_qty - alt_qty);



                    $('#balance_raw_qnt').val(tot_qty);
                    $('#bal_raw_qty').val(tot_qty);
                    $('#balance_alt_qty').val(tot_alt_qty);
                    $('#bal_alt_qty').val(tot_alt_qty);



                }

            }
        });
    });



    function min() {

        var hide_qty = $('#bal_raw_qty').val();
        var qty = $('#quantity').val();
        if (qty == "") {
            qty = 0;
            $('#balance_raw_qnt').val(hide_qty);
        }
        var total = (hide_qty - qty);
        $('#balance_raw_qnt').val(total.toFixed(3));


        var bal_alt_qty = $('#bal_alt_qty').val();
        var qty2 = $('#alt_qty').val();
        if (qty2 == "") {
            qty2 = 0;
            $('#balance_alt_qty').val(bal_alt_qty);
        }
        var total_alt = (bal_alt_qty - qty2);
        $('#balance_alt_qty').val(total_alt);
    }

    $("#quantity").keyup(function() {
        min();
    });
    $("#alt_qty").keyup(function() {
        min();
    });



    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var item = $('#item_name').val();
        var batch = $('#batch_name').val();
        var qty = $('#quantity').val();
        var alt_unit = $('#alt_unit').val();
        var alt_qty = $('#alt_qty').val();
        var id = $('#save_update').val();

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
                url: baseurl + "Batch_wise_stock/adddata",

                data: {
                    id: id,
                    item: item,
                    batch: batch,
                    qty: qty,
                    alt_unit: alt_unit,
                    alt_qty: alt_qty,
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
                    } else if (data == '404') {
                        swal("Already Exists !!", "Hey, your Item and Batch Already Exists. Please, Select Another !!", "info");
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
            url: baseurl + "Batch_wise_stock/showdata",
            data: {
                table_name: table_name,

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
                    '<th><font style="font-weight:bold">Id</font></th>' +
                    '<th><font style="font-weight:bold">Item</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Item</font></th>' +
                    '<th><font style="font-weight:bold">Batch</font></th>' +
                    '<th><font style="font-weight:bold">Quantity</font></th>' +
                    '<th><font style="font-weight:bold">Alternative - Unit </font></th>' +
                    '<th><font style="font-weight:bold">Alternative -Quantity</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="itemname_' + data[i].id + '">' + data[i].itemname + '</td>' +
                        '<td style="display:none;" id="item_' + data[i].id + '">' + data[i].item + '</td>' +
                        '<td id="batch_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="qty_' + data[i].id + '">' + data[i].qty + '</td>' +
                        '<td id="alt_unit_' + data[i].id + '">' + data[i].alt_unit + '</td>' +
                        '<td id="alt_qty_' + data[i].id + '">' + data[i].alt_qty + '</td>' +
                        '<td class="not-export-column" >';

                    // '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>';
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
                            title: 'DB Stock-Batch Wise Stock',
                            //orientation: 'landscape',
                            //pageSize: 'A4',
                            exportOptions: {
                                columns: [0, 1, 3, 4, 5, 6]
                            },
                        },
                        {
                            title: 'DB Stock-Batch Wise Stock',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 3, 4, 5, 6]
                            }
                        }
                    ]
                });

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
                        url: baseurl + "Batch_wise_stock/deletedata",
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

        var item = $('#item_' + id).html();
        var batch = $('#batch_' + id).html();
        var qty = $('#qty_' + id).html();
        var alt_unit = $('#alt_unit_' + id).html();
        var alt_qty = $('#alt_qty_' + id).html();

        $('#item_name').val(item).trigger('change').attr("disabled", true);
        $('#batch_name').val(batch).attr("disabled", false);
        $('#quantity').val(qty);
        $('#alt_unit').val(alt_unit);
        $('#alt_qty').val(alt_qty);
        $('#save_update').val(id);
        min();
    });
});