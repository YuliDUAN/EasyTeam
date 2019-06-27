<?php
/*session_start();
include "MySqlConnect.php";

// 说明：获取完整URL
function curPageURL()
{
    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

$sql="insert into collection (cname,url,date)values ('ar_titie',curPageURL(),date ())
        where ar_titie IN ()"

*/
echo $_SERVER["QUERY_STRING"];
?>

