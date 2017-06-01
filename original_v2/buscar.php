<?php
mysql_connect("server", "username", "password") or die(mysql_error());
mysql_select_db("metadata") or die(mysql_error());
if(isset($_POST['submit']))
{
$query = $_POST['query'];
?>
<html>
<head>
<title><?php echo $query;?></title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script>
$('a').click(function(){
  $.post("metadata.php", { id: "$(this).attr('id')"},
     function(data){
       dosomethingwithdata(data);
  });
 //
 return false;
});
</script>
</head>
<body>
<?php
$min_length = 1;
if(strlen($query) >= $min_length)
{
$query = htmlspecialchars($query);
$query = mysql_real_escape_string($query);
echo "<div class='estilotabla' ><table>";
echo "<tr align='center'>
<td height='35px' width='150px'>Title</td> <td>Responsible Organization</td> <td>Metadata Update Date</td>

</tr>";
$raw_results =

mysql_query("SELECT * FROM search_keywords WHERE `keyword` = '$query'");
if(mysql_num_rows($raw_results) > 0)
{
while($results = mysql_fetch_array($raw_results))
{
echo "<tr align='center' bgcolor='#fff'>

<td height='25px'><a href='metadata.php?id=".$results['title']."' id='".$results['title']."'>".$results['title']."</a></td> <td>".$results['responsibleOrganisationName']."</td> <td>".$results['metadataDate']."</td>

</tr>" ;
}

}
else{
echo "<a href='index.html' class='boton1'>Search again</a>";
//echo "</table></div>";
}
}
else{
echo "Minimum length is ".$min_length;
echo "<p><a href='index.html' class='boton1'>Search again</a></p>";

}}

?>
</body>
</html> 