		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">Resistive technosource</span>
						 &copy; 2018-2019
					</span>
					&nbsp; &nbsp;
					<span class="action-buttons">
						<a href="#">
							<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
						</a>
						<a href="#">
							<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
						</a>
						<a href="#">
							<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
						</a>
					</span>
				</div>
			</div>
		</div>
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div>
</div>
		
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>

		
		      <!-- <script src="assets/lib/jquery/jquery.js"></script> -->
<!-- <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('change','.class_section',function(){
                            var ID = $(this).val();
                            $.ajax({
                                type:'POST',
                                url:'auto-load.php',
                                data:'id='+ID,
                                success:function(html){
                                    $('.load_class').html(html);
                                    $("#home_class option[value='0']").remove();
                                }
                            });
                             
                        });
                    });

                </script> -->
		<script type="text/javascript">
			// jQuery(function($) {
			// 	var myTable = 
			// 	$('#dynamic-table')
			// 	.DataTable( {
			// 		bAutoWidth: false,
			// 		"aoColumns": [
			// 		  { "bSortable": false },
			// 		  null, null,null, null, null,null, null,null, null,
			// 		  { "bSortable": false }
			// 		],
			// 		"aaSorting": [],
					
			// 		"sScrollY": "180px",  //vertical scrollbar
			// 		"sScrollX": "100%", //horizontal scrollbar
			// 			select: {
			// 			style: 'multi'
			// 		}
			// 	} );

			// 	$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			// 		e.stopImmediatePropagation();
			// 		e.stopPropagation();
			// 		e.preventDefault();
			// 	});
			// });
		</script>
		<script type="text/javascript">
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});			
		</script>
		<script type="text/javascript">
			$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					// no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false 
				});
		</script>
	

<script type="text/javascript">
$(document).ready(function(){
	$(document).on('change','.class_session',function(){
	var sID = $(this).val();
	$.ajax({
	type:'POST',
	url:'auto-load-session-class.php',
	data:'sessionId='+sID,
	success:function(html){
	$('.load_class').html(html);
	// $('.admission_no1').html('<option value="">Select Student</option>');
	}
	});

	});
	$(document).on('change','.load_class',function(){
	var classID = $(this).val();
	// alert(classID);
   var paymentType = document.getElementById('paymentType').value;
// paymentType={1:admissionFee,2:monthlyFee,3:pendingFee}
    $(".preStdent").hide();
	$.ajax({
	type:'POST',
	url:'auto-load-session-class.php',    
	data:{cid:classID,type:paymentType},
	success:function(html){
	$('.load_fee').html(html);

	// $('.load_fee').html(html);
	}
	});
	});

});
</script>		

<!-- <script type="text/javascript">	
function chkind(){
   var dropdown1 = document.getElementById('dropdown1');
   var textbox = document.getElementById('textbox');
   if(dropdown1.selectedIndex == 0){
     textbox.value = "Cash";
    // document.getElementById('textbox').disabled=true;

   }
    else if(dropdown1.selectedIndex == 1) {
     textbox.value = "";
     // document.getElementById('textbox').disabled=false;
   }
   }
</script>
 -->
<script type="text/javascript">	
// function chkadm(){
 
  
//    var txt =  document.getElementById('txtbox');
//    // txt.value = "Hi";
//    var today = new Date();
  
//    var today1 = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
//    txt.value = today1;
//    document.getElementById('txtbox').disabled=true;
//    }
</script>

<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='New Batch') 
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 
<script type="text/javascript">
    table = $('#dynamic-table').DataTable( {
    searching: true,
    bAutoWidth: false,
    "aaSorting": [],
    "sScrollY": "280px",  //vertical scrollbar
	"sScrollX": "100%", //horizontal scrollbar
} );
    </script>
	<script type="text/javascript">
    table = $('#dynamic-table1').DataTable( {
    searching: true,
    bAutoWidth: false,
    "aaSorting": [],
    "sScrollY": "280px",  //vertical scrollbar
	"sScrollX": "100%", //horizontal scrollbar
} );
    </script>

	</body>
</html>
