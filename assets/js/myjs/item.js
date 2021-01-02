$(document).ready(function() {
    var table_name = "item_master";


    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var name = $('#item_name').val();
        var type = $('#type').val();
        var unit = $('#unit').val();
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
                url: baseurl + "Item_master/adddata",
                data: {
                    id: id,
                    name: name,
                    type: type,
                    unit: unit,
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
            url: baseurl + "Item_master/showdata",
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
                    '<th><font style="font-weight:bold">Name</font></th>' +
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th><font style="font-weight:bold">Item Unit</font></th>' +
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
                        '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td id="type_' + data[i].id + '">' + data[i].type + '</td>' +
                        '<td id="unit_' + data[i].id + '">' + data[i].unit + '</td>' +
                        '<td id="qty_' + data[i].id + '">' + data[i].qty + '</td>' +
                        '<td id="alt_unit_' + data[i].id + '">' + data[i].alt_unit + '</td>' +
                        '<td id="alt_qty_' + data[i].id + '">' + data[i].alt_qty + '</td>' +
                        '<td class="not-export-column" >';
                    //'<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
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
                                title: 'DB Stock-Item',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                title: 'DB Stock-Item',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }




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
                        url: baseurl + "Item_master/deletedata",
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


        var name = $('#name_' + id).html();
        var type = $('#type_' + id).html();
        var unit = $('#unit_' + id).html();
        var qty = $('#qty_' + id).html();
        var alt_unit = $('#alt_unit_' + id).html();
        var alt_qty = $('#alt_qty_' + id).html();



        $('#item_name').val(name);
        $('#type').val(type);
        $('#unit').val(unit);
        $('#quantity').val(qty);
        $('#alt_unit').val(alt_unit);
        $('#alt_qty').val(alt_qty);

        $('#save_update').val(id);


    });
});