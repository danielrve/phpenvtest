const axios = require('axios');

// Get parameters from environment variables
const site_url = process.env.SITE_URL;
const api_token = process.env.API_TOKEN;
const env_var_name = process.env.ENV_VAR_NAME;
const env_var_value = process.env.ENV_VAR_VALUE;

// Construct API URL
const api_url = `${site_url}/cpanel/execute/Environment/setenv`;

// Construct payload and headers
const payload = {
  api_token,
  var: env_var_name,
  value: env_var_value,
};
const headers = {
  Authorization: `cpanel ${api_token}`,
  'Content-Type': 'application/json',
};

// Send request to cPanel API
axios.post(api_url, payload, { headers })
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
    process.exit(1);
  });
