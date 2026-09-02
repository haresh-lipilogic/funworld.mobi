 <!-- FOOTER -->
   <link rel="stylesheet" type="text/css" href="style2.css">
	
	
	
	
       <?php
$clickid=$_COOKIE["vodacom_gamebar_act"];
?>

	
<div class="footer">
  <div class="toplinks">
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
     <li><a href="/vd/cancel.php?serviceid=4&clickid=<?php echo $clickid; ?>">Unsubscribe </a></li>
      <li><a href="http://funworld.mobi/vd/tnc.html">terms and conditions</a></li>
    </ul>
  </div>
</div>
  

    <script type="text/javascript" src="dist/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="dist/js/jquery-ui.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(".show-more a").on("click", function () {
            var $this = $(this);
            var $content = $this.parent().prev("div.content");
            var linkText = $this.text().toUpperCase();

            if (linkText === "SHOW MORE") {
                linkText = "Show less";
                $content.switchClass("hideContent", "showContent", 400);
            } else {
                linkText = "Show more";
                $content.switchClass("showContent", "hideContent", 400);
            };

            $this.text(linkText);
        });
    </script>
</body>

</html>