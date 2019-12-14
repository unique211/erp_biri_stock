$(document).ready(function() {
 //get current date
 var today = new Date();
 console.log("today"+today)
   //var today="Mon Jul 15 2019";  
 //get current month
 var curMonth = today.getMonth();
  
 var fiscalYr = "";
 if (curMonth > 3) { //
     var nextYr1 = (today.getFullYear() + 1).toString();
     fiscalYr = today.getFullYear().toString() + "-" + nextYr1;
 } else {
     var nextYr2 = today.getFullYear().toString();
     fiscalYr = (today.getFullYear() - 1).toString() + "-" + nextYr2;
 }
 var i=0;
 var html="";

 var storefinacialyear=[];
 storefinacialyear.push(fiscalYr);

        console.log(storefinacialyear);
        if(storefinacialyear.length==1){

    html +="<option value="+fiscalYr+">"+fiscalYr +"</option>";
    $('#year').html(html); 
        }else{
            for(i=0;i<storefinacialyear.length;i++){
                html +="<option value="+fiscalYr+">"+fiscalYr +"</option>";
            }
            $('#year').html(html);
        }

        $('#search').click(function (e) {
          var year= $('#year').val();
          var findyear=year.split("-");
          var currentyear=findyear[0];
          var nextyear=findyear[1];

          var currentyeardate=currentyear+"-04-01";
          var nextyeardate=nextyear+"-03-31";

          console.log("currentyear"+currentyeardate+"nextyear"+nextyeardate);


          $.ajax({
            type: "POST",
            url: baseurl + "Bidisalesmonthly/getsumofbidisales",
            data: {
                currentyear:currentyeardate,
                nextyear:nextyeardate,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if(data.length>0){
                    var totalpcs=0;
                    var totalqty=0;
                    var totalsale=0;
                    var totalnccd=0;
                    var totalbasic=0;
                    var totalcgst=0;
                    var totalsgst=0;
                    var totaligst=0;
                    var totalgst=0;
                    var month="";
                    $('#batch_table').html('');
                        var roe_id=0;
                    var html = '';
                    html += '<table id="myTable" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold" >Name</font></th>' +
                        '<th colspan="9"><font style="font-weight:bold">Brijbasi Trader</font></th>' +
                        '</tr>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Address</font></th>' +
                        '<th colspan="9"><font style="font-weight:bold">Bandha Ghat,Jhalda, Purulia (W.B.)</font></th>' +
                        '</tr>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">RC No.</font></th>' +
                        '<th colspan="9"><font style="font-weight:bold">ACTPA5069Q-XM-001</font></th>' +
                        '</tr>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Year.</font></th>' +
                        '<th colspan="9"><font style="font-weight:bold">'+year+'</font></th>' +
                        '</tr>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Month</font></th>' +
                        '<th><font style="font-weight:bold">BIDI (boxs)</font></th>' +
                        '<th><font style="font-weight:bold">Clearance (Pcs)</font></th>' +
                        '<th><font style="font-weight:bold">Sale Value (Rs.)</font></th>' +
                        '<th><font style="font-weight:bold">Basic</font></th>' +
                        '<th><font style="font-weight:bold">NCCD</font></th>' +
                        '<th><font style="font-weight:bold">CGST</font></th>' +
                        '<th><font style="font-weight:bold">SGST</font></th>' +
                        '<th><font style="font-weight:bold">IGST</font></th>' +
                        '<th><font style="font-weight:bold">Total GST</font></th>' +
                       
    
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {
                      
                        console.log(data[i].month);
                       

                        totalpcs= (parseFloat(data[i].packno)+parseFloat(totalpcs));
                        totalqty= (parseFloat(data[i].sumqty)+parseFloat(totalqty)).toFixed(3);
                        totalsale= (parseFloat(data[i].salevalue)+parseFloat(totalsale)).toFixed(2);
                        totalbasic= (parseFloat(data[i].sumbasic)+parseFloat(totalbasic)).toFixed(2);
                        totalnccd= (parseFloat(data[i].sumnccd)+parseFloat(totalnccd)).toFixed(2);
                        totalcgst= (parseFloat(data[i].sumcgst)+parseFloat(totalcgst)).toFixed(2);
                        totalsgst= (parseFloat(data[i].sumsgst)+parseFloat(totalsgst)).toFixed(2);
                        totaligst= (parseFloat(data[i].sumigst)+parseFloat(totaligst)).toFixed(2);
                        totalgst= (parseFloat(data[i].totalgst)+parseFloat(totalgst)).toFixed(2);

                        html += '<tr>' +
                        
                            '<td id="id_' + roe_id+ '">' +data[i].month+"'"+data[i].year + '</td>' +
                            '<td id="packno_' + roe_id + '">' + (parseFloat(data[i].packno))+ '</td>' +
                            '<td id="sumqty_' + roe_id + '">' +  (parseFloat(data[i].sumqty)).toFixed(3) + '</td>' +
                            '<td id="address_' + roe_id + '">' + (parseFloat(data[i].salevalue)).toFixed(2) + '</td>' +
                            '<td id="short_code_' + roe_id + '">' +(parseFloat(data[i].sumbasic)).toFixed(2) + '</td>' +
                            '<td id="id_' + roe_id+ '">' + (parseFloat(data[i].sumnccd)).toFixed(2) + '</td>' +
                            '<td id="sumcgst_' + roe_id + '">' +(parseFloat(data[i].sumcgst)).toFixed(2)+ '</td>' +
                            '<td id="sumsgst_' + roe_id + '">' + (parseFloat(data[i].sumsgst)).toFixed(2) + '</td>' +
                            '<td id="sumigst_' + roe_id + '">' + (parseFloat(data[i].sumigst)).toFixed(2) + '</td>' +
                            '<td id="totalgst_' + roe_id + '">' + (parseFloat(data[i].totalgst)).toFixed(2) + '</td>' +
                            
                            '</tr>';
                            roe_id=roe_id+1;
    
                    }
                    html += '</tbody>';
                   
                    html += '<tfoot><tr></tr>';
                    html += '<tr>' +
                    '<td id="id_' + roe_id+ '"></td>' +
                    '<td id="packno_' + roe_id + '"> <b>' + totalpcs+ '</b></td>' +
                    '<td id="sumqty_' + roe_id + '"><b>' +  totalqty + '</b></td>' +
                    '<td id="address_' + roe_id + '"><b>' +  totalsale + '</b></td>' +
                    '<td id="short_code_' + roe_id + '"><b>' + totalbasic + '</b></td>' +
                    '<td id="id_' + roe_id+ '"><b>' + totalnccd + '</b></td>' +
                    '<td id="sumcgst_' + roe_id + '"><b>' +  totalcgst+ '</b></td>' +
                    '<td id="sumsgst_' + roe_id + '"><b>' + totalsgst + '</b></td>' +
                    '<td id="sumigst_' + roe_id + '"><b>' +  totaligst + '</b></td>' +
                    '<td id="totalgst_' + roe_id + '"><b>' + totalgst+ '</b></td>' +
                    
                    '</tr>';
                    
                    html +='</tfoot></table>';
    
                    $('#show_master').html(html);
                    /*$('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdfHtml5',
                                pageSize: 'A4',
                                // orientation: 'landscape',
                                title: 'DB Stock-Checker Master',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4,5,6,7,8,9]
                                },
                            },
                            {
                                extend: 'excelHtml5',
                                title: 'DB Stock-Checker Master',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4,5,6,7,8,9]
                                },
                            }
                        ]
                    });*/
                }
           
            }
        });

        });
        $("#btnExport").click(function () {	
            $("#myTable").table2excel({
                                exclude: ".noExl",
                                name: "Bidisalesmonthly Report",
                            filename: "Bidisalesmonthly Report",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true
            });
        });	


});