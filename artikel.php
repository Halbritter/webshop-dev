<?php
include_once "header.php";
include_once "databases.php";

if (isset($_POST["nummer"])) {
addArticleToChart($_POST["nummer"]);
echo "<div class=\"confirmation\">";
echo "	<h4>Artikel wurde in den Warenkorb gelegt.</h4>";
echo "</div>";
}

echo "<div class=\"container\">";
$i = 0;
$articleList = getArticle(0, 99);
while ($article = mysqli_fetch_assoc($articleList)) {
    if ($article["img"] == "") {
        $article["img"] = "noimage.png";
    }
    if ($i == 0) {
        $i = 3;
        echo "</div>";
        echo "<div class=\"row center-block\"'>";
    }
    echo "<div class=\"col-sm-3 col-centered artikel\">\n";
    echo "<div>" . $article["name"] . "</div>";
    echo "<div class=\"articel-image-large\">\n";
    echo "<img src=\"" . $article["img"] . "\"/>";
    echo "<div>" . $article["price"] . "€</div>";
    echo "<div>";
    echo "<form action=\"artikel.php\" method=\"POST\">";
    echo "<input hidden value=\"" . $article["id"] . "\" name=\"nummer\"/>";
    echo "<input type=\"submit\" value=\"In den Warenkorb\"/>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


    $i--;


}
if ($i < 3) {
    echo "</div>";
}



include "footer.php";
?>
<!--
<div class="container">
	<div class="row artikel">
		<div class="col-md">
			<div style="">Artikelname</div>
			<div>
				<img src="logo.png"/>
				<div>Preis€</div>
				<div>
					<form action="artikel.php" method="get">
						<input hidden value="nummer1" name="nummer"/>
						<input type="submit" value="In den Warenkorb"/>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md">
			<div style="">Artikelname</div>
			<div>
				<img src="logo.png"/>
				<div>Preis€</div>
				<div>
					<form action="artikel.php" method="get">
						<input hidden value="nummer2" name="nummer"/>
						<input type="submit" value="In den Warenkorb"/>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md">
			<div style="">Artikelname</div>
			<div>
				<img src="logo.png"/>
				<div>Preis€</div>
				<div>
					<form action="artikel.php" method="get">
						<input hidden value="nummer3" name="nummer"/>
						<input type="submit" value="In den Warenkorb"/>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>
!-->
