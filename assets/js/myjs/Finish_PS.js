$(document).ready(function() {
    getMasterSelect("packingbatch", "#batch");

    function getMasterSelect(table_name, selecter) {

        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/get_master",
            data: { table_name: table_name },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                html = '';
                var lablenm = '';
                html += '<option selected disabled value="" >Select</option>';
                for (i = 0; i < data.length; i++) {
                    var id = '';
                    lablenm = data[i].lablenm;
                    id = data[i].id;
                    //alert(name);	
                    html += '<option value="' + id + '">' + lablenm + '</option>';
                }
                $("#batch").append(html);
            }
        });

    }
    var table_name = "purchase_master";
    var bidi_sum = 1;
    var hide_qty = 1;
    var sales_id = 0;
    defaultdate();
    getsaleid();

    function getsaleid() {
        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/getmaxid2",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                //sales_id = data;
                $("#invoice").val(data);

            }
        });
    }

    function defaultdate() {
        $('.doj').datepicker({
            'todayHighlight': true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');

        $("#date").val(date);
        // $("#date2").val(date);
    }
    $(".closehideshow").click(function() {
        // $('#master_form')[0].reset();
        formclear();
        defaultdate();
        getsaleid();
        $('#save_update').val('');


        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").show();
        $("#if_pur").hide();
        // $('#file_info_tbody').html('');
        $('#file_info tbody').html('');
        $('#btnsave').text('Save');

    });

    $(document).on("change", "#batch", function() {
        where = $("#batch").val();
        table_name = "packingbatch";

        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/formdata",
            data: {
                table_name: table_name,
                where: where,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                var tqty;

                for (var i = 0; i < data.length; i++) {

                    var asalbidi = data[i].asalbidi;
                    var chantbidi = data[i].chantbidi;

                    //  opnningcart = $(row[i]).find("td:eq(2) input[type='number']").val();

                    tqty = parseFloat(asalbidi) + parseFloat(chantbidi);
                    hide_qty = tqty;


                }

                multiplications();
                $("#qty").val(hide_qty);

            }
        });

    });

    function multiplications() {
        var pack = $("#pack").val();
        var qty = hide_qty;
        var rate = $("#rate").val();
        if (qty == "") {
            qty = 1;
        }

        if (pack == "") {
            pack = 1;
        }
        if (rate == "") {
            rate = 1;
        }
        bidi_sum = parseFloat(qty) * parseFloat(pack);
        $("#qty").val(bidi_sum);
        var tot_val = parseFloat(rate) * parseFloat(bidi_sum);
        $("#tot_val").val(tot_val);

    }


    $("#pack").keyup(function() {
        multiplications();
    });
    $("#rate").keyup(function() {
        multiplications();
    });
    $("#qty").keyup(function() {
        multiplications();
    });

    $(document).on("change", "#saleto", function() {
        var id = $("#saleto").val();
        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/getcode",
            data: {
                id: id
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // alert("Success Data is: "+data);
                if (data == 0) {
                    $('#sgst_per').val('0');
                    $('#cgst_per').val('0');
                    $("#sgst_per").attr("disabled", true);
                    $("#cgst_per").attr("disabled", true);
                    $("#igst_per").attr("disabled", false);
                } else if (data == 1) {
                    $('#igst_per').val('0');
                    //$('#cgst_per').val('0');
                    $("#sgst_per").attr("disabled", false);
                    $("#cgst_per").attr("disabled", false);
                    $("#igst_per").attr("disabled", true);
                }
            },
            error: function() {
                // alert("Error..");
            }
        });
    });


    function formclear() {
        $('#item').val('');
        $('#batch').val('');
        $('#qty').val(0);
        $('#alt_qty').val('');
        $('#rate').val(0);
        $('#amt').val('');
        $('#truck').val('');
        $('#pack').val(0);
        $('#date').val('');
        $('#type').val('');
        $('#tot_val').val(0);
        $('#b_date').val('');
        $('#cont_name').val('');
        $('#sgst_per').val(0);
        $('#cgst_per').val(0);
        $('#igst_per').val(0);
        $('#nccd_per').val(0);
        $('#save_update').val('');
        $('#batch').val('');
        $('#saleto').val('');
        $('#ids').val('');
        $("#sgst_amt").val(0);
        $("#cgst_amt").val(0);
        $("#igst_amt").val(0);
        $("#nccd_amt").val(0);
        $('#tax_amt').val(0);
        $("#total").val(0);
        $('#gstinvoice').val('');


    }
    $('#plus').on('click', function() {
        //console.log("HII");

        var rowid = $('#row').val();
        var row_id = parseInt(rowid) + 1;
        var batch = $("#batch option:selected").html();
        var batch_id = $("#batch").val();
        var stock = $("#stock").val();
        var pack = $('#pack').val();
        var qty = $('#qty').val();
        var rate = $('#rate').val();
        var total_value = $('#tot_val').val();
        var id = $("#ids").val();
        //alert(id);
        if (id != "") {

            $("#batch_" + id).html(batch);
            $("#stock_" + id).html(stock);
            $("#qty_" + id).html(qty);
            $("#pack_" + id).html(pack);
            $("#rate_" + id).html(rate);
            $("#total_value_" + id).html(total_value);


        } else {
            //   alert(row_id);
            if (batch_id != 0) {
                var table = "";

                table = '<tr id="' + row_id + '">' +
                    '<td id="batch_' + row_id + '">' + batch +
                    '</td><td hidden id="batchid_' + row_id + '">' + batch_id +
                    '</td><td id="stock_' + row_id + '">' + stock +
                    '</td><td id="pack_' + row_id + '">' + pack +
                    '</td><td id="qty_' + row_id + '">' + qty +
                    '</td><td id="rate_' + row_id + '">' + rate +
                    '</td><td id="total_value_' + row_id + '">' + total_value +
                    '</td><td><button type="button" name="edit" class="edit_data1 btn btn-xs btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="btn delete_data1 btn-xs btn-danger"><i class="fa fa-trash"></i></button></td></tr>';

                $('#file_info_tbody').append(table);

                $('#row').val(row_id);
                $('#ids').val('');
            } else {
                errorTost("Please Select Batch Value", "Error");
            }
        }
        count_total();
        // formclear();
        $('#batch').val('');
        $('#qty').val('');
        $('#stock').val('');
        $('#pack').val('');
        $('#rate').val('');
        $('#tot_val').val('');
        $("#ids").val('');
    });
    $(document).on('click', '.delete_data1', function() {

        if (confirm("Are you sure you want to delete this?")) {

            $(this).parents("tr").remove();

        } else {
            return false;
        }
        count_total();
    });
    $(document).on('click', '.edit_data1', function(e) {
        e.preventDefault();
        var id1 = $(this).attr('id');

        $("#ids").val(id1);

        $('#batch').val($('#batchid_' + id1).text());
        $('#stock').val($('#stock_' + id1).text());
        $('#qty').val($('#qty_' + id1).text());
        $('#pack').val($('#pack_' + id1).text());
        $('#rate').val($('#rate_' + id1).text());
        $('#tot_val').val($('#total_value_' + id1).text());

    });

    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        table_name = "purchase_master";
        var purchase_id = 0;
        var sales_id = $("#invoice").val();
        var voucher_date1 = $('#date').val();
        var type = "Finish Product";
        var billno = 0;
        var bill_date1 = $('#date').val();
        var party_id = $('#saleto').val();
        var sgst = $('#sgst_per').val();
        var cgst = $('#cgst_per').val();
        var igst = $('#igst_per').val();
        var nccd = $('#nccd_per').val();
        var basic_per = $('#basic_per').val();
        var total = $('#tax_amt').val();
        var truck = $('#truckno').val();
        var freight = $('#freight').val();
        var gstinvoice = $('#gstinvoice').val();
        var id = $('#save_update').val();


        var fdateslt = voucher_date1.split('/');
        var voucher_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = bill_date1.split('/');
        var bill_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        var r1 = $('table#file_info').find('tbody').find('tr');
        var r = r1.length;

        var flg = 0;

        if (create_p > 0) {
            flg = 1;
        } else if (editrt > 0) {
            if (id > 0) {
                flg = 1;
            }
        }

        if (flg == 1) {
            if (r > 0) {
                $.ajax({
                    type: "POST",
                    url: baseurl + "FinishPS/adddata",

                    data: {
                        id: id,
                        purchase_id: purchase_id,
                        sales_id: sales_id,
                        voucher_date: voucher_date,
                        billno: billno,
                        type: type,
                        bill_date: bill_date,
                        party_id: party_id,
                        sgst: sgst,
                        cgst: cgst,
                        igst: igst,
                        nccd: nccd,
                        total: total,
                        truck: truck,
                        freight: freight,
                        basic_per: basic_per,
                        gstinvoice: gstinvoice,
                        table_name: table_name
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var sale_id = 0;

                        if (id == "") {
                            sale_id = data;
                            $('#btnprint').val(sale_id);
                        } else {
                            sale_id = id;
                        }

                        var r1 = $('table#file_info').find('tbody').find('tr');
                        var r = r1.length;

                        table_name = "sale_data";


                        for (var i = 0; i < r; i++) {

                            batch_id = $(r1[i]).find('td:eq(1)').html();
                            stock = $(r1[i]).find('td:eq(2)').html();
                            pack = $(r1[i]).find('td:eq(3)').html();
                            qty = $(r1[i]).find('td:eq(4)').html();
                            rate = $(r1[i]).find('td:eq(5)').html();

                            $.ajax({
                                type: "POST",
                                url: baseurl + "FinishPS/adddata1",

                                data: {
                                    id: id,
                                    sale_id: sale_id,
                                    batch_id: batch_id,
                                    stock: stock,
                                    qty: qty,
                                    pack: pack,
                                    rate: rate,
                                    table_name: table_name
                                },
                                dataType: "JSON",
                                async: false,
                                success: function(result) {

                                }

                            });
                        }
                    }

                });





                if (id != "") {
                    successTost("Data Update Successfully");
                } else {
                    successTost("Data Save Successfully");
                }
                // $('#master_form')[0].reset();
                formclear();
                getsaleid();
                defaultdate();
                $('#row').val("0");
                $('#file_info tbody').html('');

                $('.tablehideshow').show();

                datashow();
                $('.closehideshow').trigger('click');
            } else {
                swal("Selcet One Batch For Sale!!");
            }

        } else {
            swal("You Not Have This Permission!", "success");
        }

    });


    $("#sgst_per").blur(function() {
        count_total();
    });
    $("#cgst_per").blur(function() {
        count_total();
    });
    $("#nccd_per").blur(function() {
        var ncd = $('#nccd_per').val();
        getQty(ncd);
        //count_total();
    });
    $("#basic_per").blur(function() {
        var basicper = $('#basic_per').val();
        getBasic(basicper);
        //count_total();
    });

    function getQty(ncd) {
        var taxable = 0;
        var qty = 0;

        var r1 = $('table#file_info').find('tbody').find('tr');
        console.log("r1" + r1.length);
        for (var i = 0; i < r1.length; i++) {
            qty = $(r1[i]).find('td:eq(4)').html();
            taxable = parseFloat(taxable) + parseFloat(qty);
        }
        console.log("taxable" + taxable);
        var tot = parseFloat(taxable) * parseFloat(ncd);
        //  console.log("ncd"+ncd+"tot"+tot);
        $('#nccd_amt').val(tot.toFixed(2));
    }

    function getBasic(basic) {
        var taxable = 0;
        var qty = 0;
        var r1 = $('table#file_info').find('tbody').find('tr');
        for (var i = 0; i < r1.length; i++) {
            qty = $(r1[i]).find('td:eq(4)').html();
            taxable = parseFloat(taxable) + parseFloat(qty);
        }

        var tot = parseFloat(taxable) * parseFloat(basic);

        $('#basic_amt').val(tot.toFixed(2));

    }
    $("#igst_per").blur(function() {
        count_total();
    });

    function count_total() {
        var r1 = $('#file_info').find('tbody').find('tr');
        var r = r1.length;
        var taxable = 0;
        // var sgst = 0;
        // var cgst = 0;
        //  var igst = 0;
        for (var i = 0; i < r; i++) {
            //var t = document.getElementById('total');
            amt = $(r1[i]).find('td:eq(6)').html();
            taxable = parseFloat(taxable) + parseFloat(amt);
        }
        $('#tax_amt').val(taxable);
        var p_total = taxable;
        var sgst = parseFloat($("#sgst_per").val());
        var cgst = parseFloat($("#cgst_per").val());
        var igst = parseFloat($("#igst_per").val());
        //  var nccd = parseFloat($("#nccd_per").val());
        var sgst_amt = parseFloat(p_total) * parseFloat(sgst) / 100;
        var cgst_amt = parseFloat(p_total) * parseFloat(cgst) / 100;
        var igst_amt = parseFloat(p_total) * parseFloat(igst) / 100;
        // var nccd_amt = parseFloat(p_total) * parseFloat(nccd) / 100;

        sgst_amt = Math.round(sgst_amt);
        $("#sgst_amt").val(sgst_amt.toFixed(2));
        cgst_amt = Math.round(cgst_amt);
        $("#cgst_amt").val(cgst_amt.toFixed(2));
        igst_amt = Math.round(igst_amt);
        $("#igst_amt").val(igst_amt.toFixed(2));
        // $("#nccd_amt").val(nccd_amt.toFixed(2));

        var grand_total = p_total + sgst_amt + cgst_amt + igst_amt;
        $("#total").val(grand_total.toFixed(2));


    }
    $(document).on("change", "#date2", function() {
        datashow();
    });
    $(document).on("change", "#date3", function() {
        datashow();
    });

    /* function getQty(){
         var r1 = $('table#file_info').find('tbody').find('tr');
         var r = r1.length;
         alert(r);
     }*/

    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        var date2 = $('#date2').val();
        var date3 = $('#date3').val();
        type = "Finish Product";
        table_name = "purchase_master";
        var date = "";
        var edate = "";
        if (date2 != '') {
            var fdateslt = date2.split('/');
            date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

            var fdateslt = date3.split('/');
            edate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        }

        // alert(date);
        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/showdata",
            data: {
                table_name: table_name,
                date: date,
                type: type,
                edate: edate,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                var data = eval(data);
                console.log('data' + data);
                var sr = 0;
                var html = '';
                var packsum = 0;
                var taamountsum = 0;
                var igstsum = 0;
                var totalamtsum = 0;
                var basicsum = 0;
                var nccdsum = 0;
                var feightsum = 0;
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +

                    '<th><font style="font-weight:bold">Sale Date</font></th>' +
                    '<th ><font style="font-weight:bold">Invoce No</font></th>' +
                    '<th ><font style="font-weight:bold">No Of Box</font></th>' +
                    '<th style="display:none;">bill id</th>' +
                    '<th style="display:none;">bill date</th>' +
                    '<th style="display:none;">Party id</th>' +
                    '<th><font style="font-weight:bold">Party Name</font></th>' +
                    '<th><font style="font-weight:bold">Taxable Amount</font></th>' +
                    '<th><font style="font-weight:bold">SGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">CGST(%)</font></th>' +
                    '<th  style="display:none;"><font style="font-weight:bold">IGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">IGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">Total Amount</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Basic </font></th>' +
                    '<th><font style="font-weight:bold">Basic </font></th>' +
                    '<th  style="display:none;"><font style="font-weight:bold">NCCD</font></th>' +
                    '<th><font style="font-weight:bold">NCCD</font></th>' +
                    '<th ><font style="font-weight:bold">Truck No.</font></th>' +
                    '<th ><font style="font-weight:bold">Freight</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Freight</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var tot = Math.round(data[i].total);
                    var sgst = Math.round(data[i].sgst);
                    var cgst = Math.round(data[i].cgst);
                    var igst = Math.round(data[i].igst);



                    var sgst_amt = parseFloat(tot) * parseFloat(sgst) / 100;
                    var cgst_amt = parseFloat(tot) * parseFloat(cgst) / 100;
                    var igst_amt = parseFloat(tot) * parseFloat(igst) / 100;

                    var grand_total = parseFloat(tot) + parseFloat(igst_amt) + parseFloat(sgst_amt) + parseFloat(cgst_amt);
                    var grand_tot = Math.round(grand_total);
                    var basic_amt = (parseFloat(data[i].qtysum) * parseFloat(data[i].basic)).toFixed(2);
                    var nccd_amt = (parseFloat(data[i].qtysum) * parseFloat(data[i].nccd)).toFixed(2);

                    var fdateval = data[i].voucher_date;
                    var fdateslt = fdateval.split('-');
                    var voucher_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    sr = parseFloat(sr) + 1;

                    taamountsum = parseFloat(taamountsum) + parseFloat(tot);
                    nccdsum = parseFloat(nccdsum) + parseFloat(nccd_amt);
                    basicsum = parseFloat(basicsum) + parseFloat(basic_amt);
                    packsum = parseFloat(packsum) + parseFloat(data[i].packsum);
                    igstsum = parseFloat(igstsum) + parseFloat(igst_amt);
                    totalamtsum = parseFloat(grand_tot) + parseFloat(totalamtsum);
                    feightsum = parseFloat(feightsum) + parseFloat(data[i].freight);




                    html += '<tr>' +

                        '<td id="voucher_date_' + data[i].id + '">' + voucher_date + '</td>' +
                        '<td id="billno_' + data[i].id + '">' + data[i].sale_id + '</td>' +
                        '<td id="packsum_' + data[i].id + '">' + data[i].packsum + '</td>' +
                        '<td style="display:none;"id="bill_date_' + data[i].id + '">' + bill_date + '</td>' +
                        '<td style="display:none;"id="party_id_' + data[i].id + '">' + data[i].party_id + '</td>' +
                        '<td style="display:none;"id="sale_id_' + data[i].id + '">' + data[i].sale_id + '</td>' +
                        '<td id="party_name_' + data[i].id + '">' + data[i].party_name + '</td>' +
                        '<td id="total_' + data[i].id + '">' + data[i].total + '</td>' +
                        '<td id="sgst_' + data[i].id + '">' + data[i].sgst + '</td>' +
                        '<td id="cgst_' + data[i].id + '">' + data[i].cgst + '</td>' +
                        '<td  style="display:none;" id="igst_' + data[i].id + '">' + data[i].igst + '</td>' +
                        '<td  id="igstamt_' + data[i].id + '">' + igst_amt + '</td>' +
                        '<td id="gtotal_' + data[i].id + '">' + grand_tot + '</td>' +
                        '<td style="display:none;" id="basicper_' + data[i].id + '">' + data[i].basic + '</td>' +
                        '<td id="basicamt_' + data[i].id + '">' + basic_amt + '</td>' +
                        '<td  style="display:none;" id="nccd1_' + data[i].id + '">' + data[i].nccd + '</td>' +
                        '<td id="nccdamt_' + data[i].id + '">' + nccd_amt + '</td>' +
                        '<td  id="truck_' + data[i].id + '">' + data[i].truck_no + '</td>' +
                        '<td  id="freight_' + data[i].id + '">' + data[i].freight + '</td>' +
                        '<td  style="display:none;"  id="gst_invoice_no_' + data[i].id + '">' + data[i].gst_invoice_no + '</td>' +
                        // '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>&nbsp;<button name="delete" value="Delete" class="print_pdf btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-print"></i></button></td>' +
                        '<td class="not-export-column" >';
                    if (editrt == 1) {
                        html += '<button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>';
                    }
                    if (delrt == 1) {
                        html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>';
                    }
                    html += '&nbsp;&nbsp;<button name="delete" value="Delete" class="print_pdf btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-print"></i></button>';
                    html += '</td>' +
                        '</tr>';

                }
                html += '</tbody>';
                html += '<tfoot>' +
                    '<tr>' +

                    '<td >Total</td>' +
                    '<td >	</td>' +
                    '<td >' + packsum + '</td>' +
                    '<td style="display:none;"></td>' +
                    '<td style="display:none;"></td>' +
                    '<td style="display:none;"></td>' +
                    '<td ></td>' +
                    '<td >' + taamountsum.toFixed(2) + '</td>' +
                    '<td >' + 0 + '</td>' +
                    '<td >' + 0 + '</td>' +
                    '<td  style="display:none;" >' + 0 + '</td>' +
                    '<td >' + igstsum + '</td>' +
                    '<td >' + totalamtsum + '</td>' +
                    '<td style="display:none;" >' + 0 + '</td>' +
                    '<td >' + basicsum.toFixed(2) + '</td>' +
                    '<td  style="display:none;" >' + 0 + '</td>' +
                    '<td>' + nccdsum.toFixed(2) + '</td>' +
                    '<td ></td>' +
                    '<td  >' + feightsum.toFixed(2) + '</td>' +
                    '<td  style="display:none;" ></td>' +
                    '<td class="not-export-column" >-</td>' +
                    '</tr>' +

                    '</tfoot></table>';





                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            title: 'DB Stock-Raw Item Purchase & Sales',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            exportOptions: {
                                columns: [0, 1, 2, 7, 8, 9, 11, 12, 14, 16, 17, 18]
                            },
                        },
                        {
                            title: 'DB Stock-Raw Item Purchase & Sales',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 7, 8, 9, 11, 12, 14, 16, 17, 18]
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

        // $('#save_update').val(id1);

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
                        url: baseurl + "FinishPS/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {

                            table_name = "sale_data";
                            $.ajax({
                                type: "POST",
                                url: baseurl + "FinishPS/deletedata",
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
        //   $('#file_info_tbody').html('');
        var id = $(this).attr('id');
        $('#btnprint').val(id);
        var voucher_date1 = $('#voucher_date_' + id).html();

        var billno = $('#billno_' + id).html();
        var bill_date1 = $('#bill_date_' + id).html();
        var party_id = $('#party_id_' + id).html();
        var sale_id = $('#sale_id_' + id).html();
        var sgst = $('#sgst_' + id).html();
        var cgst = $('#cgst_' + id).html();
        var igst = $('#igst_' + id).html();
        var nccd1 = $('#nccd1_' + id).html();
        var total = $('#total_' + id).html();
        var truck = $('#truck_' + id).html();
        var freight = $('#freight_' + id).html();
        var basicper = $('#basicper_' + id).html();
        var gst_invoice_no = $('#gst_invoice_no_' + id).html();

        $('#date').val(voucher_date1);
        $('#invoice').val(sale_id);
        $('#gstinvoice').val(gst_invoice_no);
        $('#saleto').val(party_id).trigger('change');;
        $('#sgst_per').val(sgst);
        $('#cgst_per').val(cgst);
        $('#igst_per').val(igst);
        $('#nccd_per').val(nccd1);
        $('#tax_amt').val(total);
        $('#truckno').val(truck);
        $('#freight').val(freight);
        $('#basic_per').val(basicper);
        $('#save_update').val(id);


        table_name = "sale_data";
        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/fetch_data",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,
            },
            success: function(data) {

                var data = eval(data);

                var r = data.length;

                var row_id = $("#row").val();

                var table = "";
                for (var i = 0; i < r; i++) {

                    row_id = parseInt(row_id) + 1;

                    //var rowid = $('#row').val();
                    // var row_id = parseInt(rowid) + 1;
                    var qty = data[i].qty;
                    var rate = data[i].rate;
                    var amt = parseFloat(qty) * parseFloat(rate);


                    table += '<tr id="' + row_id + '">' +
                        '<td id="batch_' + row_id + '">' + data[i].batch_name +
                        '</td><td hidden id="batchid_' + row_id + '">' + data[i].batch_id +
                        '</td><td id="stock_' + row_id + '">' + data[i].stock +
                        '</td><td id="pack_' + row_id + '">' + data[i].pack +
                        '</td><td id="qty_' + row_id + '">' + data[i].qty +
                        '</td><td id="rate_' + row_id + '">' + data[i].rate +
                        '</td><td id="total_value_' + row_id + '">' + amt +
                        '</td><td><button type="button" name="edit" class="edit_data1 btn btn-xs btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="btn delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';

                    $('#row').val(row_id);
                    // alert(table);

                }

                $('#file_info_tbody').html(table);
                multiplications();
                count_total();
                getQty(nccd1);
                getBasic(basicper);
                //  alert(row_id);
            }

        });

    });

    $(document).on('click', '.print_pdf', function() {
        var id1 = $(this).attr('id');
        $('#btnprint').val(id1);
        $("#pdfgenerate").trigger('submit');

    });
});