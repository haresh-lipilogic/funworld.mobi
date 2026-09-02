 <!-- FOOTER -->
 <?php
 
session_start();
$msisdn=$_SESSION["msisdn"];
$clickid=$_SESSION["clickid"]; 
 
 
 ?>
 
 
    <footer>
        <div class="container">
            <!--<p class="text-center">&copy; 2022 Gamebar &middot; <a href="privacy.html">Privacy</a> &middot; <a
                    href="terms.html">Terms &
                    Conditions</a></p>
			-->
			<p class="text-center"><a href="../unsub.php?&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>" style="text-decoration: none;font-size: 20px;font-weight: bold;"><?php echo $unsub; ?></a></p>
			
        </div>
    </footer>

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