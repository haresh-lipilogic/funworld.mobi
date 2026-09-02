	
<section class="faq" style="font-size:15px !important;font-family:Verdana, sans-serif !important ;font-weight:none !important">
  <nav>
    <a href="#" class="tab active"><b>PlayCool.Games – Enjoy Free Unlimited Online Games</b></a>
    <a href="#" class="tab" style="pointer-events: none;"></a>
    <a href="#" class="tab"  style="pointer-events: none;"></a>
  </nav>
  <section class="content">
   <div class="active1"> <p class="active1"><b>Play the Newest Games Instantly</b><br><br>
PlayCool features the latest and best free online games. You can enjoy playing fun games without interruptions from downloads, intrusive ads, or pop-ups. Just load up your favourite games instantly in your web browser and enjoy the experience.
</p><p class="active1">
You can play our games on Laptop’s, Desktop PCs, and Chromebooks, to the latest smartphones and tablets from Apple and Android.
</p>
    <p class="moretext">
     <b> Online Games at PlayCool</b><br><br>
There are plenty of Free Unlimited online games on PlayCool. You can find many of the best games titles on our gaming page.
    </p>
	
    <p class="moretext"> <b>Explore by Genre</b><br><br>
You can explore all games thru our various categories like action, adventure, sports, board, etc. but there’s also a range of subcategories that will help you find the perfect game. Popular tags include car games, Ludo, Snakes & Ladders, Rummy, Poker, Tetris, Penalty Kicks, Chess, Tic Tac Toe, Flappy Bird, Football & Cricket.
</p>
<p class="moretext"> <b>About PlayCool</b><br><br>
Playcool.games is the world’s most well-known gaming website for free content consumption on Desktops, Laptop's, mobile phones, ipads & other console devices. Our games have been helping gamers to go from completing games to conquering games since years. We deliver a full gamut of games from casual to hardcore, benefit from high-quality guides to enhance their gaming experience. We honor the multi-faceted interests of a diverse world of gamers.
</p>


	
	</div>
	 <a class="moreless-button" style="align:right ;color:#f82249" onclick="mm();">Read more</a>
  </section>
 
</section>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3430328079998834
     crossorigin="anonymous"></script>

<style>
body{
  // padding: 50px;
}
.faq{
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
  border-radius: 10px;
}

.faq nav{
  display: flex;
  justify-content: space-between;
}

.faq nav .tab{
  // width: 100%;
  padding: 20px;
  align-self: center;
 // text-align: center;
  color: currentColor;
  text-decoration: none;
  cursor: pointer;
}
.faq nav .tab:first-of-type{
  border-top-left-radius: 10px;
}
.faq nav .tab:last-of-type{
  border-top-right-radius: 10px;
}

.faq nav .tab.active{
  background: #131226 ; 
  color:white;
}

.faq .content{
  padding: 20px;
  background: #131226;
  color:white;
  border-radius: 0 0 10px 10px;
}
.faq .content  p{
  display: none;
}
.faq .content p.active1{
  display: block;
}
</style>
<script>
const faq = document.querySelector('.faq');
const tabs = [...faq.querySelectorAll('nav .tab')];
const content = [...faq.querySelectorAll('.content p')];

tabs.forEach(tab => tab.addEventListener('click', (e) => {
  for(p of content) p.classList.remove('active');
  for(tab of tabs) tab.classList.remove('active');
  const index = tabs.indexOf(e.target);
  if(index != -1) {
    e.target.classList.add('active');
    content[index].classList.add('active');
  }
}));
</script>

<script>
function mm(){
	//alert('hi');
	
  $('.moretext').slideToggle();
  if ($('.moreless-button').text() == "Read more") {
    $('.moreless-button').text("Read less")
  } else {
    $('.moreless-button').text("Read more")
  }
}
</script>
