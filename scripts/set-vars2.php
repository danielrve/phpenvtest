<?php

$site_url = 'https://starnetcomputers.us';
$api_token = '1CWSB2BXTS9Q6INZ3HAG4CUODV25TKYT';

// cPanel API URL
$api_url = '${site_url}:2083/cpsess${api_token}/execute/';

// cPanel account credentials
$username =  'starmizw';
$password =  'Ut3kodzmTnQ7';

// Environment variable name and value
$env_var_name = 'SAYAYIN';
$env_var_value = 'Pronto llegara el dia de mi suerte';

// Build the API request
$request = json_encode(array(
    'cpanel_jsonapi_user' => $username,
    'cpanel_jsonapi_module' => 'Environment',
    'cpanel_jsonapi_func' => 'setenv',
    'var' => $env_name,
    'value' => $env_value
));

// Initialize a cURL session and set the request options
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $request,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic '.base64_encode($username.':'.$password),
        'Content-Type: application/json',
    ),
));

// Execute the API request and print the response
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>
