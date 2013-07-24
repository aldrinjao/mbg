<?php
	include ("header.php");

if($input_error){
echo validation_errors();
}else{

?>



<div style="width:90%;margin:auto;padding-top:40px;text-align:center;">
	<?php
		echo "Taxon ID: ".$id." does not exist";
	?>
</div>	




<?php
}
//end of for each
include("footer.php");
?>	