$(document).ready(function() {
    var table_name = "rate_master";
    //submit form code start




    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var fdateval = $('#fdate').val();
        var sdateval = $('#sdate').val();
        var batch = $('#batch').val();
        var leaves = $('#leaves').val();
        var tobacco = $('#tobacco').val();
        var lbag = $('#lbag').val();
        var tbag = $('#tbag').val();
        var bl_sutta = $('#bisutta').val();
        var wh_sutta = $('#whsutta').val();
        var dise = $('#dise').val();
        var filter = $('#filter').val();
        var id = $('#save_update').val();


        var fdateslt = fdateval.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        var sdateslt = sdateval.split('/');
        var sdate = sdateslt[2] + '-' + sdateslt[1] + '-' + sdateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Rate_master/adddata",

            data: {
                id: id,
                fdate: fdate,
                sdate: sdate,
                batch: batch,
                lbag: lbag,
                tbag: tbag,
                leaves: leaves,
                tobacco: tobacco,
                bl_sutta: bl_sutta,
                wh_sutta: wh_sutta,
                dise: dise,
                filter: filter,
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

    });
    //----------------------submit form code end------------------------------
    datashow();

    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Rate_master/showdata",
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
                    '<th><font style="font-weight:bold">FDATE</font></th> ' +
                    '<th><font style="font-weight:bold">TDATE</font></th>' +
                    '<th><font style="font-weight:bold">BATCH</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">BATCH</font></th>' +
                    '<th><font style="font-weight:bold">LEAVES</font></th>' +
                    '<th><font style="font-weight:bold">TOBACCO</font></th>' +
                    '<th><font style="font-weight:bold">BLSUTTA</font></th>' +
                    '<th><font style="font-weight:bold">WHSUTTA</font></th>' +
                    '<th><font style="font-weight:bold">T_BAG</font></th>' +
                    '<th><font style="font-weight:bold">L_BAG</font></th>' +
                    '<th><font style="font-weight:bold">DISE</font></th>' +
                    '<th><font style="font-weight:bold">FILTER</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations </font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].fdate;
                    var fdateslt = fdateval.split('-');
                    var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var sdateval = data[i].sdate;
                    var sdateslt = sdateval.split('-');
                    var sdate = sdateslt[2] + '/' + sdateslt[1] + '/' + sdateslt[0];

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="fdate_' + data[i].id + '">' + fdate + '</td>' +
                        '<td id="sdate_' + data[i].id + '">' + sdate + '</td>' +
                        '<td id="batch_' + data[i].id + '">' + data[i].batchname + '</td>' +
                        '<td style="display:none;" id="batchid_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="leaves_' + data[i].id + '">' + data[i].leaves + '</td>' +
                        '<td id="tobacco_' + data[i].id + '">' + data[i].tobacco + '</td>' +
                        '<td id="bl_sutta_' + data[i].id + '">' + data[i].bl_sutta + '</td>' +
                        '<td id="wh_sutta_' + data[i].id + '">' + data[i].wh_sutta + '</td>' +
                        '<td id="tbag_' + data[i].id + '">' + data[i].tbag + '</td>' +
                        '<td id="lbag_' + data[i].id + '">' + data[i].lbag + '</td>' +
                        '<td id="dise_' + data[i].id + '">' + data[i].dise + '</td>' +
                        '<td id="filter_' + data[i].id + '">' + data[i].filter + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            orientation: 'landscape',
                            title: 'DB Stock-Rate Master',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Rate Master',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12]
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
                        url: baseurl + "Rate_master/deletedata",
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
        //var id = $('#save_update').html();
        $('#save_update').val(id);
        var fdateval = $('#fdate_' + id).html();
        var sdateval = $('#sdate_' + id).html();
        var lbag = $('#lbag_' + id).html();
        var tbag = $('#tbag_' + id).html();
        var dise = $('#dise_' + id).html();
        var batch = $('#batchid_' + id).html();
        var leaves = $('#leaves_' + id).html();
        var tobacco = $('#tobacco_' + id).html();
        var bl_sutta = $('#bl_sutta_' + id).html();
        var wh_sutta = $('#wh_sutta_' + id).html();
        var filter = $('#filter_' + id).html();

        //$('#district').val(districid).trigger('change');

        $('#fdate').val(fdateval);
        $('#sdate').val(sdateval);
        $('#lbag').val(lbag);
        $('#tbag').val(tbag);
        $('#dise').val(dise);
        $('#batch').val(batch).trigger('change');
        $('#leaves').val(leaves);
        $('#tobacco').val(tobacco);
        $('#bisutta').val(bl_sutta);
        $('#whsutta').val(wh_sutta);
        $('#filter').val(filter);




    });
    //-----------------------edit data code end-----------------------------------

    $(document).on("change", "#batch", function() {
        // $('#batch').change(function() {
        var fdateval = $('#fdate').val();
        var sdateval = $('#sdate').val();
        var batch = $('#batch').val();
        var id = $('#save_update').val();

        var fdateslt = fdateval.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        var sdateslt = sdateval.split('/');
        var sdate = sdateslt[2] + '-' + sdateslt[1] + '-' + sdateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Rate_master/chkdata",
            data: {
                table_name: table_name,
                fdate: fdate,
                sdate: sdate,
                batch: batch
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);


                if (data == 0) {

                    if (id != "") {
                        $('#btnsave').attr("disabled", false);
                    } else {
                        $('#btnsave').attr("disabled", false);
                    }

                } else {

                    if (id != "") {
                        $('#btnsave').attr("disabled", false);
                        swal("Already Exists !!", "Hey, your Fdate,Sdate and Batch Already Exists!!", "info");



                    } else {
                        $('#btnsave').attr("disabled", true);
                        swal("Already Exists !!", "Hey, your Fdate,Sdate and Batch Already Exists!!", "info");
                    }



                }

            }
        });

    });

});