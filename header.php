
<header>
  <div class="default-header p">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/limagelogo.png" alt="image"/></a> </div>
        </div>
        <div class="col-sm-6 col-md-10">
          <div class="header_info">
          <?php
         $sql = "SELECT EmailId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
$email=$result->EmailId;
$contactno=$result->ContactNo;

}

?>   

 <div class="header_widgets ">
  <div class="circle_icon p"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
  <p class="uppercase_text">សម្រាប់ ជួយរាល់ ការប្រើប្រាស់ : </p>
  <a href="mailto:<?php echo htmlentities($email);?>"><?php echo htmlentities($email);?></a> </div>
  <div class="header_widgets">
    <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
     <p class="uppercase_text">សេវាកម្ម សម្រាប់​ទំនាក់ទំនង: </p>
      <a href="tel:<?php echo htmlentities($contactno);?>"><?php echo htmlentities($contactno);?></a> </div>
      
            <div class="social-follow">
              <ul>
              <div class="circle_icon"><a href="http://localhost/rent_car/profile.php"><i class="fa fa-user"></i></div>
            </ul>
            </div>
          <script>
            <?php 
              $useremail=$_SESSION['login'];
              $sql = "SELECT * from tblusers where EmailId=:useremail";
              $query = $dbh -> prepare($sql);
              $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              foreach($results as $result)
            ?>
          </script>
             <?php if($_SESSION['login']){?>
              <a href="http://localhost/rent_car/profile.php"  class="btn outline btn-xs "style="color: black"><?php echo htmlentities($result->EmailId);?></a>
              
              <?php } else { ?>
                <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">ចូលគណនី / ចុះឈ្មោះអតិថជនថ្មី</a>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default p">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
    <ul>
 <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">ប្រូហ្វាល</a></li>
              <li><a href="update-password.php">ផ្លាស់ប្តូរ ពាក្យសម្ងាត់</a></li>
            <li><a href="my-booking.php">ការជួលរថយន្ត របស់ខ្ញុំ</a></li>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
          <li><a href="my-testimonials.php">My Testimonial</a></li>
            <li><a href="logout.php">ចាក់ចេញ</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">ប្រូហ្វាល</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">ផ្លាស់ប្តូរ ពាក្យសម្ងាត់</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">ការជួលរថយន្ត របស់ខ្ញុំ</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">ចាក់ចេញ</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
          
        </div>
        <div class="header_search p">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
            <input type="text" placeholder="ស្វេងរករថយន្ត..." name="searchdata" class="form-control" required="true">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
        <li><a href="index.php"><i class="fa fa-home"></i>ទំព័រដើម</a></li>
          
          <li><a href="page.php?type=aboutus"><i class="fa fa-book"></i>ការប្រើប្រាស់</a></li>
          <li><a href="car-listing.php"><i class="fa fa-list"></i>តារាងរថយន្ត</a>
          <li><a href="contact-us.php"><i class="fa fa-phone"></i>ទំនាក់ទំនង</a></li>
          <li><a href="admin/index.php"><i class="fa fa-user"></i> LOGIN ADMIN</a></li>


        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>
<style>
  .p{
    font-family: "khmer os new";
    
  }
</style>