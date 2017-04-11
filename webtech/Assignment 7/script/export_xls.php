<?php

mysql_connect('localhost','noodee','mypass');
mysql_select_db('dreamhome');

$select = "SELECT DISTINCT clientno, fname, lname, propertyno, viewdate FROM client NATURAL JOIN viewing";

$export = mysql_query ( $select ) or die ( "Sql error : " . mysql_error( ) );

$fields = mysql_num_fields ( $export );

$header = "";
$data = "";

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=client_visit.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>