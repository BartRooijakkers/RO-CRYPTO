<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["stuks"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM producten WHERE coins='" . $_GET["coins"] . "'");
			$itemArray = array($productByCode[0]["coins"]=>array('name'=>$productByCode[0]["name"], 'coins'=>$productByCode[0]["coins"], 'stuks'=>$_POST["stuks"], 'prijs'=>$productByCode[0]["prijs"], 'image'=>$productByCode[0]["image"]));

			if(!empty($_SESSION["artikel"])) {
				if(in_array($productByCode[0]["coins"],array_keys($_SESSION["artikel"]))) {
					foreach($_SESSION["artikel"] as $k => $v) {
							if($productByCode[0]["coins"] == $k) {
								if(empty($_SESSION["artikel"][$k]["stuks"])) {
									$_SESSION["artikel"][$k]["stuks"] = 0;
								}
								$_SESSION["artikel"][$k]["stuks"] += $_POST["stuks"];
							}
					}
				} else {
					$_SESSION["artikel"] = array_merge($_SESSION["artikel"],$itemArray);
				}
			} else {
				$_SESSION["artikel"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["artikel"])) {
			foreach($_SESSION["artikel"] as $k => $v) {
					if($_GET["coins"] == $k)
						unset($_SESSION["artikel"][$k]);
					if(empty($_SESSION["artikel"]))
						unset($_SESSION["artikel"]);
			}
		}
	break;
	case "leeg":
		unset($_SESSION["artikel"]);
	break;
}
}
?>
	<html>
			<head>
					<!--Meta informatie-->
					<meta charset="UTF-8">
					<html lang="nl-en"></html>
					<title>Coins - ROCrypto</title>
					<meta name="description" content="HTML,CSS,XML,Cryptocoin, ROC, ROCrypto, Cryptocurrencies, Kop Van Noord-Holland">
					<meta name="author" content="Bart rooyakkers, Wesley van der Slikke, Dane Schuijt">
					<meta name="viewport" content="widht=device-width, initial-scale=1">
					<link rel="stylesheet" href="stylesheet.css">
			</head>
	<body>
		<a href="home.html">
			<img src="Images/Logo.svg" class="logo1">
		</a>

		<div class="navigation">
			<ul>
				<li><a href="Home.html">Home</a></li>
				<li><a class="active" href="coins.php">Coins</a></li>
				<li><a href="Info.html">Info</a></li>
				<li><a href="index.php">Login</a></li>
			</ul>
		</div>
		<div class="bar">
		<script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
		<coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="eur" background-color="#00958E" locale="en"></coingecko-coin-price-marquee-widget>
		</div>

		<div class="box">

			<div class="cryptocoin">

<div id="winkel-mand">
<div class="txt-heading">Winkelmand</div>

<a id="btnleeg" href="coins.php?action=leeg">Leeg Winkelmand</a>
<?php
if(isset($_SESSION["artikel"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<div class="winkelmand">
<table class="tbl-mand">
<tbody>
<tr>
<th class="naam">Naam</th>
<th class="naam">Coins</th>
<th class="hoeveelheid">Hoeveelheid</th>
<th class="hoeveelheid">Bulk</th>
<th class="hoeveelheid">Prijs</th>
<th class="verwijder">Verwijder</th>
</tr>
<?php
    foreach ($_SESSION["artikel"] as $item){
        $item_price = $item["stuks"]*$item["prijs"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="mand-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["coins"]; ?></td>
				<td style="text-align:right;"><?php echo $item["stuks"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["prijs"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="coins.php?action=remove&coins=<?php echo $item["coins"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["stuks"];
				$total_price += ($item["prijs"]*$item["stuks"]);
		}
		?>

<tr>
<td class="prijs" colspan="2" align="right">Totaal Prijs:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><?php echo "$ ".number_format($total_price, 2); ?></td>
<td></td>
</tr>
</tbody>
</table>
</div>
  <?php
} else {
?>
<div class="no-records">Uw Winkelmand is leeg</div>
<?php
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Producten</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM producten ORDER BY id ASC");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="coins.php?action=add&coins=<?php echo $product_array[$key]["coins"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["prijs"]; ?></div>
			<div class="mand-action"><input type="text" class="product-stuks" name="stuks" value="1" size="2" /><input type="submit" value="Toevoegen" class="btnToevoegen" /></div>
			</div>
			</form>
		</div>
	</div>
	<?php
		}
	}
	?>
</div>
</div>
</body>
</html>
