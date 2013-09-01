<?php
    $request =  'https://api.mongohq.com/databases/unicorn/collections/books/documents?_apikey=xvemyqnnebvylc5mryvd';
    // send request to the service using curl - http://us2.php.net/curl
    $ch = curl_init();    // initialize curl handle
    curl_setopt($ch, CURLOPT_URL, $request); // set url to variable above
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); // times out after 5s
    curl_setopt($ch, CURLOPT_GET, 1); // set GET method
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0); // certificate off
    if(($json=curl_exec($ch)) === false) // send request
        {echo 'Curl error: ' . curl_error($ch);} // check for error
        else
        {
            header("Content-type: application/json"); // set http header
            echo $json; // return json to backbone
        }
    curl_close($ch); 
?>