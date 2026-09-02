<?php
include "includes/dbdetail.php";
if(!isset($_POST['clickid']))
{
	header('location:index.php');
}

$clickid=$_POST['clickid'];
$mobile=$_POST['txtnumber'];
$email='';
//$email=$_POST['txtemail'];
$date=date("Y-m-d H:i:s");

$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber(clickid,mobile,accesstime,email) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$clickid, $mobile,$date,$email);	
				
				
	$stmt1->execute();




?>




<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" /><title>
	:: Contest Bazaar ::
</title><link rel="stylesheet" href="css/style.css " /><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" /></head>
<body>
    <form method="post" action="bb.php" id="form2">
<div class="aspNetHidden">
<input type="hidden" name="price" id="price" value="" />
<input type="hidden" name="question" id="question" value="" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form2'];
if (!theForm) {
    theForm = document.form2;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.price.value = eventTarget;
        theForm.question.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<div class="aspNetHidden">

	<input type="hidden" name="clickid"  value="<?php echo $clickid;?>" />
	<input type="hidden" name="mobile" id="mobile" value="<?php echo $mobile; ?>" />
</div>
        <div class="container">
            <div class="header">
                <img src="images/logo.png" class="logo fullwidth" />
            </div>
            <br />
            &nbsp;&nbsp;&nbsp;
            <img src="images/CBTopBanner.gif" style="width: 100%;" />

            <hr class="hrBlueLine" />
            <br />
            <h1 class="txtBlue txtBold"><span id="spnmobilenumber">Welcome <?php echo $mobile;?></span></h1>
            <br />
            <h1 class="txtBlue txtBold">Start Playing by selecting the pack</h1>

            <ul class="PlanLinks">
                <li id="firstli">
                    <a id="LinkButton3" href="javascript:__doPostBack('1','99')">
            99 Questions @ Rs.99 only</a>
                </li>
              <!--  <li>
                    <a id="LinkButton1" href="javascript:__doPostBack('1','5')">
            5 Questions Plan @ <i class="fa fa-rupee"></i>  25/- only</a>
                </li>
                <li>
                    <a id="LinkButton2" href="javascript:__doPostBack('225','50')">
            50 Questions Plan @ <i class="fa fa-rupee"></i>  225/- only</a>
                </li>
                <li>
                    <a id="LinkButton4" href="javascript:__doPostBack('600','150')">
            150 Questions Plan @ <i class="fa fa-rupee"></i>  600/- only</a>
                </li>
                <li>
                    <a id="LinkButton5" href="javascript:__doPostBack('1050','300')">
            300 Questions Plan @ <i class="fa fa-rupee"></i>  1050/- only</a>
                </li>
                <li>
                    <a id="LinkButton6" href="javascript:__doPostBack('1500','500')">
            500 Questions Plan @ <i class="fa fa-rupee"></i> 1500/- only</a>
                </li>-->
            </ul>
        </div>
         <?php include 'footer.php';?>

        <div class="copyright">&copy 2020 ContestBazaar</div>
    </form>
</body>
</html>
