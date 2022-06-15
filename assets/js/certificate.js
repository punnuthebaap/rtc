$(window).load(function() {
	// console.table(obj)
	var ullu = $(location).attr("pathname");
        var splitullu = ullu.split('/');
        if (splitullu[2] == "viewCertificate") {
						if(obj.authority=="student"){
								// $('#viewCertificateAdmissionNo').css("display","none");
								document.getElementById('generate_certificate').autoCompleteAdmisData.value=obj.login_id;
						}
				}
});
function transferDownload(){
// html2canvas(document.getElementById("toDownload"), {
//            background: "#ffffff",
//            scale:3,
//             onrendered: function(canvas) {
//     			var width = canvas.width;
//                 var height = canvas.height;
//                 var millimeters = {};
//                 millimeters.width = Math.floor(width * 0.264583);
//                 millimeters.height = Math.floor(height * 0.264583);

//                 var imgData = canvas.toDataURL('image/png');
//                 var doc = new jsPDF("p", "mm", "a4");
//                 // console.log(doc)
//                 // doc.deletePage(1);
//                 doc.addPage(millimeters.width, millimeters.height);
//                 doc.addImage(imgData, 'PNG', 2, 2);
//                 doc.save('transfer.pdf');
//             }
//         });
var element = document.getElementById('toDownload');
html2pdf(element, {
  margin:       0,
  filename:     'transfer.pdf',
  image:        { type: 'jpeg', quality: 1 },
  html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
});
} 
function chDownload(){
	var element = document.getElementById('toDownloadcharacter');
	html2pdf(element, {
	  margin:       5,
	  filename:     'chracter.pdf',
	  image:        { type: 'jpeg', quality: 1 },
	  html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
	  jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
	});
} 
function chPrint(){
	 html2canvas(document.getElementById("toDownloadcharacter"), {
            onrendered: function(canvas) {

                var imgData = canvas.toDataURL('image/png');
                console.log('Report Image URL: '+imgData);
                var doc = new jsPDF('p', 'mm', [297, 210]); //210mm wide and 297mm high
                
                doc.addImage(imgData, 'PNG', 1, 1);
                doc.autoPrint({variant:'non-conform'});
                // window.open(doc.output('bloburl'), '_blank',"toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes,top=200,left=350,width=600,height=400");
                doc.save('chracter.pdf');
            }
        });
}
$(window).load(function(){
	$('#generate').on('click',function(e){
        e.preventDefault();
        if($('#generate_certificate').valid()){
        	// console.log( $('#generate_certificate').serialize())
          $.ajax({
              type : "POST",
              url  : "Certificate/getStudentDetail",
              // contentType: "application/json; charset=utf-8",
              dataType : "JSON",
              data : $('#generate_certificate').serialize(),
              success: function(data){
              	if(data.error===false){
              		if($('#certificate_type').val()=='transfer'){
              			fillForm(data)
              		}
              		if($('#certificate_type').val()=='character'){
              			fillch(data);
              		}
              	}
              	if(data.error===true){
              		Swal.fire({
              			icon:'error',
              			text:'get form details',
              			title:'failed'
              		})
              		$(location).attr("href","viewCertificate");
              	}
              }
            });
            return false;
        }
        });
});
function fillForm(data){
	console.log(data)
	$('#admisstion_no').html(data.data[0].admisstion_no);
	$('#roll_no').html(data.data[0].roll_no);
	$('#name_of_student').html(data.data[0].name_of_student);
	$('#mother_name').html(data.data[0].mother_name);
	$('#father_name').html(data.data[0].father_name);
	$('#nationality').html(data.data[0].nationality);
	if(data.data[0].std_cast!="GEN"||data.data[0].std_cast!="OBC"||data.data[0].std_cast!="OTHERS"||data.data[0].std_cast!=""){
		$('#std_cast').html("YES");
	}
	else{
		$('#std_cast').html("NO");
	}
	
	$('#addmition_date').html(moment(data.data[0].addmition_date).format('DD-MM-YYYY'));
	$('#dob').html(moment(data.data[0].dob).format('DD-MM-YYYY'));
	$('#dob_word').html(moment(data.data[0].dob).format('Do [of] MMMM'));
	$('#class_in_which_left').html(data.data[0].class_in_which_left);
	$('#class_in_which_left_word').html(data.data[0].class_in_which_left_word);
	$('#subject1').html(data.subject[1].subject+'&nbsp;');
	$('#subject2').html(data.subject[2].subject+'&nbsp;');
	$('#subject3').html(data.subject[3].subject+'&nbsp;');
	$('#subject4').html(data.subject[4].subject+'&nbsp;');
	$('#subject5').html(data.subject[5].subject+'&nbsp;');
	$('#subject6').html(data.subject[6].subject+'&nbsp;');
	// $('#working_days').html(data.data[0].working_days);
	// $('#total_workin_days').html(data.data[0].total_workin_days);
	// $('#ncc').html(data.data[0].ncc);
	// $('#games').html(data.data[0].games);
	// $('#conduct').html(data.data[0].conduct);
	$('#date_of_issue_certificate').html(moment(data.data[0].date_of_issue_certificate).format('DD-MM-YYYY'));
	$('#date_of_issue_of_left_cert').html(moment(data.data[0].date_of_issue_of_left_cert).format('DD-MM-YYYY'));
	$('#reason_for_leaving_school').html(data.data[0].reason_for_leaving_school);
	$('#left_remarks').html(data.data[0].left_remarks);
	$('#characterCertificate').css('display','none')
	$('#transferCertificate').css('display','block')
}
function fillch(data){
	console.log(data)
	$('#ch_name_of_student').html(data.data[0].name_of_student);
	$('#ch_father_name').html(data.data[0].father_name);
	$('#ch_class_in_which_left').html(data.data[0].class_in_which_left);
	if(data.data[0].school_left_date!=null){
		$('#ch_school_left_date').html(moment(data.data[0].school_left_date).format('YYYY'));
	}
	if(data.data[0].date_of_issue_certificate!=null){
		$('#ch_date_of_issue_certificate').html(moment(data.data[0].date_of_issue_certificate).format('DD-MM-YYYY'));
	}
	$('#transferCertificate').css('display','none')
	$('#characterCertificate').css('display','block')
}