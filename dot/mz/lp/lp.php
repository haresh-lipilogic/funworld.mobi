<?php
include("includes/connection.php");

error_reporting(0);



?>

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
	


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <script src="js/jquery-1.10.2.min.js"></script>

    <script src="js/jquery.validate.min.js"></script>
    <script src="js/new.js"></script>

        

    <!-- jQuery Form Validation code -->

    

    

<style type="text/css">

	

/* background  e colore testo */

html,
body					{background-color: #FFFFFF; color: #000000; font-family:SuisseIntl-Light; }
/* CAMBIO COLORE LINK */
a  						{ color: #0044FF; }

#disclaimer_0			{ text-align:center; font-size: 15px; color: #000; font-weight:bold }
#disclaimer				{ text-align:center; font-size: 14px; color: #000;  }
#disclaimer1			{ text-align:center; font-size: 12px; color: #000;  }
#header 				{ font-size: 10px; color: #000000; padding: 0; background-color:#FFF; padding: 2px 2px; text-align: center justify }

#footer a				{ color: #000000; text-decoration: underline; }
#footer a:hover         { text-decoration: none;  }
#price					{ font-size:25px ; font-weight:bold  }
#header					{ font-size:20px; padding:0px; text-align:center }
#header p				{ margin: 0; font-size: 16px;  font-weight: bold; }
#button					{margin:10px}
@media (max-width: 480px) {
  div#wrapper {
   width: 400px;
  }
 
  #banner{ text-align:center; }



</style>


</head>
<body>
<div id="banner" align="center" style="background:#7fefef;">
	<span id="english" style="font-size:25px;" >English</span> | <span id="arabic"  style="font-size:25px;">عربى</span>
	
	
	<!--English & Arabic Free trial message on top
	
	<div id="disclaimer" class="eng" >
		<h4>FREE TRIAL for 1 day then AED 11 / Week (VAT inclusive) </h4>
	</div>
	<div id="disclaimer" class="arb" style="display:none">
		<h4>تجربة مجانية لمدة يوم واحد ثم 11 درهمًا إماراتيًا / الأسبوع (شاملة ضريبة القيمة المضافة)</h4>
	</div> -->
	

 <div id="disclaimer">
		<h3><img  src="images/logo.png"  style = "height:250px;width:250px;" /></h3>
	</div>
</div>
	
	
	
<?php
if($status == '1')
{
?>

<form method="post">
<div align="center">


</div>
</form>
<?php
}
else{
?>
<form method="post">
<div align="center" >

	
	<input type = "hidden" name="clickid" value="<?php echo $clickid; ?>" >
 <input type = "hidden" name="advertclickid" value="<?php echo $advertclickid; ?>" >
 <input type = "hidden" name="msisdn" value="<?php echo $msisdn; ?>" >
 <input type = "hidden" name="advid" value="<?php echo $advertiserid; ?>" >
 <input type = "hidden" name="pubid" value="<?php echo $pubid; ?>" >


	<div class="eng">Enter Mobile Number</div>
	<div class="arb"  style="display:none">أدخل رقم الهاتف المتحرك</div>
	
	 <br>
	 +974 <input type = "tel"   name="msisdn" placeholder="**********" required autocomplete="off"  style="width: 100%;
		margin: 8px 0;
		display: inline-block;
		width:275px;
		border: 1px solid #ccc;
		box-shadow: inset 0 1px 3px #ddd;
		border-radius: 4px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 12px;
		padding-bottom: 12px;" >
		
		</br>
	
	
 
	<div class="eng" >	
	
		<input type="submit" name="submit1" value= "CONTINUE" style="background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 13px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;"> 
			</br></br>

	
		
	</div>
	
	<div class="arb" style="display:none">
		<input type="submit" name="submit2" value= "استمر" style="background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 13px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;"> 
	</div>
	
<div class="eng" >	1 day FREE trial then 1QAR/Daily for OOREDOO (Auto Renewal) </div>
<div class="arb" style="display:none">	يوم تجريبي مجاني ثم 1 ريال قطري / يوميًا لـ Ooredoo (تجديد تلقائي) </div>
	
	<!-- English & Arabic message below the button
	<div id="disclaimer" class="eng" >
		<h4>FREE TRIAL for 1 day then AED 11 / Week (VAT inclusive) </h4>
	</div>
	<div id="disclaimer" class="arb" style="display:none">
		<h4>تجربة مجانية لمدة يوم واحد ثم 11 درهمًا إماراتيًا / الأسبوع (شاملة ضريبة القيمة المضافة)</h4>
	</div> -->
	
</div>
</form>

<?php
}
?>


<div class="eng"   style="padding:20px;" >
 
 <p style="font-size:12px; line-height:22px;text-align:center;">
 

		<strong>3 QAR per day for Vodafone</strong> </br>
		<strong>1 QAR per day for Ooredoo </strong></br>
	
 
Buzz allows subscribers to enjoy the finest videos and photos of cars. This service offers the strangest and most powerful scenes from accidents and everything related to speed drivers

</br></br>

By clicking on the above subscribe button, you will agree on the below terms and conditions. By subscribing to Buzz Ooredoo users will be charged 1 QAR per day and Vodafone users will be charged 3 QAR per day. Your subscription will be automatically renewed until you cancel or unsubscribe. You can unsubscribe through SMS, Vodafone users can unsubscribe from the service anytime by sending UNSUB AIRG to 97814 and Ooredoo users can unsubscribe from the service anytime by sending UNSUB AirG to 92391. You must be more than 18 years old to use this service. If you are less than 18 years old, you MUST receive permission from the authorized person who pays your bill. Standard data browsing costs will be applied. For support, please contact us at supportme@airg.com

</br></br>
<a href="t&c.html" target="_blank">Terms & Conditions </a> | <a href="privacy.html"  target="_blank">Privacy Policy </a>
 
</p>

 <p style="font-size:10px; line-height:22px;text-align:center;">
 </br>
 </br>
 </br>
&#169; POWERED BY SVI 2022
</p>



</div>

<div class="arb" style="display:none;padding:20px;">
 
		
 <p style="font-size:12px; line-height:22px;text-align:right">
  <strong>٣ ريال قطري يومياً لVodafone</strong> </br>
		<strong>1  ريال قطري يومياً لOoredoo </strong></br>
		</br>


ولع السيارات خدمة تتيح للمشتركين التمتع بأروع فيديوهات وصور السيارات. هذه الخدمة تعرض أغرب وأقوى المشاهد من حوادث وكل ما يتعلق بسائقي السرعة
</br>
</br>


بالضغط على الاشتراك أعلاه ، فإنك توافق على الشروط والأحكام أدناه. هذه خدمة إشتراك جاري حتى إلغاء إشتراكك بنفسك. بالضغط هنا سوف يبدأ اشتراك مستخدمي اريدو في خدمة ولع السيارات بقيمة ١ ريال قطري في اليوم. ومستخدمي فودافون بقيمة ٣ ريال قطري في اليوم. يمكن لمستخدمي فودافون إلغاء الاشتراك من الخدمة في أي وقت عن طريق إرسال UNSUB AIRG إلى ٩٧٨١٤، ويمكن لمستخدمي اريدو إلغاء الاشتراك من الخدمة في أي وقت عن طريق إرسال UNSUB AIRG إلى ٩٢٣٩١. يتم احتساب رسوم البيانات بشكل منفصل بواسطة مشغل الهاتف المحمول. للإستفادة من هذه الخدمة يجب أن يكون عمرك اكثر من ١٨ عاماً أو قد حصلت على إذن من والديك أو الشخص المسؤول بدفع فاتورتك.يتم احتساب رسوم البيانات بشكل منفصل بواسطة مشغل الهاتف المحمول. للإستفسار، يمكنك التواصل معنا عبر البريد الإلكتروني: supportme@airg.com

</br></br>

 

</p>
 <p style="font-size:12px; line-height:22px;text-align:center">
<a href="t&c.html" target="_blank">الأحكام والشروط</a> | <a href="privacy.html"  target="_blank">سياسة الخصوصية </a>
</p>
</div>




</body>

</html>

<script src="js/new.js"></script>
<script>
$(document).ready(function(){
  $("#english").click(function(){
	   
	$(".eng").show();
	$(".arb").hide();
;
  });
  $("#arabic").click(function(){
	  
     $(".arb").show();
	$(".eng").hide();
	
  });
});
</script>