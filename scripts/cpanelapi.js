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


const cpanel = new cpanelapi({
  host: siteUrl,
  user: process.env.USER,
  pass: process.env.PASS,
  ssl: true,
  port: '2083'
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
