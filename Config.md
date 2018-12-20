Replicating Site
------------------
Clone this Repo into xampp/htdocs path.
* Front End
1. Go to - application/config.php
2. Set - $config['base_url'] = 'http://example.com/' or 'https://example.com/'
3. Go to - application/database.php
4. Set - <br />
'hostname' => 'localhost',  (change required if needed)<br />
'username' => '',<br />
'password' => '',<br />
'database' => '',<br />
5. Go to - application/emailc.php
6. Set - <br />
$config['$econfig'] = array(<br />
'protocol' => 'smtp',<br />
'smtp_host' => '',<br />
/* email gateway host */<br />
'smtp_port' => 465,<br />
'smtp_user' => '',<br />
/* email gateway username */<br />
'smtp_pass' => '',<br />
/* email gateway password */<br />
'wordwrap' => TRUE,<br />
'charset' => 'utf-8'<br />
);

* adminpanel
1. Go to - application/adminpanel/config.php
2. Set - $config['base_url'] = 'http://example.com/adminpanel/' or 'https://example.com/adminpanel/'
3. Go to - application/adminpanel/constants.php
4. Set to - define('BASE_FRONT_URL', 'http://example.com/' or 'https://example.com/');
5. Go to - application/adminpanel/database.php
6. Set to - <br />'hostname' => 'localhost', (change required if needed)<br/>
'username' => '',<br/>
'password' => '',<br/>
'database' => '',<br/>
