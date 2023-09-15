<?php
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('ពាក្យសម្ងាត់របស់ ត្រូវបានផ្លាស់ប្តូរ');</script>";
}
else {
echo "<script>alert('អុីម៉ែល ឬ លេខទូរស័ព្ធរបស់មិនត្រឹមត្រូវ');</script>"; 
}
}

?>
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert(" ពាក្យសម្ងាត់ថ្មី បានបញ្ជាក់ មិនដូចគ្នា!!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
<style>
  .p{
    font-family:"khmer os new";
  }
</style>
<div class="modal fade p" id="forgotpassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">សូមការផ្លាស់ប្តូរពាក្យសម្ងាត់</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="អុីម៉ែល​ដែលបានប្រើ" required="">
                </div>
  <div class="form-group">
                  <input type="text" name="mobile" class="form-control" placeholder="លេខទូរស័ព្ធ" required="">
                </div>
  <div class="form-group">
                  <input type="password" name="newpassword" class="form-control" placeholder="ពាក្យសម្ងាត់ ថ្មី" required="">
                </div>
  <div class="form-group">
                  <input type="password" name="confirmpassword" class="form-control" placeholder="បញ្ជាក់ ពាក្យសម្ងាត់" required="">
                </div>
                <div class="form-group">
                  <input type="submit" value="ផ្លាស់ប្តូរពាក្យសម្ងាត់" name="update" class="btn btn-block">
                </div>
              </form>
              <div class="text-center">
                <p class="gray_text">ចំណាំ :ដើម្បីធ្វើអោយមានសុវត្ថិភាព ខាងយើងខ្ញុំ មិនបានរក្សាទុក ពាក្យសម្ងាត់របស់លោកអ្នក នៅក្នុង គេហទំព័រទេ សូមរក្សាទុកដោយបុគ្គល  ។  សូមអរគុណ​ !!</p>
                <p><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ចូលតាម គណនី</a></p>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>