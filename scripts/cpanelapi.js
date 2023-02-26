const cpanelapi = require('cpanelapi');

const siteUrl = process.env.SITE_URL;
const apiToken = process.env.API_TOKEN;
const vars = {
  DBHOST: process.env.VAR1,
  DBUSER: process.env.VAR2,
  DBPASS: process.env.VAR3,
};

const cpanel = new cpanelapi({
  host: siteUrl,
  port: 2083,
  ssl: true,
  apitoken: apiToken,
});

for (const [key, value] of Object.entries(vars)) {
  cpanel.execute('setenv_var', {
    var: key,
    value,
  }).then((response) => {
    console.log(`Set ${key}=${value}: ${response.data.result}`);
  }).catch((error) => {
    console.error(`Failed to set ${key}=${value}: ${error.message}`);
  });
}
