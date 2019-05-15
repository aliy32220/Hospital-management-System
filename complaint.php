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


$res = oci_parse($conn, "");
oci_execute($res);  // execute query

echo "<table border='1'>\n";
$row = oci_fetch_assoc($res);  //fetch rows
echo "<tr>\n";

$res = oci_parse($conn, "");
oci_execute($res);  // execute query


?>

</body>
</html>