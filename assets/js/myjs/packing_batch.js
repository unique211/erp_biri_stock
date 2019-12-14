$(document).ready(function() {
    displayitem();
    var ratio1 = 0;
    var ratio2 = 0;
    var ratio3 = 0;
    var lablenm = "";
    var name = "";
    /*------------------get iemdata-----------------*/
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('#batch').val("").trigger('change');
        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $("#disbuget tbody").html('');
        form_clear();
        show_master();displayitem();

    });

    function displayitem() {
        $.ajax({

            type: "POST",
            url: baseurl + "settings/get_master_where",
            dataType: "JSON",
            async: false,
            data: {
                table_name: "item_master",
                where: "type='PACKING'",
            },
            success: function(result) {



                console.log('VISHAL' + result);
                var id = $('#save_update').val();
                for (i = 0; i < result.length; i++) {
                    var sr = i + 1;

                    if (id != '') {
                        var r1 = $('table#disbuget').find('tbody').find('tr');
                        var r = r1.length;
                        var markup = "";
                        var flag = 1;
                        if (r != 0) {
                            for (var j = 0; j < r; j++) {
                                var itemid = $(r1[j]).find('td:eq(0)').html();

                                if (result[i].id == itemid) {

                                    flag = 0;

                                }
                            }
                            if (flag == 1) {
                                markup = '<tr>' +
                                    '<td style="display:none;" id="sr_' + result[i].id + '">' + sr + '</td>' +
                                    '<td style="display:none;">' + result[i].id + '</td>' +
                                    '<td id="itemname_' + result[i].id + '">' + result[i].name + '</td>' +
                                    '<td id="qty"><input type="text" id="qty_' + sr + '" value="0"></td>' +
                                    '<td id="unit_' + result[i].id + '">' + result[i].unit + '</td>' +
                                    '</tr>';
                                $("#disbuget tbody").append(markup);

                            }
                        }
                    } else {
                        markup = '<tr>' +
                            '<td style="display:none;" id="sr_' + result[i].id + '">' + sr + '</td>' +
                            '<td style="display:none;">' + result[i].id + '</td>' +
                            '<td id="itemname_' + result[i].id + '">' + result[i].name + '</td>' +
                            '<td id="qty"><input type="text" id="qty_' + sr + '" value="0"></td>' +
                            '<td id="unit_' + result[i].id + '">' + result[i].unit + '</td>' +
                            '</tr>';
                        $("#disbuget tbody").append(markup);

                    }
                }
            }
        });
    }
    /*-----------end of item data-------------*/


    /*----------submite packingmaster_form -------------*/
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var id = $('#save_update').val();
        var name = $('#name').val();
        var labelname = $('#labelname').val();
        var ratio1 = $('#ratio1').val();
        var ratio2 = $('#ratio2').val();
        var ratio3 = $('#ratio3').val();
        var opening_cartun = $('#opening_cartun').val();

        var asalbidi = $('#asalbidi').val();
        var chantbidi = $('#chantbidi').val();

        $.ajax({
            type: "POST",
            url: baseurl + "settings/save_settings",
            dataType: "JSON",
            async: false,
            data: {
                id: id,
                name: name,
                labelname: labelname,
                ratio1: ratio1,
                ratio2: ratio2,
                ratio3: ratio3,
                opening_cartun: opening_cartun,
                asalbidi: asalbidi,
                chantbidi: chantbidi,
                table_name: 'packingbatch',
            },
            success: function(data) {
                console.log('id:' + data);
                if (data == '404') {
                    errorTost("Selected Data  Already Exists !!!");
                } else {
                    var pid;
                    var id = $('#save_update').val();
                    if (id == "") {
                        pid = data;
                    } else {
                        pid = id;
                    }


                    var r1 = $('table#disbuget').find('tbody').find('tr');
                    var r = r1.length;
                    var itemid = '';
                    var qty = '';
                    var unit = '';
                    for (var i = 0; i < r; i++) {

                        var sr = i + 1;
                        var t = document.getElementById('disbuget');
                        itemid = $(r1[i]).find('td:eq(1)').html();
                        // headid = $(t.rows[i].cells[1]).text();
                        qty = $("#qty_" + sr).val();
                        unit = $(r1[i]).find('td:eq(4)').html();



                        $.ajax({
                            type: "POST",
                            url: baseurl + "settings/save_settings",
                            dataType: "JSON",
                            async: false,
                            data: {
                                itemid: itemid,
                                pid: pid,
                                qty: qty,
                                unit: unit,

                                table_name: 'packingbatchdetails',
                            },
                            success: function(data) {

                            }
                        });

                    }

                    if (id != "") {
                        successTost("Data Update Successfully");
                    } else {
                        successTost("Data Save Successfully");

                    }
                    $('.closehideshow').trigger('click');
                    form_clear(); //call function clear role_master form
                    show_master();

                }


            }
        });

    });
    /*-----------end of sunmite-----*/

    $("#labelname").change(function() {

        lablenm = $('#labelname').val();
        //    $('#opening_pcs').val(lablenm);
    });

    $("#name").keyup(function() {

        name = $('#name').val();
        $('#labelname').val(name + '(' + ratio1 + 'X' + ratio2 + 'X' + ratio3 + ')');
    });

    $("#ratio1").keyup(function() {
        ratio1 = $('#ratio1').val();

        $('#labelname').val(name + '(' + ratio1 + 'X' + ratio2 + 'X' + ratio3 + ')');
        multiratio();
    });
    $("#ratio2").keyup(function() {
        ratio2 = $('#ratio2').val();
        $('#labelname').val(name + '(' + ratio1 + 'X' + ratio2 + 'X' + ratio3 + ')');
        multiratio();
    });
    $("#ratio3").keyup(function() {
        ratio3 = $('#ratio3').val();
        $('#labelname').val(name + '(' + ratio1 + 'X' + ratio2 + 'X' + ratio3 + ')');
        multiratio();

    });
    $("#opening_cartun").keyup(function() {

        multiratio();

    });

    function multiratio() {
        var grandtotal1 = 0;
        var grandtot = 0;
        var opencur = 1;

        opencur = $('#opening_cartun').val();
        if (ratio1 == 0) {
            ratio1 = 1;
        } else if (ratio2 == 0) {
            ratio2 = 1;
        } else if (ratio3 == 0) {
            ratio3 = 1;
        }


        grandtotal = parseFloat(ratio1) * parseFloat(ratio2) * parseFloat(ratio3) * parseFloat(opencur);
        grandtotal1 = parseFloat(grandtotal / 1000);
        grandtotal2 = parseFloat(ratio1) * parseFloat(ratio2) * parseFloat(ratio3);
        grandtot = parseFloat(grandtotal2 / 1000);
        $('#opening_pcs').val(grandtotal1);
        $('#congection').val(grandtot);
        //  $('#opening_pcs').append(grantotal);
    }


    show_master();
    $(document).on("blur", ".index", function(e) {
        e.preventDefault();
        var id1 = $(this).attr('name');
        var where = $('#index_' + id1).val();
        var url = baseurl + "settings/updateindex";
        // alert(id1+" & "+where);
        
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    table_name: 'packingbatch',
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
       
    });
    /*-----------------show data in table Master---------------*/
    function show_master() {

        var where = '1';
        $.ajax({
            type: 'POST',
            url: baseurl + "settings/get_master",
            async: false,
            data: {
                table_name: 'packingbatch',
                // where:where,
            },
            dataType: 'json',
            success: function(data) {
                console.log('Data:' + eval(data));

                var congetion = 0;
                var html = "";

                html += '<table id="myTable" style="width:100%;table-layout:fixed;"  class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +

                    '<th><font style="font-weight:bold">Id</font></th>' +
                    '<th><font style="font-weight:bold">Name</font></th>' +
                    '<th><font style="font-weight:bold">Ratio </font></th>' +
                    '<th><font style="font-weight:bold">Label Name</font></th>' +
                    '<th><font style="font-weight:bold">Opening Cartun</font></th>' +
                    '<th><font style="font-weight:bold">Opening Pcs </font></th>' +
                    '<th><font style="font-weight:bold">Consumption Ratio</font></th>' +
                    '<th><font style="font-weight:bold">Asal Bidi</font></th>' +
                    '<th><font style="font-weight:bold">Chant Bidi </font></th>' +
                    '<th><font style="font-weight:bold">Index</font></th>' +
                    '<th><font style="font-weight:bold">Operations </font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';

                for (i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    congetion = parseFloat(data[i].ratio1) * parseFloat(data[i].ratio2) * parseFloat(data[i].ratio3) / 1000;
                    openingpcs = parseFloat(data[i].ratio1) * parseFloat(data[i].ratio2) * parseFloat(data[i].ratio3) * parseFloat(data[i].openingcurtn) / 1000;
                    html += '<tr>' +
                        '<td id="sr_' + data[i].id + '">' + sr + '</td>' +
                        '<td id="projectname_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td id="ratio' + data[i].id + '">' + data[i].ratio1 + ' X ' + data[i].ratio2 + ' X ' + data[i].ratio3 + '</td>' +
                        '<td id="phasename_' + data[i].id + '">' + data[i].lablenm + '</td>' +
                        '<td id="areaname_' + data[i].id + '">' + data[i].openingcurtn + '</td>' +
                        '<td id="areaname_' + data[i].id + '">' + openingpcs + '</td>' +
                        '<td id="areaname_' + data[i].id + '">' + congetion + '</td>' +
                        '<td id="areaname_' + data[i].id + '">' + data[i].asalbidi + '</td>' +
                        '<td id="areaname_' + data[i].id + '">' + data[i].chantbidi + '</td>' +
                        '<td><input type="text" class="form-control index" id="index_' + data[i].id + '" style="width:55px;" value="' + data[i].index_value + '" name="' + data[i].id + '"/></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn-xs  btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        //   '<td><button  class="edit_data btn btn-sm  btn-xs  btn-primary" id="'+data[i].id+'" name="'+data[i].status+'" ><i class="fa fa-edit"></i></button>'+
                        '</tr>';
                }


                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            orientation: 'landscape',
                            title: 'DB Stock-Packing Batch/Lable',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Packing Batch/Lable',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            },
                        }
                    ]
                });
            }

        });
    }
    $(document).on('click', '.edit_data', function() {
        var id1 = $(this).attr('id');
        $("#save_update").val(id1);

        $.ajax({
            type: "POST",
            url: baseurl + "settings/get_master_where",
            dataType: "JSON",
            data: {
                where: 'id=' + id1,
                table_name: 'packingbatch'
            },
            success: function(data) {
                var data1 = eval(data);

                $('#name').val(data[0].name);
                $('#labelname').val(data[0].lablenm);
                $('#ratio1').val(data1[0].ratio1);
                $('#ratio2').val(data1[0].ratio2);
                $('#ratio3').val(data1[0].ratio3);
                $('#opening_cartun').val(data[0].openingcurtn);

                $('#asalbidi').val(data[0].asalbidi);
                $('#chantbidi').val(data[0].chantbidi);
                var labelname = $('#labelname').val();
                ratio1 = $('#ratio1').val();
                ratio2 = $('#ratio2').val();
                ratio3 = $('#ratio3').val();
                $('#opening_cartun').val();
                $('#Operation').val(labelname + '(' + ratio1 + 'X' + ratio2 + 'X' + ratio3 + ')');

                $.ajax({

                    type: "POST",
                    url: baseurl + "settings/get_master_where",
                    dataType: "JSON",
                    async: false,
                    data: {
                        table_name: "packingbatchdetails",
                        where: 'pid=' + id1,
                    },
                    success: function(result) {

                        
                        console.log('result' + result.length);
                        if (result == "") {

                        } else {
                            $("#disbuget tbody").html('');
                            for (i = 0; i < result.length; i++) {
                                var sr = i + 1;
                                markup = '<tr>' +
                                    '<td style="display:none;" id="sr_' + result[i].id + '">' + sr + '</td>' +
                                    '<td style="display:none;">' + result[i].itemid + '</td>' +
                                    '<td id="itemname_' + result[i].id + '">' + result[i].name + '</td>' +
                                    '<td id="qty"><input type="text" id="qty_' + sr + '" value="' + result[i].qty + '"></td>' +
                                    '<td id="unit_' + result[i].id + '">' + result[i].unit + '</td>' +
                                    '</tr>';
                                $("#disbuget tbody").append(markup);

                            }
                        }
                        //  $(".formhideshow").show();
                        // $(".tablehideshow").hide();

                        $('.btnhideshow').trigger('click');
                       // displayitem();
                    }
                });
                multiratio();
                // form_clear();
            }
        });

    });
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
                        url: baseurl + "settings/delete_master",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: 'packingbatch',
                        },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                $('.closehideshow').trigger('click');
                                $('#save_update').val("");
                                show_master(); //call function show all data	


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
    function form_clear() {
        $('#save_update').val('');
        $('#name').val('');
        $('#labelname').val('');
        $('#ratio1').val(0);
        $('#ratio2').val(0);
        $('#ratio3').val(0);
        $('#opening_cartun').val('');

        $('#asalbidi').val('');
        $('#chantbidi').val('');
        $('displaydata').html('');
        ratio1 = 0;
        ratio2 = 0;
        ratio3 = 0;

    }
});