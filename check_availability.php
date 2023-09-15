<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "មានបញ្ហា : អុីម៉ែលអ្នកមិនត្រឹមត្រូវ ";
	}
	else {
		$sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email";	
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> អុីម៉ែលនេះ មានរួចហើយ</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'>អុីម៉ែលនេះ ត្រឹមត្រូវ</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}

?>
