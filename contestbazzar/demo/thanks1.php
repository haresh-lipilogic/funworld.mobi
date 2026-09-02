<?php

include("includes/dbdetail.php");
$today=date('Y-m-d');
$clickid=$_GET['clickid'];
	
 $sql="select * from ".$db.".subscriber where clickid = '".$clickid."' order by subscriberid desc limit 1";
$res=$conn1->query($sql);

 $numrows11=$res->num_rows;
if($numrows11>0)
{
while($row=$res->fetch_assoc())
{
$subscriberid=$row['subscriberid'];
$price=$row['price'];
$question=$row['question'];
}

 $sql1="select * from ".$db.".subscriberquestions where subscriberid = '".$subscriberid."'";
$res1=$conn1->query($sql1);

$answeredquestion=$res1->num_rows;
$disable=$ll=0;
//echo $question;
//echo "<br>".$answeredquestion;
//exit;
if($question<=$answeredquestion)
{
	
	header("location:index.php?subid=".$subscriberid);
	exit;
}

  $sql2="select * from ".$db.".subscriberquestions inner join ".$db.".answers on answers.answerid=subscriberquestions.answerid where subscriberid = '".$subscriberid."' and istrue=1  "; 
$res2=$conn1->query($sql2);

$rightansweredquestion=$res2->num_rows;


$sql3="select * from ".$db.".subscriberquestions inner join ".$db.".answers on answers.answerid=subscriberquestions.answerid where subscriberid = '".$subscriberid."' and answertime>'".$today."' and istrue=1 "; 
//echo $sql3;exit;
$res3=$conn1->query($sql3);

$todayrightansweredquestion=$res3->num_rows;


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//print_r($_POST);exit;
	$disable=1;
$questionid1=$_POST['questionid'];	
$answerid1=$_POST['answerid'];	
$istrue1=$_POST['istrue'];	
$clickid1=$_POST['clickid'];	
$subscriberid1=$_POST['subscriberid'];
$date1=date("Y-m-d H:i:s");

$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriberquestions(questionid,answerid,answertime,subscriberid,clickid) VALUES (?,?,?,?,?)");
				$stmt1->bind_param("sssss",$questionid1, $answerid1,$date1,$subscriberid1,$clickid);	
				
				
	$stmt1->execute();
	
	
	
$sql4="select * from (SELECT * FROM ".$db.".`questions` where questionid='".$questionid1."')a inner join ".$db.".answers on a.questionid=answers.questionid "; 
//echo $sql4;exit;
$res4=$conn1->query($sql4);
$i=0;
while($row4=$res4->fetch_assoc())
{
$questionid[$i]=$row4['questionid'];
$questiontext[$i]=$row4['questiontext'];
$answerid[$i]=$row4['answerid'];
$answertext[$i]=$row4['answertext'];
$istrue[$i]=$row4['istrue'];
$i++;
}




}

else if(isset($_GET['clickid']))
{


$sql4="select * from (SELECT * FROM ".$db.".`questions` order by rand() limit 1)a inner join ".$db.".answers on a.questionid=answers.questionid "; 
//echo $sql3;exit;
$res4=$conn1->query($sql4);
$i=0;
while($row4=$res4->fetch_assoc())
{
$questionid[$i]=$row4['questionid'];
$questiontext[$i]=$row4['questiontext'];
$answerid[$i]=$row4['answerid'];
$answertext[$i]=$row4['answertext'];
$istrue[$i]=$row4['istrue'];
$i++;
}

}
}
else{
?>
<form method="post" action="subscribe.php" >



<input type='hidden' name="notificationId" value="141328322">
<input type='hidden' name="command" value="recurrentPayment">
<input type='hidden' name="serviceCode" value="PL040017">
<input type='hidden' name="time" value="2020-08-26+14%3A52%3A11">
<input type='hidden' name="subscriptionId" value="PL040017x01x1598446203521">
<input type='hidden' name="amount" value="1230">
<input type='hidden' name="trid" value="44668073">
<input type='hidden' name="msisdn" value="0048694878641">
<input type='hidden' name="statusNumber" value="2">
<input type='hidden' name="statusText" value="Charged">


<input type="submit" name="submit">



<?php	

}	

?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" /><title>
	:: Play & Win ::
</title><link rel="stylesheet" href="css/style.css" /><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(
        function () {
            $("#correctAns").click(function () {
                $("#scorebarMessage").show();
                $("#correctAnsMessage").show();
                $("#queTwo").show();

                $("#welcomeMessage").hide();
                $("#queOne").hide();

                $("#wrongAns").attr("disabled", true);
            });
            $("#wrongAns").click(function () {
                $("#scorebarMessage").show();
                $("#wrongAnsMessage").show();
                $("#queTwo").show();

                $("#welcomeMessage").hide();
                $("#queOne").hide();
            });
        });

    </script>
<script>
var count=45;

