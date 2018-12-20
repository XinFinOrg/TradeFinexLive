<p align="center">
  <img src="https://www.tradefinex.org/assets/images/icon/logo.png" alt="TradeFinex" width="226">
  <br>
</p>

Basic Objective
----------------
Developing a portal , where beneficiary can submit project requirement and Invite
Financiers, Suppliers to submit the proposals for the same. At the same time Financier and
Supplier can browse for the projects according to their interests and submit proposals. Final
payment will held using XDC wallet. Financier will pay beneficiary in XDC wallet , and
similarly beneficiary can pay supplier to wallet .

Stake Holders 
--------------
* **Beneficiary**- Beneficiary can be an individual, an institution, a community or any government that is looking to raise funds or procure goods and services. They could be designated authorised personnel from the organisation such as the board members or senior management professionals or employees from finance or procurement function.

* **Financier**- Financiers can be an individual retail investor, venture capital or private equity fund, an organization or a financial institution whose business is providing, investing, or lending money. A financier is someone who is actively looking to invest in projects according to his sectorial alignment and risk appetite for an agreed return on investment. On TradeFinex platform, a Financier may finance full or a part of the project along with other financiers.

* **Supplier**- A supplier is an individual or a company that offers services or manufactures / distribute goods to another organization. They could be designated authorised personnel from the organisation such as the board members or senior management professionals or employees from marketing, technical, finance or procurement functions

Basic Process Flow
--------------------
![basic data flow](https://user-images.githubusercontent.com/22572604/50088133-238e8180-0228-11e9-9509-77dc2cecf6ee.png)

There is registration process common for all stakeholders. The individual participant will have their specific features on the platform and the cross communication between the participant. The features goes like beneficiary can upload the project, can review the response they got, can accept the payment and make repayments.

Financiers will have access to these projects, review that, submit proposal, and payment /repayment.

Similarly, supplier will also have some features. They can review the requirements, submit the proposal, carryout transactions and close the deal.

Technology Used for development
----------------------------------
* PHP ( Code Igniter MVC frame work V. 3.1.7), for front end business logic development
* MYSQL , for backend database.

All files structures as per the standard the code igniter framework.

Important Files / Disaster recovery
---------------------------------------

* PHP version should be 5.6.x or above
* MYSQL
* application/config/config.php to set Session path, library , helpers, other security
parameters
* application/config/database.php to set Dabatbase configuration variables.
* application/config/emailc.php , to set SMTP or appropriate email server details.
Currently its SMTP.
* If it is file based session , then session folder has to be created inside the
application/config folder.
* for URL redirection rules, need to set up at application/config/routes.php accordingly.
* for user defined variables , need to define at application/config/constants.php
* For API credentials, if any change need to update , tf_api_access_code
* All API calls at application/helpers/xdcapi_helper.php . If any change in API , need to
modify here accordingly.

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
6. Set to - <br />'hostname' => 'localhost', (change required if needed)
'username' => '',<br/>
'password' => '',<br/>
'database' => '',<br/>
