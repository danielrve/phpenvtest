<?php

$site_url = $_ENV['SITE_URL'];
$api_token = $_ENV['API_TOKEN'];
$env_var_name = $_ENV['ENV_VAR_NAME'];
$env_var_value = $_ENV['ENV_VAR_VALUE'];

// cPanel API URL
$api_url = '${site_url}:2083/cpsess${api_token}/execute/';

// cPanel account credentials
$username =  $_ENV['USER_NAME'];
$password =  $_ENV['PASSWORD'];

// Environment variable name and value
$env_var_name = $_ENV['ENV_VAR_NAME'];
$env_var_value = $_ENV['ENV_VAR_VALUE'];


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
