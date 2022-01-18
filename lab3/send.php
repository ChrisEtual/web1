<?php
$servername = "localhost";
$username = "id18191549_labsuser";
//$password = "f()^\]F00w5hulpC";
$password = "dummy";
$database = "id18191549_labsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
include "colors.php";
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
  background: #B0C4DE;
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
  background: #FFFFFF;
  }
#mainNav {
  grid-area: nav;
  background: #FFC0CB;
  }
#siteAds {
  grid-area: ads;
  background: #FFC0CB;
  }
#coloumnA {
  grid-area: colA;
  background: #ADD8E6;
  }
#coloumnB {
  grid-area: colB;
  background: #ADD8E6;
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
  background-color: none;
  font-family:'SF UI Display Medium';
}
.texts {
margin: 5%;
}
.usualtext {
font-family: Comic Sans MS;
margin: 5%;
}
</style>
<body>
  <header id="pageHeader">
<div id="x"> <h1 class="texts"> З'їв лапшу </h1> </div>
<div id="header1"> <p class="usualtext"> Замітки з лаби 1</p> </div>
</header>
  <article id="mainArticle">

<form action="#" method="post">
<div>
<label for="chooseelement">Оберіть елемент сторінки:</label>
        <select name="chooseelement" id="chooseelement">
          <option value="notification">0 (notification)</option>
          <option value="header1">1 (header1)</option>
          <option value="mainNav">2 (mainNav)</option>
          <option value="coloumnA">3 (coloumnA)</option>
          <option value="siteAds">4 (siteAds)</option>
          <option value="mainArticle">5 (mainArticle)</option>
          <option value="coloumnB">6 (coloumnB)</option>
          <option value="footer1">7 (footer1)</option>
        </select>
</div>
<div>
    <label for="bgcolorselect">Оберіть колір заднього фону:</label>
    <select name="bgcolorselect" id="bgcolorselect">
        <?php echo $colorlist; ?>
    </select> 
</div>
<div>
    <label for="fgcolorselect">Оберіть колір шрифту:</label>
    <select name="fgcolorselect" id="fgcolorselect">
        <?php echo $colorlist; ?>
    </select> 
</div>
<div>
    <label for="textinput">Введіть текст елементу:</label>
    <input type="text" id="textinput" name="textinput">
</div>
<input type="submit" value="Надіслати на сервер" />
</form>

  </article>
  <div id="coloumnA"><h2>Адмінка</h2><h3>Для тих, хто дуже любить керувати.</h3></div>
  <nav id="mainNav"><h2>Лабораторна робота №3</h2></nav>
  <div id="siteAds"><h2>Дар'я Ропаєва</h2></div>
  <div id="coloumnB">ColoumnB</div>
  <footer id="pageFooter">
<div id="y"> <h2 class="texts"> Борись ушу </h2> </div>
<div id="footer1"> <p class="usualtext"> footer </p> </div>
</footer>
</body>

<?php 
    // SQL queries for updating 
    $upload = mysqli_prepare($conn, "UPDATE labs3db SET bgcolor = ?, fontcolor = ?, text = ? WHERE field = ?");
    $upload->bind_param("ssss", $_POST['bgcolorselect'], $_POST['fgcolorselect'], $_POST['textinput'], $_POST['chooseelement']);
    $upload->execute();
    $upload->close();
?>

<?php mysqli_close($conn); ?>