$(window).load(function() {
	var ullu = $(location).attr("pathname");
        var splitullu = ullu.split('/');
        if (splitullu[2] == "payFees") {
						if(obj.authority=="student"){
								// $('#payFeesAdmissionNo').css("display","none");
								document.getElementById('searchFee').autoCompleteAdmisData.value=obj.login_id;
						}
				}
});
var payfeedata;var mainData;var ReceiptData;
var feeMonthName=["April","May","June","July","August","September","October","November","December","January","February","March"];
// function getFeeStructure()
// {
//         console.log("it worked");
//         $.ajax({
//                 type: "POST",
//                 url: "Fee/getFeesDetails",
//                 dataType: "JSON",
//                 data: { 'autoCompleteAdmis': $('#autoCompleteAdmis').val() },
//                 success: function(data) {
//                         console.log(data);
//                         mainData=data;
//                         if(data.error===false)
//                         {
//                                 if(data.isStudentExist && !data.isFeeCollectionExist){ 
//                                         var tableId = "#feeDetailTable";
//                                         var tableObj = $('#feeDetailTable').DataTable();
//                                         if (tableObj != null) {
//                                                 tableObj.clear();
//                                                 tableObj.destroy();
//                                                 $('#fees_pay_form').trigger("reset");
//                                         }
//                                         $(tableId + " tbody").empty();
//                                         $('#feeDetailTable').DataTable({
//                                                 processing: true,
//                                                 data: data.data.feeStructure,
//                                                 searching: false,
//                                                 columns: [
//                                                         { data: null, defaultContent: "<input type='checkbox'>" },
//                                                         { data: "fee_head" },
//                                                         { data: "fee" },
//                                                         { data: null, defaultContent: 0},
//                                                         { data: null, defaultContent:'----' },
//                                                         { data: null, defaultContent:'----' },
//                                                 ],
//                                                 columnDefs: [{
//                                                         orderable: false,
//                                                         className: 'select-checkbox',
//                                                         targets: 0
//                                                 }],
//                                                 select: {
//                                                         style: 'multi',
//                                                         selector: 'td:first-child'
//                                                 },
//                                                 buttons: [
//                                                         'selectAll',
//                                                         'selectNone'
//                                                 ],
//                                                 order: [
//                                                         [1, 'asc']
//                                                 ],
//                                                 paging: false,
//                                                 info: true,
//                                                 language: {
//                                                         emptyTable: "No data available "
//                                                 },
//                                         });
//                                         $('#feeDetailTable').css("width", "100%");
//                                         $('#viewFeeDetails').css("display", "block");
//                                         $('#viewFeePayAmount').css("display", "block");
//                                         var arr = [];
//                                         $('#feeDetailTable tbody').on('click', '.select-checkbox', function() {
//                                                 var $row = $(this).closest('tr');
//                                                 var data = $('#feeDetailTable').DataTable().row($row).data();
//                                                 // console.log(data);
//                                                 if (arr.length == 0) {
//                                                         arr.push(data);
//                                                 }
//                                                 else 
//                                                 {
//                                                         if (!arr.includes(data)) 
//                                                         {
//                                                                 arr.push(data);
//                                                         } 
//                                                         else 
//                                                         {
//                                                                 arr.splice(arr.indexOf(data), 1);
//                                                         }
//                                                 }
//                                                 payfeedata = arr;
//                                                 // console.log(payfeedata);
//                                                 var sum = 0;
//                                                 for (var i = 0; i <= arr.length - 1; i++) {
//                                                         sum += Number(arr[i].fee);
//                                                 }
//                                                 $('#fees_pay_form').find("input[name='feeAmt']").val(sum).select();
//                                                 ReceiptData=mainData.data.feeStructure;
//                                                 for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
//                                                      for(var j=0; j<=payfeedata.length-1; j++){
//                                                         if(mainData.data.feeStructure[i].fee_head==payfeedata[j].fee_head)
//                                                         {
//                                                                  ReceiptData[i].fee_paid = mainData.data.feeStructure[i].fee;
//                                                         }
//                                                         else
//                                                         {
//                                                                 if(Number(ReceiptData[i].fee_paid)<=0){
//                                                                         ReceiptData[i].fee_paid = "0";
//                                                                 }
//                                                         }
//                                                      }
//                                                 }
//                                                 // console.log(ReceiptData);
//                                         });
//                                 }
//                                 if(data.isStudentExist && data.isFeeCollectionExist){
//                                         console.log("both exist");
//                                          var tableId = "#feeDetailTable";
//                                         var tableObj = $('#feeDetailTable').DataTable();
//                                         if (tableObj != null) {
//                                                 tableObj.clear();
//                                                 tableObj.destroy();
//                                                 $('#fees_pay_form').trigger("reset");
//                                         }
//                                         $(tableId + " tbody").empty();
//                                         $('#feeDetailTable').DataTable({
//                                                 processing: true,
//                                                 data: data.data.fee_collection,
//                                                 searching: false,
//                                                 columns: [
//                                                         { data: null, defaultContent: "<input type='checkbox'>" },
//                                                         { data: "fee_head" },
//                                                         { data: "fee_due" },
//                                                         { data: "fee_paid"},
//                                                         { data: "transacID", render: function(data, type, full, meta){
//                                                                 // console.log(full)
//                                                                 if(Number(full.fee_paid)>0)
//                                                                         if(data==null||data=="")
//                                                                                 return defaultContent="NULL";
//                                                                         else
//                                                                                 return defaultContent=data;
//                                                                 else
//                                                                         return defaultContent='----';
//                                                                 } 
//                                                         },
//                                                         { data: "modePay", render: function(data, type, full, meta){
//                                                                 // console.log(full)
//                                                                 if(Number(full.fee_paid)>0)
//                                                                         if(data==null||data=="")
//                                                                                 return defaultContent="NULL";
//                                                                         else
//                                                                                 return defaultContent=data;
//                                                                 else
//                                                                         return defaultContent='----';
//                                                                 }  
//                                                         },
//                                                 ],
//                                                 columnDefs: [{
//                                                         orderable: false,
//                                                         className: 'select-checkbox',
//                                                         targets: 0,
//                                                         createdCell: function(td, cellData, rowData, row, col){
//                                                                 // console.log(rowData.fee_paid);
//                                                                 if(Number(rowData.fee_paid)>0||Number(rowData.fee_due)==0){
//                                                                         $(td).removeClass('select-checkbox');
//                                                                         $(td).prop('disabled', true);
//                                                                 }
//                                                         }
//                                                 }],
//                                                 select: {
//                                                         style: 'multi',
//                                                         selector: 'td:first-child'
//                                                 },
//                                                 buttons: [
//                                                         'selectAll',
//                                                         'selectNone'
//                                                 ],
//                                                 order: [
//                                                         [1, 'asc']
//                                                 ],
//                                                 paging: false,
//                                                 info: true,
//                                                 language: {
//                                                         emptyTable: "No data available "
//                                                 },
//                                         });
//                                         $('#feeDetailTable').css("width", "100%");
//                                         $('#viewFeeDetails').css("display", "block");
//                                         $('#viewFeePayAmount').css("display", "block");
//                                         var arr = [];
//                                         $('#feeDetailTable tbody').on('click', '.select-checkbox', function() {
//                                                 var $row = $(this).closest('tr');
//                                                 var data = $('#feeDetailTable').DataTable().row($row).data();
//                                                 // console.log(data);
//                                                 if (arr.length == 0) {
//                                                         arr.push(data);
//                                                 }
//                                                 else 
//                                                 {
//                                                         if (!arr.includes(data)) 
//                                                         {
//                                                                 arr.push(data);
//                                                         } 
//                                                         else 
//                                                         {
//                                                                 arr.splice(arr.indexOf(data), 1);
//                                                         }
//                                                 }
//                                                 payfeedata = arr;
//                                                 console.log(payfeedata);
//                                                 var sum = 0;
//                                                 for (var i = 0; i <= arr.length - 1; i++) {
//                                                                 sum += Number(arr[i].fee_due);
//                                                 }
//                                                 console.log(sum)
//                                                 $('#fees_pay_form').find("input[name='feeAmt']").val(sum).select();
//                                                 ReceiptData=mainData.data.feeStructure;
//                                                 for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
//                                                      for(var j=0; j<=payfeedata.length-1; j++){
//                                                         if(ReceiptData[i].fee_head==payfeedata[j].fee_head)
//                                                         {
//                                                                  ReceiptData[i].fee_paid = payfeedata[j].fee_due;
//                                                         }
//                                                         else
//                                                         {
//                                                                 if(Number(ReceiptData[i].fee_paid)<=0){
//                                                                         ReceiptData[i].fee_paid = "0";
//                                                                 }
//                                                         }
//                                                      }
//                                                 }
//                                                 // console.log(ReceiptData);
//                                         });
//                                 }
//                         }
//                         else
//                         {
//                                 Swal.fire({
//                                         icon:'error',
//                                         title: 'Get Fee Details',
//                                         text:data.data
//                                 });
//                         }
//                 }
//         });
//         return false;
// }
// $(window).load(function() {
//         $('#payFeesOnline').on('click',function(e){
//                 e.preventDefault();
//                 if($('#feeAmtNumber').valid()){
//                     var amt=$('#feeAmtNumber').val();    
//                     console.log(amt);
//                         var options = {
//                                 "key": "rzp_test_JFnIEEcI1X1q0w",
//                                 "amount": (100*amt), // 2000 paise = INR 20
//                                 "name": "RTC School (CBSE), Ranchi",
//                                 "description": "Payment",
//                                 "image": "http://www.rtccbseranchi.org/admin/assets/images/logo_login.png",
//                                 "theme": {
//                                 "color": "#528FF0"
//                                 },
//                                 "prefill": {
//                                    "email": "abc@gmail.com",
//                                    "contact": "123456789"
//                                 }
//                         };
//                         var rzp1 = new Razorpay(options);
//                         rzp1.open();
//                 }
//         });
//         $('#payFeesUpdate').on('click', function(e) {
//                 e.preventDefault();
                // if(mainData.isStudentExist && !mainData.isFeeCollectionExist){
                //         if ($('#fees_pay_form').valid() && $('#feeAmtNumber').val() > 0) {
                //                 console.log(mainData);
                //                 console.log(ReceiptData);
                //                 for (var i = 0; i <= ReceiptData.length - 1; i++) {
                //                         if(!ReceiptData[i].hasOwnProperty('fee_paid')){
                //                              ReceiptData[i]['fee_paid']="0"   ;
                //                         }
                //                 }
                //                 console.log(ReceiptData);
                //                 // console.log(document.getElementById('fees_pay_form').feeAmt.value);
                //                 $.ajax({
                //                         type: "POST",
                //                         url: "Fee/updateFeeCollection",
                //                         dataType: "JSON",
                //                         data: { data: ReceiptData,admno:mainData.data.studentData[0].admisstion_no, transacID: document.getElementById('fees_pay_form').transacID.value, modePay: document.getElementById('fees_pay_form').modePay.value },
                //                         success: function(data) {
                //                                 console.log(data);
                //                                 if (data.error === false) 
                //                                 {
                //                                         Swal.fire({
                //                                                 timer: 5000,
                //                                                 icon: 'success',
                //                                                 text: 'Successful',
                //                                                 title: 'Pay Fees',
                //                                                 allowOutsideClick: false,
                //                                                 allowEscapeKey: false
                //                                         });
                //                                         sessionStorage.setItem('latestpayfeedata', JSON.stringify({
                //                                                 receipt:data.receipt,
                //                                                 ReceiptData: ReceiptData,
                //                                                 mainData: mainData,
                //                                                 payfeedata: payfeedata,
                //                                                 transacID: document.getElementById('fees_pay_form').transacID.value,
                //                                                 modePay: document.getElementById('fees_pay_form').modePay.value,
                //                                                 feeAmt: document.getElementById('fees_pay_form').feeAmt.value
                //                                         }));
                //                                         document.getElementById('fees_pay_form').reset();
                //                                         $(location).attr("href", 'feesReceipt');
                //                                 } 
                //                                 else 
                //                                 {
                //                                         Swal.fire({
                //                                                 icon: 'error',
                //                                                 text: data.text,
                //                                                 title: 'Pay Fees',
                //                                                 swaltoast: false,
                //                                                 allowOutsideClick: false,
                //                                                 allowEscapeKey: false,
                //                                         });
                //                                         document.getElementById('fees_pay_form').reset();
                //                                         $(location).attr("href", 'payFees');
                //                                 }
                //                         }
                //                 });
                //                 return false;
                //         } 
                //         else 
                //         {
                //                 if($('#feeAmtNumber').val() <=0){
                //                         Swal.fire({
                //                                 icon: 'warning',
                //                                 title: 'Pay Fees',
                //                                 text: 'Atleast select a option which has Fee Due amount greater than 0'
                //                         });
                //                 }
                //         }
                // }
