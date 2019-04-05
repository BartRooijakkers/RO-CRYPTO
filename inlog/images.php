<!DOCTYPE HTML>
<html>
	<head>
		<title> Foto's </title>

</head>

<body>

<?php
mysql_connect("localhost", "root", "");
mysql_select_db("producten");
$res=mysql_query("SELECT foto FROM producten");
echo "<table>";

while($row=mysql_fetch_array($res))
{
echo "<tr>"
echo "<td>";?> <img src="<?php echo $row["foto"];?>" height="100" width="100"> <?php echo "</td>";

echo "</tr>";


}

echo "</table>";
?>
</body>
</html>
