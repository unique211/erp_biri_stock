$(document).ready(function() {
    var table_name = "financial_period";

    chkdata();

    function chkdata() {
        $.ajax({
            type: "POST",
            url: baseurl + "Financial_period/chkdata",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                //alert(data);
                if (data == '0') {
                    $(".btnhideshow").show();
                } else {
                    $(".btnhideshow").hide();
                }

            }
        });

    }
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $(".btnhideshow").hide();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        chkdata();

    });
    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var fsdate1 = $('#fsdate').val();
        var fedate1 = $('#fedate').val();
        var psdate1 = $('#psdate').val();
        var pedate1 = $('#pedate').val();
        var id = $('#save_update').val();

        var fdateslt = fsdate1.split('/');
        var fsdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = fedate1.split('/');
        var fedate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = psdate1.split('/');
        var psdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = pedate1.split('/');
        var pedate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Financial_period/adddata",

            data: {
                id: id,
                fsdate: fsdate,
                fedate: fedate,
                psdate: psdate,
                pedate: pedate,
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

                    datashow();
                    $('.closehideshow').trigger('click');
                    $(".btnhideshow").hide();
                } else {
                    errorTost("Data Cannot Save");
                }
                chkdata();

            }

        });

    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Financial_period/showdata",
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
                    '<th><font style="font-weight:bold">Financial Year Start Date</font></th>' +
                    '<th><font style="font-weight:bold">Financial Year End Date</font></th>' +
                    '<th><font style="font-weight:bold">Period Start Date</font></th>' +
                    '<th><font style="font-weight:bold">Period End Date</font></th>' +
                    '<th><font style="font-weight:bold">Operations </font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].fsdate;
                    var fdateslt = fdateval.split('-');
                    var fsdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].fedate;
                    var fdateslt = fdateval.split('-');
                    var fedate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].psdate;
                    var fdateslt = fdateval.split('-');
                    var psdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].pedate;
                    var fdateslt = fdateval.split('-');
                    var pedate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="fsdate_' + data[i].id + '">' + fsdate + '</td>' +
                        '<td id="fedate_' + data[i].id + '">' + fedate + '</td>' +
                        '<td id="psdate_' + data[i].id + '">' + psdate + '</td>' +
                        '<td id="pedate_' + data[i].id + '">' + pedate + '</td>' +
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
                            //orientation: 'landscape',
                            title: 'DB Stock-Financial & Period',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Financial & Period',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
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
                        url: baseurl + "Financial_period/deletedata",
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
                                window.location.reload();
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

        var fsdate = $('#fsdate_' + id).html();
        var fedate = $('#fedate_' + id).html();
        var psdate = $('#psdate_' + id).html();
        var pedate = $('#pedate_' + id).html();

        $('#fsdate').val(fsdate);
        $('#fedate').val(fedate);
        $('#psdate').val(psdate);
        $('#pedate').val(pedate);

        $('#save_update').val(id);


    });
});