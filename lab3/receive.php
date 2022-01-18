<?php
$servername = "localhost";
$username = "id18191549_labsuser";
$password = "f()^\]F00w5hulpC";
$database = "id18191549_labsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
include "retrieve.php";
?> 

<!doctype html>
<title>Example</title>
<style>
body {
  display: grid;
  grid-template-areas:
    "header header header"
    "nav colA ads"
    "nav article ads"
    "nav article colB"
    "footer footer footer";
  grid-template-rows: 3fr 1fr 4fr 1fr 3fr;
  grid-template-columns: 1fr 2fr 1fr;
  grid-gap: 0px;
  height: 100vh;
  margin: 0;
  }
header, footer, article, nav, colA, colB {
  padding: 0px;
  background: white;
}
#pageHeader {
  grid-area: header;
  background: <?php echo $header1_bgcolor; ?>;
  color: <?php echo $header1_fgcolor; ?>;
  display: grid;
  grid-template-areas:
  ". . . . ."
  ". x1 . headertext ."
  ". . . . .";
  grid-template-rows: 1fr 1fr 1fr;
  grid-template-columns: 1fr 6fr 8fr 6fr 1fr;
  height: 25vh;
}
#pageFooter {
  grid-area: footer;
  background: #B0C4DE;
  background: #B0C4DE;
  display: grid;
  grid-template-areas:
  ". . . . ."
  ". footertext . y1 ."
  ". . . . .";
  grid-template-rows: 1fr 1fr 1fr;
  grid-template-columns: 1fr 6fr 8fr 6fr 1fr;
  height: 25vh;
}
#mainArticle {
  grid-area: article;
  background: <?php echo $mainArticle_bgcolor; ?>;
  color: <?php echo $mainArticle_fgcolor; ?>;
  }
#mainNav {
  grid-area: nav;
  background: <?php echo $mainNav_bgcolor; ?>;
  color: <?php echo $mainNav_fgcolor; ?>;
  }
#siteAds {
  grid-area: ads;
  background: <?php echo $siteAds_bgcolor; ?>;
  color: <?php echo $siteAds_fgcolor; ?>;
  }
#coloumnA {
  grid-area: colA;
  background: <?php echo $coloumnA_bgcolor; ?>;
  color: <?php echo $coloumnA_fgcolor; ?>;
  }
#coloumnB {
  grid-area: colB;
  background: <?php echo $coloumnB_bgcolor; ?>;
  color: <?php echo $coloumnB_fgcolor; ?>;
}
#x {
  grid-area: x1;
  background: #FFFFFF;
  text-align: left;
  }
#y {
  grid-area: y1;
  background: #FFFFFF;
  text-align: center;
}
#header1 {
  grid-area: headertext;
  text-align: right;
  background-color: none;
  font-family:'SF UI Display Medium';
}

#footer1{
  grid-area: footertext;
  text-align: left;
  background-color: <?php echo $footer1_bgcolor; ?>;
  color: <?php echo $footer1_fgcolor; ?>;
  font-family:'SF UI Display Medium';
}
#notification{
  display: grid;
  grid-template-areas: "nothing notif_text notif_close";
  grid-template-columns: 3fr 14fr 3fr;
  position: absolute;
  width: 100%;
  height: 50px;
  line-height: 50px;
  background-color: <?php echo $notification_bgcolor; ?>;
  border-color: black;
  font-weight: bold;
  color: <?php echo $notification_fgcolor; ?>;
}
#nothing{
  grid-area: nothing;
}
#notif_text{
  grid-area: notif_text;
  text-align: center;
}
#notif_close{
  grid-area: notif_close;
  text-align: center;
  vertical-align: middle;
}
#notif_close:hover{
  background-color: <?php echo $notification_fgcolor; ?>;
  color: <?php echo $notification_bgcolor; ?>;
}
.closing{
  -webkit-transition: 2s;
  -moz-transition: 2s;
  -ms-transition: 2s;
  -o-transition: 2s;
  transition: 2s ease;
  line-height: 0px !important;
  height: 0px !important;
  opacity: 0;
}
.texts {
margin: 5%;
}
.usualtext {
font-family: "Comic Sans MS" !important;
margin: 5%;
}
</style>
<body>
  <script>
    function closenotif() {
      document.getElementById("notification").classList.add("closing");
    }
  </script>
  <div id="notification">
    <div id="nothing"></div>
    <div id="notif_text"><?php echo $notification_text; ?></div>
    <div id="notif_close" onclick="closenotif()">OK</div>
  </div>
  <header id="pageHeader">
    <div id="x"> <h1 class="texts"> З'їв лапшу </h1> </div>
    <div id="header1" class="usualtext"> <?php echo $header1_text; ?> </div>
  </header>
  <article id="mainArticle"><?php echo $mainArticle_text; ?></article>
  <div id="coloumnA"><?php echo $coloumnA_text; ?></div>
  <nav id="mainNav"><?php echo $mainNav_text; ?></nav>
  <div id="siteAds"><?php echo $siteAds_text; ?></div>
  <div id="coloumnB"><?php echo $coloumnB_text; ?></div>
  <footer id="pageFooter">
<div id="y"> <h2 class="texts"> Борись ушу </h2> </div>
<div id="footer1" class="usualtext"><?php echo $footer1_text; ?></div>
</footer>
</body>

<?php mysqli_close($conn); ?>