var receiptNo;
function getPDF () {
        return html2canvas($('#toDownload'), {
            background: "#ffffff",
            onrendered: function(canvas) {
                var myImage = canvas.toDataURL("image/jpeg,1.0");
                // Adjust width and height
                var imgWidth =  (canvas.width * 60) / 240;
                var imgHeight = (canvas.height * 70) / 240;
                // jspdf changes
                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight); // 2: 19
                pdf.save(`receipt`+receiptNo+`.pdf`);
            }
        });
    }
$(window).load(function() {
$("#downloadFormReceipt").click(function(){
        html2canvas(document.getElementById("toDownload"), {
            onrendered: function(canvas) {

                var imgData = canvas.toDataURL('image/png');
                console.log('Report Image URL: '+imgData);
                var doc = new jsPDF('p', 'mm', [297, 210]); //210mm wide and 297mm high
                
                doc.addImage(imgData, 'PNG', 1, 1);
                doc.save('receipt'+receiptNo+'.pdf');
            }
        });

  });
$("#printFormReceipt").click(function(){
        html2canvas(document.getElementById("toDownload"), {
            onrendered: function(canvas) {

                var imgData = canvas.toDataURL('image/png');
                console.log('Report Image URL: '+imgData);
                var doc = new jsPDF('p', 'mm', [297, 210]); //210mm wide and 297mm high
                
                doc.addImage(imgData, 'PNG', 1, 1);
                doc.autoPrint();
                window.open(doc.output('bloburl'), '_blank',"toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes,top=200,left=350,width=600,height=400");
                // doc.save('receipt'+receiptNo+'.pdf');
            }
        });

  });
        $('#onSelectDatesFeesReport').on('click', function(e) {
                e.preventDefault();
                if ($('#fees_report_form').valid()){
                        // console.log($('#fees_report_form').serialize());
                        Swal.fire({
                                icon: 'info',
                                // text: 'It may even take upto a minute',
                                // title: 'Getting Details',
                                didOpen: () => { Swal.showLoading() },
                                swaltoast: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false
                        });
                        $.ajax({
                                type: "POST",
                                url: "Fee/searchFeeReport",
                                async: true,
                                dataType: "JSON",
                                data: $('#fees_report_form').serialize(),
                                success: function(data) {
                                  Swal.close();
                                        console.log(data);
                                        if (data.error === false) {
                                                var tableId = "#feeReportTable";
                                                var tableObj = $('#feeReportTable').DataTable()
                                                // clear first
                                                if (tableObj != null) {
                                                        tableObj.clear();
                                                        tableObj.destroy();
                                                        // $('#fees_report_form').trigger('reset');
                                                }
                                                $(tableId + " tbody").empty();
                                                $('#feeReportTable').DataTable({
                                                        processing: true,
                                                        data: data.data,
                                                        searching: true,
                                                        columns: [
                                                                { data: "date" ,render: function(data, type, full, meta){
                                                                  return new Date(data).toLocaleDateString("en-US")
                                                                } },
                                                                { data: "admno" },
                                                                { data: "name_of_student" },
                                                                { data: "father_name" },
                                                                { data: "student_contact_no" },
                                                                { data: "class" },
                                                                { data: "section" },
                                                                // { data: "transacID" },
                                                                { data: null, defaultContent: "<i id=" + 'feeReportViewTable' + " class=" + 'material-icons' + " style=" + 'cursor:pointer' + ">visibility</i>" },
                                                        ],
                                                        paging: true,
                                                        info: true,
                                                        language: {
                                                                emptyTable: "No data available "
                                                        },
                                                });
                                                $('#feeReportTable').css("width", "100%");
                                                $('#viewFeeReport').css("display", "block");
                                                $('#feeReportTable tbody').on('click', '#feeReportViewTable', function() {
                                                        var $row = $(this).closest('tr');
                                                        var data = $('#feeReportTable').DataTable().row($row).data();
                                                        console.log(data.receipt);
                                                        sessionStorage.setItem('latestpayfeedata', JSON.stringify({
                                                                receipt:data.receipt,
                                                        }));
                                                        $(location).attr("href", 'feesReceipt');
                                                });
                                                Swal.close();
                                        }
                                }
                        });
                        return false;
                  }
        });
var ullu = $(location).attr("pathname");
        var splitullu = ullu.split('/');
        console.log(splitullu[2]);
        if (splitullu[2] == "feesReceipt") 
        {
          var payComplete = JSON.parse(sessionStorage.getItem('latestpayfeedata'));
          console.log(payComplete)
          receiptNo = payComplete.receipt;
          var feeAmt = payComplete.feeAmt;
          var ReceiptData = payComplete.ReceiptData;
          var transacId = payComplete.transacID;
          var modePay=payComplete.modePay;
          getFeeCollectionDetails(receiptNo,feeAmt,transacId,modePay,ReceiptData);
        }
});
function getFeeCollectionDetails(receiptNo,feeAmt,transacId,modePay,ReceiptData){
  console.log(receiptNo);
  $.ajax({
    type: "POST",
    url: "Fee/getFeeCollectionByReceiptNumber",
    dataType: "JSON",
    data: {receipt:receiptNo },
    success: function(data) {
      console.log(data)
      if(ReceiptData==""||ReceiptData==undefined){
        var ReceiptData = data.data;
      }
      var StudentName = ReceiptData[0].name_of_student;
      if(transacId==""||transacId==undefined){
        var transacId = ReceiptData[0].transacID;
      }
      if(modePay==""||modePay==undefined){
        var modePay = ReceiptData[0].modePay;
      }
      var admno = ReceiptData[0].admno;
      var date = ReceiptData[0].date;
        $('#StuName').html("Name :&nbsp;"+StudentName);
        $('#StuAdmno').html("Admission No. :&nbsp;"+admno);
        $('.ReceiptDate').html("Date : &nbsp;"+new Date(date).toLocaleDateString("en-US"));
        $('.ReceiptNo').html(receiptNo);
        $(".ReceiptDetails").empty();
        var options = [];
        for (var i = 0; i <= ReceiptData.length - 1; i++) 
        {
              options[i]= '<tr><td class="col-md-9" style="font-size:15px;">'+ReceiptData[i].fee_head+'</td><td class="col-md-3 text-right" style="font-size:15px;">'+ReceiptData[i].fee_paid+'</td</tr>'
        }
        var sum=0;
        if(feeAmt==""||feeAmt==undefined){
            for (var i = 0; i <= ReceiptData.length - 1; i++) 
            {
                sum+=Number(ReceiptData[i].fee_paid);
            }
            console.log(sum)
            feeAmt=sum;
        }
        options.push('<tr style="color: #000;"><td class="text-left"><h6><strong>Transaction Id:</strong></h6></td><td class="text-right"><h6><strong class="ReceiptTotalAmt">'+transacId+'</strong></h6></td></tr>');
        options.push('<tr style="color: #000;"><td class="text-left"><h6><strong>Mode of payment:</strong></h6></td><td class="text-right"><h6><strong class="ReceiptTotalAmt">'+modePay+'</strong></h6></td></tr>');
        options.push('<tr style="color: #AEA2A3;"><td class="text-left"><h4><strong>Total Payment Amount:</strong></h4></td><td class="text-right"><h4><strong class="ReceiptTotalAmt">'+feeAmt+'</strong></h4></td></tr>');
        $(".ReceiptDetails").append(options);
    }
});
}