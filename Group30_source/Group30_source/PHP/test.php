<?php 
require 'validateLogin.php';
            session_start();
            $gameName = "Rainbow Six Siege";
            $pubYear = "2015";
            $ESRb = 'M';
            $developer = 'Ubisoft Montreal';
            $price = "39.99";
            $publisher = "Ubisoft";
            $imageLocation = "R6Siege.jpeg";
            require 'writeReview.php';
            $_SESSION['gameName'] = $gameName;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">   
<title>GameHub Games</title>
    <link rel="stylesheet" href="../CSS/headerStyle.css">
    <style>
        
        .wrapper {
            display: grid;
            grid-template-columns: 3fr 2fr;
            grid-gap: 1em;
            grid-auto-rows: minmax(450px, auto);
            padding: 1em;
            padding-top: 0em;
        }
        
        h1 {
            text-align: center;
            padding: 1em;
        }
        
        }
        
        .platformRatings {
            display: grid;
            grid-template-rows:repeat(3, 1fr);
            grid-gap: 1em;
            
        }
        .platformRatings > div {
            text-align: center;
        }
        
        .platformRatings > div > div{
            font-size: 25px;
            margin-top: auto;
            margin-bottom: auto;
        }
        
        .reviewWrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 1em;
            border: border: #333 1px solid;
        }
        
        .wrapper2 {
            padding: 1em;
        }
        
        .review {
            grid-template-rows: repeat(3, 1fr 1fr 3fr);
            border: #333 1px solid;
            padding: 1em;
            background: #eee;
        }
        
        .review > div {
            padding: 5px;
        }
        
        .review > div:nth-child(odd){
            background:#ddd;
        }
        
        .platformRatings > div {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
        
        .wrapper > div{
            background:#eee;
            padding: 1em;
        }
        
        .wrapper > div:nth-child(odd){
            background:#ddd;
        }
        
        .platformRatings > div {
            border: #333 1px solid;
            padding: 1em;
        }
        
        .platformRatings > div > div {
            border: #333 1px solid;
            text-align: center;
        }
        
        .platformLogo {
            max-height: 90%;
            width: auto;
            margin-left: auto;
    margin-right: auto;
        }
        
        .coverArt {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: auto;
        }
        
        .productShelf{
            display: grid;
            grid-template-columns: 3fr 1fr;
        }
        
        .productPriceESRB {
            display: grid;
            grid-template-rows:repeat(2, 1fr);
            grid-gap: 1em;
        }
        
        .footer {
    text-align: center;
    font-size: 10px;
    font-family: inherit;
}
        
    </style>
    <script>
    
        function search(gameName){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("gameTitle").innerHTML=this.responseText;
                }
            };
            xmlhttp.open("GET", "loadGamePageInfo.php?hashString="+gameName,true);
            xmlhttp.send();
        }
        var cart=0;
        
        function addToCart(product){
                    cart += 39.99; document.getElementById("cart").innerHTML="$"+cart.toFixed(2);
        }
        
    </script>
    </head>
    <body>
        <?php 
        session_start();
        require 'header.php'; 
        $_SESSION['gameName'] = $gameName;?>
        <br><br><br>
        <div id="cartContainer">
            <img src="../Images/carticon.png" alt="Cart">
            <div id="cart">$0.00</div>
<!--            <button id="checkout" onclick="openModal(cart)">Checkout</button>-->
        </div>
        <h1 id="gameTitle"><?PHP echo $gameName; ?></h1>
        <div class="wrapper">
            <div class="productShelf">
                <div>
                    <img src="../Images/<?php echo $imageLocation ?>" alt="Game Cover" class= "coverArt">
                </div>
                <div class="productPriceESRB">
                    <div>
                        <p class="productInfo"><?PHP echo $gameName; ?><div>$<?PHP echo $price; ?></div></p><p>Digital Copy</p><button value="<?php echo $price;?>" onclick="addToCart(this.value)">Add To Cart</button><p>Physical Copy</p>
                        <button value="<?php echo $price;?>" onclick="addToCart(this.value)">Add To Cart</button>
                    </div>
                    <div><?PHP echo $pubYear; ?><br>Developer: <?PHP echo $developer; ?><br>Publisher: <?PHP echo $publisher; ?><br>Rated <?PHP echo $ESRb; ?></div>
                </div>
            </div>
            <?php require 'generateGameRating.php'; ?>
        </div>

        <div class="wrapper2">
        <h2>Write a Game Review</h2>
        <form method="POST">
            <input type="hidden" name='gameName' value='<?PHP echo $gameName; ?>'>
            <input type="hidden" name='pubYear' value='<?PHP echo $pubYear; ?>'>
            <input type="hidden" name='ESRb' value='<?PHP echo $ESRb; ?>'>
            <input type="hidden" name='developer' value='<?PHP echo $developer; ?>'>
            <input type="hidden" name='price' value='<?PHP echo $price; ?>'>
            <input type="hidden" name='publisher' value='<?PHP echo $publisher; ?>'>
            <input type="hidden" name='imageLocation' value='<?PHP echo $imageLocation; ?>'>
            <p>Platform: 
                <select name="platform">
                    <option value="PC">PC</option>
                    <option value="Xbox">Xbox</option>
                    <option value="Playstation">Playstation</option>
                </select>
            </p>
            
            <input type="radio" name="gameRating" value="1"> 1
            <input type="radio" name="gameRating" value="2"> 2
            <input type="radio" name="gameRating" value="3" checked="checked"> 3
            <input type="radio" name="gameRating" value="4"> 4
            <input type="radio" name="gameRating" value="5"> 5
            <br><br>
            <textarea name="ratingDesc" rows="5" cols="100" maxlength="280" placeholder="280 character limit..."></textarea>
            <input type="SUBMIT" name="writeReview" value="Submit">
        </form>
        <h2>Reviews</h2>
        <div class="reviewWrapper">
          <?php require 'generateReviews.php'; ?>
                
        </div>
        </div>
    </body>
        <?php require 'footer.php'; ?>
</html>