var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
     //counter ended, do something here
	 
     return;
  }

  document.getElementById("ContentPlaceHolder1_Label1").innerHTML=count + " secs";
  //Do code for showing the number of seconds here
}
</script>


    <style type="text/css">
        .shownext {
            margin-left: 20%;
        }

        .secondBar {
            background: #0059B2;
            padding: 5px 10px;
            border-radius: 0 0 5px 5px;
            width: 30%;
            margin: 0px auto 10px auto;
            text-align: center;
            font-size: 18px;
            color: #FFF;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <form method="post" action="" id="form1">
<div class="aspNetHidden">

</div>
<input type="hidden" name="answerid" id="answerid"  value="">
<input type="hidden" name="istrue" id="istrue"  value="">
<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
         theForm.answerid.value = eventTarget;
        theForm.istrue.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>



<div class="aspNetHidden">

	<input type="hidden" name="clickid" id="clickid" value="<?php echo $clickid ?>" />
	<input type="hidden" name="subscriberid" id="subscriberid" value="<?php echo $subscriberid ?>" />
	<input type="hidden" name="questionid" id="questionid" value="<?php echo $questionid[0] ?>" />
	
	
</div>
        <div class="container">
            <div class="header">
                <img src="images/logo.png" class="logo fullwidth"  />

                <div class="pagetitle">
                    <i class="fa fa-flag"></i>&nbsp; 
            Play
                </div>
            </div>
            <img src="images/CBTopBanner.gif" style="width: 100%; margin-top: 25px; border: 1px solid grey;" />
            <hr class="hrBlueLine" />
            
            <div>
                
    

    <div id="ContentPlaceHolder1_upcontest">
	

            <span id="ContentPlaceHolder1_Timer1" style="visibility:hidden;display:none;"></span>
            
            <h1 id="welcomeMessage" style="">Welcome to Play & Win!</h1>
            <h4>Click on the correct answer to get</h4>
            <h3 class="txtBlue txtBold"><i class="fa fa-money"></i>&nbsp; 10 Points</h3>
            <h1 class="scorebarMessage">
                <span id="ContentPlaceHolder1_Label1"></span></h1>
            <hr class="hrBlueLine">
            <h1 id="scorebarMessage" class="ScoreBar"><i class="fa fa-flag"></i>&nbsp; Total Score:</h1>
            <br />
			<?php
			if($disable==1)
			{
			//echo "<br>istrue[0]=".$istrue[0];
			//echo "<br>istrue[1]=".$istrue[1];
			//echo "<br>istrue1=".$istrue1;
			//echo "<br>answerid[0]=".$answerid[0];
			//echo "<br>answerid[1]=".$answerid[1];
			
			//echo "<br>answerid1=".$answerid1;
			
			
			
			if($answerid[0]==$answerid1)
			{
				if($istrue1==1)
				{
				?>
				<h1 id="ContentPlaceHolder1_h1correctAnsMessage" class="AnswerStatus correctAns"><i class="fa fa-thumbs-up "></i>Right Answer, Great Move</h1>
				<?php	
				}
				else{
				?>
				<h1 id="ContentPlaceHolder1_h1wrongAnsMessage" class="AnswerStatus wrongAns"><i class="fa fa-thumbs-down"></i>Wrong Answer, But dont loose heart</h1>
				<?php
				}
			
			}
			else{
				
				if($istrue1==1)
				{
				?>
				<h1 id="ContentPlaceHolder1_h1correctAnsMessage" class="AnswerStatus correctAns"><i class="fa fa-thumbs-up "></i>Right Answer, Great Move</h1>
				<?php	
				}
				else{
				?>
				<h1 id="ContentPlaceHolder1_h1wrongAnsMessage" class="AnswerStatus wrongAns"><i class="fa fa-thumbs-down"></i>Wrong Answer, But dont loose heart</h1>
				<?php
				}
				
				
				
			}
			
			}
			?>
            <div align="center">
                <table cellspacing="0" cellpadding="3" rules="all" id="ContentPlaceHolder1_drpgridview" style="background-color:White;border-color:#CCCCCC;border-width:1px;border-style:None;border-collapse:collapse;">
		<tr style="color:White;background-color:#0059B2;font-weight:bold;">
			<td>Attempted Questions</td><td>Balance Questions</td><td>Total Score</td><td>Today's Score</td>
		</tr><tr align="center" valign="middle" style="color:#000066;">
			<td><?php echo $answeredquestion;?></td><td><?php echo $question-$answeredquestion; ?></td><td><?php echo $rightansweredquestion?></td><td><?php echo $todayrightansweredquestion?></td>
		</tr>
	</table>
            </div>
            
            
            <div class="txtBold" id="queOne">
                <table class="queBox">
                    <tr>
                        
                        <td class="queText">
                            <?php echo $questiontext[0];?> </td>
                    </tr>
                </table>
				<?php 
				
				?>
                <a id="ContentPlaceHolder1_btn1" class="ansButton One" <?php if($disable==0){?>href="javascript:__doPostBack(<?php echo $answerid[0];?>,<?php echo $istrue[0];?>  )" <?php }?>style="background-color:<?php if($disable==1){if($istrue[0]==1 ){echo "GREEN;";}else{echo "RED;";}}else{echo "GRAY;";}?>" ><?php echo $answertext[0]?></a>
              
			  <a id="ContentPlaceHolder1_btn2" class="ansButton One" <?php if($disable==0){?>href="javascript:__doPostBack(<?php echo $answerid[1];?>,<?php echo $istrue[1];?>  )"<?php }?>  style="background-color:<?php if($disable==1){if($istrue[1]==1){echo "GREEN;";}else{echo "RED;";}}else{echo "GRAY;";}?>" ><?php echo $answertext[1]?></a>
                
                <br />
                <br />
				
				<?php if($disable==1){
				?>	
					 <a id="ContentPlaceHolder1_btnshownext" class="ansButton One shownext" href="thanks1.php?clickid=<?php echo $clickid;?>" style="display:inline-block;width:50%;">Next Question</a>
					
					
				<?php
                }?>
            </div>
            </div>
        
</div>
    <script type="text/javascript">
           
    </script>

            </div>
        </div>
         <?php include 'footer.php';?>
        <div class="copyright">&copy 2020 Play & Win</div>
    

<script type="text/javascript">
//<![CDATA[

//]]>
</script>
</form>
</body>
</html>



<?php


	
