<html>
<body>
<?php

error_reporting(E_ERROR | E_PARSE );



$userName = "scott";     //your localhost database username
$password = "tiger";     //your localhost database password
$dtabasePort = "1521";
$serverName = "localhost";   //use localhost 
$databaseName = "hospital";     // you can check the name of your database using this command  (select ora_database_name from dual;)



//for establishing the connection with oracle database 
$conn = oci_connect($userName, $password, "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $serverName)(PORT = $dtabasePort)))(CONNECT_DATA=(SID=$databaseName)))");

if (!$conn) {
    $e = oci_error();  //fr oci_connect errors pass no handle
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$Name = $_POST['Fname'+' '+'Lname'];
$Desig = $_POST['Desig'];


$res = oci_parse($conn, "insert into nurse(N_name, N_designation) values('$Name', '$Desig')");
oci_execute($res);  // execute query

echo "<br>Nurse added successfully.";

?>

</body>
</html>