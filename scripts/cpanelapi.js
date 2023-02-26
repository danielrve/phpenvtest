const cpanelapi = require('cpanel-node');

const siteUrl = process.env.SITE_URL;
const apiToken = process.env.API_TOKEN;
const vars = {
  DBHOST: 'adrian.gerig',
  DBUSER: 'root',
  DBPASS: 'lasolucion',
};
console.log(siteUrl);
console.log(apiToken);

const options = {
    host: process.env.SITE_URL,
    user: process.env.USER,
    pass: process.env.PASS,
    https: true, //https is advisable
    port: "2083" //default port of cpanel
};
 
let cpanel = new cpanelapi(options);

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
