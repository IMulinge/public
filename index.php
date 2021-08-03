<?php
require("header.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">






<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 45px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 0px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="1.3.jpg" style="width:100%">
  <div class="text">Yezzys availiable now </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="1.1.jpg" style="width:100%">
  <div class="text">Guess shirts availiable now</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="1.4.jpg" style="width:100%">
  <div class="text">Stone Island and Supreme clothes out</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 7000); // Change image every 2 seconds
}
</script>

		<main>

			<h1>Latest Listings / Hottest Products Out / New listing</h1>

		





<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
//search query that presents the latest items by listing them in decending order presenting the latest 10 items 
$messageQuery = $pdo->prepare('SELECT * from item  ORDER BY item_id DESC LIMIT 10');
$userQuery = $pdo->prepare('SELECT * FROM categories WHERE cat_id = :cat_id');
$messageQuery->execute();
foreach ($messageQuery as $message) {
 $values = [
 'cat_id' => $message['cats_id']
 ];
 $userQuery->execute($values);
 $user = $userQuery->fetch();
//if statement checks to make sure that the item has been approved first 
 if (isset($message['approved'])){

 echo '<ul class="productList">';
echo '<li>';
echo '<a href="itemlink.php?item_id=' . $message['item_id'] . '">';
echo '<img src="product.png" alt="product name">';
echo '<article>';
 echo '<h2>' . $message['item_name'] .'</h2>';
 echo '</a>';
 echo '<p>' . $message['item_desc'] .'</p>';
 echo '<p class="price">'.'£'. $message['item_price'] .'</p>';
/* echo '<li><a class="more"href="itemlink.php?item_id=' . $message['item_id'] . '">' .'More'. '&gt;&gt'  .'</a></li>'; */
 echo '</article>';
 echo '</li>';
 echo '</ul>';
}
else{
 echo'     ';
}

 
}


?> 





			<?php
              require("footer.php");
			?>
