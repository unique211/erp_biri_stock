$(document).ready(function(){
    $("#btnExport").click(function () {	
	$("#file_info").table2excel({
				        exclude: ".noExl",
				        name: "Date Wise Report",
					filename: "Date Wise Report",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
	});
});	
	
    $('#search').click(function(){
        var table_name='con-party_master';
        var sdate=$('#fdate').val();
        var date=$('#date').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Date_Report/showData",
            data: {
                table_name: table_name,
                fdate:fdate,
                date:cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                var html='';
                var sr=0;
                for (var i = 1; i < data.length; i++) {
                    sr=sr+1;
                    html+='<tr>'+
                             '<td>'+sr+'</td>'+
                             '<td>'+data[i].contractorname+'</td>'+
                           //  '<td>'+sr+'</td>'+
                            '<td>'+data[i].asalbiri+'</td>'+
                            '<td>'+data[i].chatbiri+'</td>'+ 
                            '<td>'+data[i].totalBiri+'</td>'+
                            '<td>'+data[i].obtob+'</td>'+
                            '<td>'+data[i].oblev+'</td>'+
                            //'<td>'+data[i].obbags+'</td>'+
                            '<td>'+data[i].itob+'</td>'+
                            '<td>'+data[i].ileave+'</td>'+
                            //'<td>'+data[i].ibag+'</td>'+
                            '<td>'+data[i].TotalTobbaco+'</td>'+
                            '<td>'+data[i].TotalLeaves+'</td>'+
                            // '<td>'+data[i].TotalBag+'</td>'+
                            '<td>'+data[i].cTob+'</td>'+
                            '<td>'+data[i].cLev+'</td>'+
                            //'<td>'+data[i].cBag+'</td>'+
                            '<td>'+data[i].smTob+'</td>'+
                            '<td>'+data[i].smLev+'</td>'+
                            // '<td>'+data[i].smBag+'</td>'+
                            '<td>'+data[i].closingtobacco+'</td>'+
                            '<td>'+data[i].closingleaves+'</td>'+
                           // '<td>'+data[i].closingbag+'</td>'+
                            '</tr>';
                }
                $('#tbody').html(html);
            },
            error:function(){

            }
        });
    });
});