<?php

mysql_connect('localhost','noodee','mypass');
mysql_select_db('dreamhome');

$result = mysql_query('SELECT DISTINCT clientno, fname, lname, propertyno, viewdate FROM client NATURAL JOIN viewing'); 
if (!$result) die('Couldn\'t fetch records'); 
$num_fields = mysql_num_fields($result); 
$headers = array(); 
for ($i = 0; $i < $num_fields; $i++) 
{     
       $headers[] = mysql_field_name($result , $i); 
} 
$fp = fopen('php://output', 'w'); 
if ($fp && $result) 
{     
       header('Content-Type: text/csv');
       header('Content-Disposition: attachment; filename="client_visit.csv"');
       header('Pragma: no-cache');    
       header('Expires: 0');
       fputcsv($fp, $headers); 
       while ($row = mysql_fetch_row($result)) 
       {
           fputcsv($fp, array_values($row));
       }
die; 
} 
?>