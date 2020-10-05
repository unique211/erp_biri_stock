$(document).ready(function() {
    var table_name = "item_master";
    var date = new Date();
    var fromdate = date.toString('dd/MM/yyyy');

    datashow(fromdate);


    //----------------------submit form code start------------------------------
    $(document).on("click", "#btnsave", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        //alert(id);
        var date = $('#date').val();

        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        datashow(cdate);



    });



    //----------------------submit form code end------------------------------

    //----------------show data in the tabale code start-----------------------
    function datashow(fromdate) {


        $.ajax({
            type: "POST",
            url: baseurl + "Daybookrep/showData",
            data: {

                fromdate: fromdate,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                //var data = eval(data);

                var sum_asal_bidi = 0;
                var sum_chant_bidi_pcs = 0;
                var sum_chant_bidi_kgs = 0;
                var sum_tob_wt = 0;
                var sum_tob = 0;
                var sum_tob_bag = 0;
                var sum_leaves = 0;
                var sum_leaves_bag = 0;
                var sum_bl_yarn = 0;
                var sum_wh_yarn = 0;
                var sum_filter = 0;
                var sum_disc = 0;
                var sum_cartons = 0;

                var html = '';
                html += '<table id="myTable" style="width:100%;table-layout:fixed;"  class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th style="display:none;"><font style="font-weight:bold">Id</font></th>' + //0
                    '<th width="7%"><font style="font-weight:bold">Date</font></th>' + //1
                    '<th style="display:none;"><font style="font-weight:bold">contractor No. </font></th>' + //2
                    '<th width="8%"><font style="font-weight:bold">Contractor Name </font></th>' + //3
                    '<th style="display:none;"><font style="font-weight:bold">Checker Name</font></th>' + //4
                    '<th style="display:none;"><font style="font-weight:bold">Batchname </font></th>' + //5
                    '<th width="5%"><font style="font-weight:bold">Batch </font></th>' + //6
                    '<th width="5%"><font style="font-weight:bold">Asal Bidi </font></th>' + //7
                    '<th width="5%"><font style="font-weight:bold">Chant Bidi Pcs </font></th>' + //8
                    '<th width="5%"><font style="font-weight:bold">Chant Bidi Kgs </font></th> ' + //9
                    '<th style="display:none;"><font style="font-weight:bold">Wages Group </font></th>' + //10
                    '<th width="7%"><font style="font-weight:bold">Wages Group </font></th>' + //11
                    '<th style="display:none;"><font style="font-weight:bold">Quality</font></th>' + //12
                    '<th width="5%"><font style="font-weight:bold">Tobacco Weight </font></th>' + //13
                    '<th width="5%"><font style="font-weight:bold">Tobacco </font></th>' + //14
                    '<th width="5%"><font style="font-weight:bold">Tobacco Bag </font></th>' + //15
                    '<th width="5%"><font style="font-weight:bold">Leaves </font></th>' + //16
                    '<th style="display:none;"><font style="font-weight:bold">Batch </font></th>' + //17
                    '<th width="5%"><font style="font-weight:bold">Leaves Bag </font></th>' + //18
                    '<th width="5%"><font style="font-weight:bold">Black Yarn </font></th>' + //19
                    '<th width="5%"><font style="font-weight:bold">White Yarn </font></th>' + //20
                    '<th width="5%"><font style="font-weight:bold">Filter </font></th>' + //21
                    '<th width="5%"><font style="font-weight:bold">Disc </font></th>' + //22
                    '<th width="5%"><font style="font-weight:bold">Cartons </font></th>' + //23
                    // '<th width="8%" class="not-export-column"><font style="font-weight:bold">Action</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                var batch = '';
                if (data[0].coniss != "") {

                    for (var i = 0; i < data[0].coniss.length; i++) {

                        var fdateval = data[0].coniss[i].date;
                        var fdateslt = fdateval.split('-');
                        var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var batch = data[0].coniss[i].batchname;

                        var sum_asal_bidi = parseFloat(sum_asal_bidi) + parseFloat(data[0].coniss[i].asal_bidi);
                        //console.log(sum_asal_bidi);
                        var sum_chant_bidi_pcs = parseFloat(sum_chant_bidi_pcs) + parseFloat(data[0].coniss[i].chant_bidi_pcs);
                        var sum_chant_bidi_kgs = parseFloat(sum_chant_bidi_kgs) + parseFloat(data[0].coniss[i].chant_bidi_kgs);
                        var sum_tob_wt = parseFloat(sum_tob_wt) + parseFloat(data[0].coniss[i].tob_wt);
                        var sum_tob = parseFloat(sum_tob) + parseFloat(data[0].coniss[i].tob);
                        var sum_tob_bag = parseFloat(sum_tob_bag) + parseFloat(data[0].coniss[i].tob_bag);
                        var sum_leaves = parseFloat(sum_leaves) + parseFloat(data[0].coniss[i].leaves);
                        var sum_leaves_bag = parseFloat(sum_leaves_bag) + parseFloat(data[0].coniss[i].leaves_bag);
                        var sum_bl_yarn = parseFloat(sum_bl_yarn) + parseFloat(data[0].coniss[i].bl_yarn);
                        var sum_wh_yarn = parseFloat(sum_wh_yarn) + parseFloat(data[0].coniss[i].wh_yarn);
                        var sum_filter = parseFloat(sum_filter) + parseFloat(data[0].coniss[i].filter);
                        var sum_disc = parseFloat(sum_disc) + parseFloat(data[0].coniss[i].disc);
                        var sum_cartons = parseFloat(sum_cartons) + parseFloat(data[0].coniss[i].cartons);

                        html += '<tr>' +
                            '<td style="display:none;" id="id_' + data[0].coniss[i].id + '">' + data[0].coniss[i].id + '</td>' +
                            '<td id="date_' + data[0].coniss[i].id + '">' + fdate + '</td>' +
                            '<td style="display:none;" id="cont_name_' + data[0].coniss[i].id + '">' + data[0].coniss[i].cont_name + '</td>' +
                            '<td id="cont_name2_' + data[0].coniss[i].id + '">' + data[0].coniss[i].co_name + '</td>' +
                            '<td style="display:none;" id="checker_' + data[0].coniss[i].id + '">' + data[0].coniss[i].checker_name + '</td>' +
                            '<td style="display:none;" id="batch1_' + data[0].coniss[i].id + '">' + data[0].coniss[i].batch1 + '</td>' +
                            '<td id="batch12_' + data[0].coniss[i].id + '">' + data[0].coniss[i].batchname + '</td>' +
                            '<td id="asalbidi_' + data[0].coniss[i].id + '">' + data[0].coniss[i].asal_bidi + '</td>' +
                            '<td id="chant_pcs_' + data[0].coniss[i].id + '">' + data[0].coniss[i].chant_bidi_pcs + '</td>' +
                            '<td id="chant_kgs_' + data[0].coniss[i].id + '">' + data[0].coniss[i].chant_bidi_kgs + '</td>' +
                            '<td style="display:none;" id="wages_' + data[0].coniss[i].id + '">' + data[0].coniss[i].wages + '</td>' +
                            '<td id="wagess_' + data[0].coniss[i].id + '">' + data[0].coniss[i].wagesname + '</td>' +
                            '<td style="display:none;" id="qlty_' + data[0].coniss[i].id + '">' + data[0].coniss[i].qlty + '</td>' +
                            '<td id="tob_wt_' + data[0].coniss[i].id + '">' + data[0].coniss[i].tob_wt + '</td>' +
                            '<td id="tob_' + data[0].coniss[i].id + '">' + data[0].coniss[i].tob + '</td>' +
                            '<td id="tob_bag_' + data[0].coniss[i].id + '">' + data[0].coniss[i].tob_bag + '</td>' +
                            '<td id="leaves_' + data[0].coniss[i].id + '">' + data[0].coniss[i].leaves + '</td>' +
                            '<td style="display:none;"id="batch2_' + data[0].coniss[i].id + '">' + data[0].coniss[i].batch2 + '</td>' +
                            '<td id="leaves_bag_' + data[0].coniss[i].id + '">' + data[0].coniss[i].leaves_bag + '</td>' +
                            '<td id="bl_yarn_' + data[0].coniss[i].id + '">' + data[0].coniss[i].bl_yarn + '</td>' +
                            '<td id="wh_yarn_' + data[0].coniss[i].id + '">' + data[0].coniss[i].wh_yarn + '</td>' +
                            '<td id="filter_' + data[0].coniss[i].id + '">' + data[0].coniss[i].filter + '</td>' +
                            '<td id="disc_' + data[0].coniss[i].id + '">' + data[0].coniss[i].disc + '</td>' +
                            '<td id="cartons_' + data[0].coniss[i].id + '">' + data[0].coniss[i].cartons + '</td>' +
                            // '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                            '</tr>';

                    }
                    //var func=getbatch(batch);
                    html += '</tbody><tfoot id="tfoot">' +
                        '<tr id="total">' +
                        '<td  class="boldness" style="display:none;">0</td>' +
                        '<td></td>' +
                        '<td style="display:none;">0</td>' +
                        '<td></td>' +
                        '<td style="display:none;">0</td>' +
                        '<td style="display:none;">0</td>' +
                        '<td class="boldness" >Total </td>' +
                        '<td class="boldness" >' + sum_asal_bidi.toFixed(3) + '</td>' +
                        '<td class="boldness" >' + sum_chant_bidi_pcs.toFixed(3) + '</td>' +
                        '<td class="boldness" >' + sum_chant_bidi_kgs.toFixed(3) + '</td>' +
                        '<td class="boldness"  style="display:none;">0</td>' +
                        '<td></td>' +
                        '<td style="display:none;">0</td>' +
                        '<td class="boldness" ></td>' + //' + sum_tob_wt.toFixed(3) + '
                        '<td class="boldness" >' + sum_tob.toFixed(3) + '</td>' +
                        '<td class="boldness" >' + sum_tob_bag + '</td>' +
                        '<td class="boldness" >' + sum_leaves.toFixed(3) + '</td>' +
                        '<td style="display:none;"> </td>' +
                        '<td class="boldness" >' + sum_leaves_bag + '</td>' +
                        '<td class="boldness" >' + sum_bl_yarn.toFixed(3) + ' </td>' +
                        '<td class="boldness" >' + sum_wh_yarn.toFixed(3) + '</td>' +
                        '<td class="boldness" >' + sum_filter.toFixed(3) + '</td>' +
                        '<td class="boldness" >' + sum_disc + '</td>' +
                        '<td class="boldness" >' + sum_cartons + '</td>' +
                        // '<td class="boldness" > </td>  </tr>  ' +
                        '</tfoot></table>';
                }
                $('#show_master').html(html);

                $('#myTable').DataTable({

                });


                var sum_tobacco = 0;
                var sum_leaves = 0;
                var sum_bl_yarn = 0;
                var sum_wh_yarn = 0;
                var sum_filter = 0;

                var html1 = '';
                html1 += '<table id="myTable1" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Date </font></th>' +
                    '<th><font style="font-weight:bold">Contractor Name</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">contractor id. </font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">batch id. </font></th>' +
                    '<th><font style="font-weight:bold">Batch</font></th>' +
                    '<th><font style="font-weight:bold">Tobacco</font></th>' +
                    '<th><font style="font-weight:bold">Leaves </font></th>' +
                    '<th><font style="font-weight:bold">Black Yarn</font></th>' +
                    '<th><font style="font-weight:bold">White Yarn</font></th>' +
                    '<th><font style="font-weight:bold">Filter</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Tobacco Amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Leaces Amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">BY Amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">WY amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Fil Amt</font></th>' +
                    // '<th><font style="font-weight:bold">Operations </font></th> ' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data[0].conadj.length; i++) {

                    var fdateval = data[0].conadj[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var sum_tobacco = parseFloat(sum_tobacco) + parseFloat(data[0].conadj[i].tobacco);
                    var sum_leaves = parseFloat(sum_leaves) + parseFloat(data[0].conadj[i].leaves);
                    var sum_bl_yarn = parseFloat(sum_bl_yarn) + parseFloat(data[0].conadj[i].bl_yarn);
                    var sum_wh_yarn = parseFloat(sum_wh_yarn) + parseFloat(data[0].conadj[i].wh_yarn);
                    var sum_filter = parseFloat(sum_filter) + parseFloat(data[0].conadj[i].filter);

                    html1 += '<tr>' +
                        '<td id="date_' + data[0].conadj[i].id + '">' + date + '</td>' +
                        '<td id="contractor2_' + data[0].conadj[i].id + '">' + data[0].conadj[i].co_name + '</td>' +
                        '<td style="display:none;" id="contractor_' + data[0].conadj[i].id + '">' + data[0].conadj[i].contractor + '</td>' +
                        '<td style="display:none;" id="batch_' + data[0].conadj[i].id + '">' + data[0].conadj[i].batch + '</td>' +
                        '<td id="batch2_' + data[0].conadj[i].id + '">' + data[0].conadj[i].batchname + '</td>' +
                        '<td id="tobacco_' + data[0].conadj[i].id + '">' + data[0].conadj[i].tobacco + '</td>' +
                        '<td id="leaves_' + data[0].conadj[i].id + '">' + data[0].conadj[i].leaves + '</td>' +
                        '<td id="bl_yarn_' + data[0].conadj[i].id + '">' + data[0].conadj[i].bl_yarn + '</td>' +
                        '<td id="wh_yarn_' + data[0].conadj[i].id + '">' + data[0].conadj[i].wh_yarn + '</td>' +
                        '<td id="filter_' + data[0].conadj[i].id + '">' + data[0].conadj[i].filter + '</td>' +
                        '<td style="display:none;" id="tobamt_' + data[0].conadj[i].id + '">' + data[0].conadj[i].tobacco_amt + '</td>' +
                        '<td style="display:none;" id="levamt_' + data[0].conadj[i].id + '">' + data[0].conadj[i].leaves_amt + '</td>' +
                        '<td style="display:none;" id="blyamt_' + data[0].conadj[i].id + '">' + data[0].conadj[i].bl_yarn_amt + '</td>' +
                        '<td style="display:none;" id="whyamt_' + data[0].conadj[i].id + '">' + data[0].conadj[i].wh_yarn_amt + '</td>' +
                        '<td style="display:none;" id="filamt_' + data[0].conadj[i].id + '">' + data[0].conadj[i].filter_amt + '</td>' +
                        //'<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';
                }
                html1 += '</tbody><tfoot>' +
                    '<tr>' +
                    '<td>Total</td>' +
                    '<td></td>' +
                    '<td style="display:none;">0</td>' +
                    '<td style="display:none;">0</td>' +
                    '<td></td>' +
                    '<td>' + sum_tobacco.toFixed(3) + '</td>' +
                    '<td>' + sum_leaves.toFixed(3) + '</td>' +
                    '<td>' + sum_bl_yarn.toFixed(3) + '</td>' +
                    '<td>' + sum_wh_yarn.toFixed(3) + '</td>' +
                    '<td>' + sum_filter.toFixed(3) + '</td>' +

                    //  '<td></td>  </tr>  ' +

                    '</tfoot></table>';

                $('#show_master1').html(html1);
                $('#myTable1').DataTable({

                });





                var html3 = '';
                html3 += '<table id="myTable3" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Date</font></th>' +
                    '<th><font style="font-weight:bold">Batch Name</font></th>' +
                    '<th><font style="font-weight:bold">No. of Cartons</font></th>' +
                    '<th><font style="font-weight:bold">Total Bidi</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">ref_id</font></th>' +
                    //'<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                var sum_cartons = 0;
                var sum_total_bidi = 0;
                for (var i = 0; i < data[0].finishpro.length; i++) {
                    var bidi = data[0].finishpro[i].bidi;
                    var cbidi = data[0].finishpro[i].cbidi;
                    var tot = parseFloat(bidi) + parseFloat(cbidi);
                    // alert(tot);
                    sum_cartons = parseFloat(sum_cartons) + parseFloat(data[0].finishpro[i].cartons);
                    sum_total_bidi = parseFloat(sum_total_bidi) + parseFloat(data[0].finishpro[i].total_bidi);
                    var fdateval = data[0].finishpro[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html3 += '<tr>' +
                        '<td id="date_' + data[0].finishpro[i].ref_id + '">' + date + '</td>' +
                        '<td id="batch_' + data[0].finishpro[i].ref_id + '">' + data[0].finishpro[i].lablenm + '</td>' +
                        '<td id="cartons_' + data[i].ref_id + '">' + data[0].finishpro[i].cartons + '</td>' +
                        '<td id="total_bidi_' + data[0].finishpro[i].ref_id + '">' + data[0].finishpro[i].total_bidi + '</td>' +
                        '<td style="display:none;" id="ref_id_' + data[0].finishpro[i].id + '">' + tot.toFixed(3) + '</td>' +
                        //  '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].ref_id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].ref_id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }
                html3 += '</tbody>' +
                    '<tfoot>' +
                    '<tr>' +
                    '<td class="boldness">Total</td>' +
                    '<td class="boldness"></td>' +
                    '<td class="boldness">' + sum_cartons + '</td>' +
                    '<td class="boldness">' + sum_total_bidi.toFixed(3) + '</td>' +
                    // '<td class="boldness"></td>' +
                    '</tr>' +
                    '</tfoot>' +
                    '</table>';

                $('#show_master3').html(html3);
                $('#myTable3').DataTable({

                });



                var html4 = '';
                html4 += '<table id="myTable4" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th><font style="font-weight:bold">Voucher Date</font></th>' +
                    '<th style="display:none;">type</th>' +
                    '<th style="display:none;">bill id</th>' +
                    '<th style="display:none;">bill date</th>' +
                    '<th style="display:none;">Party id</th>' +
                    '<th><font style="font-weight:bold">Party Name</font></th>' +
                    '<th><font style="font-weight:bold">Taxable Amount</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">SGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">SGST</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">CGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">CGST</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">IGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">IGST</font></th>' +
                    '<th><font style="font-weight:bold">Total Amount</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Truck</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Freight</font></th>' +
                    //'<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data[0].rawitempur.length; i++) {

                    var fdateval = data[0].rawitempur[i].voucher_date;
                    var fdateslt = fdateval.split('-');
                    var voucher_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[0].rawitempur[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var tot = Math.round(data[0].rawitempur[i].total);
                    var sgst = Math.round(data[0].rawitempur[i].sgst);
                    var cgst = Math.round(data[0].rawitempur[i].cgst);
                    var igst = Math.round(data[0].rawitempur[i].igst);

                    var sgst_amt = parseFloat(tot) * parseFloat(sgst) / 100;
                    var cgst_amt = parseFloat(tot) * parseFloat(cgst) / 100;
                    var igst_amt = parseFloat(tot) * parseFloat(igst) / 100;
                    //var nccd_amt = parseFloat(tot) * parseFloat(nccd) / 100;
                    var grand_total = parseFloat(tot) + parseFloat(igst_amt) + parseFloat(sgst_amt) + parseFloat(cgst_amt);
                    var grand_tot = Math.round(grand_total);

                    html4 += '<tr>' +
                        '<td id="type_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].type + '</td>' +
                        '<td id="voucher_date_' + data[0].rawitempur[i].id + '">' + voucher_date + '</td>' +
                        '<td style="display:none;"id="type_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].type + '</td>' +
                        '<td style="display:none;"id="billno_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].bill_no + '</td>' +
                        '<td style="display:none;"id="bill_date_' + data[0].rawitempur[i].id + '">' + bill_date + '</td>' +
                        '<td style="display:none;"id="party_id_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].party_id + '</td>' +
                        '<td id="party_name_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].party_name + '</td>' +
                        '<td id="total_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].total + '</td>' +
                        '<td style="display:none;" id="sgst_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].sgst + '</td>' +
                        '<td id="sgst1_' + data[0].rawitempur[i].id + '">' + sgst_amt + '</td>' +
                        '<td style="display:none;" id="cgst_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].cgst + '</td>' +
                        '<td id="cgst1_' + data[0].rawitempur[i].id + '">' + cgst_amt + '</td>' +
                        '<td style="display:none;" id="igst_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].igst + '</td>' +
                        '<td id="igst1_' + data[0].rawitempur[i].id + '">' + igst_amt + '</td>' +
                        '<td id="total_' + data[0].rawitempur[i].id + '">' + grand_tot + '</td>' +
                        '<td style="display:none;" id="truck_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].truck_no + '</td>' +
                        '<td style="display:none;" id="freight_' + data[0].rawitempur[i].id + '">' + data[0].rawitempur[i].freight + '</td>' +
                        // '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }
                html4 += '</tbody></table>';

                $('#show_master4').html(html4);
                $('#myTable4').DataTable({

                });


                var html7 = '';
                html7 += '<table id="myTable7" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Date</font></th>' +
                    '<th><font style="font-weight:bold">Batch</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">batch id</font></th>' +
                    '<th><font style="font-weight:bold">Unit (Kg)</font></th>' +
                    '<th><font style="font-weight:bold">Alternative Unit Bags</font></th>' +
                    '<th><font style="font-weight:bold">Labour Charges</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">ref_id</font></th>' +
                    //'<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data[0].tabacomix.length; i++) {

                    var fdateval = data[0].tabacomix[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html7 += '<tr>' +
                        '<td id="date_' + data[0].tabacomix[i].id + '">' + date + '</td>' +
                        '<td id="batch_' + data[0].tabacomix[i].id + '">' + data[0].tabacomix[i].batch_name + '</td>' +
                        '<td style="display:none;" id="batch_id_' + data[0].tabacomix[i].id + '">' + data[0].tabacomix[i].batch + '</td>' +
                        '<td id="unit_' + data[0].tabacomix[i].id + '">' + data[0].tabacomix[i].unit + '</td>' +
                        '<td id="alt_bag_' + data[0].tabacomix[i].id + '">' + data[0].tabacomix[i].alt_bag + '</td>' +
                        '<td id="labor_charge_' + data[0].tabacomix[i].id + '">' + data[0].tabacomix[i].labor_charge + '</td>' +
                        '<td style="display:none;" id="ref_id_' + data[0].tabacomix[i].id + '">' + data[0].tabacomix[i].id + '</td>' +
                        //'<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }
                html7 += '</tbody></table>';

                $('#show_master7').html(html7);
                $('#myTable7').DataTable({

                });






            }

        });



        $.ajax({
            type: "POST",
            url: baseurl + "Vouchar/showData",
            data: {
                table_name: 'vouchar',
                fromdate: fromdate,
                todate: fromdate,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);

                console.log(data);

                var html2 = '';
                html2 += '<table id="myTable2" class="table table-striped">' +
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
                    // '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody >';
                for (var i = 1; i < data.length; i++) {
                    var fdateslt = data[i].date.split('-');
                    var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    html2 += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="date_' + data[i].id + '">' + cdate + '</td>' +
                        '<td id="type_' + data[i].id + '">' + data[i].type + '</td>' +
                        '<td hidden id="from_' + data[i].id + '">' + data[i].from + '</td>' +
                        '<td>' + data[i].contractor + '</td>' +
                        '<td hidden id="to_' + data[i].id + '">' + data[i].to + '</td>' +
                        '<td >' + data[i].tcontractor + '</td>' +
                        '<td id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                        '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                        //'<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }

                html2 += '</tbody></table>';

                $('#show_master2').html(html2);
                $('#myTable2').DataTable({

                });

            }

        });



        var type = "Finish Product";
        $.ajax({
            type: "POST",
            url: baseurl + "FinishPS/showdata",
            data: {
                table_name: "purchase_master",
                date: fromdate,
                edate: fromdate,
                type: type,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                var data = eval(data);
                console.log('data' + data);
                var sr = 0;
                var html5 = '';
                var packsum = 0;
                var taamountsum = 0;
                var igstsum = 0;
                var totalamtsum = 0;
                var basicsum = 0;
                var nccdsum = 0;
                var feightsum = 0;
                html5 += '<table id="myTable5" class="table table-striped">' +
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
                    //  '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

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




                    html5 += '<tr>' +

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
                        //'<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>&nbsp;<button name="delete" value="Delete" class="print_pdf btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-print"></i></button></td>' +
                        '</tr>';

                }
                html5 += '</tbody>';
                html5 += '<tfoot>' +
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
                    // '<td class="not-export-column" >-</td>' +
                    '</tr>' +

                    '</tfoot></table>';





                $('#show_master5').html(html5);
                $('#myTable5').DataTable({

                });

            }

        });

        var where = fromdate;

        $.ajax({
            type: "POST",
            url: baseurl + "Raw_IT/showdata",
            data: {
                table_name: 'raw_item',
                where: where,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);


                var html6 = '';
                html6 += '<table id="myTable6" class="table table-striped">' +
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
                    //   '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';

                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html6 += '<tr>' +
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
                        '</tr>';

                }
                html6 += '</tbody></table>';

                $('#show_master6').html(html6);

                $('#myTable6').DataTable({

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