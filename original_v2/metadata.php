<?php
mysql_connect("server", "username", "password") or die(mysql_error());
mysql_select_db("metadata") or die(mysql_error());
if(isset($_GET['id']))
{
$query = $_GET['id'];
?>
<html>
<head>
<title><?php echo $query;?></title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#fixedbutton {
    position: fixed;
    bottom: 0px;
    right: 0px; 
}
.btn {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0px;
  font-family: Arial;
  color: #ffffff;
  font-size: 12px;
  background: #3498db;
  padding: 7px 10px 7px 10px;
  text-decoration: none;
}

</style>
<script>
$('a').click(function(){
  $.post("metadata.php", { id: "$(this).attr('id')"},
     function(data){
       dosomethingwithdata(data);
  });

 return false;
});
</script>
</head>
<body>
<a href='index.html' id='fixedbutton' class='btn'>Search again</a>

<?php
$min_length = 1;
if(strlen($query) >= $min_length)
{
$query = htmlspecialchars($query);
$query = mysql_real_escape_string($query);
echo "<div class='estilotabla' ><table>";

$raw_results =

mysql_query("SELECT * FROM search_keywords WHERE (`title` LIKE '%".$query."%')");
if(mysql_num_rows($raw_results) > 0)
{
while($results = mysql_fetch_array($raw_results))
{
echo "

<tr>
	<td colspan='2'><strong>Title: </strong>".$results['title']."</td>
</tr>
<tr>
	<td><strong>Location</strong></td>
	<td><img width='500px' height='200px' src='https://maps.googleapis.com/maps/api/staticmap?center=".$results['Y_location'].",".$results['X_location']."&zoom=5&size=500x200&maptype=roadmap&markers=color:green%7Clabel:Location%7C".$results['Y_location'].",".$results['X_location']."'></td>
</tr>
<tr>
	<td><strong>Region: </strong></td>
	<td>".$results['region']."</td>
</tr>
<tr>
	<td><strong>Organisation: </strong></td>
	<td>".$results['organisation']."</td>
</tr>
<tr>
	<td><strong>Text ID: </strong></td>
	<td>".$results['id_text']."</td>
</tr>
<tr>
	<td><strong>Unique Resource Identifier: </strong></td>
	<td>".$results['uniqueResourceID']."</td>
</tr>
<!--        Title field         -->
<tr>
	<td><strong>Language: </strong></td>
	<td>".$results['language']."</td>
</tr>
<tr>
	<td><strong>Abstract: </strong></td>
	<td>".$results['abstract']."</td>
</tr>
<tr>
	<td><strong>Topic Category: </strong></td>
	<td>".$results['topicCategory']."</td>
</tr>
<tr>
	<td><strong>Keywords: </strong></td>
	<td>".$results['keywords']."</td>
</tr>
<tr>
	<td><strong>Temporal Extent: </strong></td>
	<td>".$results['temporalExtent']."</td>
</tr>
<tr>
	<td><strong>Metadata Reference Date: </strong></td>
	<td>".$results['datasetReferenceDate']."</td>
</tr>
<tr>
	<td><strong>Lineage: </strong></td>
	<td>".$results['lineage']."</td>
</tr>
<tr>
	<td><strong>Spatial reference system: </strong></td>
	<td>".$results['spatialReferenceSystem']."</td>
</tr>
<tr>
	<td><strong>Responsible Organization: </strong></td>
	<td>".$results['responsibleOrganisationName']."</td>
</tr>
<tr>
	<td><strong>Contact Mail Address: </strong></td>
	<td>".$results['contactMailAddress']."</td>
</tr>
<tr>
	<td><strong>Responsible Party Role: </strong></td>
	<td>".$results['responsiblePartyRole']."</td>
</tr>
<tr>
	<td><strong>Update Frequency: </strong></td>
	<td>".$results['frequencyUpdate']."</td>
</tr>
<tr>
	<td><strong>Access limitations: </strong></td>
	<td>".$results['limitationsAccess']."</td>
</tr>
<tr>
	<td><strong>Use Constraints: </strong></td>
	<td>".$results['useConstraints']."</td>
</tr>
<tr>
	<td><strong>Data format: </strong></td>
	<td>".$results['dataFormat']."</td>
</tr>
<tr>
	<td><strong>Accuracy: </strong></td>
	<td>".$results['accuracy']."</td>
</tr>
<tr>
	<td><strong>Metadata Date: </strong></td>
	<td>".$results['metadataDate']."</td>
</tr>
<tr>
	<td><strong>Metadata Point Contact: </strong></td>
	<td>".$results['metadataPointContact']."</td>
</tr>
<tr>
	<td><strong>Resource Type: </strong></td>
	<td>".$results['resourceType']."</td>
</tr>
<tr>
	<td><strong>Original title: </strong></td>
	<td>".$results['originalTitle']."</td>
</tr>

" ;
}

}
else{
echo "<tr align='center' bgcolor='#fff'>

<td colspan='2' height='25px'>No results found</td><tr>";
echo "</table></div>";
echo "<p><a href='index.html' class='boton1'>Search again</a></p>";
}
}
else{
echo "Minimum length is ".$min_length;
}}

?>
</body>
</html> 