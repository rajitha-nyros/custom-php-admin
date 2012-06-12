$(document).ready(function() {
setTimeout(function(){
 $('.progress .bar').each(function(){
  var me=$(this);  
  var current_perc =0;
  var percent=me.attr("data");
  var progress = setInterval(function(){
   if(current_perc>=percent) {
   clearInterval(progress);
   }else{
   current_perc +=1;   
   me.css('width',(current_perc)+'%');}
  },60);
});
 },10);




$(".add").click(function() {
	$(".filter").css("display","none");
	$("#board").css("display","none");
	$(".board5").css("display","none");
	$(".board4").css("display","none");
	$(".board3").css("display","inline-block");
	$(".board2").css("display","inline-block");
	});
$(".export").click(function() {
	$(".board2").css("display","none");
	$("#board").css("display","none");
	$(".board5").css("display","none");
	$(".board3").css("display","inline-block");
	$(".board4").css("display","inline-block");
	});
$(".history").click(function() {
	$(".board4").css("display","none");
	$("#board").css("display","none");
	$(".board2").css("display","none");
	$(".board3").css("display","inline-block");
	$(".board5").css("display","inline-block");
	});
$("#list").click(function() {
	$(".filter").css("display","inline");
	$(".board4").css("display","none");
	$(".board5").css("display","none");
	$(".board2").css("display","none");
	$(".board3").css("display","none");
	$("#board").css("display","inline-block");
	});
$(".history").click(function(){
	$(".filter").css("display","none");
	});
$("#toggle1").click(function(event) {
event.preventDefault();
$("#tog1").slideToggle();
});
$("#toggle2").click(function(event) {
event.preventDefault();
$("#tog2").slideToggle();
});


$(".myclass li").click(function(){
	var myid=$(this).attr("id"); 
	$('#search_key').val(myid);
	$('#span_search').html(myid);
	$('#myspan a').attr('id', myid);
	$('#search_block').css("display","block");
});
$(".all").mousedown(function(){
	$("#data1").css("display","none");
	$(".all").css("display","none");
	$("#data2").css("display","block");
 });
$(".all").mousedown(function(){
	$("#data3").css("display","none");
	$(".all").css("display","none");
	$("#data4").css("display","block");
 });
$(".all").click(function(){
	$("#data5").css("display","none");
	$(".all").css("display","none");
	$("#data6").css("display","block");
 });
$(".cart_sort").click(function(){
	$("#sort_data").css("display","block");
	$("#complete_data").css("display","none");
 });

  
  $(".dele").mousedown(function(){
	$(".del").css("display","block");
	$(".tab-content").css("display","none");
	$(".home1").hide();
});
 $(".show1").click(function() {
	$(".edit").css("display","none");
	$(".delete").css("display","none");
	$(".history").css("display","none");
	$(".show").css("display","inline-block");
	});
$(".edit1").click(function() {
	$(".show").css("display","none");
	$(".delete").css("display","none");
	$(".history").css("display","none");
	$(".edit").css("display","inline-block");
	});
$(".delete1").click(function() {
	$(".show").css("display","none");
	$(".history").css("display","none");
	$(".edit").css("display","none");
	$(".delete").css("display","inline-block");
	});
$(".history1").click(function() {
	$(".delete").css("display","none");
	$(".edit").css("display","none");
	$(".show").css("display","none");
	$(".history").css("display","inline-block");
	});
var th = jQuery('th'),
                li = jQuery('li'),
                inverse = false;
            th.click(function(){
                var header = $(this),
                    index = header.index();
                header
                    .closest('table')
                    .find('td')
                    .filter(function(){
                        return $(this).index() === index;
                    })
                    .sortElements(function(a, b){
                        a = $(a).text();
                        b = $(b).text();
                        return (
                            isNaN(a) || isNaN(b) ?
                                a > b : +a > +b
                            ) ?
                                inverse ? -1 : 1 :
                                inverse ? 1 : -1;
                    }, function(){
                        return this.parentNode;
                    });
                inverse = !inverse;
            });

 $('#green-contents').css('display', 'block');
            $('ul li').click(function () {
                $('#green-contents').css('display', 'block');
                if ($(this).attr('id') == '2') $('#green-contents').css('display', '');
            });
            $('#green').smartpaginator({ totalrecords: 30, recordsperpage: 5, datacontainer: 'mt', dataelement: 'tr', initval: 0, next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });
			
	
   $('.filter_submit').click(function(){
		$search_value = $("#search_value").val(); 
		$search_key =  $("#search_key").val();   
		$table_name =  $("#table_name").val();  
			$.ajax({
				type:"POST",
				url: "function.php",
				data: 'search_key='+$search_key+'&search_value='+$search_value+'&table_name='+$table_name,
				success: function(data){
						$("#data1").html(data);
					}
			});
			return(false);
		});
   
$(".pick").datepicker();

});		

