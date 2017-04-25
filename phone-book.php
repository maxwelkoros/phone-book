<html>
<head>
<title>PhoneBook</title>
<link rel="stylesheet" href="main.css" type="text/css">   
</head>
<body>

<?php
$con = mysql_connect("localhost", "root", "");
if(!$con){  
	die("Dtabase connection problem");
}
mysql_select_db("phonebook", $con);

if(isset($_POST['update'])){
$ubutton = "UPDATE contacts SET Fname='$_POST[fname]',Phone='$_POST[phone]' WHERE id='$_POST[hidden]'";
mysql_query($ubutton, $con);
}




if(isset($_POST['delete'])){
$deletion = "DELETE FROM contacts WHERE id='$_POST[hidden]'";
mysql_query($deletion, $con);
}


if(isset($_POST['add'])){
$addinfo = "INSERT INTO contacts (id,Fname,Phone) VALUES ('$_POST[uid]','$_POST[ufname]','$_POST[ufon]')";
mysql_query($addinfo, $con);
}


$sql = "SELECT * FROM contacts ";

$result = mysql_query($sql,$con);
echo"<br/>";

echo "<div id=\"fom\">";

echo "<div id=\"hed\">";

echo "<p>"; 
echo "<h2 align=center > My PhoneBook </h2>";

echo "</p> ";

echo "</div>";

echo "<form method=post action=maxwel.php>";
echo "<input type=hidden name=submitted value=true/>";
echo "<label> SEARCH CRITERIA:
<select name=\"category\">
<option value=\"FName\"> NAME</option>
<option value=\"Phone\"> PHONE</option>

</select>
</label>";

echo "<label> INPUT DETAIL:<input type=text name=\"criteria\"/></label>";
echo "<input type=submit value=SEARCH>";

echo "</form>";


echo "<body bgcolor =skyblue>";
echo "<table border=1 >
<tr>

<th style=\"width:20%\">No</th>

<th style=\"width:40%\">Name</th>

<th style=\"width:40%\">Phone</th>

</tr>";


while($record = mysql_fetch_array($result)){
echo "<form action=maxwel.php method=post>";
echo "<tr>";

echo "<td>" ."<input type=text name=id value=".$record['id']." </td>";
echo "<td>" ."<input type=text name=fname value=".$record['Fname']." </td>";
echo "<td>" ."<input type=text name=phone value=".$record['Phone']." </td>";
echo "<td>" ."<input type=hidden name=hidden value=".$record['id']."< /td>";
echo "<td>" ."<input type=submit name=update value=update"." </td>";
echo "<td>" ."<input type=submit name=delete value=delete"." </td>";
echo"</tr>";
echo "</form>";

echo "</div>";
}

echo "<form action=maxwel.php method =post>";
echo "<tr>"; 

echo "<td><input type =text name=uid></td>";
echo "<td><input type =text name=ufname></td>";

echo "<td><input type =text name=ufon></td>";


echo "<td>" ."<input type=submit name=add value=add"." </td>";

echo"</form>";
echo "</table>";
mysql_close();


if(isset($_POST['submitted'])){

$con = mysqli_connect("localhost", "root", "");
if(!$con){  
	die("Dtabase connection problem");
}
mysqli_select_db($con, "phonebook");

//include('connect.php');

$category = $_POST['category'];
$criteria = $_POST['criteria'];

$query = "SELECT * FROM contacts WHERE $category LIKE '%".$criteria."%'";
$result = mysqli_query($con, $query) or die('Error in connection');
$num_rows = mysqli_num_rows($result);
echo "</br>";

echo"Results Found";

echo "</br></br>";
echo"<table style = 'align:center'>";
echo "<tr> </tr>";
echo "<tr> <th>No</th>  <th>Name</th> <th>Phone</th> </tr>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

echo"<tr><td>";
echo $row['id'];
echo"</td><td>";
echo $row['Fname'];
echo"</td><td>";
echo $row['Phone'];
echo"</td><td style= 'text-align:right'>";
}
echo"</table>";
}


?>
</body>
</html>