//                 if(mainData.isStudentExist && mainData.isFeeCollectionExist){
//                         if ($('#fees_pay_form').valid() && $('#feeAmtNumber').val() > 0) {
//                         Swal.fire({
//                               title: 'Fees Payment of'+" "+mainData.data.studentData[0].name_of_student,
//                               text: "Fee Amount :"+""+document.getElementById('fees_pay_form').feeAmt.value,
//                               icon: 'warning',
//                               showCancelButton: true,
//                               confirmButtonColor: '#3085d6',
//                               cancelButtonColor: '#d33',
//                               confirmButtonText: 'Pay'
//                             }).then((result) => {
//                               if (result.isConfirmed) {
//                                 console.log(mainData);
//                                 for (var i = 0; i <= ReceiptData.length - 1; i++) {
//                                         ReceiptData[i]['transacID'] = document.getElementById('fees_pay_form').transacID.value;
//                                         ReceiptData[i]['modePay'] = document.getElementById('fees_pay_form').modePay.value;
//                                 }
//                                 for (var i = 0; i <= ReceiptData.length - 1; i++) {
//                                         if(!ReceiptData[i].hasOwnProperty('fee_paid')){
//                                              ReceiptData[i]['fee_paid']="0"   ;
//                                         }
//                                 }
//                                 console.log(ReceiptData);
//                                 // console.log(document.getElementById('fees_pay_form').feeAmt.value);
//                                 $.ajax({
//                                         type: "POST",
//                                         url: "Fee/updateFeeCollectionSec",
//                                         dataType: "JSON",
//                                         data: { data: ReceiptData,admno:mainData.data.studentData[0].admisstion_no,
//                                          transacID: document.getElementById('fees_pay_form').transacID.value,
//                                           modePay: document.getElementById('fees_pay_form').modePay.value },
//                                         success: function(data) {
//                                                 console.log(data);
//                                                 if (data.error === false) 
//                                                 {
//                                                         Swal.fire({
//                                                                 timer: 5000,
//                                                                 icon: 'success',
//                                                                 text: 'Successful',
//                                                                 title: 'Pay Fees',
//                                                                 allowOutsideClick: false,
//                                                                 allowEscapeKey: false
//                                                         });
//                                                         sessionStorage.setItem('latestpayfeedata', JSON.stringify({
//                                                                 receipt:data.receipt,
//                                                                 ReceiptData: ReceiptData,
//                                                                 mainData: mainData,
//                                                                 payfeedata: payfeedata,
//                                                                 transacID: document.getElementById('fees_pay_form').transacID.value,
//                                                                 modePay: document.getElementById('fees_pay_form').modePay.value,
//                                                                 feeAmt: document.getElementById('fees_pay_form').feeAmt.value
//                                                         }));
//                                                         document.getElementById('fees_pay_form').reset();
//                                                         $(location).attr("href", 'feesReceipt');
//                                                 } 
//                                                 else 
//                                                 {
//                                                         Swal.fire({
//                                                                 icon: 'error',
//                                                                 text: data.text,
//                                                                 title: 'Pay Fees',
//                                                                 swaltoast: false,
//                                                                 allowOutsideClick: false,
//                                                                 allowEscapeKey: false,
//                                                         });
//                                                         document.getElementById('fees_pay_form').reset();
//                                                         $(location).attr("href", 'payFees');
//                                                 }
//                                         }
//                                 });
//                                 return false;
//                               }});
//                         } 
//                         else 
//                         {       
//                                 if($('#feeAmtNumber').val() <=0){
//                                         Swal.fire({
//                                                 icon: 'warning',
//                                                 title: 'Pay Fees',
//                                                 text: 'Atleast select a option which has Fee Due amount greater than 0'
//                                         });
//                                 }
//                         }
//                 }

