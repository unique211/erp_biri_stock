$(document).ready(function() {
    var table_name = "wages_fixation";

    //------------------function for sum---------------------------------


    function sum() {

        var wages = $('#Wages').val();
        var bonus = $('#bonus').val();
        var handling = $('#HandlingCharges').val();

        if (wages == "") {
            wages = 0;
        }
        if (bonus == "") {
            bonus = 0;
        }
        if (handling == "") {
            handling = 0;
        }

        total = parseFloat(wages) + parseFloat(bonus) + parseFloat(handling);
        $("#total").val(total.toFixed(2));
    }
    //-------------keyup event of textbox----------------------------------------------
    $("#Wages").keyup(function() {
        sum();

    });
    $("#bonus").keyup(function() {
        sum();
    });
    $("#HandlingCharges").keyup(function() {
        sum();
    });



    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var name = $('#name').val();
        var wages = $('#Wages').val();
        var bonus = $('#bonus').val();
        var handling = $('#HandlingCharges').val();
        var pf = $('#pf').val();
        var tds = $('#tds').val();
        var chat_biri = $('#chatbiri').val();
        var date = $('#Commence').val();
        var commition = $('#commission').val();
        var id = $('#save_update').val();

        var fdateslt = date.split('/');
        var com_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

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
                url: baseurl + "Wages_fixation/adddata",

                data: {
                    id: id,
                    name: name,
                    wages: wages,
                    bonus: bonus,
                    handling: handling,
                    pf: pf,
                    tds: tds,
                    chat_biri: chat_biri,
                    com_date: com_date,
                    commition: commition,
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
    //----------------------submit form code end---------------------------------------------
    datashow();

    $(document).on("blur", ".index", function(e) {
        e.preventDefault();
        var id1 = $(this).attr('name');
        var where = $('#index_' + id1).val();
        var url = baseurl + "CPMaster/updateindex";
        // alert(id1+" & "+where);
        if (where != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    table_name: 'wages_fixation',
                    where: where,
                    id1: id1
                },
                dataType: "Json",
                async: false,
                success: function(data) {
                    successTost("index value has bees set Successfully");
                },
                error: function() {
                    alert("error");
                }
            });
        } else {

        }
    });
    //----------------show data in the tabale code start-------------------------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Wages_fixation/showdata",
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
                    '<th><font style="font-weight:bold">Wages/1000  </font></th>' +
                    '<th><font style="font-weight:bold">Bonus</font></th>' +
                    '<th><font style="font-weight:bold">Handling Charges</font></th>' +
                    '<th><font style="font-weight:bold">Chat Biri</font></th>' +
                    '<th><font style="font-weight:bold">PF</font></th>' +
                    '<th><font style="font-weight:bold">TDS</font></th>' +
                    '<th><font style="font-weight:bold">Commence date</font></th>' +
                    '<th><font style="font-weight:bold">Commission</font></th>' +
                    '<th><font style="font-weight:bold">Index</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations </font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].com_date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td id="wages_' + data[i].id + '">' + data[i].wages + '</td>' +
                        '<td id="bonus_' + data[i].id + '">' + data[i].bonus + '</td>' +
                        '<td id="handling_' + data[i].id + '">' + data[i].handling + '</td>' +
                        '<td id="chat_biri_' + data[i].id + '">' + data[i].chat_biri + '</td>' +
                        '<td id="pf_' + data[i].id + '">' + data[i].pf + '</td>' +
                        '<td id="tds_' + data[i].id + '">' + data[i].tds + '</td>' +
                        '<td id="com_date_' + data[i].id + '">' + date + '</td>' +
                        '<td id="commition_' + data[i].id + '">' + data[i].commition + '</td>' +
                        '<td><input type="text" class="form-control index" id="index_' + data[i].id + '" style="width:55px;" value="' + data[i].index_value + '" name="' + data[i].id + '"/></td>' +
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
                            title: 'DB Stock-Wages Fixation',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            },
                        },
                        {
                            title: 'DB Stock-Wages Fixation',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
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
                        url: baseurl + "Wages_fixation/deletedata",
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
    //-----------------------delete data code end---------------------------------------
    //-----------------------edit data code start---------------------------------------
    $(document).on("click", ".edit_data", function() {

        $('.formhideshow').show();
        $('.tablehideshow').show();
        $(".btnhideshow").hide();

        $('#btnsave').text('Update');

        var id = $(this).attr('id');
        var name = $('#name_' + id).html();
        var wages = $('#wages_' + id).html();
        var bonus = $('#bonus_' + id).html();
        var handling = $('#handling_' + id).html();
        var pf = $('#pf_' + id).html();
        var tds = $('#tds_' + id).html();
        var chat_biri = $('#chat_biri_' + id).html();
        var date = $('#com_date_' + id).html();
        0

        var commition = $('#commition_' + id).html();

        $('#name').val(name);
        $('#Wages').val(wages);
        $('#bonus').val(bonus);
        $('#HandlingCharges').val(handling);
        $('#pf').val(pf);
        $('#tds').val(tds);
        $('#chatbiri').val(chat_biri);
        $('#Commence').val(date);
        $('#commission').val(commition);
        $('#save_update').val(id);

        sum();
    });
});