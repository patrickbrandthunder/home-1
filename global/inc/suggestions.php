<?php
// Function to get the client ip address
function get_client_ip_server() {
    $ipaddress = '';
    if (array_key_exists('HTTP_CLIENT_IP', $_SERVER))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (array_key_exists('HTTP_X_FORWARDED', $_SERVER))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (array_key_exists('HTTP_FORWARDED_FOR', $_SERVER))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (array_key_exists('HTTP_FORWARDED', $_SERVER))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (array_key_exists('REMOTE_ADDR', $_SERVER))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}


//echo('{"original_qt":"am","paid_suggestions":[{"id":1,"term":"amazon.com - Shop Last Minute Deals","click_url":"http://bridge.sfo1.admarketplace.net/ct?version=16.0.0&key=1545140688201000020.1&ci=1545140688429.12217","image_url":"//cdn.45tu1c0.com/adgroup/13480577/200/1521228087103.jpg","impression_url":"//imp.mt48.net/imp?id=7R7wxEzkiFdwxr3NJGbzfQbX1tkXfOkX1tbW1p%2Fk4p%2Fk1p%2FW4p8%2B7RcdIG7%2BGmwqgCld4pDX4pbm1pLYfplWfpbWfQbnxnEZGmzYI%3DEYgCbnHF3QJre%2BGmwqgC8W1CLZfZ2d7ncQHmzdJR3KiF2z4Z2ZfplnimE%2BjmzYIczvIpkZfC8%2B4QbXfplnxr7kgCbnxGEwxRwKj%3DEYJCdNJFcPJmanHG3ZgCfXfQ8k4Z8W4OIOHG4wGm4WHZkW7ncQj9ENJczQx%3DfzftaY1CbnInEwIczZIG7mIG8zHF3wJnjvJnDnjG4YGmjwJdzvIpdM8n4V8Q%2FY5t7Q8Q%2Fm1Cfa5t7Z8Q%2FX4Q2T8n2O1QHZ4BWOsO8P4ZLm4pcz7RedHwzvIpkXfQ8X4YIOiF3qIG7KiF2zfbyy","label_required":false}],"organic_suggestions":[{"term":"amazon","paid_suggestion_ids":[1]},{"term":"amazon prime"},{"term":"amtrak"},{"term":"american airlines"},{"term":"american express"},{"term":"amazon japan"},{"term":"american eagle"},{"term":"amc theatres"}]}');
//die();
$baseURL = 'https://brandthunder_cps.cps.ampfeed.com/suggestions?partner=brandthunder_cps&sub1=newtabgallery&v=1.1&results-os=8&results-ps=1&ip='.get_client_ip_server().'&ua='.urlencode($_SERVER['HTTP_USER_AGENT']).'&rfr='.urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo(file_get_contents($baseURL.'&qt='.$_GET['q']));
?>
