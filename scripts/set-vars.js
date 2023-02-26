const https = require('https');
const querystring = require('querystring');

// Get parameters from environment variables
const siteUrl = process.env.SITE_URL;
const apiToken = process.env.API_TOKEN;
const envVarName = process.env.ENV_VAR_NAME;
const envVarValue = process.env.ENV_VAR_VALUE;

// Construct API URL
const apiUrl = `${siteUrl}:2083/cpanel/execute/Environment/setenv`;

// Construct payload
const payload = querystring.stringify({
  'api.version': 2,
  'api.token': apiToken,
  var: envVarName,
  value: envVarValue,
});

// Set options for API request
const options = {
  hostname: apiUrl,
  port: 443,
  method: 'POST',
  headers: {
    'Authorization': `cpanel ${apiToken}`,
    'Content-Type': 'application/x-www-form-urlencoded',
    'Content-Length': payload.length,
  },
};

// Send request to cPanel API
const req = https.request(options, (res) => {
  let responseData = '';
  res.on('data', (chunk) => {
    responseData += chunk;
  });
  res.on('end', () => {
    if (res.statusCode !== 200) {
      console.error(`Error: ${responseData}`);
      process.exit(1);
    }
    console.log('Environment variable set successfully.');
    process.exit(0);
  });
});

req.on('error', (error) => {
  console.error(error);
  process.exit(1);
});

req.write(payload);
req.end();
