<?php

// Get parameters from environment variables
$site_url = 'https://starnetcomputers.us';
$api_token = '1CWSB2BXTS9Q6INZ3HAG4CUODV25TKYT';
$env_var_name = 'SAYAYIN';
$env_var_value = 'EL PRINCIPE DEL UNIVERSO';

// Construct API URL
$api_url = $site_url . '/cpanel/execute/Environment/setenv';

// Construct payload
$payload = array(
  'api.version' => 2,
  'api.token' => $api_token,
  'var' => $env_var_name,
  'value' => $env_var_value,
);

// Send request to cPanel API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: cpanel ' . $api_token));
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check for errors
if ($httpcode != 200) {
  exit("Error: " . $response . "\n");
}

echo "Environment variable set successfully.\n";
?>
