
</div><!--end of wrapper div-->


</body>
<footer id='footer'></footer>

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

</script>

</html>