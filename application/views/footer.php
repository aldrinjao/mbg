
</div><!--end of wrapper div-->


<footer id='footer'></footer>
</body>
<div class="modal"><!-- Place at bottom of page --></div>
<!-- additional script-->
<script>

	$('#igenus').bind('keydown keyup keypress', function() {
    $('#scientificnamegenus').html(this.value || '?');
		});
		
	$('#ispecies').bind('keydown keyup keypress', function() {
    $('#scientificnamespecies').html(this.value || '?');
		});

	$('#result_table').dataTable();
	$('#result_table_wrapper').css("width","80%");
	$('#result_table_wrapper').css("margin","auto");
	
	$(window).load (function () { 
      $('#wrapper').removeClass('hiddendiv');
      $('body').removeClass('loading');
  	}
		
    )
  	


</script>

</html>