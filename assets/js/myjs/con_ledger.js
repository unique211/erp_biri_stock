$(document).ready(function() {
    $("#btnExport").click(function() {
        $("#file_info").table2excel({
            exclude: ".noExl",
            name: "Contractor Ledger",
            filename: "Contractor Ledger",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });

    getDate();

    function getDate() {
        $.ajax({
            type: "POST",
            url: baseurl + "Contractor_ledger/getdata",
            data: {
                table_name: 'financial_period'
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                var fdateslt = data[0].psdate.split('-');
                var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                var fdateslt = data[0].pedate.split('-');
                var cdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                $('#fdate').val(fdate);
                $('#date').val(cdate);
            },
            error: function() {
                errorTost("Error");
            }
        });
    }
    $('#search').on('click', function() {
        var table_name = 'con-party_master';
        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var contractor = $('#contractor').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];


        $.ajax({
            type: "POST",
            url: baseurl + "Contractor_ledger/showData",
            data: {
                table_name: table_name,
                where: contractor,
                fdate: fdate,
                date: cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                var bname = '';
                batch1 = '';
                console.log(data);
                //variables for total sum
                var tasb = 0;
                var tchkg = 0;
                var tchpcs = 0;
                var tleave = 0;
                var ttobacco = 0;
                var tbly = 0;
                var twhy = 0;
                var tfilter = 0;
                //variables for closing balance
                var cleaves = 0;
                var a = 0;
                var oleave = 0;
                var crleaves = 0;
                var ls = 0;
                var tleaves = 0;
                var total = 0;
                var flag = 0;
                var row = 0;
                var batches = '';
                var table = '';
                var btc = data[0].batch;
                var row1 = 0;
                var openingbalance = '';
                var sumofasb = 0;
                var sumofchkg = 0;
                var sumofchpcs = 0;
                var sumoftob = 0;
                var sumoflev = 0;
                var sumofbly = 0;
                var sumofwhy = 0;
                var sumoffil = 0;
                var optob = 0;
                var oplev = 0;
                var opbly = 0;
                var opwhy = 0;
                var opfil = 0;
                var nbiri = 0;
                var chbirikg = 0;
                var chbiripcs = 0;
                var grosstotal = 0;
                var lev = 0;
                var tob = 0;
                var blsutta = 0;
                var whsutta = 0;
                var bag = 0;
                var dice = 0;
                var tsort = 0;
                var advance = 0;
                var pf = 0;
                var sumoftotal = 0;
                var finalTot = 0;
                var here = 0;
                var check = 0;
                var totallev = 0;
                var totalbly = 0;
                var totalfil = 0;
                var totaltob = 0;
                var totalwhy = 0;
                var totalcc = 0;
                var totallevc = 0;
                for (var i = 0; i < data.length; i++) {
                    bname = data[i].batchname;
                    // console.log(oplev+" "+optob+" "+opbly+" "+opwhy+" "+opfil+" ");
                    if (data[i].batchname != null) {
                        //console.log(i);
                        row = i;
                        oplev = parseFloat(oplev) + parseFloat(data[i].leaves);
                        optob = parseFloat(optob) + parseFloat(data[i].tobacco);
                        opbly = parseFloat(opbly) + parseFloat(data[i].black_yarn);
                        opwhy = parseFloat(opwhy) + parseFloat(data[i].white_yarn);
                        opfil = parseFloat(opfil) + parseFloat(data[i].filter);
                        // tasb=parseFloat(tasb)+parseFloat(nbiri).toFixed(3);
                        // tchpcs=parseFloat(tchpcs)+parseFloat(chbiripcs).toFixed(3);
                        // tchkg=parseFloat(tchkg)+parseFloat(chbirikg).toFixed(3);
                        // ttobacco=parseFloat(ttobacco)+parseFloat(optob);
                        // tleave=parseFloat(tleave)+parseFloat(oplev);
                        // tbly=parseFloat(tbly)+parseFloat(opbly);
                        // twhy=parseFloat(twhy)+parseFloat(opwhy);
                        // tfilter=parseFloat(tfilter)+parseFloat(opfil);

                        sumofasb = parseFloat(sumofasb) + parseFloat((nbiri).toFixed(3));
                        sumofchkg = parseFloat(sumofchkg) + parseFloat(chbiripcs);
                        sumofchpcs = parseFloat(sumofchpcs) + parseFloat(chbirikg);
                        sumoflev = parseFloat(sumoflev) + parseFloat(oplev);
                        sumoftob = parseFloat(sumoftob) + parseFloat(optob);
                        sumofbly = parseFloat(sumofbly) + parseFloat(opbly);
                        sumofwhy = parseFloat(sumofwhy) + parseFloat(opwhy);
                        sumoffil = parseFloat(sumoffil) + parseFloat(opfil);

                        console.log("opening balance: " + tasb + " " + tchkg + " " + tchpcs + " " + ttobacco + " " + tleave + tbly + " " + twhy + " " + tfilter + " ");
                        table += '<tr >' +
                            '<td>' + sdate + '</td>' +
                            '<td>' + data[i].batchname + '</td>' +
                            '<td>' + '</td>' +
                            '<td>' + nbiri.toFixed(2) + '</td>' +
                            '<td>' + chbiripcs.toFixed(3) + '</td>' +
                            '<td>' + chbirikg.toFixed(3) + '</td>' +
                            '<td>' + data[i].leaves + '</td>' +
                            '<td>' + data[i].tobacco + '</td>' +
                            '<td>' + data[i].black_yarn + '</td>' +
                            '<td>' + data[i].white_yarn + '</td>' +
                            '<td>' + data[i].filter + '</td>' +
                            '</tr><tr id="row_' + i + '" class="names"></tr>';
                    }

                }
                $('#tbody').html(table);
                for (var i = 0; i < data.length; i++) {
                    if (data[i].batch != null) {
                        if (data[i])
                            if (btc == data[i].batch) { //|| btc1 == data[i].batch
                                if (data[i].qty != null) {
                                    here = 1;
                                    check = data[i].qty;
                                }
                                row = i;
                                console.log(row);
                                row1 = data.length;
                                console.log(row1 - 3);

                                if ((row1 - 3) == i) {
                                    flag = 1;
                                    console.log("flag is" + flag);
                                }

                                sumofasb = parseFloat(sumofasb) + parseFloat(data[i].asalbidi);
                                sumofchkg = parseFloat(sumofchkg) + parseFloat(data[i].chatbidikgs);
                                sumofchpcs = parseFloat(sumofchpcs) + parseFloat(data[i].chatbidipcs);
                                sumoflev = parseFloat(sumoflev) + parseFloat(data[i].lev);
                                sumoftob = parseFloat(sumoftob) + parseFloat(data[i].tob);
                                sumofbly = parseFloat(sumofbly) + parseFloat(data[i].bly);
                                sumofwhy = parseFloat(sumofwhy) + parseFloat(data[i].why);
                                sumoffil = parseFloat(sumoffil) + parseFloat(data[i].fil);


                                console.log(data[i].date);

                                var fdateslt = data[i].date.split('-');
                                var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                                batches += '<tr>' +
                                    '<td>' + fdate + '</td>' +
                                    '<td>' + data[i].batch + '</td>' +
                                    '<td>' + data[i].wages + '</td>' +
                                    '<td>' + data[i].asalbidi + '</td>' +
                                    '<td>' + data[i].chatbidipcs + '</td>' +
                                    '<td>' + data[i].chatbidikgs + '</td>' +
                                    '<td>' + data[i].lev + '</td>' +
                                    '<td>' + data[i].tob + '</td>' +
                                    '<td>' + data[i].bly + '</td>' +
                                    '<td>' + data[i].why + '</td>' +
                                    '<td>' + data[i].fil + '</td>' +
                                    '</tr>';
                                btc = data[i].batch;
                            } else {
                                if (here == 1) {
                                    batches += '<tr>' +
                                        '<td>' + data[i].date + '</td>' +
                                        '<td>' + btc + '</td>' +
                                        '<td>' + '</td>' +
                                        '<td>' + data[i].qty + '</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '</tr>';
                                    sumofasb = parseFloat(sumofasb) + parseFloat(data[i].qty);
                                }
                                btc = data[i].batch;
                                sumofasb = parseFloat(sumofasb) + parseFloat(nbiri);
                                sumofchpcs = parseFloat(sumofchpcs) + parseFloat(chbiripcs);
                                sumofchkg = parseFloat(sumofchkg) + parseFloat(chbirikg);
                                sumoflev = parseFloat(sumoflev) + parseFloat(oplev);
                                sumoftob = parseFloat(sumoftob) + parseFloat(optob);
                                sumofbly = parseFloat(sumofbly) + parseFloat(opbly);
                                sumofwhy = parseFloat(sumofwhy) + parseFloat(opwhy);
                                sumoffil = parseFloat(sumoffil) + parseFloat(opfil);
                                batches += '<tr id="batchtotal" class="names"><td style="text-align:center;" colspan="3">Sub Total---></td>' +
                                    '<td>' + sumofasb.toFixed(3) + '</td>' +
                                    '<td>' + sumofchpcs.toFixed(3) + '</td>' +
                                    '<td>' + sumofchkg.toFixed(3) + '</td>' +
                                    '<td>' + sumoflev.toFixed(3) + '</td>' +
                                    '<td>' + sumoftob.toFixed(3) + '</td>' +
                                    '<td>' + sumofbly.toFixed(3) + '</td>' +
                                    '<td>' + sumofwhy.toFixed(3) + '</td>' +
                                    '<td>' + sumoffil.toFixed(3) + '</td></tr>';
                                tasb = parseFloat(tasb) + parseFloat(sumofasb); //
                                tchpcs = parseFloat(tchpcs) + parseFloat(sumofchpcs); //
                                tchkg = parseFloat(tchkg) + parseFloat(sumofchkg); //
                                ttobacco = parseFloat(ttobacco) + parseFloat(sumoftob); //
                                tleave = parseFloat(tleave) + parseFloat(sumoflev); //
                                tbly = parseFloat(tbly) + parseFloat(sumofbly); //
                                twhy = parseFloat(twhy) + parseFloat(sumofwhy); //
                                tfilter = parseFloat(tfilter) + parseFloat(sumoffil); //
                                oleave = tleave;
                                console.log("Flag 0 : " + tasb + " " + tchkg + " " + tchpcs + " " + ttobacco + " " + tleave + tbly + " " + twhy + " " + tfilter + " ");
                                sumofasb = 0;
                                sumofchkg = 0;
                                sumofchpcs = 0;
                                sumoflev = 0;
                                sumoftob = 0;
                                sumofbly = 0;
                                sumofwhy = 0;
                                sumoffil = 0;
                                sumofasb = parseFloat(sumofasb) + parseFloat(data[i].asalbidi);
                                sumofchkg = parseFloat(sumofchkg) + parseFloat(data[i].chatbidikgs);
                                sumofchpcs = parseFloat(sumofchpcs) + parseFloat(data[i].chatbidipcs);
                                sumoflev = parseFloat(sumoflev) + parseFloat(data[i].lev);
                                sumoftob = parseFloat(sumoftob) + parseFloat(data[i].tob);
                                sumofbly = parseFloat(sumofbly) + parseFloat(data[i].bly);
                                sumofwhy = parseFloat(sumofwhy) + parseFloat(data[i].why);
                                sumoffil = parseFloat(sumoffil) + parseFloat(data[i].fil);

                                batches += '<tr>' +
                                    '<td>' + data[i].date + '</td>' +
                                    '<td>' + data[i].batch + '</td>' +
                                    '<td>' + data[i].wages + '</td>' +
                                    '<td>' + data[i].asalbidi + '</td>' +
                                    '<td>' + data[i].chatbidipcs + '</td>' +
                                    '<td>' + data[i].chatbidikgs + '</td>' +
                                    '<td>' + data[i].lev + '</td>' +
                                    '<td>' + data[i].tob + '</td>' +
                                    '<td>' + data[i].bly + '</td>' +
                                    '<td>' + data[i].why + '</td>' +
                                    '<td>' + data[i].fil + '</td>' +
                                    '</tr>';
                            }

                        if (flag == 1) {
                            //oleave=0;
                            tasb = parseFloat(tasb) + parseFloat(sumofasb); //
                            tchpcs = parseFloat(tchpcs) + parseFloat(sumofchpcs); //
                            tchkg = parseFloat(tchkg) + parseFloat(sumofchkg); //
                            ttobacco = parseFloat(ttobacco) + parseFloat(sumoftob); //
                            tleave = parseFloat(tleave) + parseFloat(sumoflev); //
                            tbly = parseFloat(tbly) + parseFloat(sumofbly); //
                            twhy = parseFloat(twhy) + parseFloat(sumofwhy); //
                            tfilter = parseFloat(tfilter) + parseFloat(sumoffil); //
                            oleave = tleave;
                            //console.log("Flag 0 : "+tasb+" "+tchkg+" "+tchpcs+" "+ttobacco+" "+tleave+tbly+" "+twhy+" "+tfilter+" ");
                            console.log("Flag 1 : " + tasb + " " + tchkg + " " + tchpcs + " " + ttobacco + " " + tleave + tbly + " " + twhy + " " + tfilter + " ");
                            batches += '<tr id="batchtotal" class="names"><td style="text-align:center;" colspan="3">Sub Total---></td>' +
                                '<td>' + sumofasb.toFixed(3) + '</td>' +
                                '<td>' + sumofchpcs.toFixed(3) + '</td>' +
                                '<td>' + sumofchkg.toFixed(3) + '</td>' +
                                '<td>' + sumoflev.toFixed(3) + '</td>' +
                                '<td>' + sumoftob.toFixed(3) + '</td>' +
                                '<td>' + sumofbly.toFixed(3) + '</td>' +
                                '<td>' + sumofwhy.toFixed(3) + '</td>' +
                                '<td>' + sumoffil.toFixed(3) + '</td></tr>';
                            console.log("Equal");
                        } else {
                            //oleave=sumoflev-oplev;
                        }
                    }
                    console.log(tleave + "leaves");
                }


                batches += '<tr class="names">' +
                    '<td style="text-align:left;" colspan="3">Total -- > </td>' +
                    '<td>' + tasb.toFixed(3) + '</td>' +
                    '<td>' + tchpcs.toFixed(3) + '</td>' +
                    '<td>' + tchkg.toFixed(3) + '</td>' +
                    '<td>' + tleave.toFixed(3) + '</td>' +
                    '<td>' + ttobacco.toFixed(3) + '</td>' +
                    '<td>' + tbly.toFixed(3) + '</td>' +
                    '<td>' + twhy.toFixed(3) + '</td>' +
                    '<td>' + tfilter.toFixed(3) + '</td>' +
                    '</tr>';
                var btc1 = '';
                for (var i = 0; i < data.length; i++) {

                    if (data[i].batchnm != null) {

                        if (btc1 == data[i].batchnm) {} else {
                            btc1 = data[i].batchnm;
                            crleaves = data[i].consumption.clev;

                            crleaves = (parseInt(crleaves));


                            totalcc = (parseFloat(ttobacco) - (parseFloat(data[i].consumption.ctob))).toFixed(3);

                            totallevc = (parseFloat(tleave) - (parseFloat(crleaves))).toFixed(3);

                            batches += '<tr class="names">' +
                                '<td style="text-align:left;" colspan="2">Less Consumption: </td>' +
                                '<td style="text-align:center;" colspan="2">' + data[i].batchnm + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + data[i].consumption.clev + '</td>' +
                                '<td>' + data[i].consumption.ctob + '</td>' +
                                '<td>' + data[i].consumption.cbl + '</td>' +
                                '<td>' + data[i].consumption.cwy + '</td>' +
                                '<td>' + data[i].consumption.cfil + '</td>' +
                                '</tr>';
                        }

                    }
                }
                for (var i = 0; i < data.length; i++) {
                    if (data[i].batchnm != null) {
                        ls = data[i].lesssortage.lslev;
                        tleaves = parseFloat(tleaves) + parseFloat(data[i].transfer.tlev);
                        if (btc == data[i].batchnm) {

                            totalcc = (parseFloat(totalcc) - parseFloat(data[i].lesssortage.lstob)).toFixed(3);
                            totallevc = (parseFloat(totallevc) - parseFloat(data[i].lesssortage.lslev)).toFixed(3);

                            btc = data[i].batchnm;
                            batches += '<tr class="names">' +
                                '<td style="text-align:left;" colspan="2">Less Sortage: </td>' +
                                '<td style="text-align:center;" colspan="2">' + data[i].batchnm + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + data[i].lesssortage.lslev + '</td>' +
                                '<td>' + data[i].lesssortage.lstob + '</td>' +
                                '<td>' + data[i].lesssortage.lsbl + '</td>' +
                                '<td>' + data[i].lesssortage.lswy + '</td>' +
                                '<td>' + data[i].lesssortage.lsfil + '</td>' +
                                '</tr>';

                        } else {
                            btc = data[i].batchnm;
                            batches += '<tr class="names">' +
                                '<td style="text-align:left;" colspan="2">Less Sortage: </td>' +
                                '<td style="text-align:center;" colspan="2">' + data[i].batchnm + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + data[i].lesssortage.lslev + '</td>' +
                                '<td>' + data[i].lesssortage.lstob + '</td>' +
                                '<td>' + data[i].lesssortage.lsbl + '</td>' +
                                '<td>' + data[i].lesssortage.lswy + '</td>' +
                                '<td>' + data[i].lesssortage.lsfil + '</td>' +
                                '</tr>';
                        }
                    }
                }
                for (var i = 0; i < data.length; i++) {
                    if (data[i].batchnm != null) {
                        if (btc == data[i].batchnm) {} else {
                            btc = data[i].batchnm;
                            batches += '<tr class="names">' +
                                '<td style="text-align:left;" colspan="2">Transfer: </td>' +
                                '<td style="text-align:center;" colspan="2">' + data[i].batchnm + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + data[i].transfer.tlev + '</td>' +
                                '<td>' + data[i].transfer.ttob + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '</tr>';
                        }
                    }
                }
                for (var i = 0; i < data.length; i++) {

                    if (data[i].batchnm != null) {

                        totallev = parseFloat(totallev) + parseFloat(data[i].closingBalance.closelev);
                        totaltob = parseFloat(totaltob) + parseFloat(data[i].closingBalance.closetob);
                        totalbly = parseFloat(totalbly) + parseFloat(data[i].closingBalance.closebly);
                        totalwhy = parseFloat(totalwhy) + parseFloat(data[i].closingBalance.closewhy);
                        totalfil = parseFloat(totalfil) + parseFloat(data[i].closingBalance.closefil);
                        if (btc == data[i].batchnm) {} else {
                            btc = data[i].batchnm;
                            batches += '<tr class="names">' +
                                '<td style="text-align:center;" colspan="4">Clossing Of:' + data[i].batchnm + ' </td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + data[i].closingBalance.closelev + '</td>' +
                                '<td>' + data[i].closingBalance.closetob + '</td>' +
                                '<td>' + data[i].closingBalance.closebly + '</td>' +
                                '<td>' + data[i].closingBalance.closewhy + '</td>' +
                                '<td>' + data[i].closingBalance.closefil + '</td>' +
                                '</tr>';
                        }
                    }
                }
                // a=parseFloat(oleave)-parseFloat(crleaves)-parseFloat(ls);
                // cleaves=parseFloat(a)+parseFloat(tleaves);
                // total=parseFloat(total)+parseFloat(cleaves);
                batches += '<tr class="names">' +
                    '<td style="text-align:center;" colspan="4">Total Clossing Balance:</td>' +
                    // '<td style="text-align:center;" colspan="2"></td>'+
                    '<td>' + '</td>' +
                    '<td>' + '</td>' +
                    '<td>' + totallevc + '</td>' +
                    '<td>' + totalcc + '</td>' +

                    '<td>' + totalbly.toFixed(3) + '</td>' +
                    '<td>' + totalwhy.toFixed(3) + '</td>' +
                    '<td>' + totalfil.toFixed(3) + '</td>' +
                    '</tr>';
                batches += '<tr class="names">' +
                    '<td style="text-align:center;" colspan="2">Gross Total  </td>' +
                    '<td>Leaves</td>' +
                    '<td>Tobacco</td>' +
                    '<td>Bl-Sutta</td>' +
                    '<td>Wh-Sutta</td>' +
                    '<td>Bags</td>' +
                    '<td>Dice</td>' +
                    '<td>T-Short</td>' +
                    '<td>Advance</td>' +
                    '<td> P.F.</td>' +
                    //'<td>'+'</td>'+
                    '</tr>';
                for (var i = 0; i < data.length; i++) {

                    if (data[i].batchname != null) {
                        //var gross=data[i].finalTotal.gtotal;

                        grosstotal = parseFloat(grosstotal) + parseFloat(data[i].finalTotal.gtotal.replace(/,/g, ""));
                        lev = parseFloat(lev) + parseFloat(data[i].finalTotal.tLev.replace(/,/g, ""));
                        tob = parseFloat(tob) + parseFloat(data[i].finalTotal.tTob.replace(/,/g, ""));
                        blsutta = parseFloat(blsutta) + parseFloat(data[i].finalTotal.blsutta.replace(/,/g, ""));
                        whsutta = parseFloat(whsutta) + parseFloat(data[i].finalTotal.whsutta.replace(/,/g, ""));
                        bag = parseFloat(bag) + parseFloat(data[i].finalTotal.bags.replace(/,/g, ""));
                        dice = parseFloat(dice) + parseFloat(data[i].finalTotal.dice.replace(/,/g, ""));
                        tsort = parseFloat(tsort) + parseFloat(data[i].finalTotal.tsort.replace(/,/g, ""));
                        advance = parseFloat(advance) + parseFloat(data[i].finalTotal.advance.replace(/,/g, ""));
                        pf = parseFloat(pf) + parseFloat(data[i].finalTotal.pf.replace(/,/g, ""));
                        batches += '<tr class="names">' +
                            '<td style="text-align:center;" colspan="2">' + data[i].finalTotal.gtotal + '</td>' +
                            '<td>' + data[i].finalTotal.tLev + '</td>' +
                            '<td>' + data[i].finalTotal.tTob + '</td>' +
                            '<td>' + data[i].finalTotal.blsutta + '</td>' +
                            '<td>' + data[i].finalTotal.whsutta + '</td>' +
                            '<td>' + data[i].finalTotal.bags + '</td>' +
                            '<td>' + data[i].finalTotal.dice + '</td>' +
                            '<td>' + data[i].finalTotal.tsort + '</td>' +
                            '<td>' + data[i].finalTotal.advance + '</td>' +
                            '<td>' + data[i].finalTotal.pf + '</td>' +
                            '</tr>';
                    }
                }
                sumoftotal = parseFloat(lev) + parseFloat(tob) + parseFloat(blsutta) + parseFloat(whsutta) + parseFloat(bag) + parseFloat(dice) + parseFloat(tsort) + parseFloat(advance) + parseFloat(pf);
                finalTot = grosstotal - sumoftotal;
                batches += '<tr class="names">' +
                    '<td style="text-align:center;" class="divide" colspan="2">' + sumoftotal.toFixed(3) + '</td>' +
                    '<td colspan="9"> <======  Less </td>' +

                    '</tr>';
                batches += '<tr class="names">' +
                    '<td style="text-align:center;" colspan="2">' + finalTot.toFixed(3) + '</td>' +
                    '<td colspan="9"> <======  Net </td>' +

                    '</tr>';
                $('#tbody').append(batches);
            },
            error: function() {
                errorTost("Error");
            }
        });
    });


});