//         });
//         $('#onSelectAdmmissionNo').on('click', function(e) {
//                 // console.log("into table")
//                 e.preventDefault();
                
//         });
// });
// var daysToDisable = [1, 4, 6];
// var monthsToDisable = [9];

// function disableSpecificWeekDays(date) {
// 	console.log("into disable datepicker")
//     // var day = date.getDay();
//     // if ($.inArray(day, daysToDisable) != -1) {
//     //     return [false];
//     // }

//     var month = date.getMonth();
//     console.log(month)
//     if ($.inArray(month, monthsToDisable) != -1) {
//         return [false];
//     }
//     return [true];
// }
function feePayOnline(e){
	e.preventDefault();
                if($('#feeAmtNumber').valid()){
                    var amt=$('#feeAmtNumber').val();    
                    console.log(amt);
                        var options = {
                                "key": "rzp_test_JFnIEEcI1X1q0w",
                                "amount": (100*amt), // 2000 paise = INR 20
                                "name": "RTC School (CBSE), Ranchi",
                                "description": "Fees Payment",
                                "image": "http://www.rtccbseranchi.org/admin/assets/images/logo_login.png",
                                "theme": {
                                "color": "#528FF0"
                                },
                                "prefill": {
                                   "email": "abc@gmail.com",
                                   "contact": "123456789"
                                },"handler": function (res){
                                	console.log(res)
								        //   $.ajax({
								        //     url: '<?php echo base_url() ?>'+'payment/razorPaySuccess',
								        //     type: 'post',
								        //     dataType: 'json',
								        //     data: {
								        //         razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
								        //     }, 
								        //     success: function (msg) {
								        //        window.location.href = '<?php echo base_url() ?>'+'payment/RazorThankYou';
								        //     }
								        // });
								    },
                        };
                        console.log(options);
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
}
// $(window).load(function() {
//     $('#payFeesOnline').on('click',function(e){
//                 e.preventDefault();
//                 if($('#feeAmtNumber').valid()){
//                     var amt=$('#feeAmtNumber').val();    
//                     console.log(amt);
//                         var options = {
//                                 "key": "rzp_test_JFnIEEcI1X1q0w",
//                                 "amount": (100*amt), // 2000 paise = INR 20
//                                 "name": "RTC School (CBSE), Ranchi",
//                                 "description": "Payment",
//                                 "image": "http://www.rtccbseranchi.org/admin/assets/images/logo_login.png",
//                                 "theme": {
//                                 "color": "#528FF0"
//                                 },
//                                 "prefill": {
//                                    "email": "abc@gmail.com",
//                                    "contact": "123456789"
//                                 }
//                         };
//                         var rzp1 = new Razorpay(options);
//                         rzp1.open();
//                 }
//         });
// });
// --------------------------------------for getting fee type monthly/yearly-------------------------------------- //
function getfeetype(){
        if(document.getElementById('payFeeType').value=="monthly")
        {	
				$.ajax({
					type: "POST",
					url: "Fee/getFeeMonthNameIfExist",
					dataType: "JSON",
					data: { autoCompleteAdmis: $('#autoCompleteAdmis').val(),
					    type: "Monthly" },
					success: function(data) {
					    if(data.error===false){
					            // console.log(data);
					            refreshToFromPay(data.data.monthNames);
					    }
					}})	
                $('.fromToPay').css('display','block');
                $('#fromPayfee').attr('required',true);
                $('#toPayfee').attr('required',true);
        }
        else
        {
                $('.fromToPay').css('display','none');
                $('#fromPayfee').attr('required',false);
                $('#toPayfee').attr('required',false);
        }
        
}
// ======= //
function refreshToFromPay(data){
	 var $select = $('#fromPayfee').empty();
        //($('<option/>').text("From *")).appendTo($select);
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i] }).text(data[i]).prop('selected', i == 0);
                o.appendTo($select);
        }
        $select.selectpicker('refresh');
        var $select1 = $('#toPayfee').empty();
        // ($('<option/>').text("To *")).appendTo($select1);
        for (var i = 0; i < data.length; i++) {
                var o = $('<option/>', { value: data[i] }).text(data[i]).prop('selected', i == 0);
                o.appendTo($select1);
        }
        $select1.selectpicker('refresh');
}
// ------------------------------------end for getting fee type monthly/yearly----------------------------------- //
// =======//
function getMonthDetails(){
		return feeMonthName.indexOf($('#toPayfee').val())-feeMonthName.indexOf($('#fromPayfee').val());
}
// =======//
//----------------------------------for getting month names between start and end date------------------------------//
// =======//
function getMonthNames(){
		var startMonth = feeMonthName.indexOf($('#fromPayfee').val());
        var endMonth = feeMonthName.indexOf($('#toPayfee').val());
        var arr=[];
        for(var i=0;i<=feeMonthName.length-1;i++){
        	if(i>=startMonth && i<=endMonth){
        		arr.push(feeMonthName[i]);
        	}
        }
        return arr;
}
// ------------------------------------------------for fetching fee------------------------------------------------ //
function fetchFee(e){
        e.preventDefault();
        if(document.getElementById('payFeeType').value=="monthly")
        {
                if($('#searchFee').valid())
                {           
                	var month = getMonthNames();
                        // console.log(getMonthDetails());
                        if(getMonthDetails()<0)
                        {
							Swal.fire({icon:'error',title:'From - To Date Validation',text:'Please select ( To Date ) greater than ( From Date )'})
						}
						else
						{
	                        $.ajax({
	                                type: "POST",
	                                url: "Fee/getFeeMonthly",
	                                dataType: "JSON",
	                                data: { autoCompleteAdmis: $('#autoCompleteAdmis').val(),
	                                        startMonth:  $('#fromPayfee').val(),
	                                        endMonth: $('#toPayfee').val(),
	                                        type: "Monthly" },
	                                success: function(data) {
	                                        if(data.error===false){
	                                                mainData=data;
	                                                monthlyView(data);
	                                        }
	                                }})
						}

                }
        }
        if(document.getElementById('payFeeType').value=="yearly")
        {
                 if($('#searchFee').valid())
                 {
                        //console.log("into yearly");
                        $.ajax({
	                                type: "POST",
	                                url: "Fee/getFeeYearly",
	                                dataType: "JSON",
	                                data: { autoCompleteAdmis: $('#autoCompleteAdmis').val(),
	                                        type: "Yearly" },
	                                success: function(data) {
	                                        if(data.error===false){
	                                                mainData=data;
	                                                yearlyView(data);
	                                        }
	                                }})
                 }
        }

}
// ----------------------------------------------end for fetching fee---------------------------------------------- //
// ===========//
// -----------------------------------------for rendering monthly fee table----------------------------------------- //
function clearTable(tableName){
        var tableId = ""+tableName+"";
        var tableObj = $(""+tableName+"").DataTable();
        if (tableObj != null) {
                tableObj.clear();
                tableObj.destroy();
                $('#fees_pay_form').trigger("reset");
        }
        $(tableId + " tbody").empty();
}
//===monthly view===//
function monthlyView(data){
        console.log(data);
        if(data.isStudentExist && !data.isFeeCollectionExist){
                var noOfMonth=getMonthDetails()+1;
                clearTable("#FeeMonthly");
                $('#FeeMonthly').DataTable({
                        processing: true,
                        data: data.data.feeStructure,
                        searching: false,
                        // sortable:false,
                        columns: [
                                { data: "fee_head" },
                                { data: "fee" ,render: function(data, type, full, meta){
                                        // console.log(data)
                                        if(noOfMonth==1)
                                                return defaultContent=data;
                                        else
                                                return defaultContent=Number(data)*(noOfMonth);
                                        } 
                                },
                                { data: null, defaultContent: 0},
                                // { data: null, defaultContent:'----' },
                                // { data: null, defaultContent:'----' },
                        ],
                        columnDefs: [{
                                orderable: false,
                                // className: 'select-checkbox',
                                targets: 0,
                                // createdCell: function(td, cellData, rowData, row, col){
                                //         // console.log(rowData)
                                //         if(Number(rowData.fee_paid)>0||Number(rowData.fee_due)==0||Number(rowData.fee)==0){
                                //                 $(td).removeClass('select-checkbox');
                                //                 $(td).prop('disabled', true);
                                //         }
                                // }
                        }],
                        rowCallback: function(row, data, index){
                              if (data.fee_type=="Yearly") {
                                 jQuery(row).hide();
                              }
                        },
                        select: {
                                style: 'multi',
                                selector: 'td:first-child'
                        },
                        order: [
                                [1, 'asc']
                        ],
                        paging: false,
                        info: false,
                        language: {
                                emptyTable: "No data available "
                        },
                });
                $('#mainPayFeesBody').css("display","none");
                $('#viewIfYearlyPaid').css("display","none");
                $('#FeeMonthly').css("width", "100%");
                $('#viewFeeMonthly').css("display", "block");
                $('#viewFeePayAmount').css("display", "block");
                var sum = 0;
                for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        if(mainData.data.feeStructure[i].fee_type=="Monthly"){
                                sum += Number(mainData.data.feeStructure[i].fee)*noOfMonth;
                        }
                }
                $('#fees_pay_form').find("input[name='feeAmt']").val(sum);
                $('#labelFinalPayFeeAmt').html("Total Payable Amount : &#x20b9;  "+sum);
                ReceiptData=mainData.data.feeStructure;
                for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        if(mainData.data.feeStructure[i].fee_type=="Monthly"){
                                ReceiptData[i].fee_paid = String(Number(mainData.data.feeStructure[i].fee)*noOfMonth);
                        }
                        else{
                                ReceiptData[i].fee_paid = "0";
                        }
                }
                // console.table(ReceiptData);
                var monthlyobject=convertToOnlyMonthly(ReceiptData);
                console.table(monthlyobject);
                ReceiptData=monthlyobject;
                // var monthN = getMonthNames();
                // console.log(monthN)
                // for(var i=0;i<=monthN.length-1;i++){
                // 	var finalReceipt=pushFinalMonth(monthlyobject,monthN[i]);
                // 	console.log(finalReceipt);
                // }
                // var arr = [];
                // $('#FeeMonthly tbody').on('click', '.select-checkbox', function() {
                //         var $row = $(this).closest('tr');
                //         var data = $('#FeeMonthly').DataTable().row($row).data();
                //         // console.log(data);
                //         if (arr.length == 0) {
                //                 arr.push(data);
                //         }
                //         else 
                //         {
                //                 if (!arr.includes(data)) 
                //                 {
                //                         arr.push(data);
                //                 } 
                //                 else 
                //                 {
                //                         arr.splice(arr.indexOf(data), 1);
                //                 }
                //         }
                //         payfeedata = arr;
                //         // console.log(payfeedata);
                //         var sum = 0;
                //         for (var i = 0; i <= arr.length - 1; i++) {
                //                 sum += Number(arr[i].fee);
                //         }
                //         $('#fees_pay_form').find("input[name='feeAmt']").val(sum).select();
                        // ReceiptData=mainData.data.feeStructure;
                        // for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        //      for(var j=0; j<=payfeedata.length-1; j++){
                        //         if(mainData.data.feeStructure[i].fee_head==payfeedata[j].fee_head)
                        //         {
                        //                  ReceiptData[i].fee_paid = mainData.data.feeStructure[i].fee;
                        //         }
                        //         else
                        //         {
                        //                 if(Number(ReceiptData[i].fee_paid)<=0){
                        //                         ReceiptData[i].fee_paid = "0";
                        //                 }
                        //         }
                        //      }
                        // }
                //         // console.log(ReceiptData);
                //         // console.log(tableToJSON($("#FeeMonthly")))
                // });
        }
        if(data.isStudentExist && data.isFeeCollectionExist){
        	var paidArray = data.data.feeMonthly;
        	// console.table(paidArray);
        	const unique = [...new Set(paidArray.map(item => item.monthName))];
        	console.log(unique);
        	console.log(findCommonElements(unique,getMonthNames()))
        	var months = getMonthNames();
        	if(!findCommonElements(unique,getMonthNames())){
        		var noOfMonth=getMonthDetails()+1;
                clearTable("#FeeMonthly");
                $('#FeeMonthly').DataTable({
                        processing: true,
                        data: data.data.feeStructure,
                        searching: false,
                        columns: [
                                { data: "fee_head" },
                                { data: "fee" ,render: function(data, type, full, meta){
                                        // console.log(data)
                                        if(noOfMonth==1)
                                                return defaultContent=data;
                                        else
                                                return defaultContent=Number(data)*(noOfMonth);
                                        } 
                                },
                                { data: null, defaultContent: 0},
                        ],
                        rowCallback: function(row, data, index){
                              if (data.fee_type=="Yearly") {
                                 jQuery(row).hide();
                              }
                        },
                        paging: false,
                        info: false,
                        language: {
                                emptyTable: "No data available "
                        },
                });
                $('#mainPayFeesBody').css("display","none");
                $('#viewIfYearlyPaid').css("display","none");
                $('#FeeMonthly').css("width", "100%");
                $('#viewFeeMonthly').css("display", "block");
                $('#viewFeePayAmount').css("display", "block");
                var sum = 0;
                for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        if(mainData.data.feeStructure[i].fee_type=="Monthly"){
                                sum += Number(mainData.data.feeStructure[i].fee)*noOfMonth;
                        }
                }
                $('#fees_pay_form').find("input[name='feeAmt']").val(sum);
                $('#labelFinalPayFeeAmt').html("Total Payable Amount : &#x20b9;  "+sum);
                ReceiptData=mainData.data.feeStructure;
                for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        if(mainData.data.feeStructure[i].fee_type=="Monthly"){
                                ReceiptData[i].fee_paid = String(Number(mainData.data.feeStructure[i].fee)*noOfMonth);
                        }
                        else{
                                ReceiptData[i].fee_paid = "0";
                        }
                }
                // console.table(ReceiptData);
                var monthlyobject=convertToOnlyMonthly(ReceiptData);
                console.table(monthlyobject);
                ReceiptData=monthlyobject;
        	}
        	
        }
        
}
//===yearly view===//
function yearlyView(data){
        console.log(data);
        if(data.isFeeYearlyExist == false){
        	var noOfMonth=getMonthDetails()+1;
                clearTable("#FeeMonthly");
                $('#FeeMonthly').DataTable({
                        processing: true,
                        data: data.data.feeStructure,
                        searching: false,
                        columns: [
                                { data: "fee_head" },
                                { data: "fee" },
                                { data: null, defaultContent: 0},
                                // { data: null, defaultContent:'----' },
                                // { data: null, defaultContent:'----' },
                        ],
                        rowCallback: function(row, data, index){
                              if (data.fee_type=="Monthly") {
                                 jQuery(row).hide();
                              }
                        },
                        select: {
                                style: 'multi',
                                selector: 'td:first-child'
                        },
                        order: [
                                [1, 'asc']
                        ],
                        paging: false,
                        info: false,
                        language: {
                                emptyTable: "No data available "
                        },
                });
                $('#mainPayFeesBody').css("display","none");
                $('#viewIfYearlyPaid').css("display","none");
                $('#FeeMonthly').css("width", "100%");
                $('#viewFeeMonthly').css("display", "block");
                $('#viewFeePayAmount').css("display", "block");
                var sum = 0;
                for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        if(mainData.data.feeStructure[i].fee_type=="Yearly"){
                                sum += Number(mainData.data.feeStructure[i].fee);
                        }
                }
                $('#fees_pay_form').find("input[name='feeAmt']").val(sum);
                $('#labelFinalPayFeeAmt').html("Total Payable Amount : &#x20b9;  "+sum);
                ReceiptData=mainData.data.feeStructure;
                for (var i = 0; i <= mainData.data.feeStructure.length - 1; i++) {
                        if(mainData.data.feeStructure[i].fee_type=="Yearly"){
                                ReceiptData[i].fee_paid = String(Number(mainData.data.feeStructure[i].fee));
                        }
                        else{
                                ReceiptData[i].fee_paid = "0";
                        }
                }
                // console.table(ReceiptData);
                var monthlyobject=convertToOnlyYearly(ReceiptData);
                console.table(monthlyobject);
                ReceiptData=monthlyobject;
        }
        if(data.isFeeYearlyExist == true){
        	//$('#yearlySessionName').html($('#session_id').val());
            $('#mainPayFeesBody').css("display","none");
        	$('#viewFeeMonthly').css("display", "none");
            $('#viewFeePayAmount').css("display", "none");
            $('#viewIfYearlyPaid').css("display", "block");
        }
}
function back(){
    $('#viewIfYearlyPaid').css("display","none");
    $('#viewFeeMonthly').css("display", "none");
    $('#viewFeePayAmount').css("display", "none");
	$('#mainPayFeesBody').css("display","block");
}
// ========//
function findCommonElements(arr1, arr2) {
    return arr1.some(item => arr2.includes(item))
}
// ======= //
function convertToOnlyMonthly(data){
	var arr=[];
	for (var i = 0; i <= data.length-1; i++) {
        if(data[i].fee_type=="Monthly"){
           	arr.push(data[i]);
        }
	}
	return arr;
}
function convertToOnlyYearly(data){
	var arr=[];
	for (var i = 0; i <= data.length-1; i++) {
        if(data[i].fee_type=="Yearly"){
           	arr.push(data[i]);
        }
	}
	return arr;
}
// =======//
// function pushFinalMonth(data,monthN){
// 	console.log(monthN);var newData=[];newData=data;
// 	newData.map(i=>{i["month"] = monthN});
// 	return newData;
// }
// =======//
function tableToJSON(tblObj){  
   var data = [];
   var $headers = $(tblObj).find("th");
   var $rows = $(tblObj).find("tbody tr").each(function(index) {
           $cells = $(this).find("td");
           data[index] = {};
           $cells.each(function(cellIndex) {
             data[index][$($headers[cellIndex]).html()] = $(this).html();
           });    
        });
  return data;
}
// ---------------------------------------end for rendering monthly fee table--------------------------------------- //
// ================== //
// ---------------------------------------------function for paying fees--------------------------------------------- //
function feePay(e){
        e.preventDefault();
        if(document.getElementById('payFeeType').value=="monthly")
        {
                if(mainData.isStudentExist){
                        if ($('#fees_pay_form').valid() && $('#feeAmtNumber').val() > 0) {
                                // console.log(mainData);
                                // console.log(ReceiptData);
                                // for (var i = 0; i <= ReceiptData.length - 1; i++) {
                                //         if(!ReceiptData[i].hasOwnProperty('fee_paid')){
                                //              ReceiptData[i]['fee_paid']="0"   ;
                                //         }
                                // }
                                var months=getMonthNames();
                                // console.log(months);
                                console.log(document.getElementById('fees_pay_form').feeAmt.value);
                                $.ajax({
                                        type: "POST",
                                        url: "Fee/saveFeeMonthly",
                                        dataType: "JSON",
                                        data: { data: ReceiptData,
                                                admno:mainData.data.studentData[0].admisstion_no,
                                                transacID: document.getElementById('fees_pay_form').transacID.value, 
                                                modePay: document.getElementById('fees_pay_form').modePay.value,
                                                remarks:document.getElementById('fees_pay_form').remarks.value,
                                                type: "Monthly",
                                                noOfMonth:getMonthDetails()+1,
                                                startMonth:$('#fromPayfee').val(),
                                                endMonth:$('#toPayfee').val(),
                                                months:months },
                                        success: function(data) {
                                                console.log(data);
                                                if (data.error === false) 
                                                {
                                                        Swal.fire({
                                                                // timer: 5000,
                                                                icon: 'success',
                                                                text: 'Successful',
                                                                title: 'Pay Fees',
                                                                allowOutsideClick: false,
                                                                allowEscapeKey: false
                                                        });
                                                        sessionStorage.setItem('latestpayfeedata', JSON.stringify({
                                                                receipt:data.receipt,
                                                                ReceiptData: ReceiptData,
                                                                mainData: mainData,
                                                                payfeedata: payfeedata,
                                                                transacID: document.getElementById('fees_pay_form').transacID.value,
                                                                modePay: document.getElementById('fees_pay_form').modePay.value,
                                                                feeAmt: document.getElementById('fees_pay_form').feeAmt.value,
                                                                remarks:document.getElementById('fees_pay_form').remarks.value,
                                                                type: "Monthly",
                                                                noOfMonth:getMonthDetails()+1,
                                                                startMonth:$('#fromPayfee').val(),
                                                                endMonth:$('#toPayfee').val(), 
                                                        }));
                                                        document.getElementById('fees_pay_form').reset();
                                                        // $(location).attr("href", 'feesReceipt');
                                                } 
                                                else 
                                                {
                                                        Swal.fire({
                                                                icon: 'error',
                                                                text: data.text,
                                                                title: 'Pay Fees',
                                                                swaltoast: false,
                                                                allowOutsideClick: false,
                                                                allowEscapeKey: false,
                                                        });
                                                        document.getElementById('fees_pay_form').reset();
                                                        $(location).attr("href", 'payFees');
                                                }
                                        }
                                });
                                return false;
                        } 
                        else 
                        {
                                if($('#feeAmtNumber').val() <=0){
                                        Swal.fire({
                                                icon: 'warning',
                                                title: 'Pay Fees',
                                                text: 'The Fee Amount should be greater than 0'
                                        });
                                }
                        }
                }
        }
        if(document.getElementById('payFeeType').value=="yearly")
        {
                 if($('#searchFee').valid())
                 {
                         if ($('#fees_pay_form').valid() && $('#feeAmtNumber').val() > 0) {
                                console.log(document.getElementById('fees_pay_form').feeAmt.value);
                                console.log(ReceiptData)
                                $.ajax({
                                        type: "POST",
                                        url: "Fee/saveFeeYearly",
                                        dataType: "JSON",
                                        data: { data: ReceiptData,
                                                admno:mainData.data.studentData[0].admisstion_no,
                                                transacID: document.getElementById('fees_pay_form').transacID.value, 
                                                modePay: document.getElementById('fees_pay_form').modePay.value,
                                                remarks:document.getElementById('fees_pay_form').remarks.value,
                                                type: "Yearly", },
                                        success: function(data) {
                                                if (data.error === false) 
                                                {
                                                        Swal.fire({
                                                                // timer: 5000,
                                                                icon: 'success',
                                                                text: 'Successful',
                                                                title: 'Pay Fees',
                                                                allowOutsideClick: false,
                                                                allowEscapeKey: false
                                                        });
                                                        sessionStorage.setItem('latestpayfeedata', JSON.stringify({
                                                                receipt:data.receipt,
                                                                ReceiptData: ReceiptData,
                                                                mainData: mainData,
                                                                payfeedata: payfeedata,
                                                                transacID: document.getElementById('fees_pay_form').transacID.value,
                                                                modePay: document.getElementById('fees_pay_form').modePay.value,
                                                                feeAmt: document.getElementById('fees_pay_form').feeAmt.value,
                                                                remarks:document.getElementById('fees_pay_form').remarks.value,
                                                                type: "Yearly", 
                                                        }));
                                                        document.getElementById('fees_pay_form').reset();
                                                        // $(location).attr("href", 'feesReceipt');
                                                } 
                                                else 
                                                {
                                                        Swal.fire({
                                                                icon: 'error',
                                                                text: data.text,
                                                                title: 'Pay Fees',
                                                                swaltoast: false,
                                                                allowOutsideClick: false,
                                                                allowEscapeKey: false,
                                                        });
                                                        document.getElementById('fees_pay_form').reset();
                                                        $(location).attr("href", 'payFees');
                                                }
                                                
                                        }
                                });
                                return false;
                        } 
                        else 
                        {
                                if($('#feeAmtNumber').val() <=0){
                                        Swal.fire({
                                                icon: 'warning',
                                                title: 'Pay Fees',
                                                text: 'The Fee Amount should be greater than 0'
                                        });
                                }
                        }
                 }
        }
}
// function onlinefeePay(response){
//         if(document.getElementById('payFeeType').value=="monthly")
//         {
//                                 var months=getMonthNames();
//                                 $.ajax({
//                                         type: "POST",
//                                         url: "Fee/saveFeeMonthly",
//                                         dataType: "JSON",
//                                         data: { data: ReceiptData,
//                                                 admno:mainData.data.studentData[0].admisstion_no,
//                                                 // transacID: document.getElementById('fees_pay_form').transacID.value,
//                                                 transacID :response.razorpay_payment_id, 
//                                                 modePay: document.getElementById('fees_pay_form').modePay.value,
//                                                 remarks:document.getElementById('fees_pay_form').remarks.value,
//                                                 type: "Monthly",
//                                                 noOfMonth:getMonthDetails()+1,
//                                                 startMonth:$('#fromPayfee').val(),
//                                                 endMonth:$('#toPayfee').val(),
//                                                 months:months },
//                                         success: function(data) {
//                                                 console.log(data);
//                                                 if (data.error === false) 
//                                                 {
//                                                         Swal.fire({
//                                                                 // timer: 5000,
//                                                                 icon: 'success',
//                                                                 text: 'Successful',
//                                                                 title: 'Pay Fees',
//                                                                 allowOutsideClick: false,
//                                                                 allowEscapeKey: false
//                                                         });
//                                                         sessionStorage.setItem('latestpayfeedata', JSON.stringify({
//                                                                 receipt:data.receipt,
//                                                                 ReceiptData: ReceiptData,
//                                                                 mainData: mainData,
//                                                                 payfeedata: payfeedata,
//                                                                 transacID: document.getElementById('fees_pay_form').transacID.value,
//                                                                 modePay: document.getElementById('fees_pay_form').modePay.value,
//                                                                 feeAmt: document.getElementById('fees_pay_form').feeAmt.value,
//                                                                 remarks:document.getElementById('fees_pay_form').remarks.value,
//                                                                 type: "Monthly",
//                                                                 noOfMonth:getMonthDetails()+1,
//                                                                 startMonth:$('#fromPayfee').val(),
//                                                                 endMonth:$('#toPayfee').val(), 
//                                                         }));
//                                                         document.getElementById('fees_pay_form').reset();
//                                                         // $(location).attr("href", 'feesReceipt');
//                                                 } 
//                                                 else 
//                                                 {
//                                                         Swal.fire({
//                                                                 icon: 'error',
//                                                                 text: data.text,
//                                                                 title: 'Pay Fees',
//                                                                 swaltoast: false,
//                                                                 allowOutsideClick: false,
//                                                                 allowEscapeKey: false,
//                                                         });
//                                                         document.getElementById('fees_pay_form').reset();
//                                                         $(location).attr("href", 'payFees');
//                                                 }
//                                         }
//                                 });
//                                 return false;
//                         } 
//                         else 
//                         {
//                                 if($('#feeAmtNumber').val() <=0){
//                                         Swal.fire({
//                                                 icon: 'warning',
//                                                 title: 'Pay Fees',
//                                                 text: 'The Fee Amount should be greater than 0'
//                                         });
//                                 }
//                         }
//        	}     
//         if(document.getElementById('payFeeType').value=="yearly")
//         {
//                  if($('#searchFee').valid())
//                  {
//                          if ($('#fees_pay_form').valid() && $('#feeAmtNumber').val() > 0) {
//                                 console.log(document.getElementById('fees_pay_form').feeAmt.value);
//                                 console.log(ReceiptData)
//                                 $.ajax({
//                                         type: "POST",
//                                         url: "Fee/saveFeeYearly",
//                                         dataType: "JSON",
//                                         data: { data: ReceiptData,
//                                                 admno:mainData.data.studentData[0].admisstion_no,
//                                                 transacID: document.getElementById('fees_pay_form').transacID.value, 
//                                                 modePay: document.getElementById('fees_pay_form').modePay.value,
//                                                 remarks:document.getElementById('fees_pay_form').remarks.value,
//                                                 type: "Yearly", },
//                                         success: function(data) {
//                                                 if (data.error === false) 
//                                                 {
//                                                         Swal.fire({
//                                                                 // timer: 5000,
//                                                                 icon: 'success',
//                                                                 text: 'Successful',
//                                                                 title: 'Pay Fees',
//                                                                 allowOutsideClick: false,
//                                                                 allowEscapeKey: false
//                                                         });
//                                                         sessionStorage.setItem('latestpayfeedata', JSON.stringify({
//                                                                 receipt:data.receipt,
//                                                                 ReceiptData: ReceiptData,
//                                                                 mainData: mainData,
//                                                                 payfeedata: payfeedata,
//                                                                 transacID: document.getElementById('fees_pay_form').transacID.value,
//                                                                 modePay: document.getElementById('fees_pay_form').modePay.value,
//                                                                 feeAmt: document.getElementById('fees_pay_form').feeAmt.value,
//                                                                 remarks:document.getElementById('fees_pay_form').remarks.value,
//                                                                 type: "Yearly", 
//                                                         }));
//                                                         document.getElementById('fees_pay_form').reset();
//                                                         // $(location).attr("href", 'feesReceipt');
//                                                 } 
//                                                 else 
//                                                 {
//                                                         Swal.fire({
//                                                                 icon: 'error',
//                                                                 text: data.text,
//                                                                 title: 'Pay Fees',
//                                                                 swaltoast: false,
//                                                                 allowOutsideClick: false,
//                                                                 allowEscapeKey: false,
//                                                         });
//                                                         document.getElementById('fees_pay_form').reset();
//                                                         $(location).attr("href", 'payFees');
//                                                 }
                                              
//                                         },
//                                 });
//                                 return false;
//                         } 
//                         else 
//                         {
//                                 if($('#feeAmtNumber').val() <=0){
//                                         Swal.fire({
//                                                 icon: 'warning',
//                                                 title: 'Pay Fees',
//                                                 text: 'The Fee Amount should be greater than 0'
//                                         });
//                                 }
//                         }
//                  }
//         }
// }
// -------------------------------------------end function for paying fees------------------------------------------- //