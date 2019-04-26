<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2019-03-27 16:44:04 --> Config Class Initialized
INFO - 2019-03-27 16:44:04 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:44:04 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:44:04 --> Utf8 Class Initialized
INFO - 2019-03-27 16:44:04 --> URI Class Initialized
DEBUG - 2019-03-27 16:44:05 --> No URI present. Default controller set.
INFO - 2019-03-27 16:44:05 --> Router Class Initialized
INFO - 2019-03-27 16:44:05 --> Output Class Initialized
INFO - 2019-03-27 16:44:05 --> Security Class Initialized
DEBUG - 2019-03-27 16:44:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:44:05 --> CSRF cookie sent
INFO - 2019-03-27 16:44:05 --> Input Class Initialized
INFO - 2019-03-27 16:44:05 --> Language Class Initialized
INFO - 2019-03-27 16:44:05 --> Loader Class Initialized
INFO - 2019-03-27 16:44:05 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:44:05 --> Controller Class Initialized
INFO - 2019-03-27 16:44:05 --> Helper loaded: form_helper
INFO - 2019-03-27 16:44:05 --> Helper loaded: url_helper
INFO - 2019-03-27 16:44:05 --> Helper loaded: date_helper
INFO - 2019-03-27 16:44:05 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:44:05 --> Encrypt Class Initialized
INFO - 2019-03-27 16:44:05 --> Model Class Initialized
INFO - 2019-03-27 16:44:05 --> Database Driver Class Initialized
ERROR - 2019-03-27 16:44:05 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) C:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-03-27 16:44:05 --> Unable to connect to the database
INFO - 2019-03-27 16:44:05 --> Model Class Initialized
INFO - 2019-03-27 16:44:05 --> Database Driver Class Initialized
ERROR - 2019-03-27 16:44:05 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) C:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-03-27 16:44:05 --> Unable to connect to the database
ERROR - 2019-03-27 16:44:05 --> Unable to delete cache file for 
ERROR - 2019-03-27 16:44:05 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) C:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-03-27 16:44:05 --> Unable to connect to the database
ERROR - 2019-03-27 16:44:05 --> Query error: Access denied for user 'demotrad_admin'@'localhost' (using password: YES) - Invalid query: SELECT `tpp`.*, `tcom`.*, `tcoun`.*, `tfb`.*, `tca`.`ID` as `cat_id`, `tca`.`cName` as `cat_name`, `tca`.`imagePath` as `cat_image`, `tct`.`ID` as `cont_id`, `tct`.`cName` as `cont_name`, `tct`.`imagePath` as `cont_image`
FROM `tf_project_posts` `tpp`
LEFT JOIN `tf_company` `tcom` ON `tcom`.`tfcom_user_ref` = `tpp`.`userID`
LEFT JOIN `tf_country` `tcoun` ON `tcoun`.`tfc_id` = `tpp`.`countryID`
LEFT JOIN `tf_beneficiary` `tfb` ON `tfb`.`tfb_user_ref` = `tpp`.`userID`
LEFT JOIN `tf_industry_categories` `tca` ON `tca`.`ID` = `tpp`.`mainCategoryId`
LEFT JOIN `tf_contracts` `tct` ON `tct`.`ID` = `tpp`.`contractID`
WHERE `tpp`.`row_deleted` = '0' AND `tpp`.`isDraft` = '0' AND `tpp`.`admin_approval` = '1'
GROUP BY `tpp`.`ID`
ERROR - 2019-03-27 16:44:05 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp\htdocs\DemoTradeFinex\application\models\Plisting.php 371
INFO - 2019-03-27 16:46:56 --> Config Class Initialized
INFO - 2019-03-27 16:46:56 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:46:56 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:46:56 --> Utf8 Class Initialized
INFO - 2019-03-27 16:46:56 --> URI Class Initialized
DEBUG - 2019-03-27 16:46:56 --> No URI present. Default controller set.
INFO - 2019-03-27 16:46:56 --> Router Class Initialized
INFO - 2019-03-27 16:46:56 --> Output Class Initialized
INFO - 2019-03-27 16:46:56 --> Security Class Initialized
DEBUG - 2019-03-27 16:46:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:46:56 --> CSRF cookie sent
INFO - 2019-03-27 16:46:56 --> Input Class Initialized
INFO - 2019-03-27 16:46:56 --> Language Class Initialized
INFO - 2019-03-27 16:46:56 --> Loader Class Initialized
INFO - 2019-03-27 16:46:56 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:46:56 --> Controller Class Initialized
INFO - 2019-03-27 16:46:56 --> Helper loaded: form_helper
INFO - 2019-03-27 16:46:56 --> Helper loaded: url_helper
INFO - 2019-03-27 16:46:56 --> Helper loaded: date_helper
INFO - 2019-03-27 16:46:56 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:46:56 --> Encrypt Class Initialized
INFO - 2019-03-27 16:46:56 --> Model Class Initialized
INFO - 2019-03-27 16:46:56 --> Database Driver Class Initialized
INFO - 2019-03-27 16:46:56 --> Model Class Initialized
ERROR - 2019-03-27 16:46:56 --> Unable to delete cache file for 
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:46:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:46:56 --> Final output sent to browser
DEBUG - 2019-03-27 16:46:56 --> Total execution time: 0.7722
INFO - 2019-03-27 16:47:33 --> Config Class Initialized
INFO - 2019-03-27 16:47:33 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:47:33 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:47:33 --> Utf8 Class Initialized
INFO - 2019-03-27 16:47:33 --> URI Class Initialized
DEBUG - 2019-03-27 16:47:33 --> No URI present. Default controller set.
INFO - 2019-03-27 16:47:33 --> Router Class Initialized
INFO - 2019-03-27 16:47:33 --> Output Class Initialized
INFO - 2019-03-27 16:47:33 --> Security Class Initialized
DEBUG - 2019-03-27 16:47:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:47:33 --> CSRF cookie sent
INFO - 2019-03-27 16:47:33 --> Input Class Initialized
INFO - 2019-03-27 16:47:33 --> Language Class Initialized
INFO - 2019-03-27 16:47:33 --> Loader Class Initialized
INFO - 2019-03-27 16:47:33 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:47:33 --> Controller Class Initialized
INFO - 2019-03-27 16:47:33 --> Helper loaded: form_helper
INFO - 2019-03-27 16:47:33 --> Helper loaded: url_helper
INFO - 2019-03-27 16:47:33 --> Helper loaded: date_helper
INFO - 2019-03-27 16:47:33 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:47:33 --> Encrypt Class Initialized
INFO - 2019-03-27 16:47:33 --> Model Class Initialized
INFO - 2019-03-27 16:47:33 --> Database Driver Class Initialized
INFO - 2019-03-27 16:47:33 --> Model Class Initialized
ERROR - 2019-03-27 16:47:33 --> Unable to delete cache file for 
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:47:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:47:33 --> Final output sent to browser
DEBUG - 2019-03-27 16:47:33 --> Total execution time: 0.1371
INFO - 2019-03-27 16:50:16 --> Config Class Initialized
INFO - 2019-03-27 16:50:16 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:50:16 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:50:16 --> Utf8 Class Initialized
INFO - 2019-03-27 16:50:16 --> URI Class Initialized
DEBUG - 2019-03-27 16:50:16 --> No URI present. Default controller set.
INFO - 2019-03-27 16:50:16 --> Router Class Initialized
INFO - 2019-03-27 16:50:16 --> Output Class Initialized
INFO - 2019-03-27 16:50:16 --> Security Class Initialized
DEBUG - 2019-03-27 16:50:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:50:16 --> CSRF cookie sent
INFO - 2019-03-27 16:50:16 --> Input Class Initialized
INFO - 2019-03-27 16:50:16 --> Language Class Initialized
INFO - 2019-03-27 16:50:16 --> Loader Class Initialized
INFO - 2019-03-27 16:50:16 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:50:16 --> Controller Class Initialized
INFO - 2019-03-27 16:50:16 --> Helper loaded: form_helper
INFO - 2019-03-27 16:50:16 --> Helper loaded: url_helper
INFO - 2019-03-27 16:50:16 --> Helper loaded: date_helper
INFO - 2019-03-27 16:50:16 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:50:16 --> Encrypt Class Initialized
INFO - 2019-03-27 16:50:16 --> Model Class Initialized
INFO - 2019-03-27 16:50:16 --> Database Driver Class Initialized
INFO - 2019-03-27 16:50:17 --> Model Class Initialized
ERROR - 2019-03-27 16:50:17 --> Unable to delete cache file for 
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:50:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:50:17 --> Final output sent to browser
DEBUG - 2019-03-27 16:50:17 --> Total execution time: 0.7281
INFO - 2019-03-27 16:52:16 --> Config Class Initialized
INFO - 2019-03-27 16:52:16 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:16 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:16 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:16 --> URI Class Initialized
DEBUG - 2019-03-27 16:52:16 --> No URI present. Default controller set.
INFO - 2019-03-27 16:52:16 --> Router Class Initialized
INFO - 2019-03-27 16:52:16 --> Output Class Initialized
INFO - 2019-03-27 16:52:16 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:16 --> CSRF cookie sent
INFO - 2019-03-27 16:52:16 --> Input Class Initialized
INFO - 2019-03-27 16:52:16 --> Language Class Initialized
INFO - 2019-03-27 16:52:16 --> Loader Class Initialized
INFO - 2019-03-27 16:52:16 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:52:16 --> Controller Class Initialized
INFO - 2019-03-27 16:52:16 --> Helper loaded: form_helper
INFO - 2019-03-27 16:52:16 --> Helper loaded: url_helper
INFO - 2019-03-27 16:52:16 --> Helper loaded: date_helper
INFO - 2019-03-27 16:52:16 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:52:16 --> Encrypt Class Initialized
INFO - 2019-03-27 16:52:16 --> Model Class Initialized
INFO - 2019-03-27 16:52:16 --> Database Driver Class Initialized
INFO - 2019-03-27 16:52:16 --> Model Class Initialized
ERROR - 2019-03-27 16:52:16 --> Unable to delete cache file for 
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:52:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:52:16 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:16 --> Total execution time: 0.1117
INFO - 2019-03-27 16:52:19 --> Config Class Initialized
INFO - 2019-03-27 16:52:19 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:19 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:19 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:19 --> URI Class Initialized
DEBUG - 2019-03-27 16:52:19 --> No URI present. Default controller set.
INFO - 2019-03-27 16:52:19 --> Router Class Initialized
INFO - 2019-03-27 16:52:19 --> Output Class Initialized
INFO - 2019-03-27 16:52:19 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:19 --> CSRF cookie sent
INFO - 2019-03-27 16:52:19 --> Input Class Initialized
INFO - 2019-03-27 16:52:19 --> Language Class Initialized
INFO - 2019-03-27 16:52:19 --> Loader Class Initialized
INFO - 2019-03-27 16:52:19 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:52:19 --> Controller Class Initialized
INFO - 2019-03-27 16:52:19 --> Helper loaded: form_helper
INFO - 2019-03-27 16:52:19 --> Helper loaded: url_helper
INFO - 2019-03-27 16:52:19 --> Helper loaded: date_helper
INFO - 2019-03-27 16:52:19 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:52:19 --> Encrypt Class Initialized
INFO - 2019-03-27 16:52:19 --> Model Class Initialized
INFO - 2019-03-27 16:52:19 --> Database Driver Class Initialized
INFO - 2019-03-27 16:52:19 --> Model Class Initialized
ERROR - 2019-03-27 16:52:19 --> Unable to delete cache file for 
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:52:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:52:19 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:19 --> Total execution time: 0.1351
INFO - 2019-03-27 16:52:32 --> Config Class Initialized
INFO - 2019-03-27 16:52:32 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:32 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:32 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:32 --> URI Class Initialized
DEBUG - 2019-03-27 16:52:32 --> No URI present. Default controller set.
INFO - 2019-03-27 16:52:32 --> Router Class Initialized
INFO - 2019-03-27 16:52:32 --> Output Class Initialized
INFO - 2019-03-27 16:52:32 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:32 --> CSRF cookie sent
INFO - 2019-03-27 16:52:32 --> Input Class Initialized
INFO - 2019-03-27 16:52:32 --> Language Class Initialized
INFO - 2019-03-27 16:52:32 --> Loader Class Initialized
INFO - 2019-03-27 16:52:32 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:52:32 --> Controller Class Initialized
INFO - 2019-03-27 16:52:32 --> Helper loaded: form_helper
INFO - 2019-03-27 16:52:32 --> Helper loaded: url_helper
INFO - 2019-03-27 16:52:32 --> Helper loaded: date_helper
INFO - 2019-03-27 16:52:32 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:52:32 --> Encrypt Class Initialized
INFO - 2019-03-27 16:52:32 --> Model Class Initialized
INFO - 2019-03-27 16:52:32 --> Database Driver Class Initialized
INFO - 2019-03-27 16:52:32 --> Model Class Initialized
ERROR - 2019-03-27 16:52:32 --> Unable to delete cache file for 
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:52:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:52:32 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:32 --> Total execution time: 0.1186
INFO - 2019-03-27 16:52:35 --> Config Class Initialized
INFO - 2019-03-27 16:52:35 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:35 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:35 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:35 --> URI Class Initialized
INFO - 2019-03-27 16:52:35 --> Router Class Initialized
INFO - 2019-03-27 16:52:35 --> Output Class Initialized
INFO - 2019-03-27 16:52:35 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:35 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:35 --> CSRF cookie sent
INFO - 2019-03-27 16:52:35 --> Input Class Initialized
INFO - 2019-03-27 16:52:35 --> Language Class Initialized
ERROR - 2019-03-27 16:52:36 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:36 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:36 --> Total execution time: 0.8032
INFO - 2019-03-27 16:52:41 --> Config Class Initialized
INFO - 2019-03-27 16:52:41 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:41 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:41 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:41 --> URI Class Initialized
INFO - 2019-03-27 16:52:41 --> Router Class Initialized
INFO - 2019-03-27 16:52:41 --> Output Class Initialized
INFO - 2019-03-27 16:52:41 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:41 --> CSRF cookie sent
INFO - 2019-03-27 16:52:41 --> Input Class Initialized
INFO - 2019-03-27 16:52:41 --> Language Class Initialized
ERROR - 2019-03-27 16:52:41 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:41 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:41 --> Total execution time: 0.0440
INFO - 2019-03-27 16:52:42 --> Config Class Initialized
INFO - 2019-03-27 16:52:42 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:42 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:42 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:42 --> URI Class Initialized
INFO - 2019-03-27 16:52:42 --> Router Class Initialized
INFO - 2019-03-27 16:52:42 --> Output Class Initialized
INFO - 2019-03-27 16:52:42 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:42 --> CSRF cookie sent
INFO - 2019-03-27 16:52:42 --> Input Class Initialized
INFO - 2019-03-27 16:52:42 --> Language Class Initialized
ERROR - 2019-03-27 16:52:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:42 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:42 --> Total execution time: 0.0383
INFO - 2019-03-27 16:52:42 --> Config Class Initialized
INFO - 2019-03-27 16:52:42 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:42 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:42 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:42 --> URI Class Initialized
INFO - 2019-03-27 16:52:42 --> Router Class Initialized
INFO - 2019-03-27 16:52:42 --> Output Class Initialized
INFO - 2019-03-27 16:52:42 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:42 --> CSRF cookie sent
INFO - 2019-03-27 16:52:42 --> Input Class Initialized
INFO - 2019-03-27 16:52:42 --> Language Class Initialized
ERROR - 2019-03-27 16:52:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:42 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:42 --> Total execution time: 0.0348
INFO - 2019-03-27 16:52:42 --> Config Class Initialized
INFO - 2019-03-27 16:52:42 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:42 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:42 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:42 --> URI Class Initialized
INFO - 2019-03-27 16:52:42 --> Router Class Initialized
INFO - 2019-03-27 16:52:42 --> Output Class Initialized
INFO - 2019-03-27 16:52:42 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:42 --> CSRF cookie sent
INFO - 2019-03-27 16:52:42 --> Input Class Initialized
INFO - 2019-03-27 16:52:42 --> Language Class Initialized
ERROR - 2019-03-27 16:52:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:42 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:42 --> Total execution time: 0.0431
INFO - 2019-03-27 16:52:42 --> Config Class Initialized
INFO - 2019-03-27 16:52:42 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:42 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:42 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:42 --> URI Class Initialized
INFO - 2019-03-27 16:52:42 --> Router Class Initialized
INFO - 2019-03-27 16:52:42 --> Output Class Initialized
INFO - 2019-03-27 16:52:42 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:42 --> CSRF cookie sent
INFO - 2019-03-27 16:52:42 --> Input Class Initialized
INFO - 2019-03-27 16:52:42 --> Language Class Initialized
ERROR - 2019-03-27 16:52:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:42 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:42 --> Total execution time: 0.0363
INFO - 2019-03-27 16:52:42 --> Config Class Initialized
INFO - 2019-03-27 16:52:42 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:42 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:42 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:42 --> URI Class Initialized
INFO - 2019-03-27 16:52:42 --> Router Class Initialized
INFO - 2019-03-27 16:52:42 --> Output Class Initialized
INFO - 2019-03-27 16:52:42 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:42 --> CSRF cookie sent
INFO - 2019-03-27 16:52:42 --> Input Class Initialized
INFO - 2019-03-27 16:52:42 --> Language Class Initialized
ERROR - 2019-03-27 16:52:42 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:42 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:42 --> Total execution time: 0.0413
INFO - 2019-03-27 16:52:43 --> Config Class Initialized
INFO - 2019-03-27 16:52:43 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:52:43 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:52:43 --> Utf8 Class Initialized
INFO - 2019-03-27 16:52:43 --> URI Class Initialized
INFO - 2019-03-27 16:52:43 --> Router Class Initialized
INFO - 2019-03-27 16:52:43 --> Output Class Initialized
INFO - 2019-03-27 16:52:43 --> Security Class Initialized
DEBUG - 2019-03-27 16:52:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:52:43 --> CSRF cookie sent
INFO - 2019-03-27 16:52:43 --> Input Class Initialized
INFO - 2019-03-27 16:52:43 --> Language Class Initialized
ERROR - 2019-03-27 16:52:43 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:52:43 --> Final output sent to browser
DEBUG - 2019-03-27 16:52:43 --> Total execution time: 0.0392
INFO - 2019-03-27 16:53:56 --> Config Class Initialized
INFO - 2019-03-27 16:53:56 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:53:56 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:53:56 --> Utf8 Class Initialized
INFO - 2019-03-27 16:53:56 --> URI Class Initialized
INFO - 2019-03-27 16:53:56 --> Router Class Initialized
INFO - 2019-03-27 16:53:56 --> Output Class Initialized
INFO - 2019-03-27 16:53:56 --> Security Class Initialized
DEBUG - 2019-03-27 16:53:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:53:56 --> CSRF cookie sent
INFO - 2019-03-27 16:53:56 --> Input Class Initialized
INFO - 2019-03-27 16:53:56 --> Language Class Initialized
ERROR - 2019-03-27 16:53:56 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:53:56 --> Final output sent to browser
DEBUG - 2019-03-27 16:53:56 --> Total execution time: 0.0438
INFO - 2019-03-27 16:53:59 --> Config Class Initialized
INFO - 2019-03-27 16:53:59 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:53:59 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:53:59 --> Utf8 Class Initialized
INFO - 2019-03-27 16:53:59 --> URI Class Initialized
INFO - 2019-03-27 16:53:59 --> Router Class Initialized
INFO - 2019-03-27 16:53:59 --> Output Class Initialized
INFO - 2019-03-27 16:53:59 --> Security Class Initialized
DEBUG - 2019-03-27 16:53:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:53:59 --> CSRF cookie sent
INFO - 2019-03-27 16:53:59 --> Input Class Initialized
INFO - 2019-03-27 16:53:59 --> Language Class Initialized
ERROR - 2019-03-27 16:53:59 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 16:53:59 --> Final output sent to browser
DEBUG - 2019-03-27 16:53:59 --> Total execution time: 0.0495
INFO - 2019-03-27 16:54:00 --> Config Class Initialized
INFO - 2019-03-27 16:54:00 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:54:00 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:54:00 --> Utf8 Class Initialized
INFO - 2019-03-27 16:54:00 --> URI Class Initialized
DEBUG - 2019-03-27 16:54:00 --> No URI present. Default controller set.
INFO - 2019-03-27 16:54:00 --> Router Class Initialized
INFO - 2019-03-27 16:54:00 --> Output Class Initialized
INFO - 2019-03-27 16:54:00 --> Security Class Initialized
DEBUG - 2019-03-27 16:54:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:54:00 --> CSRF cookie sent
INFO - 2019-03-27 16:54:00 --> Input Class Initialized
INFO - 2019-03-27 16:54:00 --> Language Class Initialized
INFO - 2019-03-27 16:54:00 --> Loader Class Initialized
INFO - 2019-03-27 16:54:00 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:54:00 --> Controller Class Initialized
INFO - 2019-03-27 16:54:00 --> Helper loaded: form_helper
INFO - 2019-03-27 16:54:00 --> Helper loaded: url_helper
INFO - 2019-03-27 16:54:00 --> Helper loaded: date_helper
INFO - 2019-03-27 16:54:00 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:54:00 --> Encrypt Class Initialized
INFO - 2019-03-27 16:54:00 --> Model Class Initialized
INFO - 2019-03-27 16:54:00 --> Database Driver Class Initialized
INFO - 2019-03-27 16:54:00 --> Model Class Initialized
ERROR - 2019-03-27 16:54:00 --> Unable to delete cache file for 
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:54:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:54:00 --> Final output sent to browser
DEBUG - 2019-03-27 16:54:00 --> Total execution time: 0.1351
INFO - 2019-03-27 16:54:16 --> Config Class Initialized
INFO - 2019-03-27 16:54:16 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:54:16 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:54:16 --> Utf8 Class Initialized
INFO - 2019-03-27 16:54:16 --> URI Class Initialized
DEBUG - 2019-03-27 16:54:16 --> No URI present. Default controller set.
INFO - 2019-03-27 16:54:16 --> Router Class Initialized
INFO - 2019-03-27 16:54:16 --> Output Class Initialized
INFO - 2019-03-27 16:54:16 --> Security Class Initialized
DEBUG - 2019-03-27 16:54:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:54:16 --> CSRF cookie sent
INFO - 2019-03-27 16:54:16 --> Input Class Initialized
INFO - 2019-03-27 16:54:16 --> Language Class Initialized
INFO - 2019-03-27 16:54:16 --> Loader Class Initialized
INFO - 2019-03-27 16:54:16 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:54:16 --> Controller Class Initialized
INFO - 2019-03-27 16:54:16 --> Helper loaded: form_helper
INFO - 2019-03-27 16:54:16 --> Helper loaded: url_helper
INFO - 2019-03-27 16:54:16 --> Helper loaded: date_helper
INFO - 2019-03-27 16:54:16 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:54:16 --> Encrypt Class Initialized
INFO - 2019-03-27 16:54:16 --> Model Class Initialized
INFO - 2019-03-27 16:54:16 --> Database Driver Class Initialized
INFO - 2019-03-27 16:54:16 --> Model Class Initialized
ERROR - 2019-03-27 16:54:16 --> Unable to delete cache file for 
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:54:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:54:16 --> Final output sent to browser
DEBUG - 2019-03-27 16:54:16 --> Total execution time: 0.1313
INFO - 2019-03-27 16:54:54 --> Config Class Initialized
INFO - 2019-03-27 16:54:54 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:54:54 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:54:54 --> Utf8 Class Initialized
INFO - 2019-03-27 16:54:54 --> URI Class Initialized
DEBUG - 2019-03-27 16:54:54 --> No URI present. Default controller set.
INFO - 2019-03-27 16:54:54 --> Router Class Initialized
INFO - 2019-03-27 16:54:54 --> Output Class Initialized
INFO - 2019-03-27 16:54:54 --> Security Class Initialized
DEBUG - 2019-03-27 16:54:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:54:54 --> CSRF cookie sent
INFO - 2019-03-27 16:54:54 --> Input Class Initialized
INFO - 2019-03-27 16:54:54 --> Language Class Initialized
INFO - 2019-03-27 16:54:54 --> Loader Class Initialized
INFO - 2019-03-27 16:54:54 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:54:54 --> Controller Class Initialized
INFO - 2019-03-27 16:54:54 --> Helper loaded: form_helper
INFO - 2019-03-27 16:54:54 --> Helper loaded: url_helper
INFO - 2019-03-27 16:54:54 --> Helper loaded: date_helper
INFO - 2019-03-27 16:54:54 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:54:54 --> Encrypt Class Initialized
INFO - 2019-03-27 16:54:54 --> Model Class Initialized
INFO - 2019-03-27 16:54:54 --> Database Driver Class Initialized
INFO - 2019-03-27 16:54:55 --> Model Class Initialized
ERROR - 2019-03-27 16:54:55 --> Unable to delete cache file for 
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:54:55 --> Final output sent to browser
DEBUG - 2019-03-27 16:54:55 --> Total execution time: 0.1296
INFO - 2019-03-27 16:54:57 --> Config Class Initialized
INFO - 2019-03-27 16:54:57 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:54:57 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:54:57 --> Utf8 Class Initialized
INFO - 2019-03-27 16:54:57 --> URI Class Initialized
INFO - 2019-03-27 16:54:57 --> Router Class Initialized
INFO - 2019-03-27 16:54:57 --> Output Class Initialized
INFO - 2019-03-27 16:54:57 --> Security Class Initialized
DEBUG - 2019-03-27 16:54:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:54:57 --> CSRF cookie sent
INFO - 2019-03-27 16:54:57 --> Input Class Initialized
INFO - 2019-03-27 16:54:57 --> Language Class Initialized
INFO - 2019-03-27 16:54:58 --> Loader Class Initialized
INFO - 2019-03-27 16:54:58 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:54:58 --> Controller Class Initialized
INFO - 2019-03-27 16:54:58 --> Helper loaded: form_helper
INFO - 2019-03-27 16:54:58 --> Helper loaded: url_helper
INFO - 2019-03-27 16:54:58 --> Helper loaded: date_helper
INFO - 2019-03-27 16:54:58 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:54:58 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:54:58 --> Encrypt Class Initialized
INFO - 2019-03-27 16:54:58 --> Email Class Initialized
INFO - 2019-03-27 16:54:58 --> Model Class Initialized
INFO - 2019-03-27 16:54:58 --> Database Driver Class Initialized
INFO - 2019-03-27 16:54:58 --> Model Class Initialized
DEBUG - 2019-03-27 16:54:59 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:54:59 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:54:59 --> Final output sent to browser
DEBUG - 2019-03-27 16:54:59 --> Total execution time: 1.2054
INFO - 2019-03-27 16:55:43 --> Config Class Initialized
INFO - 2019-03-27 16:55:43 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:55:43 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:55:43 --> Utf8 Class Initialized
INFO - 2019-03-27 16:55:43 --> URI Class Initialized
INFO - 2019-03-27 16:55:43 --> Router Class Initialized
INFO - 2019-03-27 16:55:43 --> Output Class Initialized
INFO - 2019-03-27 16:55:43 --> Security Class Initialized
DEBUG - 2019-03-27 16:55:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:55:43 --> CSRF cookie sent
INFO - 2019-03-27 16:55:43 --> Input Class Initialized
INFO - 2019-03-27 16:55:43 --> Language Class Initialized
INFO - 2019-03-27 16:55:43 --> Loader Class Initialized
INFO - 2019-03-27 16:55:43 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:55:43 --> Controller Class Initialized
INFO - 2019-03-27 16:55:43 --> Helper loaded: form_helper
INFO - 2019-03-27 16:55:43 --> Helper loaded: url_helper
INFO - 2019-03-27 16:55:43 --> Helper loaded: date_helper
INFO - 2019-03-27 16:55:43 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:55:43 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:55:43 --> Encrypt Class Initialized
INFO - 2019-03-27 16:55:43 --> Email Class Initialized
INFO - 2019-03-27 16:55:43 --> Model Class Initialized
INFO - 2019-03-27 16:55:43 --> Database Driver Class Initialized
INFO - 2019-03-27 16:55:43 --> Model Class Initialized
DEBUG - 2019-03-27 16:55:43 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:55:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:55:43 --> Final output sent to browser
DEBUG - 2019-03-27 16:55:43 --> Total execution time: 0.2254
INFO - 2019-03-27 16:55:52 --> Config Class Initialized
INFO - 2019-03-27 16:55:52 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:55:52 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:55:52 --> Utf8 Class Initialized
INFO - 2019-03-27 16:55:52 --> URI Class Initialized
INFO - 2019-03-27 16:55:52 --> Router Class Initialized
INFO - 2019-03-27 16:55:52 --> Output Class Initialized
INFO - 2019-03-27 16:55:52 --> Security Class Initialized
DEBUG - 2019-03-27 16:55:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:55:52 --> CSRF cookie sent
INFO - 2019-03-27 16:55:52 --> Input Class Initialized
INFO - 2019-03-27 16:55:52 --> Language Class Initialized
INFO - 2019-03-27 16:55:52 --> Loader Class Initialized
INFO - 2019-03-27 16:55:52 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:55:52 --> Controller Class Initialized
INFO - 2019-03-27 16:55:52 --> Helper loaded: form_helper
INFO - 2019-03-27 16:55:52 --> Helper loaded: url_helper
INFO - 2019-03-27 16:55:52 --> Helper loaded: date_helper
INFO - 2019-03-27 16:55:52 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:55:52 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:55:52 --> Encrypt Class Initialized
INFO - 2019-03-27 16:55:52 --> Email Class Initialized
INFO - 2019-03-27 16:55:53 --> Model Class Initialized
INFO - 2019-03-27 16:55:53 --> Database Driver Class Initialized
INFO - 2019-03-27 16:55:53 --> Model Class Initialized
DEBUG - 2019-03-27 16:55:53 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:55:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:55:53 --> Final output sent to browser
DEBUG - 2019-03-27 16:55:53 --> Total execution time: 0.1750
INFO - 2019-03-27 16:56:07 --> Config Class Initialized
INFO - 2019-03-27 16:56:07 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:56:07 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:56:07 --> Utf8 Class Initialized
INFO - 2019-03-27 16:56:07 --> URI Class Initialized
INFO - 2019-03-27 16:56:07 --> Router Class Initialized
INFO - 2019-03-27 16:56:07 --> Output Class Initialized
INFO - 2019-03-27 16:56:07 --> Security Class Initialized
DEBUG - 2019-03-27 16:56:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:56:07 --> CSRF cookie sent
INFO - 2019-03-27 16:56:07 --> Input Class Initialized
INFO - 2019-03-27 16:56:07 --> Language Class Initialized
INFO - 2019-03-27 16:56:07 --> Loader Class Initialized
INFO - 2019-03-27 16:56:07 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:56:08 --> Controller Class Initialized
INFO - 2019-03-27 16:56:08 --> Helper loaded: form_helper
INFO - 2019-03-27 16:56:08 --> Helper loaded: url_helper
INFO - 2019-03-27 16:56:08 --> Helper loaded: date_helper
INFO - 2019-03-27 16:56:08 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:56:08 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:56:08 --> Encrypt Class Initialized
INFO - 2019-03-27 16:56:08 --> Email Class Initialized
INFO - 2019-03-27 16:56:08 --> Model Class Initialized
INFO - 2019-03-27 16:56:08 --> Database Driver Class Initialized
INFO - 2019-03-27 16:56:08 --> Model Class Initialized
DEBUG - 2019-03-27 16:56:08 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:56:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:56:08 --> Final output sent to browser
DEBUG - 2019-03-27 16:56:08 --> Total execution time: 0.1421
INFO - 2019-03-27 16:56:48 --> Config Class Initialized
INFO - 2019-03-27 16:56:48 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:56:48 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:56:48 --> Utf8 Class Initialized
INFO - 2019-03-27 16:56:48 --> URI Class Initialized
INFO - 2019-03-27 16:56:48 --> Router Class Initialized
INFO - 2019-03-27 16:56:48 --> Output Class Initialized
INFO - 2019-03-27 16:56:48 --> Security Class Initialized
DEBUG - 2019-03-27 16:56:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:56:48 --> CSRF cookie sent
INFO - 2019-03-27 16:56:48 --> Input Class Initialized
INFO - 2019-03-27 16:56:48 --> Language Class Initialized
INFO - 2019-03-27 16:56:48 --> Loader Class Initialized
INFO - 2019-03-27 16:56:48 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:56:48 --> Controller Class Initialized
INFO - 2019-03-27 16:56:48 --> Helper loaded: form_helper
INFO - 2019-03-27 16:56:48 --> Helper loaded: url_helper
INFO - 2019-03-27 16:56:48 --> Helper loaded: date_helper
INFO - 2019-03-27 16:56:48 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:56:48 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:56:48 --> Encrypt Class Initialized
INFO - 2019-03-27 16:56:48 --> Email Class Initialized
INFO - 2019-03-27 16:56:48 --> Model Class Initialized
INFO - 2019-03-27 16:56:48 --> Database Driver Class Initialized
INFO - 2019-03-27 16:56:48 --> Model Class Initialized
DEBUG - 2019-03-27 16:56:48 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:56:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:56:48 --> Final output sent to browser
DEBUG - 2019-03-27 16:56:48 --> Total execution time: 0.1471
INFO - 2019-03-27 16:56:51 --> Config Class Initialized
INFO - 2019-03-27 16:56:51 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:56:51 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:56:51 --> Utf8 Class Initialized
INFO - 2019-03-27 16:56:51 --> URI Class Initialized
INFO - 2019-03-27 16:56:51 --> Router Class Initialized
INFO - 2019-03-27 16:56:51 --> Output Class Initialized
INFO - 2019-03-27 16:56:51 --> Security Class Initialized
DEBUG - 2019-03-27 16:56:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:56:51 --> CSRF cookie sent
INFO - 2019-03-27 16:56:51 --> Input Class Initialized
INFO - 2019-03-27 16:56:51 --> Language Class Initialized
INFO - 2019-03-27 16:56:51 --> Loader Class Initialized
INFO - 2019-03-27 16:56:51 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:56:51 --> Controller Class Initialized
INFO - 2019-03-27 16:56:51 --> Helper loaded: form_helper
INFO - 2019-03-27 16:56:51 --> Helper loaded: url_helper
INFO - 2019-03-27 16:56:51 --> Helper loaded: date_helper
INFO - 2019-03-27 16:56:51 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:56:51 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:56:51 --> Encrypt Class Initialized
INFO - 2019-03-27 16:56:51 --> Email Class Initialized
INFO - 2019-03-27 16:56:51 --> Model Class Initialized
INFO - 2019-03-27 16:56:51 --> Database Driver Class Initialized
INFO - 2019-03-27 16:56:51 --> Model Class Initialized
DEBUG - 2019-03-27 16:56:51 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:56:51 --> Final output sent to browser
DEBUG - 2019-03-27 16:56:51 --> Total execution time: 0.1448
INFO - 2019-03-27 16:56:51 --> Config Class Initialized
INFO - 2019-03-27 16:56:51 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:56:51 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:56:51 --> Utf8 Class Initialized
INFO - 2019-03-27 16:56:51 --> URI Class Initialized
INFO - 2019-03-27 16:56:51 --> Router Class Initialized
INFO - 2019-03-27 16:56:51 --> Output Class Initialized
INFO - 2019-03-27 16:56:51 --> Security Class Initialized
DEBUG - 2019-03-27 16:56:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:56:51 --> CSRF cookie sent
INFO - 2019-03-27 16:56:51 --> Input Class Initialized
INFO - 2019-03-27 16:56:51 --> Language Class Initialized
INFO - 2019-03-27 16:56:51 --> Loader Class Initialized
INFO - 2019-03-27 16:56:51 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:56:51 --> Controller Class Initialized
INFO - 2019-03-27 16:56:51 --> Helper loaded: form_helper
INFO - 2019-03-27 16:56:51 --> Helper loaded: url_helper
INFO - 2019-03-27 16:56:51 --> Helper loaded: date_helper
INFO - 2019-03-27 16:56:51 --> Helper loaded: notification_helper
INFO - 2019-03-27 16:56:51 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:56:51 --> Encrypt Class Initialized
INFO - 2019-03-27 16:56:51 --> Email Class Initialized
INFO - 2019-03-27 16:56:51 --> Model Class Initialized
INFO - 2019-03-27 16:56:51 --> Database Driver Class Initialized
INFO - 2019-03-27 16:56:51 --> Model Class Initialized
DEBUG - 2019-03-27 16:56:51 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:56:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:56:51 --> Final output sent to browser
DEBUG - 2019-03-27 16:56:51 --> Total execution time: 0.1238
INFO - 2019-03-27 16:57:12 --> Config Class Initialized
INFO - 2019-03-27 16:57:12 --> Hooks Class Initialized
DEBUG - 2019-03-27 16:57:12 --> UTF-8 Support Enabled
INFO - 2019-03-27 16:57:12 --> Utf8 Class Initialized
INFO - 2019-03-27 16:57:12 --> URI Class Initialized
DEBUG - 2019-03-27 16:57:12 --> No URI present. Default controller set.
INFO - 2019-03-27 16:57:12 --> Router Class Initialized
INFO - 2019-03-27 16:57:12 --> Output Class Initialized
INFO - 2019-03-27 16:57:12 --> Security Class Initialized
DEBUG - 2019-03-27 16:57:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 16:57:12 --> CSRF cookie sent
INFO - 2019-03-27 16:57:12 --> Input Class Initialized
INFO - 2019-03-27 16:57:12 --> Language Class Initialized
INFO - 2019-03-27 16:57:12 --> Loader Class Initialized
INFO - 2019-03-27 16:57:12 --> Helper loaded: cache_helper
INFO - 2019-03-27 16:57:12 --> Controller Class Initialized
INFO - 2019-03-27 16:57:12 --> Helper loaded: form_helper
INFO - 2019-03-27 16:57:12 --> Helper loaded: url_helper
INFO - 2019-03-27 16:57:12 --> Helper loaded: date_helper
INFO - 2019-03-27 16:57:12 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 16:57:12 --> Encrypt Class Initialized
INFO - 2019-03-27 16:57:12 --> Model Class Initialized
INFO - 2019-03-27 16:57:12 --> Database Driver Class Initialized
INFO - 2019-03-27 16:57:12 --> Model Class Initialized
ERROR - 2019-03-27 16:57:12 --> Unable to delete cache file for 
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 16:57:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 16:57:12 --> Final output sent to browser
DEBUG - 2019-03-27 16:57:12 --> Total execution time: 0.1411
INFO - 2019-03-27 17:04:21 --> Config Class Initialized
INFO - 2019-03-27 17:04:21 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:04:21 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:04:21 --> Utf8 Class Initialized
INFO - 2019-03-27 17:04:21 --> URI Class Initialized
DEBUG - 2019-03-27 17:04:21 --> No URI present. Default controller set.
INFO - 2019-03-27 17:04:21 --> Router Class Initialized
INFO - 2019-03-27 17:04:21 --> Output Class Initialized
INFO - 2019-03-27 17:04:21 --> Security Class Initialized
DEBUG - 2019-03-27 17:04:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:04:21 --> CSRF cookie sent
INFO - 2019-03-27 17:04:21 --> Input Class Initialized
INFO - 2019-03-27 17:04:21 --> Language Class Initialized
INFO - 2019-03-27 17:04:21 --> Loader Class Initialized
INFO - 2019-03-27 17:04:21 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:04:21 --> Controller Class Initialized
INFO - 2019-03-27 17:04:21 --> Helper loaded: form_helper
INFO - 2019-03-27 17:04:21 --> Helper loaded: url_helper
INFO - 2019-03-27 17:04:21 --> Helper loaded: date_helper
INFO - 2019-03-27 17:04:21 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:04:22 --> Encrypt Class Initialized
INFO - 2019-03-27 17:04:22 --> Model Class Initialized
INFO - 2019-03-27 17:04:22 --> Database Driver Class Initialized
INFO - 2019-03-27 17:04:22 --> Model Class Initialized
ERROR - 2019-03-27 17:04:22 --> Unable to delete cache file for 
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:04:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:04:22 --> Final output sent to browser
DEBUG - 2019-03-27 17:04:22 --> Total execution time: 1.5062
INFO - 2019-03-27 17:04:46 --> Config Class Initialized
INFO - 2019-03-27 17:04:46 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:04:46 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:04:46 --> Utf8 Class Initialized
INFO - 2019-03-27 17:04:46 --> URI Class Initialized
INFO - 2019-03-27 17:04:46 --> Router Class Initialized
INFO - 2019-03-27 17:04:46 --> Output Class Initialized
INFO - 2019-03-27 17:04:46 --> Security Class Initialized
DEBUG - 2019-03-27 17:04:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:04:46 --> CSRF cookie sent
INFO - 2019-03-27 17:04:46 --> Input Class Initialized
INFO - 2019-03-27 17:04:46 --> Language Class Initialized
INFO - 2019-03-27 17:04:46 --> Loader Class Initialized
INFO - 2019-03-27 17:04:46 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:04:46 --> Controller Class Initialized
INFO - 2019-03-27 17:04:46 --> Helper loaded: form_helper
INFO - 2019-03-27 17:04:46 --> Helper loaded: url_helper
INFO - 2019-03-27 17:04:46 --> Helper loaded: date_helper
INFO - 2019-03-27 17:04:46 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:04:46 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:04:46 --> Encrypt Class Initialized
INFO - 2019-03-27 17:04:46 --> Email Class Initialized
INFO - 2019-03-27 17:04:46 --> Model Class Initialized
INFO - 2019-03-27 17:04:46 --> Database Driver Class Initialized
INFO - 2019-03-27 17:04:46 --> Model Class Initialized
DEBUG - 2019-03-27 17:04:46 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:04:46 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:04:46 --> Final output sent to browser
DEBUG - 2019-03-27 17:04:46 --> Total execution time: 0.2535
INFO - 2019-03-27 17:05:24 --> Config Class Initialized
INFO - 2019-03-27 17:05:24 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:05:24 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:05:24 --> Utf8 Class Initialized
INFO - 2019-03-27 17:05:24 --> URI Class Initialized
INFO - 2019-03-27 17:05:24 --> Router Class Initialized
INFO - 2019-03-27 17:05:24 --> Output Class Initialized
INFO - 2019-03-27 17:05:24 --> Security Class Initialized
DEBUG - 2019-03-27 17:05:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:05:24 --> CSRF cookie sent
INFO - 2019-03-27 17:05:24 --> Input Class Initialized
INFO - 2019-03-27 17:05:24 --> Language Class Initialized
INFO - 2019-03-27 17:05:24 --> Loader Class Initialized
INFO - 2019-03-27 17:05:24 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:05:24 --> Controller Class Initialized
INFO - 2019-03-27 17:05:24 --> Helper loaded: form_helper
INFO - 2019-03-27 17:05:24 --> Helper loaded: url_helper
INFO - 2019-03-27 17:05:24 --> Helper loaded: date_helper
INFO - 2019-03-27 17:05:24 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:05:24 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:05:24 --> Encrypt Class Initialized
INFO - 2019-03-27 17:05:25 --> Email Class Initialized
INFO - 2019-03-27 17:05:25 --> Model Class Initialized
INFO - 2019-03-27 17:05:25 --> Database Driver Class Initialized
INFO - 2019-03-27 17:05:25 --> Model Class Initialized
DEBUG - 2019-03-27 17:05:25 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:05:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:05:25 --> Final output sent to browser
DEBUG - 2019-03-27 17:05:25 --> Total execution time: 0.1606
INFO - 2019-03-27 17:16:25 --> Config Class Initialized
INFO - 2019-03-27 17:16:25 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:16:25 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:16:25 --> Utf8 Class Initialized
INFO - 2019-03-27 17:16:25 --> URI Class Initialized
INFO - 2019-03-27 17:16:25 --> Router Class Initialized
INFO - 2019-03-27 17:16:25 --> Output Class Initialized
INFO - 2019-03-27 17:16:25 --> Security Class Initialized
DEBUG - 2019-03-27 17:16:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:16:25 --> CSRF cookie sent
INFO - 2019-03-27 17:16:25 --> Input Class Initialized
INFO - 2019-03-27 17:16:25 --> Language Class Initialized
INFO - 2019-03-27 17:16:25 --> Loader Class Initialized
INFO - 2019-03-27 17:16:25 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:16:25 --> Controller Class Initialized
INFO - 2019-03-27 17:16:25 --> Helper loaded: form_helper
INFO - 2019-03-27 17:16:25 --> Helper loaded: url_helper
INFO - 2019-03-27 17:16:25 --> Helper loaded: date_helper
INFO - 2019-03-27 17:16:25 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:16:25 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:16:25 --> Encrypt Class Initialized
INFO - 2019-03-27 17:16:25 --> Email Class Initialized
INFO - 2019-03-27 17:16:25 --> Model Class Initialized
INFO - 2019-03-27 17:16:25 --> Database Driver Class Initialized
INFO - 2019-03-27 17:16:25 --> Model Class Initialized
DEBUG - 2019-03-27 17:16:25 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:16:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:16:25 --> Final output sent to browser
DEBUG - 2019-03-27 17:16:25 --> Total execution time: 0.1347
INFO - 2019-03-27 17:16:44 --> Config Class Initialized
INFO - 2019-03-27 17:16:44 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:16:44 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:16:44 --> Utf8 Class Initialized
INFO - 2019-03-27 17:16:44 --> URI Class Initialized
INFO - 2019-03-27 17:16:44 --> Router Class Initialized
INFO - 2019-03-27 17:16:44 --> Output Class Initialized
INFO - 2019-03-27 17:16:44 --> Security Class Initialized
DEBUG - 2019-03-27 17:16:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:16:44 --> CSRF cookie sent
INFO - 2019-03-27 17:16:44 --> Input Class Initialized
INFO - 2019-03-27 17:16:44 --> Language Class Initialized
INFO - 2019-03-27 17:16:44 --> Loader Class Initialized
INFO - 2019-03-27 17:16:44 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:16:44 --> Controller Class Initialized
INFO - 2019-03-27 17:16:44 --> Helper loaded: form_helper
INFO - 2019-03-27 17:16:44 --> Helper loaded: url_helper
INFO - 2019-03-27 17:16:44 --> Helper loaded: date_helper
INFO - 2019-03-27 17:16:44 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:16:44 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:16:44 --> Encrypt Class Initialized
INFO - 2019-03-27 17:16:44 --> Email Class Initialized
INFO - 2019-03-27 17:16:44 --> Model Class Initialized
INFO - 2019-03-27 17:16:44 --> Database Driver Class Initialized
INFO - 2019-03-27 17:16:44 --> Model Class Initialized
DEBUG - 2019-03-27 17:16:44 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:16:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:16:44 --> Final output sent to browser
DEBUG - 2019-03-27 17:16:44 --> Total execution time: 0.1305
INFO - 2019-03-27 17:26:29 --> Config Class Initialized
INFO - 2019-03-27 17:26:29 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:26:29 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:26:29 --> Utf8 Class Initialized
INFO - 2019-03-27 17:26:29 --> URI Class Initialized
INFO - 2019-03-27 17:26:29 --> Router Class Initialized
INFO - 2019-03-27 17:26:29 --> Output Class Initialized
INFO - 2019-03-27 17:26:29 --> Security Class Initialized
DEBUG - 2019-03-27 17:26:29 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:26:29 --> CSRF cookie sent
INFO - 2019-03-27 17:26:29 --> Input Class Initialized
INFO - 2019-03-27 17:26:29 --> Language Class Initialized
INFO - 2019-03-27 17:26:29 --> Loader Class Initialized
INFO - 2019-03-27 17:26:29 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:26:29 --> Controller Class Initialized
INFO - 2019-03-27 17:26:29 --> Helper loaded: form_helper
INFO - 2019-03-27 17:26:29 --> Helper loaded: url_helper
INFO - 2019-03-27 17:26:29 --> Helper loaded: date_helper
INFO - 2019-03-27 17:26:29 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:26:29 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:26:29 --> Encrypt Class Initialized
INFO - 2019-03-27 17:26:29 --> Email Class Initialized
INFO - 2019-03-27 17:26:29 --> Model Class Initialized
INFO - 2019-03-27 17:26:30 --> Database Driver Class Initialized
INFO - 2019-03-27 17:26:30 --> Model Class Initialized
DEBUG - 2019-03-27 17:26:30 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:26:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:26:30 --> Final output sent to browser
DEBUG - 2019-03-27 17:26:30 --> Total execution time: 0.1443
INFO - 2019-03-27 17:27:26 --> Config Class Initialized
INFO - 2019-03-27 17:27:26 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:27:26 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:27:26 --> Utf8 Class Initialized
INFO - 2019-03-27 17:27:26 --> URI Class Initialized
INFO - 2019-03-27 17:27:26 --> Router Class Initialized
INFO - 2019-03-27 17:27:26 --> Output Class Initialized
INFO - 2019-03-27 17:27:26 --> Security Class Initialized
DEBUG - 2019-03-27 17:27:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:27:26 --> CSRF cookie sent
INFO - 2019-03-27 17:27:26 --> Input Class Initialized
INFO - 2019-03-27 17:27:26 --> Language Class Initialized
INFO - 2019-03-27 17:27:26 --> Loader Class Initialized
INFO - 2019-03-27 17:27:26 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:27:26 --> Controller Class Initialized
INFO - 2019-03-27 17:27:26 --> Helper loaded: form_helper
INFO - 2019-03-27 17:27:26 --> Helper loaded: url_helper
INFO - 2019-03-27 17:27:26 --> Helper loaded: date_helper
INFO - 2019-03-27 17:27:26 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:27:26 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:27:26 --> Encrypt Class Initialized
INFO - 2019-03-27 17:27:26 --> Email Class Initialized
INFO - 2019-03-27 17:27:26 --> Model Class Initialized
INFO - 2019-03-27 17:27:26 --> Database Driver Class Initialized
INFO - 2019-03-27 17:27:26 --> Model Class Initialized
DEBUG - 2019-03-27 17:27:26 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:27:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:27:26 --> Final output sent to browser
DEBUG - 2019-03-27 17:27:26 --> Total execution time: 0.1538
INFO - 2019-03-27 17:27:55 --> Config Class Initialized
INFO - 2019-03-27 17:27:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:27:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:27:55 --> Utf8 Class Initialized
INFO - 2019-03-27 17:27:55 --> URI Class Initialized
INFO - 2019-03-27 17:27:55 --> Router Class Initialized
INFO - 2019-03-27 17:27:55 --> Output Class Initialized
INFO - 2019-03-27 17:27:55 --> Security Class Initialized
DEBUG - 2019-03-27 17:27:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:27:55 --> CSRF cookie sent
INFO - 2019-03-27 17:27:55 --> Input Class Initialized
INFO - 2019-03-27 17:27:55 --> Language Class Initialized
INFO - 2019-03-27 17:27:55 --> Loader Class Initialized
INFO - 2019-03-27 17:27:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:27:55 --> Controller Class Initialized
INFO - 2019-03-27 17:27:55 --> Helper loaded: form_helper
INFO - 2019-03-27 17:27:55 --> Helper loaded: url_helper
INFO - 2019-03-27 17:27:55 --> Helper loaded: date_helper
INFO - 2019-03-27 17:27:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:27:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:27:55 --> Encrypt Class Initialized
INFO - 2019-03-27 17:27:55 --> Email Class Initialized
INFO - 2019-03-27 17:27:55 --> Model Class Initialized
INFO - 2019-03-27 17:27:55 --> Database Driver Class Initialized
INFO - 2019-03-27 17:27:55 --> Model Class Initialized
DEBUG - 2019-03-27 17:27:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:27:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:27:55 --> Final output sent to browser
DEBUG - 2019-03-27 17:27:55 --> Total execution time: 0.1355
INFO - 2019-03-27 17:28:11 --> Config Class Initialized
INFO - 2019-03-27 17:28:11 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:28:11 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:28:11 --> Utf8 Class Initialized
INFO - 2019-03-27 17:28:11 --> URI Class Initialized
INFO - 2019-03-27 17:28:11 --> Router Class Initialized
INFO - 2019-03-27 17:28:11 --> Output Class Initialized
INFO - 2019-03-27 17:28:11 --> Security Class Initialized
DEBUG - 2019-03-27 17:28:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:28:11 --> CSRF cookie sent
INFO - 2019-03-27 17:28:11 --> Input Class Initialized
INFO - 2019-03-27 17:28:11 --> Language Class Initialized
INFO - 2019-03-27 17:28:11 --> Loader Class Initialized
INFO - 2019-03-27 17:28:11 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:28:11 --> Controller Class Initialized
INFO - 2019-03-27 17:28:11 --> Helper loaded: form_helper
INFO - 2019-03-27 17:28:11 --> Helper loaded: url_helper
INFO - 2019-03-27 17:28:11 --> Helper loaded: date_helper
INFO - 2019-03-27 17:28:11 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:28:11 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:28:11 --> Encrypt Class Initialized
INFO - 2019-03-27 17:28:11 --> Email Class Initialized
INFO - 2019-03-27 17:28:11 --> Model Class Initialized
INFO - 2019-03-27 17:28:11 --> Database Driver Class Initialized
INFO - 2019-03-27 17:28:11 --> Model Class Initialized
DEBUG - 2019-03-27 17:28:11 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:28:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:28:11 --> Final output sent to browser
DEBUG - 2019-03-27 17:28:11 --> Total execution time: 0.1568
INFO - 2019-03-27 17:29:22 --> Config Class Initialized
INFO - 2019-03-27 17:29:22 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:29:22 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:29:22 --> Utf8 Class Initialized
INFO - 2019-03-27 17:29:22 --> URI Class Initialized
INFO - 2019-03-27 17:29:22 --> Router Class Initialized
INFO - 2019-03-27 17:29:22 --> Output Class Initialized
INFO - 2019-03-27 17:29:22 --> Security Class Initialized
DEBUG - 2019-03-27 17:29:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:29:22 --> CSRF cookie sent
INFO - 2019-03-27 17:29:22 --> Input Class Initialized
INFO - 2019-03-27 17:29:22 --> Language Class Initialized
INFO - 2019-03-27 17:29:22 --> Loader Class Initialized
INFO - 2019-03-27 17:29:22 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:29:22 --> Controller Class Initialized
INFO - 2019-03-27 17:29:22 --> Helper loaded: form_helper
INFO - 2019-03-27 17:29:22 --> Helper loaded: url_helper
INFO - 2019-03-27 17:29:22 --> Helper loaded: date_helper
INFO - 2019-03-27 17:29:22 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:29:22 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:29:22 --> Encrypt Class Initialized
INFO - 2019-03-27 17:29:22 --> Email Class Initialized
INFO - 2019-03-27 17:29:22 --> Model Class Initialized
INFO - 2019-03-27 17:29:22 --> Database Driver Class Initialized
INFO - 2019-03-27 17:29:22 --> Model Class Initialized
DEBUG - 2019-03-27 17:29:22 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:29:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:29:22 --> Final output sent to browser
DEBUG - 2019-03-27 17:29:22 --> Total execution time: 0.1695
INFO - 2019-03-27 17:29:55 --> Config Class Initialized
INFO - 2019-03-27 17:29:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:29:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:29:55 --> Utf8 Class Initialized
INFO - 2019-03-27 17:29:55 --> URI Class Initialized
INFO - 2019-03-27 17:29:55 --> Router Class Initialized
INFO - 2019-03-27 17:29:55 --> Output Class Initialized
INFO - 2019-03-27 17:29:55 --> Security Class Initialized
DEBUG - 2019-03-27 17:29:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:29:55 --> CSRF cookie sent
INFO - 2019-03-27 17:29:55 --> Input Class Initialized
INFO - 2019-03-27 17:29:55 --> Language Class Initialized
INFO - 2019-03-27 17:29:55 --> Loader Class Initialized
INFO - 2019-03-27 17:29:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:29:55 --> Controller Class Initialized
INFO - 2019-03-27 17:29:55 --> Helper loaded: form_helper
INFO - 2019-03-27 17:29:55 --> Helper loaded: url_helper
INFO - 2019-03-27 17:29:55 --> Helper loaded: date_helper
INFO - 2019-03-27 17:29:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:29:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:29:55 --> Encrypt Class Initialized
INFO - 2019-03-27 17:29:55 --> Email Class Initialized
INFO - 2019-03-27 17:29:55 --> Model Class Initialized
INFO - 2019-03-27 17:29:55 --> Database Driver Class Initialized
INFO - 2019-03-27 17:29:55 --> Model Class Initialized
DEBUG - 2019-03-27 17:29:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:29:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:29:55 --> Final output sent to browser
DEBUG - 2019-03-27 17:29:55 --> Total execution time: 0.1302
INFO - 2019-03-27 17:30:14 --> Config Class Initialized
INFO - 2019-03-27 17:30:14 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:30:14 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:30:14 --> Utf8 Class Initialized
INFO - 2019-03-27 17:30:14 --> URI Class Initialized
INFO - 2019-03-27 17:30:14 --> Router Class Initialized
INFO - 2019-03-27 17:30:14 --> Output Class Initialized
INFO - 2019-03-27 17:30:14 --> Security Class Initialized
DEBUG - 2019-03-27 17:30:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:30:14 --> CSRF cookie sent
INFO - 2019-03-27 17:30:14 --> Input Class Initialized
INFO - 2019-03-27 17:30:14 --> Language Class Initialized
INFO - 2019-03-27 17:30:14 --> Loader Class Initialized
INFO - 2019-03-27 17:30:14 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:30:14 --> Controller Class Initialized
INFO - 2019-03-27 17:30:14 --> Helper loaded: form_helper
INFO - 2019-03-27 17:30:14 --> Helper loaded: url_helper
INFO - 2019-03-27 17:30:14 --> Helper loaded: date_helper
INFO - 2019-03-27 17:30:14 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:30:14 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:30:14 --> Encrypt Class Initialized
INFO - 2019-03-27 17:30:14 --> Email Class Initialized
INFO - 2019-03-27 17:30:14 --> Model Class Initialized
INFO - 2019-03-27 17:30:14 --> Database Driver Class Initialized
INFO - 2019-03-27 17:30:14 --> Model Class Initialized
DEBUG - 2019-03-27 17:30:14 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:30:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:30:14 --> Final output sent to browser
DEBUG - 2019-03-27 17:30:14 --> Total execution time: 0.1646
INFO - 2019-03-27 17:30:30 --> Config Class Initialized
INFO - 2019-03-27 17:30:30 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:30:30 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:30:30 --> Utf8 Class Initialized
INFO - 2019-03-27 17:30:30 --> URI Class Initialized
INFO - 2019-03-27 17:30:30 --> Router Class Initialized
INFO - 2019-03-27 17:30:30 --> Output Class Initialized
INFO - 2019-03-27 17:30:30 --> Security Class Initialized
DEBUG - 2019-03-27 17:30:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:30:30 --> CSRF cookie sent
INFO - 2019-03-27 17:30:30 --> Input Class Initialized
INFO - 2019-03-27 17:30:30 --> Language Class Initialized
INFO - 2019-03-27 17:30:30 --> Loader Class Initialized
INFO - 2019-03-27 17:30:30 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:30:30 --> Controller Class Initialized
INFO - 2019-03-27 17:30:30 --> Helper loaded: form_helper
INFO - 2019-03-27 17:30:30 --> Helper loaded: url_helper
INFO - 2019-03-27 17:30:30 --> Helper loaded: date_helper
INFO - 2019-03-27 17:30:30 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:30:30 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:30:30 --> Encrypt Class Initialized
INFO - 2019-03-27 17:30:30 --> Email Class Initialized
INFO - 2019-03-27 17:30:30 --> Model Class Initialized
INFO - 2019-03-27 17:30:30 --> Database Driver Class Initialized
INFO - 2019-03-27 17:30:30 --> Model Class Initialized
DEBUG - 2019-03-27 17:30:30 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:30:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:30:30 --> Final output sent to browser
DEBUG - 2019-03-27 17:30:30 --> Total execution time: 0.1385
INFO - 2019-03-27 17:30:48 --> Config Class Initialized
INFO - 2019-03-27 17:30:48 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:30:48 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:30:48 --> Utf8 Class Initialized
INFO - 2019-03-27 17:30:48 --> URI Class Initialized
INFO - 2019-03-27 17:30:48 --> Router Class Initialized
INFO - 2019-03-27 17:30:48 --> Output Class Initialized
INFO - 2019-03-27 17:30:48 --> Security Class Initialized
DEBUG - 2019-03-27 17:30:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:30:48 --> CSRF cookie sent
INFO - 2019-03-27 17:30:48 --> Input Class Initialized
INFO - 2019-03-27 17:30:48 --> Language Class Initialized
INFO - 2019-03-27 17:30:48 --> Loader Class Initialized
INFO - 2019-03-27 17:30:48 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:30:48 --> Controller Class Initialized
INFO - 2019-03-27 17:30:48 --> Helper loaded: form_helper
INFO - 2019-03-27 17:30:48 --> Helper loaded: url_helper
INFO - 2019-03-27 17:30:48 --> Helper loaded: date_helper
INFO - 2019-03-27 17:30:48 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:30:48 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:30:48 --> Encrypt Class Initialized
INFO - 2019-03-27 17:30:48 --> Email Class Initialized
INFO - 2019-03-27 17:30:48 --> Model Class Initialized
INFO - 2019-03-27 17:30:48 --> Database Driver Class Initialized
INFO - 2019-03-27 17:30:48 --> Model Class Initialized
DEBUG - 2019-03-27 17:30:48 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:30:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:30:48 --> Final output sent to browser
DEBUG - 2019-03-27 17:30:48 --> Total execution time: 0.1704
INFO - 2019-03-27 17:32:09 --> Config Class Initialized
INFO - 2019-03-27 17:32:09 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:32:09 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:32:09 --> Utf8 Class Initialized
INFO - 2019-03-27 17:32:09 --> URI Class Initialized
INFO - 2019-03-27 17:32:09 --> Router Class Initialized
INFO - 2019-03-27 17:32:09 --> Output Class Initialized
INFO - 2019-03-27 17:32:09 --> Security Class Initialized
DEBUG - 2019-03-27 17:32:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:32:09 --> CSRF cookie sent
INFO - 2019-03-27 17:32:09 --> Input Class Initialized
INFO - 2019-03-27 17:32:09 --> Language Class Initialized
INFO - 2019-03-27 17:32:09 --> Loader Class Initialized
INFO - 2019-03-27 17:32:09 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:32:09 --> Controller Class Initialized
INFO - 2019-03-27 17:32:09 --> Helper loaded: form_helper
INFO - 2019-03-27 17:32:09 --> Helper loaded: url_helper
INFO - 2019-03-27 17:32:09 --> Helper loaded: date_helper
INFO - 2019-03-27 17:32:09 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:32:09 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:32:09 --> Encrypt Class Initialized
INFO - 2019-03-27 17:32:09 --> Email Class Initialized
INFO - 2019-03-27 17:32:09 --> Model Class Initialized
INFO - 2019-03-27 17:32:09 --> Database Driver Class Initialized
INFO - 2019-03-27 17:32:09 --> Model Class Initialized
DEBUG - 2019-03-27 17:32:09 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:32:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:32:09 --> Final output sent to browser
DEBUG - 2019-03-27 17:32:09 --> Total execution time: 0.1450
INFO - 2019-03-27 17:34:45 --> Config Class Initialized
INFO - 2019-03-27 17:34:45 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:34:45 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:34:45 --> Utf8 Class Initialized
INFO - 2019-03-27 17:34:45 --> URI Class Initialized
INFO - 2019-03-27 17:34:45 --> Router Class Initialized
INFO - 2019-03-27 17:34:45 --> Output Class Initialized
INFO - 2019-03-27 17:34:45 --> Security Class Initialized
DEBUG - 2019-03-27 17:34:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:34:45 --> CSRF cookie sent
INFO - 2019-03-27 17:34:45 --> Input Class Initialized
INFO - 2019-03-27 17:34:45 --> Language Class Initialized
INFO - 2019-03-27 17:34:45 --> Loader Class Initialized
INFO - 2019-03-27 17:34:45 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:34:45 --> Controller Class Initialized
INFO - 2019-03-27 17:34:45 --> Helper loaded: form_helper
INFO - 2019-03-27 17:34:45 --> Helper loaded: url_helper
INFO - 2019-03-27 17:34:45 --> Helper loaded: date_helper
INFO - 2019-03-27 17:34:45 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:34:45 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:34:45 --> Encrypt Class Initialized
INFO - 2019-03-27 17:34:45 --> Email Class Initialized
INFO - 2019-03-27 17:34:45 --> Model Class Initialized
INFO - 2019-03-27 17:34:45 --> Database Driver Class Initialized
INFO - 2019-03-27 17:34:45 --> Model Class Initialized
DEBUG - 2019-03-27 17:34:45 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:34:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:34:45 --> Final output sent to browser
DEBUG - 2019-03-27 17:34:45 --> Total execution time: 0.1359
INFO - 2019-03-27 17:35:02 --> Config Class Initialized
INFO - 2019-03-27 17:35:02 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:35:02 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:35:02 --> Utf8 Class Initialized
INFO - 2019-03-27 17:35:02 --> URI Class Initialized
INFO - 2019-03-27 17:35:02 --> Router Class Initialized
INFO - 2019-03-27 17:35:02 --> Output Class Initialized
INFO - 2019-03-27 17:35:02 --> Security Class Initialized
DEBUG - 2019-03-27 17:35:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:35:02 --> CSRF cookie sent
INFO - 2019-03-27 17:35:02 --> Input Class Initialized
INFO - 2019-03-27 17:35:02 --> Language Class Initialized
INFO - 2019-03-27 17:35:02 --> Loader Class Initialized
INFO - 2019-03-27 17:35:02 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:35:02 --> Controller Class Initialized
INFO - 2019-03-27 17:35:02 --> Helper loaded: form_helper
INFO - 2019-03-27 17:35:02 --> Helper loaded: url_helper
INFO - 2019-03-27 17:35:02 --> Helper loaded: date_helper
INFO - 2019-03-27 17:35:02 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:35:02 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:35:02 --> Encrypt Class Initialized
INFO - 2019-03-27 17:35:02 --> Email Class Initialized
INFO - 2019-03-27 17:35:02 --> Model Class Initialized
INFO - 2019-03-27 17:35:02 --> Database Driver Class Initialized
INFO - 2019-03-27 17:35:02 --> Model Class Initialized
DEBUG - 2019-03-27 17:35:02 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:35:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:35:02 --> Final output sent to browser
DEBUG - 2019-03-27 17:35:02 --> Total execution time: 0.1386
INFO - 2019-03-27 17:35:33 --> Config Class Initialized
INFO - 2019-03-27 17:35:33 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:35:33 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:35:33 --> Utf8 Class Initialized
INFO - 2019-03-27 17:35:33 --> URI Class Initialized
INFO - 2019-03-27 17:35:33 --> Router Class Initialized
INFO - 2019-03-27 17:35:33 --> Output Class Initialized
INFO - 2019-03-27 17:35:33 --> Security Class Initialized
DEBUG - 2019-03-27 17:35:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:35:33 --> CSRF cookie sent
INFO - 2019-03-27 17:35:33 --> Input Class Initialized
INFO - 2019-03-27 17:35:33 --> Language Class Initialized
INFO - 2019-03-27 17:35:33 --> Loader Class Initialized
INFO - 2019-03-27 17:35:33 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:35:33 --> Controller Class Initialized
INFO - 2019-03-27 17:35:33 --> Helper loaded: form_helper
INFO - 2019-03-27 17:35:33 --> Helper loaded: url_helper
INFO - 2019-03-27 17:35:33 --> Helper loaded: date_helper
INFO - 2019-03-27 17:35:33 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:35:33 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:35:33 --> Encrypt Class Initialized
INFO - 2019-03-27 17:35:33 --> Email Class Initialized
INFO - 2019-03-27 17:35:33 --> Model Class Initialized
INFO - 2019-03-27 17:35:33 --> Database Driver Class Initialized
INFO - 2019-03-27 17:35:33 --> Model Class Initialized
DEBUG - 2019-03-27 17:35:33 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:35:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:35:33 --> Final output sent to browser
DEBUG - 2019-03-27 17:35:33 --> Total execution time: 0.1396
INFO - 2019-03-27 17:35:48 --> Config Class Initialized
INFO - 2019-03-27 17:35:48 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:35:48 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:35:48 --> Utf8 Class Initialized
INFO - 2019-03-27 17:35:48 --> URI Class Initialized
INFO - 2019-03-27 17:35:48 --> Router Class Initialized
INFO - 2019-03-27 17:35:48 --> Output Class Initialized
INFO - 2019-03-27 17:35:48 --> Security Class Initialized
DEBUG - 2019-03-27 17:35:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:35:48 --> CSRF cookie sent
INFO - 2019-03-27 17:35:48 --> Input Class Initialized
INFO - 2019-03-27 17:35:48 --> Language Class Initialized
INFO - 2019-03-27 17:35:48 --> Loader Class Initialized
INFO - 2019-03-27 17:35:48 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:35:48 --> Controller Class Initialized
INFO - 2019-03-27 17:35:48 --> Helper loaded: form_helper
INFO - 2019-03-27 17:35:48 --> Helper loaded: url_helper
INFO - 2019-03-27 17:35:48 --> Helper loaded: date_helper
INFO - 2019-03-27 17:35:48 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:35:48 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:35:48 --> Encrypt Class Initialized
INFO - 2019-03-27 17:35:48 --> Email Class Initialized
INFO - 2019-03-27 17:35:48 --> Model Class Initialized
INFO - 2019-03-27 17:35:48 --> Database Driver Class Initialized
INFO - 2019-03-27 17:35:48 --> Model Class Initialized
DEBUG - 2019-03-27 17:35:48 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:35:48 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:35:48 --> Final output sent to browser
DEBUG - 2019-03-27 17:35:48 --> Total execution time: 0.1517
INFO - 2019-03-27 17:37:08 --> Config Class Initialized
INFO - 2019-03-27 17:37:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:37:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:37:08 --> Utf8 Class Initialized
INFO - 2019-03-27 17:37:08 --> URI Class Initialized
INFO - 2019-03-27 17:37:08 --> Router Class Initialized
INFO - 2019-03-27 17:37:08 --> Output Class Initialized
INFO - 2019-03-27 17:37:08 --> Security Class Initialized
DEBUG - 2019-03-27 17:37:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:37:08 --> CSRF cookie sent
INFO - 2019-03-27 17:37:08 --> Input Class Initialized
INFO - 2019-03-27 17:37:08 --> Language Class Initialized
INFO - 2019-03-27 17:37:08 --> Loader Class Initialized
INFO - 2019-03-27 17:37:08 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:37:08 --> Controller Class Initialized
INFO - 2019-03-27 17:37:08 --> Helper loaded: form_helper
INFO - 2019-03-27 17:37:08 --> Helper loaded: url_helper
INFO - 2019-03-27 17:37:08 --> Helper loaded: date_helper
INFO - 2019-03-27 17:37:08 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:37:08 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:37:08 --> Encrypt Class Initialized
INFO - 2019-03-27 17:37:08 --> Email Class Initialized
INFO - 2019-03-27 17:37:08 --> Model Class Initialized
INFO - 2019-03-27 17:37:08 --> Database Driver Class Initialized
INFO - 2019-03-27 17:37:08 --> Model Class Initialized
DEBUG - 2019-03-27 17:37:08 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:37:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:37:08 --> Final output sent to browser
DEBUG - 2019-03-27 17:37:08 --> Total execution time: 0.1491
INFO - 2019-03-27 17:37:19 --> Config Class Initialized
INFO - 2019-03-27 17:37:19 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:37:19 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:37:19 --> Utf8 Class Initialized
INFO - 2019-03-27 17:37:19 --> URI Class Initialized
INFO - 2019-03-27 17:37:19 --> Router Class Initialized
INFO - 2019-03-27 17:37:19 --> Output Class Initialized
INFO - 2019-03-27 17:37:19 --> Security Class Initialized
DEBUG - 2019-03-27 17:37:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:37:19 --> CSRF cookie sent
INFO - 2019-03-27 17:37:19 --> Input Class Initialized
INFO - 2019-03-27 17:37:19 --> Language Class Initialized
INFO - 2019-03-27 17:37:19 --> Loader Class Initialized
INFO - 2019-03-27 17:37:19 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:37:19 --> Controller Class Initialized
INFO - 2019-03-27 17:37:19 --> Helper loaded: form_helper
INFO - 2019-03-27 17:37:19 --> Helper loaded: url_helper
INFO - 2019-03-27 17:37:19 --> Helper loaded: date_helper
INFO - 2019-03-27 17:37:19 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:37:19 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:37:19 --> Encrypt Class Initialized
INFO - 2019-03-27 17:37:19 --> Email Class Initialized
INFO - 2019-03-27 17:37:19 --> Model Class Initialized
INFO - 2019-03-27 17:37:19 --> Database Driver Class Initialized
INFO - 2019-03-27 17:37:19 --> Model Class Initialized
DEBUG - 2019-03-27 17:37:19 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:37:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:37:19 --> Final output sent to browser
DEBUG - 2019-03-27 17:37:19 --> Total execution time: 0.1479
INFO - 2019-03-27 17:38:07 --> Config Class Initialized
INFO - 2019-03-27 17:38:07 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:38:07 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:38:07 --> Utf8 Class Initialized
INFO - 2019-03-27 17:38:07 --> URI Class Initialized
INFO - 2019-03-27 17:38:07 --> Router Class Initialized
INFO - 2019-03-27 17:38:07 --> Output Class Initialized
INFO - 2019-03-27 17:38:07 --> Security Class Initialized
DEBUG - 2019-03-27 17:38:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:38:07 --> CSRF cookie sent
INFO - 2019-03-27 17:38:07 --> Input Class Initialized
INFO - 2019-03-27 17:38:07 --> Language Class Initialized
INFO - 2019-03-27 17:38:07 --> Loader Class Initialized
INFO - 2019-03-27 17:38:07 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:38:07 --> Controller Class Initialized
INFO - 2019-03-27 17:38:07 --> Helper loaded: form_helper
INFO - 2019-03-27 17:38:07 --> Helper loaded: url_helper
INFO - 2019-03-27 17:38:07 --> Helper loaded: date_helper
INFO - 2019-03-27 17:38:07 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:38:07 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:38:07 --> Encrypt Class Initialized
INFO - 2019-03-27 17:38:07 --> Email Class Initialized
INFO - 2019-03-27 17:38:07 --> Model Class Initialized
INFO - 2019-03-27 17:38:07 --> Database Driver Class Initialized
INFO - 2019-03-27 17:38:07 --> Model Class Initialized
DEBUG - 2019-03-27 17:38:07 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:38:07 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:38:07 --> Final output sent to browser
DEBUG - 2019-03-27 17:38:07 --> Total execution time: 0.1383
INFO - 2019-03-27 17:38:17 --> Config Class Initialized
INFO - 2019-03-27 17:38:17 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:38:17 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:38:17 --> Utf8 Class Initialized
INFO - 2019-03-27 17:38:17 --> URI Class Initialized
INFO - 2019-03-27 17:38:17 --> Router Class Initialized
INFO - 2019-03-27 17:38:17 --> Output Class Initialized
INFO - 2019-03-27 17:38:17 --> Security Class Initialized
DEBUG - 2019-03-27 17:38:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:38:17 --> CSRF cookie sent
INFO - 2019-03-27 17:38:17 --> Input Class Initialized
INFO - 2019-03-27 17:38:17 --> Language Class Initialized
INFO - 2019-03-27 17:38:17 --> Loader Class Initialized
INFO - 2019-03-27 17:38:17 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:38:17 --> Controller Class Initialized
INFO - 2019-03-27 17:38:17 --> Helper loaded: form_helper
INFO - 2019-03-27 17:38:17 --> Helper loaded: url_helper
INFO - 2019-03-27 17:38:17 --> Helper loaded: date_helper
INFO - 2019-03-27 17:38:17 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:38:17 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:38:17 --> Encrypt Class Initialized
INFO - 2019-03-27 17:38:17 --> Email Class Initialized
INFO - 2019-03-27 17:38:17 --> Model Class Initialized
INFO - 2019-03-27 17:38:17 --> Database Driver Class Initialized
INFO - 2019-03-27 17:38:17 --> Model Class Initialized
DEBUG - 2019-03-27 17:38:17 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:38:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:38:17 --> Final output sent to browser
DEBUG - 2019-03-27 17:38:17 --> Total execution time: 0.1412
INFO - 2019-03-27 17:38:26 --> Config Class Initialized
INFO - 2019-03-27 17:38:26 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:38:26 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:38:26 --> Utf8 Class Initialized
INFO - 2019-03-27 17:38:26 --> URI Class Initialized
INFO - 2019-03-27 17:38:26 --> Router Class Initialized
INFO - 2019-03-27 17:38:26 --> Output Class Initialized
INFO - 2019-03-27 17:38:26 --> Security Class Initialized
DEBUG - 2019-03-27 17:38:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:38:26 --> CSRF cookie sent
INFO - 2019-03-27 17:38:26 --> Input Class Initialized
INFO - 2019-03-27 17:38:26 --> Language Class Initialized
INFO - 2019-03-27 17:38:26 --> Loader Class Initialized
INFO - 2019-03-27 17:38:26 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:38:26 --> Controller Class Initialized
INFO - 2019-03-27 17:38:26 --> Helper loaded: form_helper
INFO - 2019-03-27 17:38:26 --> Helper loaded: url_helper
INFO - 2019-03-27 17:38:26 --> Helper loaded: date_helper
INFO - 2019-03-27 17:38:26 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:38:26 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:38:26 --> Encrypt Class Initialized
INFO - 2019-03-27 17:38:26 --> Email Class Initialized
INFO - 2019-03-27 17:38:26 --> Model Class Initialized
INFO - 2019-03-27 17:38:26 --> Database Driver Class Initialized
INFO - 2019-03-27 17:38:26 --> Model Class Initialized
DEBUG - 2019-03-27 17:38:26 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:38:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:38:26 --> Final output sent to browser
DEBUG - 2019-03-27 17:38:26 --> Total execution time: 0.1186
INFO - 2019-03-27 17:39:51 --> Config Class Initialized
INFO - 2019-03-27 17:39:51 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:39:51 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:39:51 --> Utf8 Class Initialized
INFO - 2019-03-27 17:39:51 --> URI Class Initialized
INFO - 2019-03-27 17:39:51 --> Router Class Initialized
INFO - 2019-03-27 17:39:51 --> Output Class Initialized
INFO - 2019-03-27 17:39:51 --> Security Class Initialized
DEBUG - 2019-03-27 17:39:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:39:51 --> CSRF cookie sent
INFO - 2019-03-27 17:39:51 --> Input Class Initialized
INFO - 2019-03-27 17:39:51 --> Language Class Initialized
INFO - 2019-03-27 17:39:51 --> Loader Class Initialized
INFO - 2019-03-27 17:39:51 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:39:51 --> Controller Class Initialized
INFO - 2019-03-27 17:39:51 --> Helper loaded: form_helper
INFO - 2019-03-27 17:39:51 --> Helper loaded: url_helper
INFO - 2019-03-27 17:39:51 --> Helper loaded: date_helper
INFO - 2019-03-27 17:39:51 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:39:51 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:39:51 --> Encrypt Class Initialized
INFO - 2019-03-27 17:39:51 --> Email Class Initialized
INFO - 2019-03-27 17:39:51 --> Model Class Initialized
INFO - 2019-03-27 17:39:51 --> Database Driver Class Initialized
INFO - 2019-03-27 17:39:51 --> Model Class Initialized
DEBUG - 2019-03-27 17:39:51 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:39:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:39:51 --> Final output sent to browser
DEBUG - 2019-03-27 17:39:51 --> Total execution time: 0.1315
INFO - 2019-03-27 17:40:03 --> Config Class Initialized
INFO - 2019-03-27 17:40:03 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:40:03 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:40:03 --> Utf8 Class Initialized
INFO - 2019-03-27 17:40:03 --> URI Class Initialized
INFO - 2019-03-27 17:40:03 --> Router Class Initialized
INFO - 2019-03-27 17:40:03 --> Output Class Initialized
INFO - 2019-03-27 17:40:03 --> Security Class Initialized
DEBUG - 2019-03-27 17:40:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:40:03 --> CSRF cookie sent
INFO - 2019-03-27 17:40:03 --> Input Class Initialized
INFO - 2019-03-27 17:40:03 --> Language Class Initialized
INFO - 2019-03-27 17:40:03 --> Loader Class Initialized
INFO - 2019-03-27 17:40:03 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:40:03 --> Controller Class Initialized
INFO - 2019-03-27 17:40:03 --> Helper loaded: form_helper
INFO - 2019-03-27 17:40:03 --> Helper loaded: url_helper
INFO - 2019-03-27 17:40:03 --> Helper loaded: date_helper
INFO - 2019-03-27 17:40:03 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:40:03 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:40:03 --> Encrypt Class Initialized
INFO - 2019-03-27 17:40:03 --> Email Class Initialized
INFO - 2019-03-27 17:40:03 --> Model Class Initialized
INFO - 2019-03-27 17:40:03 --> Database Driver Class Initialized
INFO - 2019-03-27 17:40:03 --> Model Class Initialized
DEBUG - 2019-03-27 17:40:03 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:40:03 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:40:03 --> Final output sent to browser
DEBUG - 2019-03-27 17:40:03 --> Total execution time: 0.1300
INFO - 2019-03-27 17:41:33 --> Config Class Initialized
INFO - 2019-03-27 17:41:33 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:41:33 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:41:33 --> Utf8 Class Initialized
INFO - 2019-03-27 17:41:33 --> URI Class Initialized
INFO - 2019-03-27 17:41:33 --> Router Class Initialized
INFO - 2019-03-27 17:41:33 --> Output Class Initialized
INFO - 2019-03-27 17:41:33 --> Security Class Initialized
DEBUG - 2019-03-27 17:41:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:41:33 --> CSRF cookie sent
INFO - 2019-03-27 17:41:33 --> Input Class Initialized
INFO - 2019-03-27 17:41:33 --> Language Class Initialized
INFO - 2019-03-27 17:41:33 --> Loader Class Initialized
INFO - 2019-03-27 17:41:33 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:41:33 --> Controller Class Initialized
INFO - 2019-03-27 17:41:33 --> Helper loaded: form_helper
INFO - 2019-03-27 17:41:33 --> Helper loaded: url_helper
INFO - 2019-03-27 17:41:33 --> Helper loaded: date_helper
INFO - 2019-03-27 17:41:33 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:41:33 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:41:33 --> Encrypt Class Initialized
INFO - 2019-03-27 17:41:33 --> Email Class Initialized
INFO - 2019-03-27 17:41:33 --> Model Class Initialized
INFO - 2019-03-27 17:41:33 --> Database Driver Class Initialized
INFO - 2019-03-27 17:41:33 --> Model Class Initialized
DEBUG - 2019-03-27 17:41:33 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:41:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:41:33 --> Final output sent to browser
DEBUG - 2019-03-27 17:41:33 --> Total execution time: 0.1228
INFO - 2019-03-27 17:41:42 --> Config Class Initialized
INFO - 2019-03-27 17:41:42 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:41:42 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:41:42 --> Utf8 Class Initialized
INFO - 2019-03-27 17:41:42 --> URI Class Initialized
INFO - 2019-03-27 17:41:42 --> Router Class Initialized
INFO - 2019-03-27 17:41:42 --> Output Class Initialized
INFO - 2019-03-27 17:41:42 --> Security Class Initialized
DEBUG - 2019-03-27 17:41:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:41:42 --> CSRF cookie sent
INFO - 2019-03-27 17:41:42 --> Input Class Initialized
INFO - 2019-03-27 17:41:42 --> Language Class Initialized
INFO - 2019-03-27 17:41:42 --> Loader Class Initialized
INFO - 2019-03-27 17:41:42 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:41:42 --> Controller Class Initialized
INFO - 2019-03-27 17:41:42 --> Helper loaded: form_helper
INFO - 2019-03-27 17:41:42 --> Helper loaded: url_helper
INFO - 2019-03-27 17:41:42 --> Helper loaded: date_helper
INFO - 2019-03-27 17:41:42 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:41:42 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:41:42 --> Encrypt Class Initialized
INFO - 2019-03-27 17:41:42 --> Email Class Initialized
INFO - 2019-03-27 17:41:42 --> Model Class Initialized
INFO - 2019-03-27 17:41:42 --> Database Driver Class Initialized
INFO - 2019-03-27 17:41:42 --> Model Class Initialized
DEBUG - 2019-03-27 17:41:42 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:41:42 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:41:42 --> Final output sent to browser
DEBUG - 2019-03-27 17:41:42 --> Total execution time: 0.1115
INFO - 2019-03-27 17:41:52 --> Config Class Initialized
INFO - 2019-03-27 17:41:52 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:41:52 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:41:52 --> Utf8 Class Initialized
INFO - 2019-03-27 17:41:52 --> URI Class Initialized
INFO - 2019-03-27 17:41:52 --> Router Class Initialized
INFO - 2019-03-27 17:41:52 --> Output Class Initialized
INFO - 2019-03-27 17:41:52 --> Security Class Initialized
DEBUG - 2019-03-27 17:41:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:41:52 --> CSRF cookie sent
INFO - 2019-03-27 17:41:52 --> Input Class Initialized
INFO - 2019-03-27 17:41:52 --> Language Class Initialized
INFO - 2019-03-27 17:41:52 --> Loader Class Initialized
INFO - 2019-03-27 17:41:52 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:41:52 --> Controller Class Initialized
INFO - 2019-03-27 17:41:52 --> Helper loaded: form_helper
INFO - 2019-03-27 17:41:52 --> Helper loaded: url_helper
INFO - 2019-03-27 17:41:52 --> Helper loaded: date_helper
INFO - 2019-03-27 17:41:52 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:41:52 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:41:52 --> Encrypt Class Initialized
INFO - 2019-03-27 17:41:52 --> Email Class Initialized
INFO - 2019-03-27 17:41:52 --> Model Class Initialized
INFO - 2019-03-27 17:41:52 --> Database Driver Class Initialized
INFO - 2019-03-27 17:41:52 --> Model Class Initialized
DEBUG - 2019-03-27 17:41:52 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:41:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:41:52 --> Final output sent to browser
DEBUG - 2019-03-27 17:41:52 --> Total execution time: 0.1296
INFO - 2019-03-27 17:42:23 --> Config Class Initialized
INFO - 2019-03-27 17:42:23 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:42:23 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:42:23 --> Utf8 Class Initialized
INFO - 2019-03-27 17:42:23 --> URI Class Initialized
INFO - 2019-03-27 17:42:23 --> Router Class Initialized
INFO - 2019-03-27 17:42:23 --> Output Class Initialized
INFO - 2019-03-27 17:42:23 --> Security Class Initialized
DEBUG - 2019-03-27 17:42:23 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:42:23 --> CSRF cookie sent
INFO - 2019-03-27 17:42:23 --> Input Class Initialized
INFO - 2019-03-27 17:42:23 --> Language Class Initialized
INFO - 2019-03-27 17:42:23 --> Loader Class Initialized
INFO - 2019-03-27 17:42:23 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:42:23 --> Controller Class Initialized
INFO - 2019-03-27 17:42:23 --> Helper loaded: form_helper
INFO - 2019-03-27 17:42:23 --> Helper loaded: url_helper
INFO - 2019-03-27 17:42:23 --> Helper loaded: date_helper
INFO - 2019-03-27 17:42:23 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:42:23 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:42:23 --> Encrypt Class Initialized
INFO - 2019-03-27 17:42:23 --> Email Class Initialized
INFO - 2019-03-27 17:42:23 --> Model Class Initialized
INFO - 2019-03-27 17:42:23 --> Database Driver Class Initialized
INFO - 2019-03-27 17:42:23 --> Model Class Initialized
DEBUG - 2019-03-27 17:42:23 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:42:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:42:23 --> Final output sent to browser
DEBUG - 2019-03-27 17:42:23 --> Total execution time: 0.1508
INFO - 2019-03-27 17:43:08 --> Config Class Initialized
INFO - 2019-03-27 17:43:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:43:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:43:08 --> Utf8 Class Initialized
INFO - 2019-03-27 17:43:08 --> URI Class Initialized
INFO - 2019-03-27 17:43:08 --> Router Class Initialized
INFO - 2019-03-27 17:43:08 --> Output Class Initialized
INFO - 2019-03-27 17:43:08 --> Security Class Initialized
DEBUG - 2019-03-27 17:43:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:43:08 --> CSRF cookie sent
INFO - 2019-03-27 17:43:08 --> Input Class Initialized
INFO - 2019-03-27 17:43:08 --> Language Class Initialized
INFO - 2019-03-27 17:43:08 --> Loader Class Initialized
INFO - 2019-03-27 17:43:08 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:43:08 --> Controller Class Initialized
INFO - 2019-03-27 17:43:08 --> Helper loaded: form_helper
INFO - 2019-03-27 17:43:08 --> Helper loaded: url_helper
INFO - 2019-03-27 17:43:08 --> Helper loaded: date_helper
INFO - 2019-03-27 17:43:08 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:43:08 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:43:08 --> Encrypt Class Initialized
INFO - 2019-03-27 17:43:08 --> Email Class Initialized
INFO - 2019-03-27 17:43:08 --> Model Class Initialized
INFO - 2019-03-27 17:43:08 --> Database Driver Class Initialized
INFO - 2019-03-27 17:43:08 --> Model Class Initialized
DEBUG - 2019-03-27 17:43:08 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:43:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:43:08 --> Final output sent to browser
DEBUG - 2019-03-27 17:43:08 --> Total execution time: 0.1677
INFO - 2019-03-27 17:43:08 --> Config Class Initialized
INFO - 2019-03-27 17:43:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:43:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:43:08 --> Utf8 Class Initialized
INFO - 2019-03-27 17:43:08 --> URI Class Initialized
INFO - 2019-03-27 17:43:08 --> Router Class Initialized
INFO - 2019-03-27 17:43:08 --> Output Class Initialized
INFO - 2019-03-27 17:43:08 --> Security Class Initialized
DEBUG - 2019-03-27 17:43:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:43:08 --> CSRF cookie sent
INFO - 2019-03-27 17:43:08 --> Input Class Initialized
INFO - 2019-03-27 17:43:08 --> Language Class Initialized
ERROR - 2019-03-27 17:43:08 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' C:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-03-27 17:43:08 --> Final output sent to browser
DEBUG - 2019-03-27 17:43:08 --> Total execution time: 0.0870
INFO - 2019-03-27 17:43:27 --> Config Class Initialized
INFO - 2019-03-27 17:43:27 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:43:27 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:43:27 --> Utf8 Class Initialized
INFO - 2019-03-27 17:43:27 --> URI Class Initialized
INFO - 2019-03-27 17:43:27 --> Router Class Initialized
INFO - 2019-03-27 17:43:27 --> Output Class Initialized
INFO - 2019-03-27 17:43:27 --> Security Class Initialized
DEBUG - 2019-03-27 17:43:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:43:27 --> CSRF cookie sent
INFO - 2019-03-27 17:43:27 --> Input Class Initialized
INFO - 2019-03-27 17:43:27 --> Language Class Initialized
INFO - 2019-03-27 17:43:27 --> Loader Class Initialized
INFO - 2019-03-27 17:43:27 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:43:27 --> Controller Class Initialized
INFO - 2019-03-27 17:43:27 --> Helper loaded: form_helper
INFO - 2019-03-27 17:43:27 --> Helper loaded: url_helper
INFO - 2019-03-27 17:43:27 --> Helper loaded: date_helper
INFO - 2019-03-27 17:43:27 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:43:27 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:43:27 --> Encrypt Class Initialized
INFO - 2019-03-27 17:43:27 --> Email Class Initialized
INFO - 2019-03-27 17:43:27 --> Model Class Initialized
INFO - 2019-03-27 17:43:27 --> Database Driver Class Initialized
INFO - 2019-03-27 17:43:27 --> Model Class Initialized
DEBUG - 2019-03-27 17:43:27 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:43:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:43:27 --> Final output sent to browser
DEBUG - 2019-03-27 17:43:27 --> Total execution time: 0.1437
INFO - 2019-03-27 17:45:17 --> Config Class Initialized
INFO - 2019-03-27 17:45:17 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:45:17 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:45:17 --> Utf8 Class Initialized
INFO - 2019-03-27 17:45:17 --> URI Class Initialized
INFO - 2019-03-27 17:45:17 --> Router Class Initialized
INFO - 2019-03-27 17:45:17 --> Output Class Initialized
INFO - 2019-03-27 17:45:17 --> Security Class Initialized
DEBUG - 2019-03-27 17:45:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:45:17 --> CSRF cookie sent
INFO - 2019-03-27 17:45:17 --> Input Class Initialized
INFO - 2019-03-27 17:45:17 --> Language Class Initialized
INFO - 2019-03-27 17:45:17 --> Loader Class Initialized
INFO - 2019-03-27 17:45:17 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:45:17 --> Controller Class Initialized
INFO - 2019-03-27 17:45:17 --> Helper loaded: form_helper
INFO - 2019-03-27 17:45:17 --> Helper loaded: url_helper
INFO - 2019-03-27 17:45:17 --> Helper loaded: date_helper
INFO - 2019-03-27 17:45:17 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:45:17 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:45:17 --> Encrypt Class Initialized
INFO - 2019-03-27 17:45:17 --> Email Class Initialized
INFO - 2019-03-27 17:45:17 --> Model Class Initialized
INFO - 2019-03-27 17:45:17 --> Database Driver Class Initialized
INFO - 2019-03-27 17:45:17 --> Model Class Initialized
DEBUG - 2019-03-27 17:45:17 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:45:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:45:17 --> Final output sent to browser
DEBUG - 2019-03-27 17:45:17 --> Total execution time: 0.1254
INFO - 2019-03-27 17:46:32 --> Config Class Initialized
INFO - 2019-03-27 17:46:32 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:46:32 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:46:32 --> Utf8 Class Initialized
INFO - 2019-03-27 17:46:32 --> URI Class Initialized
INFO - 2019-03-27 17:46:32 --> Router Class Initialized
INFO - 2019-03-27 17:46:32 --> Output Class Initialized
INFO - 2019-03-27 17:46:32 --> Security Class Initialized
DEBUG - 2019-03-27 17:46:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:46:32 --> CSRF cookie sent
INFO - 2019-03-27 17:46:32 --> Input Class Initialized
INFO - 2019-03-27 17:46:32 --> Language Class Initialized
INFO - 2019-03-27 17:46:32 --> Loader Class Initialized
INFO - 2019-03-27 17:46:32 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:46:32 --> Controller Class Initialized
INFO - 2019-03-27 17:46:32 --> Helper loaded: form_helper
INFO - 2019-03-27 17:46:32 --> Helper loaded: url_helper
INFO - 2019-03-27 17:46:32 --> Helper loaded: date_helper
INFO - 2019-03-27 17:46:32 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:46:32 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:46:32 --> Encrypt Class Initialized
INFO - 2019-03-27 17:46:32 --> Email Class Initialized
INFO - 2019-03-27 17:46:32 --> Model Class Initialized
INFO - 2019-03-27 17:46:32 --> Database Driver Class Initialized
INFO - 2019-03-27 17:46:32 --> Model Class Initialized
DEBUG - 2019-03-27 17:46:32 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:46:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:46:32 --> Final output sent to browser
DEBUG - 2019-03-27 17:46:32 --> Total execution time: 0.1552
INFO - 2019-03-27 17:47:41 --> Config Class Initialized
INFO - 2019-03-27 17:47:41 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:47:41 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:47:41 --> Utf8 Class Initialized
INFO - 2019-03-27 17:47:41 --> URI Class Initialized
INFO - 2019-03-27 17:47:41 --> Router Class Initialized
INFO - 2019-03-27 17:47:41 --> Output Class Initialized
INFO - 2019-03-27 17:47:41 --> Security Class Initialized
DEBUG - 2019-03-27 17:47:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:47:41 --> CSRF cookie sent
INFO - 2019-03-27 17:47:41 --> Input Class Initialized
INFO - 2019-03-27 17:47:41 --> Language Class Initialized
INFO - 2019-03-27 17:47:41 --> Loader Class Initialized
INFO - 2019-03-27 17:47:41 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:47:41 --> Controller Class Initialized
INFO - 2019-03-27 17:47:41 --> Helper loaded: form_helper
INFO - 2019-03-27 17:47:41 --> Helper loaded: url_helper
INFO - 2019-03-27 17:47:41 --> Helper loaded: date_helper
INFO - 2019-03-27 17:47:41 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:47:41 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:47:41 --> Encrypt Class Initialized
INFO - 2019-03-27 17:47:41 --> Email Class Initialized
INFO - 2019-03-27 17:47:41 --> Model Class Initialized
INFO - 2019-03-27 17:47:41 --> Database Driver Class Initialized
INFO - 2019-03-27 17:47:41 --> Model Class Initialized
DEBUG - 2019-03-27 17:47:41 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:47:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:47:41 --> Final output sent to browser
DEBUG - 2019-03-27 17:47:41 --> Total execution time: 0.1421
INFO - 2019-03-27 17:47:49 --> Config Class Initialized
INFO - 2019-03-27 17:47:49 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:47:49 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:47:49 --> Utf8 Class Initialized
INFO - 2019-03-27 17:47:49 --> URI Class Initialized
INFO - 2019-03-27 17:47:49 --> Router Class Initialized
INFO - 2019-03-27 17:47:49 --> Output Class Initialized
INFO - 2019-03-27 17:47:49 --> Security Class Initialized
DEBUG - 2019-03-27 17:47:49 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:47:49 --> CSRF cookie sent
INFO - 2019-03-27 17:47:49 --> Input Class Initialized
INFO - 2019-03-27 17:47:49 --> Language Class Initialized
INFO - 2019-03-27 17:47:49 --> Loader Class Initialized
INFO - 2019-03-27 17:47:49 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:47:49 --> Controller Class Initialized
INFO - 2019-03-27 17:47:49 --> Helper loaded: form_helper
INFO - 2019-03-27 17:47:49 --> Helper loaded: url_helper
INFO - 2019-03-27 17:47:49 --> Helper loaded: date_helper
INFO - 2019-03-27 17:47:49 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:47:49 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:47:49 --> Encrypt Class Initialized
INFO - 2019-03-27 17:47:49 --> Email Class Initialized
INFO - 2019-03-27 17:47:49 --> Model Class Initialized
INFO - 2019-03-27 17:47:49 --> Database Driver Class Initialized
INFO - 2019-03-27 17:47:49 --> Model Class Initialized
DEBUG - 2019-03-27 17:47:49 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:47:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:47:49 --> Final output sent to browser
DEBUG - 2019-03-27 17:47:49 --> Total execution time: 0.1691
INFO - 2019-03-27 17:48:14 --> Config Class Initialized
INFO - 2019-03-27 17:48:14 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:48:14 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:48:14 --> Utf8 Class Initialized
INFO - 2019-03-27 17:48:14 --> URI Class Initialized
INFO - 2019-03-27 17:48:14 --> Router Class Initialized
INFO - 2019-03-27 17:48:14 --> Output Class Initialized
INFO - 2019-03-27 17:48:14 --> Security Class Initialized
DEBUG - 2019-03-27 17:48:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:48:14 --> CSRF cookie sent
INFO - 2019-03-27 17:48:14 --> Input Class Initialized
INFO - 2019-03-27 17:48:14 --> Language Class Initialized
INFO - 2019-03-27 17:48:14 --> Loader Class Initialized
INFO - 2019-03-27 17:48:14 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:48:14 --> Controller Class Initialized
INFO - 2019-03-27 17:48:14 --> Helper loaded: form_helper
INFO - 2019-03-27 17:48:14 --> Helper loaded: url_helper
INFO - 2019-03-27 17:48:14 --> Helper loaded: date_helper
INFO - 2019-03-27 17:48:14 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:48:14 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:48:14 --> Encrypt Class Initialized
INFO - 2019-03-27 17:48:14 --> Email Class Initialized
INFO - 2019-03-27 17:48:14 --> Model Class Initialized
INFO - 2019-03-27 17:48:14 --> Database Driver Class Initialized
INFO - 2019-03-27 17:48:14 --> Model Class Initialized
DEBUG - 2019-03-27 17:48:14 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:48:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:48:14 --> Final output sent to browser
DEBUG - 2019-03-27 17:48:14 --> Total execution time: 0.1600
INFO - 2019-03-27 17:54:55 --> Config Class Initialized
INFO - 2019-03-27 17:54:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:54:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:54:55 --> Utf8 Class Initialized
INFO - 2019-03-27 17:54:55 --> URI Class Initialized
INFO - 2019-03-27 17:54:55 --> Router Class Initialized
INFO - 2019-03-27 17:54:55 --> Output Class Initialized
INFO - 2019-03-27 17:54:55 --> Security Class Initialized
DEBUG - 2019-03-27 17:54:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:54:55 --> CSRF cookie sent
INFO - 2019-03-27 17:54:55 --> Input Class Initialized
INFO - 2019-03-27 17:54:55 --> Language Class Initialized
INFO - 2019-03-27 17:54:55 --> Loader Class Initialized
INFO - 2019-03-27 17:54:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:54:55 --> Controller Class Initialized
INFO - 2019-03-27 17:54:55 --> Helper loaded: form_helper
INFO - 2019-03-27 17:54:55 --> Helper loaded: url_helper
INFO - 2019-03-27 17:54:55 --> Helper loaded: date_helper
INFO - 2019-03-27 17:54:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:54:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:54:55 --> Encrypt Class Initialized
INFO - 2019-03-27 17:54:55 --> Email Class Initialized
INFO - 2019-03-27 17:54:55 --> Model Class Initialized
INFO - 2019-03-27 17:54:55 --> Database Driver Class Initialized
INFO - 2019-03-27 17:54:55 --> Model Class Initialized
DEBUG - 2019-03-27 17:54:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:54:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:54:55 --> Final output sent to browser
DEBUG - 2019-03-27 17:54:55 --> Total execution time: 0.1416
INFO - 2019-03-27 17:55:12 --> Config Class Initialized
INFO - 2019-03-27 17:55:12 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:55:12 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:55:12 --> Utf8 Class Initialized
INFO - 2019-03-27 17:55:12 --> URI Class Initialized
INFO - 2019-03-27 17:55:12 --> Router Class Initialized
INFO - 2019-03-27 17:55:12 --> Output Class Initialized
INFO - 2019-03-27 17:55:12 --> Security Class Initialized
DEBUG - 2019-03-27 17:55:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:55:12 --> CSRF cookie sent
INFO - 2019-03-27 17:55:12 --> Input Class Initialized
INFO - 2019-03-27 17:55:12 --> Language Class Initialized
INFO - 2019-03-27 17:55:12 --> Loader Class Initialized
INFO - 2019-03-27 17:55:12 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:55:12 --> Controller Class Initialized
INFO - 2019-03-27 17:55:12 --> Helper loaded: form_helper
INFO - 2019-03-27 17:55:12 --> Helper loaded: url_helper
INFO - 2019-03-27 17:55:12 --> Helper loaded: date_helper
INFO - 2019-03-27 17:55:12 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:55:12 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:55:12 --> Encrypt Class Initialized
INFO - 2019-03-27 17:55:12 --> Email Class Initialized
INFO - 2019-03-27 17:55:12 --> Model Class Initialized
INFO - 2019-03-27 17:55:12 --> Database Driver Class Initialized
INFO - 2019-03-27 17:55:13 --> Model Class Initialized
DEBUG - 2019-03-27 17:55:13 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:55:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:55:13 --> Final output sent to browser
DEBUG - 2019-03-27 17:55:13 --> Total execution time: 0.1452
INFO - 2019-03-27 17:55:23 --> Config Class Initialized
INFO - 2019-03-27 17:55:23 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:55:23 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:55:23 --> Utf8 Class Initialized
INFO - 2019-03-27 17:55:23 --> URI Class Initialized
INFO - 2019-03-27 17:55:23 --> Router Class Initialized
INFO - 2019-03-27 17:55:23 --> Output Class Initialized
INFO - 2019-03-27 17:55:23 --> Security Class Initialized
DEBUG - 2019-03-27 17:55:23 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:55:23 --> CSRF cookie sent
INFO - 2019-03-27 17:55:23 --> Input Class Initialized
INFO - 2019-03-27 17:55:23 --> Language Class Initialized
INFO - 2019-03-27 17:55:23 --> Loader Class Initialized
INFO - 2019-03-27 17:55:23 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:55:23 --> Controller Class Initialized
INFO - 2019-03-27 17:55:23 --> Helper loaded: form_helper
INFO - 2019-03-27 17:55:23 --> Helper loaded: url_helper
INFO - 2019-03-27 17:55:23 --> Helper loaded: date_helper
INFO - 2019-03-27 17:55:23 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:55:23 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:55:23 --> Encrypt Class Initialized
INFO - 2019-03-27 17:55:23 --> Email Class Initialized
INFO - 2019-03-27 17:55:23 --> Model Class Initialized
INFO - 2019-03-27 17:55:23 --> Database Driver Class Initialized
INFO - 2019-03-27 17:55:23 --> Model Class Initialized
DEBUG - 2019-03-27 17:55:23 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:55:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:55:23 --> Final output sent to browser
DEBUG - 2019-03-27 17:55:23 --> Total execution time: 0.1663
INFO - 2019-03-27 17:55:32 --> Config Class Initialized
INFO - 2019-03-27 17:55:32 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:55:32 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:55:32 --> Utf8 Class Initialized
INFO - 2019-03-27 17:55:32 --> URI Class Initialized
INFO - 2019-03-27 17:55:32 --> Router Class Initialized
INFO - 2019-03-27 17:55:32 --> Output Class Initialized
INFO - 2019-03-27 17:55:32 --> Security Class Initialized
DEBUG - 2019-03-27 17:55:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:55:32 --> CSRF cookie sent
INFO - 2019-03-27 17:55:32 --> Input Class Initialized
INFO - 2019-03-27 17:55:32 --> Language Class Initialized
INFO - 2019-03-27 17:55:32 --> Loader Class Initialized
INFO - 2019-03-27 17:55:32 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:55:32 --> Controller Class Initialized
INFO - 2019-03-27 17:55:32 --> Helper loaded: form_helper
INFO - 2019-03-27 17:55:32 --> Helper loaded: url_helper
INFO - 2019-03-27 17:55:32 --> Helper loaded: date_helper
INFO - 2019-03-27 17:55:32 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:55:32 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:55:32 --> Encrypt Class Initialized
INFO - 2019-03-27 17:55:32 --> Email Class Initialized
INFO - 2019-03-27 17:55:32 --> Model Class Initialized
INFO - 2019-03-27 17:55:32 --> Database Driver Class Initialized
INFO - 2019-03-27 17:55:32 --> Model Class Initialized
DEBUG - 2019-03-27 17:55:32 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:55:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:55:32 --> Final output sent to browser
DEBUG - 2019-03-27 17:55:32 --> Total execution time: 0.2145
INFO - 2019-03-27 17:55:57 --> Config Class Initialized
INFO - 2019-03-27 17:55:57 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:55:57 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:55:57 --> Utf8 Class Initialized
INFO - 2019-03-27 17:55:57 --> URI Class Initialized
INFO - 2019-03-27 17:55:57 --> Router Class Initialized
INFO - 2019-03-27 17:55:57 --> Output Class Initialized
INFO - 2019-03-27 17:55:57 --> Security Class Initialized
DEBUG - 2019-03-27 17:55:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:55:57 --> CSRF cookie sent
INFO - 2019-03-27 17:55:57 --> Input Class Initialized
INFO - 2019-03-27 17:55:57 --> Language Class Initialized
INFO - 2019-03-27 17:55:57 --> Loader Class Initialized
INFO - 2019-03-27 17:55:57 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:55:57 --> Controller Class Initialized
INFO - 2019-03-27 17:55:57 --> Helper loaded: form_helper
INFO - 2019-03-27 17:55:57 --> Helper loaded: url_helper
INFO - 2019-03-27 17:55:57 --> Helper loaded: date_helper
INFO - 2019-03-27 17:55:57 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:55:57 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:55:57 --> Encrypt Class Initialized
INFO - 2019-03-27 17:55:57 --> Email Class Initialized
INFO - 2019-03-27 17:55:57 --> Model Class Initialized
INFO - 2019-03-27 17:55:57 --> Database Driver Class Initialized
INFO - 2019-03-27 17:55:57 --> Model Class Initialized
DEBUG - 2019-03-27 17:55:57 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:55:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:55:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:55:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:55:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:55:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:55:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:55:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:55:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:55:58 --> Final output sent to browser
DEBUG - 2019-03-27 17:55:58 --> Total execution time: 0.1177
INFO - 2019-03-27 17:56:45 --> Config Class Initialized
INFO - 2019-03-27 17:56:45 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:56:45 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:56:45 --> Utf8 Class Initialized
INFO - 2019-03-27 17:56:45 --> URI Class Initialized
INFO - 2019-03-27 17:56:45 --> Router Class Initialized
INFO - 2019-03-27 17:56:45 --> Output Class Initialized
INFO - 2019-03-27 17:56:45 --> Security Class Initialized
DEBUG - 2019-03-27 17:56:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:56:45 --> CSRF cookie sent
INFO - 2019-03-27 17:56:45 --> Input Class Initialized
INFO - 2019-03-27 17:56:45 --> Language Class Initialized
INFO - 2019-03-27 17:56:45 --> Loader Class Initialized
INFO - 2019-03-27 17:56:45 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:56:45 --> Controller Class Initialized
INFO - 2019-03-27 17:56:45 --> Helper loaded: form_helper
INFO - 2019-03-27 17:56:45 --> Helper loaded: url_helper
INFO - 2019-03-27 17:56:45 --> Helper loaded: date_helper
INFO - 2019-03-27 17:56:45 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:56:45 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:56:45 --> Encrypt Class Initialized
INFO - 2019-03-27 17:56:45 --> Email Class Initialized
INFO - 2019-03-27 17:56:45 --> Model Class Initialized
INFO - 2019-03-27 17:56:45 --> Database Driver Class Initialized
INFO - 2019-03-27 17:56:45 --> Model Class Initialized
DEBUG - 2019-03-27 17:56:45 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:56:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:56:45 --> Final output sent to browser
DEBUG - 2019-03-27 17:56:45 --> Total execution time: 0.1259
INFO - 2019-03-27 17:57:03 --> Config Class Initialized
INFO - 2019-03-27 17:57:03 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:57:03 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:57:03 --> Utf8 Class Initialized
INFO - 2019-03-27 17:57:03 --> URI Class Initialized
INFO - 2019-03-27 17:57:03 --> Router Class Initialized
INFO - 2019-03-27 17:57:03 --> Output Class Initialized
INFO - 2019-03-27 17:57:03 --> Security Class Initialized
DEBUG - 2019-03-27 17:57:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:57:03 --> CSRF cookie sent
INFO - 2019-03-27 17:57:03 --> Input Class Initialized
INFO - 2019-03-27 17:57:03 --> Language Class Initialized
INFO - 2019-03-27 17:57:03 --> Loader Class Initialized
INFO - 2019-03-27 17:57:03 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:57:03 --> Controller Class Initialized
INFO - 2019-03-27 17:57:03 --> Helper loaded: form_helper
INFO - 2019-03-27 17:57:03 --> Helper loaded: url_helper
INFO - 2019-03-27 17:57:03 --> Helper loaded: date_helper
INFO - 2019-03-27 17:57:03 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:57:03 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:57:03 --> Encrypt Class Initialized
INFO - 2019-03-27 17:57:03 --> Email Class Initialized
INFO - 2019-03-27 17:57:03 --> Model Class Initialized
INFO - 2019-03-27 17:57:03 --> Database Driver Class Initialized
INFO - 2019-03-27 17:57:03 --> Model Class Initialized
DEBUG - 2019-03-27 17:57:03 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:57:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:57:04 --> Final output sent to browser
DEBUG - 2019-03-27 17:57:04 --> Total execution time: 0.2532
INFO - 2019-03-27 17:57:19 --> Config Class Initialized
INFO - 2019-03-27 17:57:19 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:57:19 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:57:19 --> Utf8 Class Initialized
INFO - 2019-03-27 17:57:19 --> URI Class Initialized
INFO - 2019-03-27 17:57:19 --> Router Class Initialized
INFO - 2019-03-27 17:57:19 --> Output Class Initialized
INFO - 2019-03-27 17:57:19 --> Security Class Initialized
DEBUG - 2019-03-27 17:57:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:57:19 --> CSRF cookie sent
INFO - 2019-03-27 17:57:19 --> Input Class Initialized
INFO - 2019-03-27 17:57:19 --> Language Class Initialized
INFO - 2019-03-27 17:57:19 --> Loader Class Initialized
INFO - 2019-03-27 17:57:19 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:57:19 --> Controller Class Initialized
INFO - 2019-03-27 17:57:19 --> Helper loaded: form_helper
INFO - 2019-03-27 17:57:19 --> Helper loaded: url_helper
INFO - 2019-03-27 17:57:19 --> Helper loaded: date_helper
INFO - 2019-03-27 17:57:19 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:57:19 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:57:19 --> Encrypt Class Initialized
INFO - 2019-03-27 17:57:19 --> Email Class Initialized
INFO - 2019-03-27 17:57:19 --> Model Class Initialized
INFO - 2019-03-27 17:57:19 --> Database Driver Class Initialized
INFO - 2019-03-27 17:57:19 --> Model Class Initialized
DEBUG - 2019-03-27 17:57:19 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:57:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:57:19 --> Final output sent to browser
DEBUG - 2019-03-27 17:57:19 --> Total execution time: 0.1161
INFO - 2019-03-27 17:57:38 --> Config Class Initialized
INFO - 2019-03-27 17:57:38 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:57:38 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:57:38 --> Utf8 Class Initialized
INFO - 2019-03-27 17:57:38 --> URI Class Initialized
INFO - 2019-03-27 17:57:38 --> Router Class Initialized
INFO - 2019-03-27 17:57:38 --> Output Class Initialized
INFO - 2019-03-27 17:57:38 --> Security Class Initialized
DEBUG - 2019-03-27 17:57:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:57:38 --> CSRF cookie sent
INFO - 2019-03-27 17:57:38 --> Input Class Initialized
INFO - 2019-03-27 17:57:38 --> Language Class Initialized
INFO - 2019-03-27 17:57:38 --> Loader Class Initialized
INFO - 2019-03-27 17:57:38 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:57:38 --> Controller Class Initialized
INFO - 2019-03-27 17:57:38 --> Helper loaded: form_helper
INFO - 2019-03-27 17:57:38 --> Helper loaded: url_helper
INFO - 2019-03-27 17:57:38 --> Helper loaded: date_helper
INFO - 2019-03-27 17:57:38 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:57:38 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:57:38 --> Encrypt Class Initialized
INFO - 2019-03-27 17:57:38 --> Email Class Initialized
INFO - 2019-03-27 17:57:38 --> Model Class Initialized
INFO - 2019-03-27 17:57:38 --> Database Driver Class Initialized
INFO - 2019-03-27 17:57:38 --> Model Class Initialized
DEBUG - 2019-03-27 17:57:38 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:57:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:57:38 --> Final output sent to browser
DEBUG - 2019-03-27 17:57:38 --> Total execution time: 0.1340
INFO - 2019-03-27 17:59:32 --> Config Class Initialized
INFO - 2019-03-27 17:59:32 --> Hooks Class Initialized
DEBUG - 2019-03-27 17:59:32 --> UTF-8 Support Enabled
INFO - 2019-03-27 17:59:32 --> Utf8 Class Initialized
INFO - 2019-03-27 17:59:32 --> URI Class Initialized
INFO - 2019-03-27 17:59:32 --> Router Class Initialized
INFO - 2019-03-27 17:59:32 --> Output Class Initialized
INFO - 2019-03-27 17:59:32 --> Security Class Initialized
DEBUG - 2019-03-27 17:59:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 17:59:32 --> CSRF cookie sent
INFO - 2019-03-27 17:59:32 --> Input Class Initialized
INFO - 2019-03-27 17:59:32 --> Language Class Initialized
INFO - 2019-03-27 17:59:32 --> Loader Class Initialized
INFO - 2019-03-27 17:59:32 --> Helper loaded: cache_helper
INFO - 2019-03-27 17:59:32 --> Controller Class Initialized
INFO - 2019-03-27 17:59:32 --> Helper loaded: form_helper
INFO - 2019-03-27 17:59:32 --> Helper loaded: url_helper
INFO - 2019-03-27 17:59:32 --> Helper loaded: date_helper
INFO - 2019-03-27 17:59:32 --> Helper loaded: notification_helper
INFO - 2019-03-27 17:59:32 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 17:59:32 --> Encrypt Class Initialized
INFO - 2019-03-27 17:59:32 --> Email Class Initialized
INFO - 2019-03-27 17:59:32 --> Model Class Initialized
INFO - 2019-03-27 17:59:32 --> Database Driver Class Initialized
INFO - 2019-03-27 17:59:32 --> Model Class Initialized
DEBUG - 2019-03-27 17:59:32 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 17:59:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 17:59:32 --> Final output sent to browser
DEBUG - 2019-03-27 17:59:32 --> Total execution time: 0.1418
INFO - 2019-03-27 18:00:40 --> Config Class Initialized
INFO - 2019-03-27 18:00:40 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:00:40 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:00:40 --> Utf8 Class Initialized
INFO - 2019-03-27 18:00:40 --> URI Class Initialized
INFO - 2019-03-27 18:00:40 --> Router Class Initialized
INFO - 2019-03-27 18:00:40 --> Output Class Initialized
INFO - 2019-03-27 18:00:40 --> Security Class Initialized
DEBUG - 2019-03-27 18:00:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:00:40 --> CSRF cookie sent
INFO - 2019-03-27 18:00:40 --> Input Class Initialized
INFO - 2019-03-27 18:00:40 --> Language Class Initialized
INFO - 2019-03-27 18:00:40 --> Loader Class Initialized
INFO - 2019-03-27 18:00:40 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:00:40 --> Controller Class Initialized
INFO - 2019-03-27 18:00:40 --> Helper loaded: form_helper
INFO - 2019-03-27 18:00:40 --> Helper loaded: url_helper
INFO - 2019-03-27 18:00:40 --> Helper loaded: date_helper
INFO - 2019-03-27 18:00:40 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:00:40 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:00:40 --> Encrypt Class Initialized
INFO - 2019-03-27 18:00:40 --> Email Class Initialized
INFO - 2019-03-27 18:00:40 --> Model Class Initialized
INFO - 2019-03-27 18:00:40 --> Database Driver Class Initialized
INFO - 2019-03-27 18:00:40 --> Model Class Initialized
DEBUG - 2019-03-27 18:00:40 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:00:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:00:40 --> Final output sent to browser
DEBUG - 2019-03-27 18:00:40 --> Total execution time: 0.1289
INFO - 2019-03-27 18:11:08 --> Config Class Initialized
INFO - 2019-03-27 18:11:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:11:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:11:08 --> Utf8 Class Initialized
INFO - 2019-03-27 18:11:08 --> URI Class Initialized
INFO - 2019-03-27 18:11:08 --> Router Class Initialized
INFO - 2019-03-27 18:11:08 --> Output Class Initialized
INFO - 2019-03-27 18:11:08 --> Security Class Initialized
DEBUG - 2019-03-27 18:11:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:11:08 --> CSRF cookie sent
INFO - 2019-03-27 18:11:08 --> Input Class Initialized
INFO - 2019-03-27 18:11:08 --> Language Class Initialized
INFO - 2019-03-27 18:11:08 --> Loader Class Initialized
INFO - 2019-03-27 18:11:08 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:11:08 --> Controller Class Initialized
INFO - 2019-03-27 18:11:08 --> Helper loaded: form_helper
INFO - 2019-03-27 18:11:08 --> Helper loaded: url_helper
INFO - 2019-03-27 18:11:08 --> Helper loaded: date_helper
INFO - 2019-03-27 18:11:08 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:11:08 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:11:08 --> Encrypt Class Initialized
INFO - 2019-03-27 18:11:08 --> Email Class Initialized
INFO - 2019-03-27 18:11:08 --> Model Class Initialized
INFO - 2019-03-27 18:11:08 --> Database Driver Class Initialized
INFO - 2019-03-27 18:11:08 --> Model Class Initialized
DEBUG - 2019-03-27 18:11:08 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:11:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:11:08 --> Final output sent to browser
DEBUG - 2019-03-27 18:11:08 --> Total execution time: 1.0256
INFO - 2019-03-27 18:11:34 --> Config Class Initialized
INFO - 2019-03-27 18:11:34 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:11:34 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:11:34 --> Utf8 Class Initialized
INFO - 2019-03-27 18:11:34 --> URI Class Initialized
INFO - 2019-03-27 18:11:34 --> Router Class Initialized
INFO - 2019-03-27 18:11:34 --> Output Class Initialized
INFO - 2019-03-27 18:11:34 --> Security Class Initialized
DEBUG - 2019-03-27 18:11:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:11:34 --> CSRF cookie sent
INFO - 2019-03-27 18:11:34 --> Input Class Initialized
INFO - 2019-03-27 18:11:34 --> Language Class Initialized
INFO - 2019-03-27 18:11:34 --> Loader Class Initialized
INFO - 2019-03-27 18:11:34 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:11:34 --> Controller Class Initialized
INFO - 2019-03-27 18:11:34 --> Helper loaded: form_helper
INFO - 2019-03-27 18:11:34 --> Helper loaded: url_helper
INFO - 2019-03-27 18:11:35 --> Helper loaded: date_helper
INFO - 2019-03-27 18:11:35 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:11:35 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:11:35 --> Encrypt Class Initialized
INFO - 2019-03-27 18:11:35 --> Email Class Initialized
INFO - 2019-03-27 18:11:35 --> Model Class Initialized
INFO - 2019-03-27 18:11:35 --> Database Driver Class Initialized
INFO - 2019-03-27 18:11:35 --> Model Class Initialized
DEBUG - 2019-03-27 18:11:35 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:11:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:11:35 --> Final output sent to browser
DEBUG - 2019-03-27 18:11:35 --> Total execution time: 0.1171
INFO - 2019-03-27 18:12:21 --> Config Class Initialized
INFO - 2019-03-27 18:12:21 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:12:21 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:12:21 --> Utf8 Class Initialized
INFO - 2019-03-27 18:12:21 --> URI Class Initialized
INFO - 2019-03-27 18:12:21 --> Router Class Initialized
INFO - 2019-03-27 18:12:21 --> Output Class Initialized
INFO - 2019-03-27 18:12:21 --> Security Class Initialized
DEBUG - 2019-03-27 18:12:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:12:21 --> CSRF cookie sent
INFO - 2019-03-27 18:12:21 --> Input Class Initialized
INFO - 2019-03-27 18:12:21 --> Language Class Initialized
INFO - 2019-03-27 18:12:21 --> Loader Class Initialized
INFO - 2019-03-27 18:12:21 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:12:21 --> Controller Class Initialized
INFO - 2019-03-27 18:12:21 --> Helper loaded: form_helper
INFO - 2019-03-27 18:12:21 --> Helper loaded: url_helper
INFO - 2019-03-27 18:12:21 --> Helper loaded: date_helper
INFO - 2019-03-27 18:12:21 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:12:21 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:12:21 --> Encrypt Class Initialized
INFO - 2019-03-27 18:12:21 --> Email Class Initialized
INFO - 2019-03-27 18:12:21 --> Model Class Initialized
INFO - 2019-03-27 18:12:21 --> Database Driver Class Initialized
INFO - 2019-03-27 18:12:21 --> Model Class Initialized
DEBUG - 2019-03-27 18:12:21 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:12:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:12:21 --> Final output sent to browser
DEBUG - 2019-03-27 18:12:21 --> Total execution time: 0.1401
INFO - 2019-03-27 18:12:36 --> Config Class Initialized
INFO - 2019-03-27 18:12:36 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:12:36 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:12:36 --> Utf8 Class Initialized
INFO - 2019-03-27 18:12:36 --> URI Class Initialized
INFO - 2019-03-27 18:12:36 --> Router Class Initialized
INFO - 2019-03-27 18:12:36 --> Output Class Initialized
INFO - 2019-03-27 18:12:36 --> Security Class Initialized
DEBUG - 2019-03-27 18:12:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:12:36 --> CSRF cookie sent
INFO - 2019-03-27 18:12:36 --> Input Class Initialized
INFO - 2019-03-27 18:12:36 --> Language Class Initialized
INFO - 2019-03-27 18:12:36 --> Loader Class Initialized
INFO - 2019-03-27 18:12:36 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:12:36 --> Controller Class Initialized
INFO - 2019-03-27 18:12:36 --> Helper loaded: form_helper
INFO - 2019-03-27 18:12:36 --> Helper loaded: url_helper
INFO - 2019-03-27 18:12:36 --> Helper loaded: date_helper
INFO - 2019-03-27 18:12:36 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:12:36 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:12:36 --> Encrypt Class Initialized
INFO - 2019-03-27 18:12:36 --> Email Class Initialized
INFO - 2019-03-27 18:12:36 --> Model Class Initialized
INFO - 2019-03-27 18:12:36 --> Database Driver Class Initialized
INFO - 2019-03-27 18:12:36 --> Model Class Initialized
DEBUG - 2019-03-27 18:12:36 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:12:36 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:12:37 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:12:37 --> Final output sent to browser
DEBUG - 2019-03-27 18:12:37 --> Total execution time: 0.1359
INFO - 2019-03-27 18:13:33 --> Config Class Initialized
INFO - 2019-03-27 18:13:33 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:13:33 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:13:33 --> Utf8 Class Initialized
INFO - 2019-03-27 18:13:33 --> URI Class Initialized
INFO - 2019-03-27 18:13:33 --> Router Class Initialized
INFO - 2019-03-27 18:13:33 --> Output Class Initialized
INFO - 2019-03-27 18:13:33 --> Security Class Initialized
DEBUG - 2019-03-27 18:13:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:13:33 --> CSRF cookie sent
INFO - 2019-03-27 18:13:33 --> Input Class Initialized
INFO - 2019-03-27 18:13:33 --> Language Class Initialized
INFO - 2019-03-27 18:13:33 --> Loader Class Initialized
INFO - 2019-03-27 18:13:33 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:13:33 --> Controller Class Initialized
INFO - 2019-03-27 18:13:33 --> Helper loaded: form_helper
INFO - 2019-03-27 18:13:33 --> Helper loaded: url_helper
INFO - 2019-03-27 18:13:33 --> Helper loaded: date_helper
INFO - 2019-03-27 18:13:33 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:13:33 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:13:33 --> Encrypt Class Initialized
INFO - 2019-03-27 18:13:33 --> Email Class Initialized
INFO - 2019-03-27 18:13:33 --> Model Class Initialized
INFO - 2019-03-27 18:13:33 --> Database Driver Class Initialized
INFO - 2019-03-27 18:13:33 --> Model Class Initialized
DEBUG - 2019-03-27 18:13:33 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:13:33 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:13:33 --> Final output sent to browser
DEBUG - 2019-03-27 18:13:33 --> Total execution time: 0.1174
INFO - 2019-03-27 18:15:00 --> Config Class Initialized
INFO - 2019-03-27 18:15:00 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:15:00 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:15:00 --> Utf8 Class Initialized
INFO - 2019-03-27 18:15:00 --> URI Class Initialized
INFO - 2019-03-27 18:15:00 --> Router Class Initialized
INFO - 2019-03-27 18:15:00 --> Output Class Initialized
INFO - 2019-03-27 18:15:00 --> Security Class Initialized
DEBUG - 2019-03-27 18:15:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:15:00 --> CSRF cookie sent
INFO - 2019-03-27 18:15:00 --> Input Class Initialized
INFO - 2019-03-27 18:15:00 --> Language Class Initialized
INFO - 2019-03-27 18:15:00 --> Loader Class Initialized
INFO - 2019-03-27 18:15:00 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:15:00 --> Controller Class Initialized
INFO - 2019-03-27 18:15:00 --> Helper loaded: form_helper
INFO - 2019-03-27 18:15:00 --> Helper loaded: url_helper
INFO - 2019-03-27 18:15:00 --> Helper loaded: date_helper
INFO - 2019-03-27 18:15:00 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:15:00 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:15:00 --> Encrypt Class Initialized
INFO - 2019-03-27 18:15:00 --> Email Class Initialized
INFO - 2019-03-27 18:15:00 --> Model Class Initialized
INFO - 2019-03-27 18:15:00 --> Database Driver Class Initialized
INFO - 2019-03-27 18:15:00 --> Model Class Initialized
DEBUG - 2019-03-27 18:15:00 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:15:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:15:00 --> Final output sent to browser
DEBUG - 2019-03-27 18:15:00 --> Total execution time: 0.1009
INFO - 2019-03-27 18:15:40 --> Config Class Initialized
INFO - 2019-03-27 18:15:40 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:15:40 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:15:40 --> Utf8 Class Initialized
INFO - 2019-03-27 18:15:40 --> URI Class Initialized
DEBUG - 2019-03-27 18:15:41 --> No URI present. Default controller set.
INFO - 2019-03-27 18:15:41 --> Router Class Initialized
INFO - 2019-03-27 18:15:41 --> Output Class Initialized
INFO - 2019-03-27 18:15:41 --> Security Class Initialized
DEBUG - 2019-03-27 18:15:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:15:41 --> CSRF cookie sent
INFO - 2019-03-27 18:15:41 --> Input Class Initialized
INFO - 2019-03-27 18:15:41 --> Language Class Initialized
INFO - 2019-03-27 18:15:41 --> Loader Class Initialized
INFO - 2019-03-27 18:15:41 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:15:41 --> Controller Class Initialized
INFO - 2019-03-27 18:15:41 --> Helper loaded: form_helper
INFO - 2019-03-27 18:15:41 --> Helper loaded: url_helper
INFO - 2019-03-27 18:15:41 --> Helper loaded: date_helper
INFO - 2019-03-27 18:15:41 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:15:41 --> Encrypt Class Initialized
INFO - 2019-03-27 18:15:41 --> Model Class Initialized
INFO - 2019-03-27 18:15:41 --> Database Driver Class Initialized
INFO - 2019-03-27 18:15:41 --> Model Class Initialized
ERROR - 2019-03-27 18:15:41 --> Unable to delete cache file for 
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public_home.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:15:41 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:15:41 --> Final output sent to browser
DEBUG - 2019-03-27 18:15:41 --> Total execution time: 0.6035
INFO - 2019-03-27 18:15:47 --> Config Class Initialized
INFO - 2019-03-27 18:15:47 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:15:47 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:15:47 --> Utf8 Class Initialized
INFO - 2019-03-27 18:15:47 --> URI Class Initialized
INFO - 2019-03-27 18:15:47 --> Router Class Initialized
INFO - 2019-03-27 18:15:47 --> Output Class Initialized
INFO - 2019-03-27 18:15:47 --> Security Class Initialized
DEBUG - 2019-03-27 18:15:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:15:47 --> CSRF cookie sent
INFO - 2019-03-27 18:15:47 --> Input Class Initialized
INFO - 2019-03-27 18:15:47 --> Language Class Initialized
INFO - 2019-03-27 18:15:47 --> Loader Class Initialized
INFO - 2019-03-27 18:15:47 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:15:47 --> Controller Class Initialized
INFO - 2019-03-27 18:15:47 --> Helper loaded: form_helper
INFO - 2019-03-27 18:15:47 --> Helper loaded: url_helper
INFO - 2019-03-27 18:15:47 --> Helper loaded: date_helper
INFO - 2019-03-27 18:15:47 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:15:47 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:15:47 --> Encrypt Class Initialized
INFO - 2019-03-27 18:15:47 --> Email Class Initialized
INFO - 2019-03-27 18:15:47 --> Model Class Initialized
INFO - 2019-03-27 18:15:47 --> Database Driver Class Initialized
INFO - 2019-03-27 18:15:47 --> Model Class Initialized
DEBUG - 2019-03-27 18:15:47 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/bond_view.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:15:47 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:15:47 --> Final output sent to browser
DEBUG - 2019-03-27 18:15:47 --> Total execution time: 0.3314
INFO - 2019-03-27 18:16:26 --> Config Class Initialized
INFO - 2019-03-27 18:16:26 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:16:26 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:16:26 --> Utf8 Class Initialized
INFO - 2019-03-27 18:16:26 --> URI Class Initialized
INFO - 2019-03-27 18:16:26 --> Router Class Initialized
INFO - 2019-03-27 18:16:26 --> Output Class Initialized
INFO - 2019-03-27 18:16:26 --> Security Class Initialized
DEBUG - 2019-03-27 18:16:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:16:26 --> CSRF cookie sent
INFO - 2019-03-27 18:16:26 --> Input Class Initialized
INFO - 2019-03-27 18:16:26 --> Language Class Initialized
INFO - 2019-03-27 18:16:26 --> Loader Class Initialized
INFO - 2019-03-27 18:16:26 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:16:26 --> Controller Class Initialized
INFO - 2019-03-27 18:16:26 --> Helper loaded: form_helper
INFO - 2019-03-27 18:16:26 --> Helper loaded: url_helper
INFO - 2019-03-27 18:16:26 --> Helper loaded: date_helper
INFO - 2019-03-27 18:16:26 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:16:26 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:16:26 --> Encrypt Class Initialized
INFO - 2019-03-27 18:16:26 --> Email Class Initialized
INFO - 2019-03-27 18:16:26 --> Model Class Initialized
INFO - 2019-03-27 18:16:26 --> Database Driver Class Initialized
INFO - 2019-03-27 18:16:26 --> Model Class Initialized
DEBUG - 2019-03-27 18:16:26 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:16:26 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:16:26 --> Final output sent to browser
DEBUG - 2019-03-27 18:16:26 --> Total execution time: 0.3838
INFO - 2019-03-27 18:18:12 --> Config Class Initialized
INFO - 2019-03-27 18:18:12 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:18:12 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:18:12 --> Utf8 Class Initialized
INFO - 2019-03-27 18:18:12 --> URI Class Initialized
INFO - 2019-03-27 18:18:12 --> Router Class Initialized
INFO - 2019-03-27 18:18:12 --> Output Class Initialized
INFO - 2019-03-27 18:18:12 --> Security Class Initialized
DEBUG - 2019-03-27 18:18:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:18:12 --> CSRF cookie sent
INFO - 2019-03-27 18:18:12 --> Input Class Initialized
INFO - 2019-03-27 18:18:12 --> Language Class Initialized
INFO - 2019-03-27 18:18:12 --> Loader Class Initialized
INFO - 2019-03-27 18:18:12 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:18:12 --> Controller Class Initialized
INFO - 2019-03-27 18:18:12 --> Helper loaded: form_helper
INFO - 2019-03-27 18:18:12 --> Helper loaded: url_helper
INFO - 2019-03-27 18:18:12 --> Helper loaded: date_helper
INFO - 2019-03-27 18:18:12 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:18:12 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:18:12 --> Encrypt Class Initialized
INFO - 2019-03-27 18:18:12 --> Email Class Initialized
INFO - 2019-03-27 18:18:12 --> Model Class Initialized
INFO - 2019-03-27 18:18:12 --> Database Driver Class Initialized
INFO - 2019-03-27 18:18:12 --> Model Class Initialized
DEBUG - 2019-03-27 18:18:12 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:18:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:18:12 --> Final output sent to browser
DEBUG - 2019-03-27 18:18:12 --> Total execution time: 0.1093
INFO - 2019-03-27 18:18:39 --> Config Class Initialized
INFO - 2019-03-27 18:18:39 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:18:39 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:18:39 --> Utf8 Class Initialized
INFO - 2019-03-27 18:18:39 --> URI Class Initialized
INFO - 2019-03-27 18:18:39 --> Router Class Initialized
INFO - 2019-03-27 18:18:39 --> Output Class Initialized
INFO - 2019-03-27 18:18:39 --> Security Class Initialized
DEBUG - 2019-03-27 18:18:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:18:39 --> CSRF cookie sent
INFO - 2019-03-27 18:18:39 --> Input Class Initialized
INFO - 2019-03-27 18:18:39 --> Language Class Initialized
INFO - 2019-03-27 18:18:39 --> Loader Class Initialized
INFO - 2019-03-27 18:18:39 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:18:39 --> Controller Class Initialized
INFO - 2019-03-27 18:18:39 --> Helper loaded: form_helper
INFO - 2019-03-27 18:18:39 --> Helper loaded: url_helper
INFO - 2019-03-27 18:18:39 --> Helper loaded: date_helper
INFO - 2019-03-27 18:18:39 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:18:39 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:18:39 --> Encrypt Class Initialized
INFO - 2019-03-27 18:18:39 --> Email Class Initialized
INFO - 2019-03-27 18:18:39 --> Model Class Initialized
INFO - 2019-03-27 18:18:39 --> Database Driver Class Initialized
INFO - 2019-03-27 18:18:39 --> Model Class Initialized
DEBUG - 2019-03-27 18:18:39 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:18:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:18:39 --> Final output sent to browser
DEBUG - 2019-03-27 18:18:39 --> Total execution time: 0.0948
INFO - 2019-03-27 18:18:55 --> Config Class Initialized
INFO - 2019-03-27 18:18:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:18:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:18:55 --> Utf8 Class Initialized
INFO - 2019-03-27 18:18:55 --> URI Class Initialized
INFO - 2019-03-27 18:18:55 --> Router Class Initialized
INFO - 2019-03-27 18:18:55 --> Output Class Initialized
INFO - 2019-03-27 18:18:55 --> Security Class Initialized
DEBUG - 2019-03-27 18:18:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:18:55 --> CSRF cookie sent
INFO - 2019-03-27 18:18:55 --> Input Class Initialized
INFO - 2019-03-27 18:18:55 --> Language Class Initialized
INFO - 2019-03-27 18:18:55 --> Loader Class Initialized
INFO - 2019-03-27 18:18:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:18:55 --> Controller Class Initialized
INFO - 2019-03-27 18:18:55 --> Helper loaded: form_helper
INFO - 2019-03-27 18:18:55 --> Helper loaded: url_helper
INFO - 2019-03-27 18:18:55 --> Helper loaded: date_helper
INFO - 2019-03-27 18:18:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:18:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:18:55 --> Encrypt Class Initialized
INFO - 2019-03-27 18:18:55 --> Email Class Initialized
INFO - 2019-03-27 18:18:55 --> Model Class Initialized
INFO - 2019-03-27 18:18:55 --> Database Driver Class Initialized
INFO - 2019-03-27 18:18:55 --> Model Class Initialized
DEBUG - 2019-03-27 18:18:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:18:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:18:55 --> Final output sent to browser
DEBUG - 2019-03-27 18:18:55 --> Total execution time: 0.1024
INFO - 2019-03-27 18:20:08 --> Config Class Initialized
INFO - 2019-03-27 18:20:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:20:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:20:08 --> Utf8 Class Initialized
INFO - 2019-03-27 18:20:08 --> URI Class Initialized
INFO - 2019-03-27 18:20:08 --> Router Class Initialized
INFO - 2019-03-27 18:20:08 --> Output Class Initialized
INFO - 2019-03-27 18:20:08 --> Security Class Initialized
DEBUG - 2019-03-27 18:20:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:20:08 --> CSRF cookie sent
INFO - 2019-03-27 18:20:08 --> Input Class Initialized
INFO - 2019-03-27 18:20:08 --> Language Class Initialized
INFO - 2019-03-27 18:20:08 --> Loader Class Initialized
INFO - 2019-03-27 18:20:08 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:20:08 --> Controller Class Initialized
INFO - 2019-03-27 18:20:08 --> Helper loaded: form_helper
INFO - 2019-03-27 18:20:09 --> Helper loaded: url_helper
INFO - 2019-03-27 18:20:09 --> Helper loaded: date_helper
INFO - 2019-03-27 18:20:09 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:20:09 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:20:09 --> Encrypt Class Initialized
INFO - 2019-03-27 18:20:09 --> Email Class Initialized
INFO - 2019-03-27 18:20:09 --> Model Class Initialized
INFO - 2019-03-27 18:20:09 --> Database Driver Class Initialized
INFO - 2019-03-27 18:20:09 --> Model Class Initialized
DEBUG - 2019-03-27 18:20:09 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/bond_view.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:20:09 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:20:09 --> Final output sent to browser
DEBUG - 2019-03-27 18:20:09 --> Total execution time: 0.1157
INFO - 2019-03-27 18:20:50 --> Config Class Initialized
INFO - 2019-03-27 18:20:50 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:20:50 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:20:50 --> Utf8 Class Initialized
INFO - 2019-03-27 18:20:50 --> URI Class Initialized
INFO - 2019-03-27 18:20:50 --> Router Class Initialized
INFO - 2019-03-27 18:20:50 --> Output Class Initialized
INFO - 2019-03-27 18:20:50 --> Security Class Initialized
DEBUG - 2019-03-27 18:20:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:20:50 --> CSRF cookie sent
INFO - 2019-03-27 18:20:50 --> Input Class Initialized
INFO - 2019-03-27 18:20:50 --> Language Class Initialized
INFO - 2019-03-27 18:20:50 --> Loader Class Initialized
INFO - 2019-03-27 18:20:50 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:20:50 --> Controller Class Initialized
INFO - 2019-03-27 18:20:50 --> Helper loaded: form_helper
INFO - 2019-03-27 18:20:50 --> Helper loaded: url_helper
INFO - 2019-03-27 18:20:50 --> Helper loaded: date_helper
INFO - 2019-03-27 18:20:50 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:20:50 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:20:50 --> Encrypt Class Initialized
INFO - 2019-03-27 18:20:50 --> Email Class Initialized
INFO - 2019-03-27 18:20:50 --> Model Class Initialized
INFO - 2019-03-27 18:20:50 --> Database Driver Class Initialized
INFO - 2019-03-27 18:20:50 --> Model Class Initialized
DEBUG - 2019-03-27 18:20:50 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/bond_view.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:20:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:20:50 --> Final output sent to browser
DEBUG - 2019-03-27 18:20:50 --> Total execution time: 0.0912
INFO - 2019-03-27 18:20:56 --> Config Class Initialized
INFO - 2019-03-27 18:20:56 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:20:56 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:20:56 --> Utf8 Class Initialized
INFO - 2019-03-27 18:20:56 --> URI Class Initialized
INFO - 2019-03-27 18:20:56 --> Router Class Initialized
INFO - 2019-03-27 18:20:56 --> Output Class Initialized
INFO - 2019-03-27 18:20:56 --> Security Class Initialized
DEBUG - 2019-03-27 18:20:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:20:56 --> CSRF cookie sent
INFO - 2019-03-27 18:20:56 --> Input Class Initialized
INFO - 2019-03-27 18:20:56 --> Language Class Initialized
INFO - 2019-03-27 18:20:56 --> Loader Class Initialized
INFO - 2019-03-27 18:20:56 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:20:56 --> Controller Class Initialized
INFO - 2019-03-27 18:20:56 --> Helper loaded: form_helper
INFO - 2019-03-27 18:20:56 --> Helper loaded: url_helper
INFO - 2019-03-27 18:20:56 --> Helper loaded: date_helper
INFO - 2019-03-27 18:20:56 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:20:56 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:20:56 --> Encrypt Class Initialized
INFO - 2019-03-27 18:20:56 --> Email Class Initialized
INFO - 2019-03-27 18:20:56 --> Model Class Initialized
INFO - 2019-03-27 18:20:56 --> Database Driver Class Initialized
INFO - 2019-03-27 18:20:56 --> Model Class Initialized
DEBUG - 2019-03-27 18:20:56 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:20:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:20:56 --> Final output sent to browser
DEBUG - 2019-03-27 18:20:56 --> Total execution time: 0.1133
INFO - 2019-03-27 18:21:27 --> Config Class Initialized
INFO - 2019-03-27 18:21:27 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:21:27 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:21:27 --> Utf8 Class Initialized
INFO - 2019-03-27 18:21:27 --> URI Class Initialized
INFO - 2019-03-27 18:21:27 --> Router Class Initialized
INFO - 2019-03-27 18:21:27 --> Output Class Initialized
INFO - 2019-03-27 18:21:27 --> Security Class Initialized
DEBUG - 2019-03-27 18:21:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:21:27 --> CSRF cookie sent
INFO - 2019-03-27 18:21:27 --> Input Class Initialized
INFO - 2019-03-27 18:21:27 --> Language Class Initialized
INFO - 2019-03-27 18:21:27 --> Loader Class Initialized
INFO - 2019-03-27 18:21:27 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:21:27 --> Controller Class Initialized
INFO - 2019-03-27 18:21:27 --> Helper loaded: form_helper
INFO - 2019-03-27 18:21:27 --> Helper loaded: url_helper
INFO - 2019-03-27 18:21:27 --> Helper loaded: date_helper
INFO - 2019-03-27 18:21:27 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:21:27 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:21:27 --> Encrypt Class Initialized
INFO - 2019-03-27 18:21:27 --> Email Class Initialized
INFO - 2019-03-27 18:21:27 --> Model Class Initialized
INFO - 2019-03-27 18:21:27 --> Database Driver Class Initialized
INFO - 2019-03-27 18:21:27 --> Model Class Initialized
DEBUG - 2019-03-27 18:21:27 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:21:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:21:27 --> Final output sent to browser
DEBUG - 2019-03-27 18:21:27 --> Total execution time: 0.0994
INFO - 2019-03-27 18:22:35 --> Config Class Initialized
INFO - 2019-03-27 18:22:35 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:22:35 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:22:35 --> Utf8 Class Initialized
INFO - 2019-03-27 18:22:35 --> URI Class Initialized
INFO - 2019-03-27 18:22:35 --> Router Class Initialized
INFO - 2019-03-27 18:22:35 --> Output Class Initialized
INFO - 2019-03-27 18:22:35 --> Security Class Initialized
DEBUG - 2019-03-27 18:22:35 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:22:35 --> CSRF cookie sent
INFO - 2019-03-27 18:22:35 --> Input Class Initialized
INFO - 2019-03-27 18:22:35 --> Language Class Initialized
INFO - 2019-03-27 18:22:35 --> Loader Class Initialized
INFO - 2019-03-27 18:22:35 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:22:35 --> Controller Class Initialized
INFO - 2019-03-27 18:22:35 --> Helper loaded: form_helper
INFO - 2019-03-27 18:22:35 --> Helper loaded: url_helper
INFO - 2019-03-27 18:22:35 --> Helper loaded: date_helper
INFO - 2019-03-27 18:22:35 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:22:35 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:22:35 --> Encrypt Class Initialized
INFO - 2019-03-27 18:22:35 --> Email Class Initialized
INFO - 2019-03-27 18:22:35 --> Model Class Initialized
INFO - 2019-03-27 18:22:35 --> Database Driver Class Initialized
INFO - 2019-03-27 18:22:35 --> Model Class Initialized
DEBUG - 2019-03-27 18:22:35 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:22:35 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:22:35 --> Final output sent to browser
DEBUG - 2019-03-27 18:22:35 --> Total execution time: 0.0883
INFO - 2019-03-27 18:23:30 --> Config Class Initialized
INFO - 2019-03-27 18:23:30 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:23:30 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:23:30 --> Utf8 Class Initialized
INFO - 2019-03-27 18:23:30 --> URI Class Initialized
INFO - 2019-03-27 18:23:30 --> Router Class Initialized
INFO - 2019-03-27 18:23:30 --> Output Class Initialized
INFO - 2019-03-27 18:23:30 --> Security Class Initialized
DEBUG - 2019-03-27 18:23:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:23:30 --> CSRF cookie sent
INFO - 2019-03-27 18:23:30 --> Input Class Initialized
INFO - 2019-03-27 18:23:30 --> Language Class Initialized
INFO - 2019-03-27 18:23:30 --> Loader Class Initialized
INFO - 2019-03-27 18:23:30 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:23:30 --> Controller Class Initialized
INFO - 2019-03-27 18:23:30 --> Helper loaded: form_helper
INFO - 2019-03-27 18:23:30 --> Helper loaded: url_helper
INFO - 2019-03-27 18:23:30 --> Helper loaded: date_helper
INFO - 2019-03-27 18:23:30 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:23:30 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:23:30 --> Encrypt Class Initialized
INFO - 2019-03-27 18:23:30 --> Email Class Initialized
INFO - 2019-03-27 18:23:30 --> Model Class Initialized
INFO - 2019-03-27 18:23:30 --> Database Driver Class Initialized
INFO - 2019-03-27 18:23:30 --> Model Class Initialized
DEBUG - 2019-03-27 18:23:30 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:23:30 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:23:30 --> Final output sent to browser
DEBUG - 2019-03-27 18:23:30 --> Total execution time: 0.1175
INFO - 2019-03-27 18:23:52 --> Config Class Initialized
INFO - 2019-03-27 18:23:52 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:23:52 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:23:52 --> Utf8 Class Initialized
INFO - 2019-03-27 18:23:52 --> URI Class Initialized
INFO - 2019-03-27 18:23:52 --> Router Class Initialized
INFO - 2019-03-27 18:23:52 --> Output Class Initialized
INFO - 2019-03-27 18:23:52 --> Security Class Initialized
DEBUG - 2019-03-27 18:23:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:23:52 --> CSRF cookie sent
INFO - 2019-03-27 18:23:52 --> Input Class Initialized
INFO - 2019-03-27 18:23:52 --> Language Class Initialized
INFO - 2019-03-27 18:23:52 --> Loader Class Initialized
INFO - 2019-03-27 18:23:52 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:23:52 --> Controller Class Initialized
INFO - 2019-03-27 18:23:52 --> Helper loaded: form_helper
INFO - 2019-03-27 18:23:52 --> Helper loaded: url_helper
INFO - 2019-03-27 18:23:52 --> Helper loaded: date_helper
INFO - 2019-03-27 18:23:52 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:23:52 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:23:52 --> Encrypt Class Initialized
INFO - 2019-03-27 18:23:52 --> Email Class Initialized
INFO - 2019-03-27 18:23:52 --> Model Class Initialized
INFO - 2019-03-27 18:23:52 --> Database Driver Class Initialized
INFO - 2019-03-27 18:23:52 --> Model Class Initialized
DEBUG - 2019-03-27 18:23:52 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:23:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:23:52 --> Final output sent to browser
DEBUG - 2019-03-27 18:23:52 --> Total execution time: 0.1210
INFO - 2019-03-27 18:25:04 --> Config Class Initialized
INFO - 2019-03-27 18:25:04 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:25:04 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:25:04 --> Utf8 Class Initialized
INFO - 2019-03-27 18:25:04 --> URI Class Initialized
INFO - 2019-03-27 18:25:04 --> Router Class Initialized
INFO - 2019-03-27 18:25:04 --> Output Class Initialized
INFO - 2019-03-27 18:25:04 --> Security Class Initialized
DEBUG - 2019-03-27 18:25:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:25:04 --> CSRF cookie sent
INFO - 2019-03-27 18:25:04 --> Input Class Initialized
INFO - 2019-03-27 18:25:04 --> Language Class Initialized
INFO - 2019-03-27 18:25:04 --> Loader Class Initialized
INFO - 2019-03-27 18:25:04 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:25:04 --> Controller Class Initialized
INFO - 2019-03-27 18:25:04 --> Helper loaded: form_helper
INFO - 2019-03-27 18:25:04 --> Helper loaded: url_helper
INFO - 2019-03-27 18:25:04 --> Helper loaded: date_helper
INFO - 2019-03-27 18:25:04 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:25:04 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:25:04 --> Encrypt Class Initialized
INFO - 2019-03-27 18:25:04 --> Email Class Initialized
INFO - 2019-03-27 18:25:04 --> Model Class Initialized
INFO - 2019-03-27 18:25:04 --> Database Driver Class Initialized
INFO - 2019-03-27 18:25:04 --> Model Class Initialized
DEBUG - 2019-03-27 18:25:04 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:25:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:25:04 --> Final output sent to browser
DEBUG - 2019-03-27 18:25:04 --> Total execution time: 0.0780
INFO - 2019-03-27 18:25:52 --> Config Class Initialized
INFO - 2019-03-27 18:25:52 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:25:52 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:25:52 --> Utf8 Class Initialized
INFO - 2019-03-27 18:25:52 --> URI Class Initialized
INFO - 2019-03-27 18:25:52 --> Router Class Initialized
INFO - 2019-03-27 18:25:52 --> Output Class Initialized
INFO - 2019-03-27 18:25:52 --> Security Class Initialized
DEBUG - 2019-03-27 18:25:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:25:52 --> CSRF cookie sent
INFO - 2019-03-27 18:25:52 --> Input Class Initialized
INFO - 2019-03-27 18:25:52 --> Language Class Initialized
INFO - 2019-03-27 18:25:52 --> Loader Class Initialized
INFO - 2019-03-27 18:25:52 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:25:52 --> Controller Class Initialized
INFO - 2019-03-27 18:25:52 --> Helper loaded: form_helper
INFO - 2019-03-27 18:25:52 --> Helper loaded: url_helper
INFO - 2019-03-27 18:25:52 --> Helper loaded: date_helper
INFO - 2019-03-27 18:25:52 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:25:52 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:25:52 --> Encrypt Class Initialized
INFO - 2019-03-27 18:25:52 --> Email Class Initialized
INFO - 2019-03-27 18:25:52 --> Model Class Initialized
INFO - 2019-03-27 18:25:52 --> Database Driver Class Initialized
INFO - 2019-03-27 18:25:52 --> Model Class Initialized
DEBUG - 2019-03-27 18:25:52 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:25:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:25:52 --> Final output sent to browser
DEBUG - 2019-03-27 18:25:52 --> Total execution time: 0.1998
INFO - 2019-03-27 18:26:15 --> Config Class Initialized
INFO - 2019-03-27 18:26:15 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:26:15 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:26:15 --> Utf8 Class Initialized
INFO - 2019-03-27 18:26:15 --> URI Class Initialized
INFO - 2019-03-27 18:26:15 --> Router Class Initialized
INFO - 2019-03-27 18:26:15 --> Output Class Initialized
INFO - 2019-03-27 18:26:15 --> Security Class Initialized
DEBUG - 2019-03-27 18:26:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:26:15 --> CSRF cookie sent
INFO - 2019-03-27 18:26:15 --> Input Class Initialized
INFO - 2019-03-27 18:26:15 --> Language Class Initialized
INFO - 2019-03-27 18:26:15 --> Loader Class Initialized
INFO - 2019-03-27 18:26:15 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:26:15 --> Controller Class Initialized
INFO - 2019-03-27 18:26:15 --> Helper loaded: form_helper
INFO - 2019-03-27 18:26:15 --> Helper loaded: url_helper
INFO - 2019-03-27 18:26:15 --> Helper loaded: date_helper
INFO - 2019-03-27 18:26:15 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:26:15 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:26:15 --> Encrypt Class Initialized
INFO - 2019-03-27 18:26:15 --> Email Class Initialized
INFO - 2019-03-27 18:26:15 --> Model Class Initialized
INFO - 2019-03-27 18:26:15 --> Database Driver Class Initialized
INFO - 2019-03-27 18:26:15 --> Model Class Initialized
DEBUG - 2019-03-27 18:26:15 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:26:15 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:26:15 --> Final output sent to browser
DEBUG - 2019-03-27 18:26:15 --> Total execution time: 0.0869
INFO - 2019-03-27 18:26:56 --> Config Class Initialized
INFO - 2019-03-27 18:26:56 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:26:56 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:26:56 --> Utf8 Class Initialized
INFO - 2019-03-27 18:26:56 --> URI Class Initialized
INFO - 2019-03-27 18:26:56 --> Router Class Initialized
INFO - 2019-03-27 18:26:56 --> Output Class Initialized
INFO - 2019-03-27 18:26:56 --> Security Class Initialized
DEBUG - 2019-03-27 18:26:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:26:56 --> CSRF cookie sent
INFO - 2019-03-27 18:26:56 --> Input Class Initialized
INFO - 2019-03-27 18:26:56 --> Language Class Initialized
INFO - 2019-03-27 18:26:56 --> Loader Class Initialized
INFO - 2019-03-27 18:26:56 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:26:56 --> Controller Class Initialized
INFO - 2019-03-27 18:26:56 --> Helper loaded: form_helper
INFO - 2019-03-27 18:26:56 --> Helper loaded: url_helper
INFO - 2019-03-27 18:26:56 --> Helper loaded: date_helper
INFO - 2019-03-27 18:26:56 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:26:56 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:26:56 --> Encrypt Class Initialized
INFO - 2019-03-27 18:26:56 --> Email Class Initialized
INFO - 2019-03-27 18:26:56 --> Model Class Initialized
INFO - 2019-03-27 18:26:56 --> Database Driver Class Initialized
INFO - 2019-03-27 18:26:56 --> Model Class Initialized
DEBUG - 2019-03-27 18:26:56 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:26:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:26:56 --> Final output sent to browser
DEBUG - 2019-03-27 18:26:56 --> Total execution time: 0.0974
INFO - 2019-03-27 18:27:22 --> Config Class Initialized
INFO - 2019-03-27 18:27:22 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:27:22 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:27:22 --> Utf8 Class Initialized
INFO - 2019-03-27 18:27:22 --> URI Class Initialized
INFO - 2019-03-27 18:27:22 --> Router Class Initialized
INFO - 2019-03-27 18:27:22 --> Output Class Initialized
INFO - 2019-03-27 18:27:22 --> Security Class Initialized
DEBUG - 2019-03-27 18:27:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:27:22 --> CSRF cookie sent
INFO - 2019-03-27 18:27:22 --> Input Class Initialized
INFO - 2019-03-27 18:27:22 --> Language Class Initialized
INFO - 2019-03-27 18:27:22 --> Loader Class Initialized
INFO - 2019-03-27 18:27:22 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:27:22 --> Controller Class Initialized
INFO - 2019-03-27 18:27:22 --> Helper loaded: form_helper
INFO - 2019-03-27 18:27:22 --> Helper loaded: url_helper
INFO - 2019-03-27 18:27:22 --> Helper loaded: date_helper
INFO - 2019-03-27 18:27:22 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:27:22 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:27:22 --> Encrypt Class Initialized
INFO - 2019-03-27 18:27:22 --> Email Class Initialized
INFO - 2019-03-27 18:27:22 --> Model Class Initialized
INFO - 2019-03-27 18:27:22 --> Database Driver Class Initialized
INFO - 2019-03-27 18:27:22 --> Model Class Initialized
DEBUG - 2019-03-27 18:27:22 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:27:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:27:22 --> Final output sent to browser
DEBUG - 2019-03-27 18:27:22 --> Total execution time: 0.0974
INFO - 2019-03-27 18:28:34 --> Config Class Initialized
INFO - 2019-03-27 18:28:34 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:28:34 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:28:34 --> Utf8 Class Initialized
INFO - 2019-03-27 18:28:34 --> URI Class Initialized
INFO - 2019-03-27 18:28:34 --> Router Class Initialized
INFO - 2019-03-27 18:28:34 --> Output Class Initialized
INFO - 2019-03-27 18:28:34 --> Security Class Initialized
DEBUG - 2019-03-27 18:28:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:28:34 --> CSRF cookie sent
INFO - 2019-03-27 18:28:34 --> Input Class Initialized
INFO - 2019-03-27 18:28:34 --> Language Class Initialized
INFO - 2019-03-27 18:28:34 --> Loader Class Initialized
INFO - 2019-03-27 18:28:34 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:28:34 --> Controller Class Initialized
INFO - 2019-03-27 18:28:34 --> Helper loaded: form_helper
INFO - 2019-03-27 18:28:34 --> Helper loaded: url_helper
INFO - 2019-03-27 18:28:34 --> Helper loaded: date_helper
INFO - 2019-03-27 18:28:34 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:28:34 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:28:34 --> Encrypt Class Initialized
INFO - 2019-03-27 18:28:34 --> Email Class Initialized
INFO - 2019-03-27 18:28:34 --> Model Class Initialized
INFO - 2019-03-27 18:28:34 --> Database Driver Class Initialized
INFO - 2019-03-27 18:28:34 --> Model Class Initialized
DEBUG - 2019-03-27 18:28:34 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:28:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:28:34 --> Final output sent to browser
DEBUG - 2019-03-27 18:28:34 --> Total execution time: 0.0892
INFO - 2019-03-27 18:28:51 --> Config Class Initialized
INFO - 2019-03-27 18:28:51 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:28:51 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:28:51 --> Utf8 Class Initialized
INFO - 2019-03-27 18:28:51 --> URI Class Initialized
INFO - 2019-03-27 18:28:51 --> Router Class Initialized
INFO - 2019-03-27 18:28:51 --> Output Class Initialized
INFO - 2019-03-27 18:28:51 --> Security Class Initialized
DEBUG - 2019-03-27 18:28:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:28:51 --> CSRF cookie sent
INFO - 2019-03-27 18:28:51 --> Input Class Initialized
INFO - 2019-03-27 18:28:51 --> Language Class Initialized
INFO - 2019-03-27 18:28:51 --> Loader Class Initialized
INFO - 2019-03-27 18:28:51 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:28:51 --> Controller Class Initialized
INFO - 2019-03-27 18:28:51 --> Helper loaded: form_helper
INFO - 2019-03-27 18:28:51 --> Helper loaded: url_helper
INFO - 2019-03-27 18:28:51 --> Helper loaded: date_helper
INFO - 2019-03-27 18:28:51 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:28:51 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:28:51 --> Encrypt Class Initialized
INFO - 2019-03-27 18:28:51 --> Email Class Initialized
INFO - 2019-03-27 18:28:51 --> Model Class Initialized
INFO - 2019-03-27 18:28:51 --> Database Driver Class Initialized
INFO - 2019-03-27 18:28:51 --> Model Class Initialized
DEBUG - 2019-03-27 18:28:51 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:28:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:28:51 --> Final output sent to browser
DEBUG - 2019-03-27 18:28:51 --> Total execution time: 0.0924
INFO - 2019-03-27 18:28:58 --> Config Class Initialized
INFO - 2019-03-27 18:28:58 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:28:58 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:28:58 --> Utf8 Class Initialized
INFO - 2019-03-27 18:28:58 --> URI Class Initialized
INFO - 2019-03-27 18:28:58 --> Router Class Initialized
INFO - 2019-03-27 18:28:58 --> Output Class Initialized
INFO - 2019-03-27 18:28:58 --> Security Class Initialized
DEBUG - 2019-03-27 18:28:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:28:58 --> CSRF cookie sent
INFO - 2019-03-27 18:28:58 --> Input Class Initialized
INFO - 2019-03-27 18:28:58 --> Language Class Initialized
INFO - 2019-03-27 18:28:58 --> Loader Class Initialized
INFO - 2019-03-27 18:28:58 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:28:58 --> Controller Class Initialized
INFO - 2019-03-27 18:28:58 --> Helper loaded: form_helper
INFO - 2019-03-27 18:28:58 --> Helper loaded: url_helper
INFO - 2019-03-27 18:28:58 --> Helper loaded: date_helper
INFO - 2019-03-27 18:28:58 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:28:58 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:28:58 --> Encrypt Class Initialized
INFO - 2019-03-27 18:28:58 --> Email Class Initialized
INFO - 2019-03-27 18:28:58 --> Model Class Initialized
INFO - 2019-03-27 18:28:58 --> Database Driver Class Initialized
INFO - 2019-03-27 18:28:58 --> Model Class Initialized
DEBUG - 2019-03-27 18:28:58 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:28:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:28:58 --> Final output sent to browser
DEBUG - 2019-03-27 18:28:58 --> Total execution time: 0.1127
INFO - 2019-03-27 18:29:04 --> Config Class Initialized
INFO - 2019-03-27 18:29:04 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:29:04 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:29:04 --> Utf8 Class Initialized
INFO - 2019-03-27 18:29:04 --> URI Class Initialized
INFO - 2019-03-27 18:29:04 --> Router Class Initialized
INFO - 2019-03-27 18:29:04 --> Output Class Initialized
INFO - 2019-03-27 18:29:04 --> Security Class Initialized
DEBUG - 2019-03-27 18:29:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:29:04 --> CSRF cookie sent
INFO - 2019-03-27 18:29:04 --> Input Class Initialized
INFO - 2019-03-27 18:29:04 --> Language Class Initialized
INFO - 2019-03-27 18:29:04 --> Loader Class Initialized
INFO - 2019-03-27 18:29:04 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:29:04 --> Controller Class Initialized
INFO - 2019-03-27 18:29:04 --> Helper loaded: form_helper
INFO - 2019-03-27 18:29:04 --> Helper loaded: url_helper
INFO - 2019-03-27 18:29:04 --> Helper loaded: date_helper
INFO - 2019-03-27 18:29:04 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:29:04 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:29:04 --> Encrypt Class Initialized
INFO - 2019-03-27 18:29:04 --> Email Class Initialized
INFO - 2019-03-27 18:29:04 --> Model Class Initialized
INFO - 2019-03-27 18:29:04 --> Database Driver Class Initialized
INFO - 2019-03-27 18:29:04 --> Model Class Initialized
DEBUG - 2019-03-27 18:29:04 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:29:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:29:04 --> Final output sent to browser
DEBUG - 2019-03-27 18:29:04 --> Total execution time: 0.0830
INFO - 2019-03-27 18:30:17 --> Config Class Initialized
INFO - 2019-03-27 18:30:17 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:30:17 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:30:17 --> Utf8 Class Initialized
INFO - 2019-03-27 18:30:17 --> URI Class Initialized
INFO - 2019-03-27 18:30:17 --> Router Class Initialized
INFO - 2019-03-27 18:30:17 --> Output Class Initialized
INFO - 2019-03-27 18:30:17 --> Security Class Initialized
DEBUG - 2019-03-27 18:30:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:30:17 --> CSRF cookie sent
INFO - 2019-03-27 18:30:17 --> Input Class Initialized
INFO - 2019-03-27 18:30:17 --> Language Class Initialized
INFO - 2019-03-27 18:30:17 --> Loader Class Initialized
INFO - 2019-03-27 18:30:17 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:30:17 --> Controller Class Initialized
INFO - 2019-03-27 18:30:17 --> Helper loaded: form_helper
INFO - 2019-03-27 18:30:17 --> Helper loaded: url_helper
INFO - 2019-03-27 18:30:17 --> Helper loaded: date_helper
INFO - 2019-03-27 18:30:17 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:30:17 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:30:17 --> Encrypt Class Initialized
INFO - 2019-03-27 18:30:17 --> Email Class Initialized
INFO - 2019-03-27 18:30:17 --> Model Class Initialized
INFO - 2019-03-27 18:30:17 --> Database Driver Class Initialized
INFO - 2019-03-27 18:30:17 --> Model Class Initialized
DEBUG - 2019-03-27 18:30:17 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:30:17 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:30:17 --> Final output sent to browser
DEBUG - 2019-03-27 18:30:17 --> Total execution time: 0.0994
INFO - 2019-03-27 18:34:13 --> Config Class Initialized
INFO - 2019-03-27 18:34:13 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:34:13 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:34:13 --> Utf8 Class Initialized
INFO - 2019-03-27 18:34:13 --> URI Class Initialized
INFO - 2019-03-27 18:34:13 --> Router Class Initialized
INFO - 2019-03-27 18:34:13 --> Output Class Initialized
INFO - 2019-03-27 18:34:13 --> Security Class Initialized
DEBUG - 2019-03-27 18:34:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:34:13 --> CSRF cookie sent
INFO - 2019-03-27 18:34:13 --> Input Class Initialized
INFO - 2019-03-27 18:34:13 --> Language Class Initialized
INFO - 2019-03-27 18:34:13 --> Loader Class Initialized
INFO - 2019-03-27 18:34:13 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:34:13 --> Controller Class Initialized
INFO - 2019-03-27 18:34:13 --> Helper loaded: form_helper
INFO - 2019-03-27 18:34:13 --> Helper loaded: url_helper
INFO - 2019-03-27 18:34:13 --> Helper loaded: date_helper
INFO - 2019-03-27 18:34:13 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:34:13 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:34:13 --> Encrypt Class Initialized
INFO - 2019-03-27 18:34:13 --> Email Class Initialized
INFO - 2019-03-27 18:34:13 --> Model Class Initialized
INFO - 2019-03-27 18:34:13 --> Database Driver Class Initialized
INFO - 2019-03-27 18:34:13 --> Model Class Initialized
DEBUG - 2019-03-27 18:34:13 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:34:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:34:13 --> Final output sent to browser
DEBUG - 2019-03-27 18:34:13 --> Total execution time: 0.0963
INFO - 2019-03-27 18:34:55 --> Config Class Initialized
INFO - 2019-03-27 18:34:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:34:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:34:55 --> Utf8 Class Initialized
INFO - 2019-03-27 18:34:55 --> URI Class Initialized
INFO - 2019-03-27 18:34:55 --> Router Class Initialized
INFO - 2019-03-27 18:34:55 --> Output Class Initialized
INFO - 2019-03-27 18:34:55 --> Security Class Initialized
DEBUG - 2019-03-27 18:34:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:34:55 --> CSRF cookie sent
INFO - 2019-03-27 18:34:55 --> Input Class Initialized
INFO - 2019-03-27 18:34:55 --> Language Class Initialized
INFO - 2019-03-27 18:34:55 --> Loader Class Initialized
INFO - 2019-03-27 18:34:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:34:55 --> Controller Class Initialized
INFO - 2019-03-27 18:34:55 --> Helper loaded: form_helper
INFO - 2019-03-27 18:34:55 --> Helper loaded: url_helper
INFO - 2019-03-27 18:34:55 --> Helper loaded: date_helper
INFO - 2019-03-27 18:34:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:34:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:34:55 --> Encrypt Class Initialized
INFO - 2019-03-27 18:34:55 --> Email Class Initialized
INFO - 2019-03-27 18:34:55 --> Model Class Initialized
INFO - 2019-03-27 18:34:55 --> Database Driver Class Initialized
INFO - 2019-03-27 18:34:55 --> Model Class Initialized
DEBUG - 2019-03-27 18:34:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:34:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:34:55 --> Final output sent to browser
DEBUG - 2019-03-27 18:34:55 --> Total execution time: 0.1148
INFO - 2019-03-27 18:35:22 --> Config Class Initialized
INFO - 2019-03-27 18:35:22 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:35:22 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:35:22 --> Utf8 Class Initialized
INFO - 2019-03-27 18:35:22 --> URI Class Initialized
INFO - 2019-03-27 18:35:22 --> Router Class Initialized
INFO - 2019-03-27 18:35:22 --> Output Class Initialized
INFO - 2019-03-27 18:35:22 --> Security Class Initialized
DEBUG - 2019-03-27 18:35:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:35:22 --> CSRF cookie sent
INFO - 2019-03-27 18:35:22 --> Input Class Initialized
INFO - 2019-03-27 18:35:22 --> Language Class Initialized
INFO - 2019-03-27 18:35:22 --> Loader Class Initialized
INFO - 2019-03-27 18:35:22 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:35:22 --> Controller Class Initialized
INFO - 2019-03-27 18:35:22 --> Helper loaded: form_helper
INFO - 2019-03-27 18:35:22 --> Helper loaded: url_helper
INFO - 2019-03-27 18:35:22 --> Helper loaded: date_helper
INFO - 2019-03-27 18:35:22 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:35:22 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:35:22 --> Encrypt Class Initialized
INFO - 2019-03-27 18:35:22 --> Email Class Initialized
INFO - 2019-03-27 18:35:22 --> Model Class Initialized
INFO - 2019-03-27 18:35:22 --> Database Driver Class Initialized
INFO - 2019-03-27 18:35:22 --> Model Class Initialized
DEBUG - 2019-03-27 18:35:22 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:35:22 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:35:22 --> Final output sent to browser
DEBUG - 2019-03-27 18:35:22 --> Total execution time: 0.0937
INFO - 2019-03-27 18:36:00 --> Config Class Initialized
INFO - 2019-03-27 18:36:00 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:36:00 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:36:00 --> Utf8 Class Initialized
INFO - 2019-03-27 18:36:00 --> URI Class Initialized
INFO - 2019-03-27 18:36:00 --> Router Class Initialized
INFO - 2019-03-27 18:36:00 --> Output Class Initialized
INFO - 2019-03-27 18:36:00 --> Security Class Initialized
DEBUG - 2019-03-27 18:36:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:36:00 --> CSRF cookie sent
INFO - 2019-03-27 18:36:00 --> Input Class Initialized
INFO - 2019-03-27 18:36:00 --> Language Class Initialized
INFO - 2019-03-27 18:36:00 --> Loader Class Initialized
INFO - 2019-03-27 18:36:00 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:36:00 --> Controller Class Initialized
INFO - 2019-03-27 18:36:00 --> Helper loaded: form_helper
INFO - 2019-03-27 18:36:00 --> Helper loaded: url_helper
INFO - 2019-03-27 18:36:00 --> Helper loaded: date_helper
INFO - 2019-03-27 18:36:00 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:36:00 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:36:00 --> Encrypt Class Initialized
INFO - 2019-03-27 18:36:00 --> Email Class Initialized
INFO - 2019-03-27 18:36:00 --> Model Class Initialized
INFO - 2019-03-27 18:36:00 --> Database Driver Class Initialized
INFO - 2019-03-27 18:36:00 --> Model Class Initialized
DEBUG - 2019-03-27 18:36:00 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:36:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:36:00 --> Final output sent to browser
DEBUG - 2019-03-27 18:36:00 --> Total execution time: 0.1053
INFO - 2019-03-27 18:36:53 --> Config Class Initialized
INFO - 2019-03-27 18:36:53 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:36:53 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:36:53 --> Utf8 Class Initialized
INFO - 2019-03-27 18:36:53 --> URI Class Initialized
INFO - 2019-03-27 18:36:53 --> Router Class Initialized
INFO - 2019-03-27 18:36:53 --> Output Class Initialized
INFO - 2019-03-27 18:36:53 --> Security Class Initialized
DEBUG - 2019-03-27 18:36:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:36:53 --> CSRF cookie sent
INFO - 2019-03-27 18:36:53 --> Input Class Initialized
INFO - 2019-03-27 18:36:53 --> Language Class Initialized
INFO - 2019-03-27 18:36:53 --> Loader Class Initialized
INFO - 2019-03-27 18:36:53 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:36:53 --> Controller Class Initialized
INFO - 2019-03-27 18:36:53 --> Helper loaded: form_helper
INFO - 2019-03-27 18:36:53 --> Helper loaded: url_helper
INFO - 2019-03-27 18:36:53 --> Helper loaded: date_helper
INFO - 2019-03-27 18:36:53 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:36:53 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:36:53 --> Encrypt Class Initialized
INFO - 2019-03-27 18:36:53 --> Email Class Initialized
INFO - 2019-03-27 18:36:53 --> Model Class Initialized
INFO - 2019-03-27 18:36:53 --> Database Driver Class Initialized
INFO - 2019-03-27 18:36:53 --> Model Class Initialized
DEBUG - 2019-03-27 18:36:53 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:36:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:36:53 --> Final output sent to browser
DEBUG - 2019-03-27 18:36:53 --> Total execution time: 0.0955
INFO - 2019-03-27 18:37:54 --> Config Class Initialized
INFO - 2019-03-27 18:37:54 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:37:54 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:37:54 --> Utf8 Class Initialized
INFO - 2019-03-27 18:37:54 --> URI Class Initialized
INFO - 2019-03-27 18:37:54 --> Router Class Initialized
INFO - 2019-03-27 18:37:54 --> Output Class Initialized
INFO - 2019-03-27 18:37:54 --> Security Class Initialized
DEBUG - 2019-03-27 18:37:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:37:54 --> CSRF cookie sent
INFO - 2019-03-27 18:37:54 --> Input Class Initialized
INFO - 2019-03-27 18:37:54 --> Language Class Initialized
INFO - 2019-03-27 18:37:54 --> Loader Class Initialized
INFO - 2019-03-27 18:37:54 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:37:54 --> Controller Class Initialized
INFO - 2019-03-27 18:37:54 --> Helper loaded: form_helper
INFO - 2019-03-27 18:37:54 --> Helper loaded: url_helper
INFO - 2019-03-27 18:37:54 --> Helper loaded: date_helper
INFO - 2019-03-27 18:37:54 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:37:54 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:37:54 --> Encrypt Class Initialized
INFO - 2019-03-27 18:37:54 --> Email Class Initialized
INFO - 2019-03-27 18:37:54 --> Model Class Initialized
INFO - 2019-03-27 18:37:54 --> Database Driver Class Initialized
INFO - 2019-03-27 18:37:54 --> Model Class Initialized
DEBUG - 2019-03-27 18:37:54 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:37:54 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:37:54 --> Final output sent to browser
DEBUG - 2019-03-27 18:37:54 --> Total execution time: 0.1006
INFO - 2019-03-27 18:38:40 --> Config Class Initialized
INFO - 2019-03-27 18:38:40 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:38:40 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:38:40 --> Utf8 Class Initialized
INFO - 2019-03-27 18:38:40 --> URI Class Initialized
INFO - 2019-03-27 18:38:40 --> Router Class Initialized
INFO - 2019-03-27 18:38:40 --> Output Class Initialized
INFO - 2019-03-27 18:38:40 --> Security Class Initialized
DEBUG - 2019-03-27 18:38:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:38:40 --> CSRF cookie sent
INFO - 2019-03-27 18:38:40 --> Input Class Initialized
INFO - 2019-03-27 18:38:40 --> Language Class Initialized
INFO - 2019-03-27 18:38:40 --> Loader Class Initialized
INFO - 2019-03-27 18:38:40 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:38:40 --> Controller Class Initialized
INFO - 2019-03-27 18:38:40 --> Helper loaded: form_helper
INFO - 2019-03-27 18:38:40 --> Helper loaded: url_helper
INFO - 2019-03-27 18:38:40 --> Helper loaded: date_helper
INFO - 2019-03-27 18:38:40 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:38:40 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:38:40 --> Encrypt Class Initialized
INFO - 2019-03-27 18:38:40 --> Email Class Initialized
INFO - 2019-03-27 18:38:40 --> Model Class Initialized
INFO - 2019-03-27 18:38:40 --> Database Driver Class Initialized
INFO - 2019-03-27 18:38:40 --> Model Class Initialized
DEBUG - 2019-03-27 18:38:40 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:38:40 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:38:40 --> Final output sent to browser
DEBUG - 2019-03-27 18:38:40 --> Total execution time: 0.1064
INFO - 2019-03-27 18:39:55 --> Config Class Initialized
INFO - 2019-03-27 18:39:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:39:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:39:55 --> Utf8 Class Initialized
INFO - 2019-03-27 18:39:55 --> URI Class Initialized
INFO - 2019-03-27 18:39:55 --> Router Class Initialized
INFO - 2019-03-27 18:39:55 --> Output Class Initialized
INFO - 2019-03-27 18:39:55 --> Security Class Initialized
DEBUG - 2019-03-27 18:39:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:39:55 --> CSRF cookie sent
INFO - 2019-03-27 18:39:55 --> Input Class Initialized
INFO - 2019-03-27 18:39:55 --> Language Class Initialized
INFO - 2019-03-27 18:39:55 --> Loader Class Initialized
INFO - 2019-03-27 18:39:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:39:55 --> Controller Class Initialized
INFO - 2019-03-27 18:39:55 --> Helper loaded: form_helper
INFO - 2019-03-27 18:39:55 --> Helper loaded: url_helper
INFO - 2019-03-27 18:39:55 --> Helper loaded: date_helper
INFO - 2019-03-27 18:39:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:39:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:39:55 --> Encrypt Class Initialized
INFO - 2019-03-27 18:39:55 --> Email Class Initialized
INFO - 2019-03-27 18:39:55 --> Model Class Initialized
INFO - 2019-03-27 18:39:55 --> Database Driver Class Initialized
INFO - 2019-03-27 18:39:55 --> Model Class Initialized
DEBUG - 2019-03-27 18:39:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:39:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:39:55 --> Final output sent to browser
DEBUG - 2019-03-27 18:39:55 --> Total execution time: 0.0846
INFO - 2019-03-27 18:59:51 --> Config Class Initialized
INFO - 2019-03-27 18:59:51 --> Hooks Class Initialized
DEBUG - 2019-03-27 18:59:51 --> UTF-8 Support Enabled
INFO - 2019-03-27 18:59:51 --> Utf8 Class Initialized
INFO - 2019-03-27 18:59:51 --> URI Class Initialized
INFO - 2019-03-27 18:59:51 --> Router Class Initialized
INFO - 2019-03-27 18:59:51 --> Output Class Initialized
INFO - 2019-03-27 18:59:51 --> Security Class Initialized
DEBUG - 2019-03-27 18:59:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 18:59:51 --> CSRF cookie sent
INFO - 2019-03-27 18:59:51 --> Input Class Initialized
INFO - 2019-03-27 18:59:51 --> Language Class Initialized
INFO - 2019-03-27 18:59:51 --> Loader Class Initialized
INFO - 2019-03-27 18:59:51 --> Helper loaded: cache_helper
INFO - 2019-03-27 18:59:51 --> Controller Class Initialized
INFO - 2019-03-27 18:59:51 --> Helper loaded: form_helper
INFO - 2019-03-27 18:59:51 --> Helper loaded: url_helper
INFO - 2019-03-27 18:59:51 --> Helper loaded: date_helper
INFO - 2019-03-27 18:59:51 --> Helper loaded: notification_helper
INFO - 2019-03-27 18:59:51 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 18:59:51 --> Encrypt Class Initialized
INFO - 2019-03-27 18:59:51 --> Email Class Initialized
INFO - 2019-03-27 18:59:51 --> Model Class Initialized
INFO - 2019-03-27 18:59:51 --> Database Driver Class Initialized
INFO - 2019-03-27 18:59:51 --> Model Class Initialized
DEBUG - 2019-03-27 18:59:51 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 18:59:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 18:59:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 18:59:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 18:59:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 18:59:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 18:59:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 18:59:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 18:59:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 18:59:52 --> Final output sent to browser
DEBUG - 2019-03-27 18:59:52 --> Total execution time: 1.0670
INFO - 2019-03-27 19:00:10 --> Config Class Initialized
INFO - 2019-03-27 19:00:10 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:00:10 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:00:10 --> Utf8 Class Initialized
INFO - 2019-03-27 19:00:10 --> URI Class Initialized
INFO - 2019-03-27 19:00:10 --> Router Class Initialized
INFO - 2019-03-27 19:00:10 --> Output Class Initialized
INFO - 2019-03-27 19:00:10 --> Security Class Initialized
DEBUG - 2019-03-27 19:00:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:00:10 --> CSRF cookie sent
INFO - 2019-03-27 19:00:10 --> Input Class Initialized
INFO - 2019-03-27 19:00:10 --> Language Class Initialized
INFO - 2019-03-27 19:00:10 --> Loader Class Initialized
INFO - 2019-03-27 19:00:10 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:00:10 --> Controller Class Initialized
INFO - 2019-03-27 19:00:10 --> Helper loaded: form_helper
INFO - 2019-03-27 19:00:10 --> Helper loaded: url_helper
INFO - 2019-03-27 19:00:10 --> Helper loaded: date_helper
INFO - 2019-03-27 19:00:10 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:00:11 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:00:11 --> Encrypt Class Initialized
INFO - 2019-03-27 19:00:11 --> Email Class Initialized
INFO - 2019-03-27 19:00:11 --> Model Class Initialized
INFO - 2019-03-27 19:00:11 --> Database Driver Class Initialized
INFO - 2019-03-27 19:00:11 --> Model Class Initialized
DEBUG - 2019-03-27 19:00:11 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:00:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:00:11 --> Final output sent to browser
DEBUG - 2019-03-27 19:00:11 --> Total execution time: 0.0961
INFO - 2019-03-27 19:03:08 --> Config Class Initialized
INFO - 2019-03-27 19:03:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:03:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:03:08 --> Utf8 Class Initialized
INFO - 2019-03-27 19:03:08 --> URI Class Initialized
INFO - 2019-03-27 19:03:08 --> Router Class Initialized
INFO - 2019-03-27 19:03:08 --> Output Class Initialized
INFO - 2019-03-27 19:03:08 --> Security Class Initialized
DEBUG - 2019-03-27 19:03:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:03:08 --> CSRF cookie sent
INFO - 2019-03-27 19:03:08 --> Input Class Initialized
INFO - 2019-03-27 19:03:08 --> Language Class Initialized
INFO - 2019-03-27 19:03:08 --> Loader Class Initialized
INFO - 2019-03-27 19:03:08 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:03:08 --> Controller Class Initialized
INFO - 2019-03-27 19:03:08 --> Helper loaded: form_helper
INFO - 2019-03-27 19:03:08 --> Helper loaded: url_helper
INFO - 2019-03-27 19:03:08 --> Helper loaded: date_helper
INFO - 2019-03-27 19:03:08 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:03:08 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:03:08 --> Encrypt Class Initialized
INFO - 2019-03-27 19:03:08 --> Email Class Initialized
INFO - 2019-03-27 19:03:08 --> Model Class Initialized
INFO - 2019-03-27 19:03:08 --> Database Driver Class Initialized
INFO - 2019-03-27 19:03:08 --> Model Class Initialized
DEBUG - 2019-03-27 19:03:08 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:03:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:03:08 --> Final output sent to browser
DEBUG - 2019-03-27 19:03:08 --> Total execution time: 0.1081
INFO - 2019-03-27 19:03:25 --> Config Class Initialized
INFO - 2019-03-27 19:03:25 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:03:25 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:03:25 --> Utf8 Class Initialized
INFO - 2019-03-27 19:03:25 --> URI Class Initialized
INFO - 2019-03-27 19:03:25 --> Router Class Initialized
INFO - 2019-03-27 19:03:25 --> Output Class Initialized
INFO - 2019-03-27 19:03:25 --> Security Class Initialized
DEBUG - 2019-03-27 19:03:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:03:25 --> CSRF cookie sent
INFO - 2019-03-27 19:03:25 --> Input Class Initialized
INFO - 2019-03-27 19:03:25 --> Language Class Initialized
INFO - 2019-03-27 19:03:25 --> Loader Class Initialized
INFO - 2019-03-27 19:03:25 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:03:25 --> Controller Class Initialized
INFO - 2019-03-27 19:03:25 --> Helper loaded: form_helper
INFO - 2019-03-27 19:03:25 --> Helper loaded: url_helper
INFO - 2019-03-27 19:03:25 --> Helper loaded: date_helper
INFO - 2019-03-27 19:03:25 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:03:25 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:03:25 --> Encrypt Class Initialized
INFO - 2019-03-27 19:03:25 --> Email Class Initialized
INFO - 2019-03-27 19:03:25 --> Model Class Initialized
INFO - 2019-03-27 19:03:25 --> Database Driver Class Initialized
INFO - 2019-03-27 19:03:25 --> Model Class Initialized
DEBUG - 2019-03-27 19:03:25 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:03:25 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:03:25 --> Final output sent to browser
DEBUG - 2019-03-27 19:03:25 --> Total execution time: 0.0935
INFO - 2019-03-27 19:12:56 --> Config Class Initialized
INFO - 2019-03-27 19:12:56 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:12:56 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:12:56 --> Utf8 Class Initialized
INFO - 2019-03-27 19:12:56 --> URI Class Initialized
INFO - 2019-03-27 19:12:56 --> Router Class Initialized
INFO - 2019-03-27 19:12:56 --> Output Class Initialized
INFO - 2019-03-27 19:12:56 --> Security Class Initialized
DEBUG - 2019-03-27 19:12:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:12:56 --> CSRF cookie sent
INFO - 2019-03-27 19:12:56 --> Input Class Initialized
INFO - 2019-03-27 19:12:56 --> Language Class Initialized
INFO - 2019-03-27 19:12:57 --> Loader Class Initialized
INFO - 2019-03-27 19:12:57 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:12:57 --> Controller Class Initialized
INFO - 2019-03-27 19:12:57 --> Helper loaded: form_helper
INFO - 2019-03-27 19:12:57 --> Helper loaded: url_helper
INFO - 2019-03-27 19:12:57 --> Helper loaded: date_helper
INFO - 2019-03-27 19:12:57 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:12:57 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:12:57 --> Encrypt Class Initialized
INFO - 2019-03-27 19:12:57 --> Email Class Initialized
INFO - 2019-03-27 19:12:57 --> Model Class Initialized
INFO - 2019-03-27 19:12:58 --> Database Driver Class Initialized
INFO - 2019-03-27 19:12:58 --> Model Class Initialized
DEBUG - 2019-03-27 19:12:58 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/bond_view.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:12:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:12:58 --> Final output sent to browser
DEBUG - 2019-03-27 19:12:58 --> Total execution time: 2.0787
INFO - 2019-03-27 19:13:19 --> Config Class Initialized
INFO - 2019-03-27 19:13:19 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:13:19 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:13:19 --> Utf8 Class Initialized
INFO - 2019-03-27 19:13:19 --> URI Class Initialized
INFO - 2019-03-27 19:13:19 --> Router Class Initialized
INFO - 2019-03-27 19:13:19 --> Output Class Initialized
INFO - 2019-03-27 19:13:19 --> Security Class Initialized
DEBUG - 2019-03-27 19:13:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:13:19 --> CSRF cookie sent
INFO - 2019-03-27 19:13:19 --> Input Class Initialized
INFO - 2019-03-27 19:13:19 --> Language Class Initialized
INFO - 2019-03-27 19:13:19 --> Loader Class Initialized
INFO - 2019-03-27 19:13:19 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:13:19 --> Controller Class Initialized
INFO - 2019-03-27 19:13:19 --> Helper loaded: form_helper
INFO - 2019-03-27 19:13:19 --> Helper loaded: url_helper
INFO - 2019-03-27 19:13:19 --> Helper loaded: date_helper
INFO - 2019-03-27 19:13:19 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:13:19 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:13:19 --> Encrypt Class Initialized
INFO - 2019-03-27 19:13:19 --> Email Class Initialized
INFO - 2019-03-27 19:13:19 --> Model Class Initialized
INFO - 2019-03-27 19:13:19 --> Database Driver Class Initialized
INFO - 2019-03-27 19:13:19 --> Model Class Initialized
DEBUG - 2019-03-27 19:13:19 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/bond_view.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:13:19 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:13:19 --> Final output sent to browser
DEBUG - 2019-03-27 19:13:19 --> Total execution time: 0.1007
INFO - 2019-03-27 19:17:48 --> Config Class Initialized
INFO - 2019-03-27 19:17:48 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:17:48 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:17:48 --> Utf8 Class Initialized
INFO - 2019-03-27 19:17:48 --> URI Class Initialized
INFO - 2019-03-27 19:17:48 --> Router Class Initialized
INFO - 2019-03-27 19:17:48 --> Output Class Initialized
INFO - 2019-03-27 19:17:48 --> Security Class Initialized
DEBUG - 2019-03-27 19:17:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:17:48 --> CSRF cookie sent
INFO - 2019-03-27 19:17:48 --> Input Class Initialized
INFO - 2019-03-27 19:17:48 --> Language Class Initialized
INFO - 2019-03-27 19:17:48 --> Loader Class Initialized
INFO - 2019-03-27 19:17:48 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:17:48 --> Controller Class Initialized
INFO - 2019-03-27 19:17:48 --> Helper loaded: form_helper
INFO - 2019-03-27 19:17:48 --> Helper loaded: url_helper
INFO - 2019-03-27 19:17:48 --> Helper loaded: date_helper
INFO - 2019-03-27 19:17:48 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:17:48 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:17:48 --> Encrypt Class Initialized
INFO - 2019-03-27 19:17:48 --> Email Class Initialized
INFO - 2019-03-27 19:17:48 --> Model Class Initialized
INFO - 2019-03-27 19:17:48 --> Database Driver Class Initialized
INFO - 2019-03-27 19:17:49 --> Model Class Initialized
DEBUG - 2019-03-27 19:17:49 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:17:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:17:49 --> Final output sent to browser
DEBUG - 2019-03-27 19:17:49 --> Total execution time: 0.1171
INFO - 2019-03-27 19:18:03 --> Config Class Initialized
INFO - 2019-03-27 19:18:03 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:18:03 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:18:03 --> Utf8 Class Initialized
INFO - 2019-03-27 19:18:03 --> URI Class Initialized
INFO - 2019-03-27 19:18:03 --> Router Class Initialized
INFO - 2019-03-27 19:18:03 --> Output Class Initialized
INFO - 2019-03-27 19:18:03 --> Security Class Initialized
DEBUG - 2019-03-27 19:18:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:18:03 --> CSRF cookie sent
INFO - 2019-03-27 19:18:03 --> Input Class Initialized
INFO - 2019-03-27 19:18:03 --> Language Class Initialized
INFO - 2019-03-27 19:18:03 --> Loader Class Initialized
INFO - 2019-03-27 19:18:03 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:18:03 --> Controller Class Initialized
INFO - 2019-03-27 19:18:03 --> Helper loaded: form_helper
INFO - 2019-03-27 19:18:03 --> Helper loaded: url_helper
INFO - 2019-03-27 19:18:03 --> Helper loaded: date_helper
INFO - 2019-03-27 19:18:03 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:18:04 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:18:04 --> Encrypt Class Initialized
INFO - 2019-03-27 19:18:04 --> Email Class Initialized
INFO - 2019-03-27 19:18:04 --> Model Class Initialized
INFO - 2019-03-27 19:18:04 --> Database Driver Class Initialized
INFO - 2019-03-27 19:18:04 --> Model Class Initialized
DEBUG - 2019-03-27 19:18:04 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:18:04 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:18:04 --> Final output sent to browser
DEBUG - 2019-03-27 19:18:04 --> Total execution time: 0.2669
INFO - 2019-03-27 19:20:05 --> Config Class Initialized
INFO - 2019-03-27 19:20:05 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:20:05 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:20:05 --> Utf8 Class Initialized
INFO - 2019-03-27 19:20:05 --> URI Class Initialized
INFO - 2019-03-27 19:20:05 --> Router Class Initialized
INFO - 2019-03-27 19:20:05 --> Output Class Initialized
INFO - 2019-03-27 19:20:05 --> Security Class Initialized
DEBUG - 2019-03-27 19:20:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:20:05 --> CSRF cookie sent
INFO - 2019-03-27 19:20:05 --> Input Class Initialized
INFO - 2019-03-27 19:20:05 --> Language Class Initialized
INFO - 2019-03-27 19:20:05 --> Loader Class Initialized
INFO - 2019-03-27 19:20:05 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:20:05 --> Controller Class Initialized
INFO - 2019-03-27 19:20:05 --> Helper loaded: form_helper
INFO - 2019-03-27 19:20:05 --> Helper loaded: url_helper
INFO - 2019-03-27 19:20:05 --> Helper loaded: date_helper
INFO - 2019-03-27 19:20:05 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:20:05 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:20:05 --> Encrypt Class Initialized
INFO - 2019-03-27 19:20:05 --> Email Class Initialized
INFO - 2019-03-27 19:20:05 --> Model Class Initialized
INFO - 2019-03-27 19:20:05 --> Database Driver Class Initialized
INFO - 2019-03-27 19:20:05 --> Model Class Initialized
DEBUG - 2019-03-27 19:20:05 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:20:05 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:20:05 --> Final output sent to browser
DEBUG - 2019-03-27 19:20:05 --> Total execution time: 0.3921
INFO - 2019-03-27 19:21:44 --> Config Class Initialized
INFO - 2019-03-27 19:21:44 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:21:44 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:21:44 --> Utf8 Class Initialized
INFO - 2019-03-27 19:21:44 --> URI Class Initialized
INFO - 2019-03-27 19:21:44 --> Router Class Initialized
INFO - 2019-03-27 19:21:44 --> Output Class Initialized
INFO - 2019-03-27 19:21:44 --> Security Class Initialized
DEBUG - 2019-03-27 19:21:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:21:44 --> CSRF cookie sent
INFO - 2019-03-27 19:21:44 --> Input Class Initialized
INFO - 2019-03-27 19:21:44 --> Language Class Initialized
INFO - 2019-03-27 19:21:44 --> Loader Class Initialized
INFO - 2019-03-27 19:21:44 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:21:44 --> Controller Class Initialized
INFO - 2019-03-27 19:21:44 --> Helper loaded: form_helper
INFO - 2019-03-27 19:21:44 --> Helper loaded: url_helper
INFO - 2019-03-27 19:21:44 --> Helper loaded: date_helper
INFO - 2019-03-27 19:21:44 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:21:44 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:21:44 --> Encrypt Class Initialized
INFO - 2019-03-27 19:21:44 --> Email Class Initialized
INFO - 2019-03-27 19:21:44 --> Model Class Initialized
INFO - 2019-03-27 19:21:44 --> Database Driver Class Initialized
INFO - 2019-03-27 19:21:44 --> Model Class Initialized
DEBUG - 2019-03-27 19:21:44 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:21:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:21:44 --> Final output sent to browser
DEBUG - 2019-03-27 19:21:44 --> Total execution time: 0.0920
INFO - 2019-03-27 19:23:14 --> Config Class Initialized
INFO - 2019-03-27 19:23:14 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:23:14 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:23:14 --> Utf8 Class Initialized
INFO - 2019-03-27 19:23:14 --> URI Class Initialized
INFO - 2019-03-27 19:23:14 --> Router Class Initialized
INFO - 2019-03-27 19:23:14 --> Output Class Initialized
INFO - 2019-03-27 19:23:14 --> Security Class Initialized
DEBUG - 2019-03-27 19:23:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:23:14 --> CSRF cookie sent
INFO - 2019-03-27 19:23:14 --> Input Class Initialized
INFO - 2019-03-27 19:23:14 --> Language Class Initialized
INFO - 2019-03-27 19:23:14 --> Loader Class Initialized
INFO - 2019-03-27 19:23:14 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:23:14 --> Controller Class Initialized
INFO - 2019-03-27 19:23:14 --> Helper loaded: form_helper
INFO - 2019-03-27 19:23:14 --> Helper loaded: url_helper
INFO - 2019-03-27 19:23:14 --> Helper loaded: date_helper
INFO - 2019-03-27 19:23:14 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:23:14 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:23:14 --> Encrypt Class Initialized
INFO - 2019-03-27 19:23:14 --> Email Class Initialized
INFO - 2019-03-27 19:23:14 --> Model Class Initialized
INFO - 2019-03-27 19:23:14 --> Database Driver Class Initialized
INFO - 2019-03-27 19:23:14 --> Model Class Initialized
DEBUG - 2019-03-27 19:23:14 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:23:14 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:23:14 --> Final output sent to browser
DEBUG - 2019-03-27 19:23:14 --> Total execution time: 0.0943
INFO - 2019-03-27 19:24:12 --> Config Class Initialized
INFO - 2019-03-27 19:24:12 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:24:12 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:24:12 --> Utf8 Class Initialized
INFO - 2019-03-27 19:24:12 --> URI Class Initialized
INFO - 2019-03-27 19:24:12 --> Router Class Initialized
INFO - 2019-03-27 19:24:12 --> Output Class Initialized
INFO - 2019-03-27 19:24:12 --> Security Class Initialized
DEBUG - 2019-03-27 19:24:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:24:12 --> CSRF cookie sent
INFO - 2019-03-27 19:24:12 --> Input Class Initialized
INFO - 2019-03-27 19:24:12 --> Language Class Initialized
INFO - 2019-03-27 19:24:12 --> Loader Class Initialized
INFO - 2019-03-27 19:24:12 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:24:12 --> Controller Class Initialized
INFO - 2019-03-27 19:24:12 --> Helper loaded: form_helper
INFO - 2019-03-27 19:24:12 --> Helper loaded: url_helper
INFO - 2019-03-27 19:24:12 --> Helper loaded: date_helper
INFO - 2019-03-27 19:24:12 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:24:12 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:24:12 --> Encrypt Class Initialized
INFO - 2019-03-27 19:24:12 --> Email Class Initialized
INFO - 2019-03-27 19:24:12 --> Model Class Initialized
INFO - 2019-03-27 19:24:12 --> Database Driver Class Initialized
INFO - 2019-03-27 19:24:12 --> Model Class Initialized
DEBUG - 2019-03-27 19:24:12 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:24:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:24:12 --> Final output sent to browser
DEBUG - 2019-03-27 19:24:12 --> Total execution time: 0.1062
INFO - 2019-03-27 19:24:34 --> Config Class Initialized
INFO - 2019-03-27 19:24:34 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:24:34 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:24:34 --> Utf8 Class Initialized
INFO - 2019-03-27 19:24:34 --> URI Class Initialized
INFO - 2019-03-27 19:24:34 --> Router Class Initialized
INFO - 2019-03-27 19:24:34 --> Output Class Initialized
INFO - 2019-03-27 19:24:34 --> Security Class Initialized
DEBUG - 2019-03-27 19:24:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:24:34 --> CSRF cookie sent
INFO - 2019-03-27 19:24:34 --> Input Class Initialized
INFO - 2019-03-27 19:24:34 --> Language Class Initialized
INFO - 2019-03-27 19:24:34 --> Loader Class Initialized
INFO - 2019-03-27 19:24:34 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:24:34 --> Controller Class Initialized
INFO - 2019-03-27 19:24:34 --> Helper loaded: form_helper
INFO - 2019-03-27 19:24:34 --> Helper loaded: url_helper
INFO - 2019-03-27 19:24:34 --> Helper loaded: date_helper
INFO - 2019-03-27 19:24:34 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:24:34 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:24:34 --> Encrypt Class Initialized
INFO - 2019-03-27 19:24:34 --> Email Class Initialized
INFO - 2019-03-27 19:24:34 --> Model Class Initialized
INFO - 2019-03-27 19:24:34 --> Database Driver Class Initialized
INFO - 2019-03-27 19:24:34 --> Model Class Initialized
DEBUG - 2019-03-27 19:24:34 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:24:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:24:34 --> Final output sent to browser
DEBUG - 2019-03-27 19:24:34 --> Total execution time: 0.1885
INFO - 2019-03-27 19:25:12 --> Config Class Initialized
INFO - 2019-03-27 19:25:12 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:25:12 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:25:12 --> Utf8 Class Initialized
INFO - 2019-03-27 19:25:12 --> URI Class Initialized
INFO - 2019-03-27 19:25:12 --> Router Class Initialized
INFO - 2019-03-27 19:25:12 --> Output Class Initialized
INFO - 2019-03-27 19:25:12 --> Security Class Initialized
DEBUG - 2019-03-27 19:25:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:25:12 --> CSRF cookie sent
INFO - 2019-03-27 19:25:12 --> Input Class Initialized
INFO - 2019-03-27 19:25:12 --> Language Class Initialized
INFO - 2019-03-27 19:25:12 --> Loader Class Initialized
INFO - 2019-03-27 19:25:12 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:25:12 --> Controller Class Initialized
INFO - 2019-03-27 19:25:12 --> Helper loaded: form_helper
INFO - 2019-03-27 19:25:12 --> Helper loaded: url_helper
INFO - 2019-03-27 19:25:12 --> Helper loaded: date_helper
INFO - 2019-03-27 19:25:12 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:25:12 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:25:12 --> Encrypt Class Initialized
INFO - 2019-03-27 19:25:12 --> Email Class Initialized
INFO - 2019-03-27 19:25:12 --> Model Class Initialized
INFO - 2019-03-27 19:25:12 --> Database Driver Class Initialized
INFO - 2019-03-27 19:25:12 --> Model Class Initialized
DEBUG - 2019-03-27 19:25:12 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:25:12 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:25:12 --> Final output sent to browser
DEBUG - 2019-03-27 19:25:12 --> Total execution time: 0.2337
INFO - 2019-03-27 19:27:49 --> Config Class Initialized
INFO - 2019-03-27 19:27:49 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:27:49 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:27:49 --> Utf8 Class Initialized
INFO - 2019-03-27 19:27:49 --> URI Class Initialized
INFO - 2019-03-27 19:27:49 --> Router Class Initialized
INFO - 2019-03-27 19:27:49 --> Output Class Initialized
INFO - 2019-03-27 19:27:49 --> Security Class Initialized
DEBUG - 2019-03-27 19:27:49 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:27:49 --> CSRF cookie sent
INFO - 2019-03-27 19:27:49 --> Input Class Initialized
INFO - 2019-03-27 19:27:49 --> Language Class Initialized
INFO - 2019-03-27 19:27:49 --> Loader Class Initialized
INFO - 2019-03-27 19:27:49 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:27:49 --> Controller Class Initialized
INFO - 2019-03-27 19:27:49 --> Helper loaded: form_helper
INFO - 2019-03-27 19:27:49 --> Helper loaded: url_helper
INFO - 2019-03-27 19:27:49 --> Helper loaded: date_helper
INFO - 2019-03-27 19:27:49 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:27:49 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:27:49 --> Encrypt Class Initialized
INFO - 2019-03-27 19:27:49 --> Email Class Initialized
INFO - 2019-03-27 19:27:49 --> Model Class Initialized
INFO - 2019-03-27 19:27:49 --> Database Driver Class Initialized
INFO - 2019-03-27 19:27:49 --> Model Class Initialized
DEBUG - 2019-03-27 19:27:49 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:27:49 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:27:49 --> Final output sent to browser
DEBUG - 2019-03-27 19:27:49 --> Total execution time: 0.0843
INFO - 2019-03-27 19:29:34 --> Config Class Initialized
INFO - 2019-03-27 19:29:34 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:29:34 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:29:34 --> Utf8 Class Initialized
INFO - 2019-03-27 19:29:34 --> URI Class Initialized
INFO - 2019-03-27 19:29:34 --> Router Class Initialized
INFO - 2019-03-27 19:29:34 --> Output Class Initialized
INFO - 2019-03-27 19:29:34 --> Security Class Initialized
DEBUG - 2019-03-27 19:29:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:29:34 --> CSRF cookie sent
INFO - 2019-03-27 19:29:34 --> Input Class Initialized
INFO - 2019-03-27 19:29:34 --> Language Class Initialized
INFO - 2019-03-27 19:29:34 --> Loader Class Initialized
INFO - 2019-03-27 19:29:34 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:29:34 --> Controller Class Initialized
INFO - 2019-03-27 19:29:34 --> Helper loaded: form_helper
INFO - 2019-03-27 19:29:34 --> Helper loaded: url_helper
INFO - 2019-03-27 19:29:34 --> Helper loaded: date_helper
INFO - 2019-03-27 19:29:34 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:29:34 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:29:34 --> Encrypt Class Initialized
INFO - 2019-03-27 19:29:34 --> Email Class Initialized
INFO - 2019-03-27 19:29:34 --> Model Class Initialized
INFO - 2019-03-27 19:29:34 --> Database Driver Class Initialized
INFO - 2019-03-27 19:29:34 --> Model Class Initialized
DEBUG - 2019-03-27 19:29:34 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:29:34 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:29:34 --> Final output sent to browser
DEBUG - 2019-03-27 19:29:34 --> Total execution time: 0.0973
INFO - 2019-03-27 19:30:21 --> Config Class Initialized
INFO - 2019-03-27 19:30:21 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:30:21 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:30:21 --> Utf8 Class Initialized
INFO - 2019-03-27 19:30:21 --> URI Class Initialized
INFO - 2019-03-27 19:30:21 --> Router Class Initialized
INFO - 2019-03-27 19:30:21 --> Output Class Initialized
INFO - 2019-03-27 19:30:21 --> Security Class Initialized
DEBUG - 2019-03-27 19:30:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:30:21 --> CSRF cookie sent
INFO - 2019-03-27 19:30:21 --> Input Class Initialized
INFO - 2019-03-27 19:30:21 --> Language Class Initialized
INFO - 2019-03-27 19:30:21 --> Loader Class Initialized
INFO - 2019-03-27 19:30:21 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:30:21 --> Controller Class Initialized
INFO - 2019-03-27 19:30:21 --> Helper loaded: form_helper
INFO - 2019-03-27 19:30:21 --> Helper loaded: url_helper
INFO - 2019-03-27 19:30:21 --> Helper loaded: date_helper
INFO - 2019-03-27 19:30:21 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:30:21 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:30:21 --> Encrypt Class Initialized
INFO - 2019-03-27 19:30:21 --> Email Class Initialized
INFO - 2019-03-27 19:30:21 --> Model Class Initialized
INFO - 2019-03-27 19:30:21 --> Database Driver Class Initialized
INFO - 2019-03-27 19:30:21 --> Model Class Initialized
DEBUG - 2019-03-27 19:30:21 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:30:21 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:30:21 --> Final output sent to browser
DEBUG - 2019-03-27 19:30:21 --> Total execution time: 0.1121
INFO - 2019-03-27 19:31:39 --> Config Class Initialized
INFO - 2019-03-27 19:31:39 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:31:39 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:31:39 --> Utf8 Class Initialized
INFO - 2019-03-27 19:31:39 --> URI Class Initialized
INFO - 2019-03-27 19:31:39 --> Router Class Initialized
INFO - 2019-03-27 19:31:39 --> Output Class Initialized
INFO - 2019-03-27 19:31:39 --> Security Class Initialized
DEBUG - 2019-03-27 19:31:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:31:39 --> CSRF cookie sent
INFO - 2019-03-27 19:31:39 --> Input Class Initialized
INFO - 2019-03-27 19:31:39 --> Language Class Initialized
INFO - 2019-03-27 19:31:39 --> Loader Class Initialized
INFO - 2019-03-27 19:31:39 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:31:39 --> Controller Class Initialized
INFO - 2019-03-27 19:31:39 --> Helper loaded: form_helper
INFO - 2019-03-27 19:31:39 --> Helper loaded: url_helper
INFO - 2019-03-27 19:31:39 --> Helper loaded: date_helper
INFO - 2019-03-27 19:31:39 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:31:39 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:31:39 --> Encrypt Class Initialized
INFO - 2019-03-27 19:31:39 --> Email Class Initialized
INFO - 2019-03-27 19:31:39 --> Model Class Initialized
INFO - 2019-03-27 19:31:39 --> Database Driver Class Initialized
INFO - 2019-03-27 19:31:39 --> Model Class Initialized
DEBUG - 2019-03-27 19:31:39 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:31:39 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:31:39 --> Final output sent to browser
DEBUG - 2019-03-27 19:31:39 --> Total execution time: 0.0843
INFO - 2019-03-27 19:32:00 --> Config Class Initialized
INFO - 2019-03-27 19:32:00 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:32:00 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:32:00 --> Utf8 Class Initialized
INFO - 2019-03-27 19:32:00 --> URI Class Initialized
INFO - 2019-03-27 19:32:00 --> Router Class Initialized
INFO - 2019-03-27 19:32:00 --> Output Class Initialized
INFO - 2019-03-27 19:32:00 --> Security Class Initialized
DEBUG - 2019-03-27 19:32:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:32:00 --> CSRF cookie sent
INFO - 2019-03-27 19:32:00 --> Input Class Initialized
INFO - 2019-03-27 19:32:00 --> Language Class Initialized
INFO - 2019-03-27 19:32:00 --> Loader Class Initialized
INFO - 2019-03-27 19:32:00 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:32:00 --> Controller Class Initialized
INFO - 2019-03-27 19:32:00 --> Helper loaded: form_helper
INFO - 2019-03-27 19:32:00 --> Helper loaded: url_helper
INFO - 2019-03-27 19:32:00 --> Helper loaded: date_helper
INFO - 2019-03-27 19:32:00 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:32:00 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:32:00 --> Encrypt Class Initialized
INFO - 2019-03-27 19:32:00 --> Email Class Initialized
INFO - 2019-03-27 19:32:00 --> Model Class Initialized
INFO - 2019-03-27 19:32:00 --> Database Driver Class Initialized
INFO - 2019-03-27 19:32:00 --> Model Class Initialized
DEBUG - 2019-03-27 19:32:00 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:32:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:32:00 --> Final output sent to browser
DEBUG - 2019-03-27 19:32:00 --> Total execution time: 0.0980
INFO - 2019-03-27 19:36:38 --> Config Class Initialized
INFO - 2019-03-27 19:36:38 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:36:38 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:36:38 --> Utf8 Class Initialized
INFO - 2019-03-27 19:36:38 --> URI Class Initialized
INFO - 2019-03-27 19:36:38 --> Router Class Initialized
INFO - 2019-03-27 19:36:38 --> Output Class Initialized
INFO - 2019-03-27 19:36:38 --> Security Class Initialized
DEBUG - 2019-03-27 19:36:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:36:38 --> CSRF cookie sent
INFO - 2019-03-27 19:36:38 --> Input Class Initialized
INFO - 2019-03-27 19:36:38 --> Language Class Initialized
INFO - 2019-03-27 19:36:38 --> Loader Class Initialized
INFO - 2019-03-27 19:36:38 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:36:38 --> Controller Class Initialized
INFO - 2019-03-27 19:36:38 --> Helper loaded: form_helper
INFO - 2019-03-27 19:36:38 --> Helper loaded: url_helper
INFO - 2019-03-27 19:36:38 --> Helper loaded: date_helper
INFO - 2019-03-27 19:36:38 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:36:38 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:36:38 --> Encrypt Class Initialized
INFO - 2019-03-27 19:36:38 --> Email Class Initialized
INFO - 2019-03-27 19:36:38 --> Model Class Initialized
INFO - 2019-03-27 19:36:38 --> Database Driver Class Initialized
INFO - 2019-03-27 19:36:38 --> Model Class Initialized
DEBUG - 2019-03-27 19:36:38 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:36:38 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:36:38 --> Final output sent to browser
DEBUG - 2019-03-27 19:36:38 --> Total execution time: 0.1011
INFO - 2019-03-27 19:36:58 --> Config Class Initialized
INFO - 2019-03-27 19:36:58 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:36:58 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:36:58 --> Utf8 Class Initialized
INFO - 2019-03-27 19:36:58 --> URI Class Initialized
INFO - 2019-03-27 19:36:58 --> Router Class Initialized
INFO - 2019-03-27 19:36:58 --> Output Class Initialized
INFO - 2019-03-27 19:36:58 --> Security Class Initialized
DEBUG - 2019-03-27 19:36:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:36:58 --> CSRF cookie sent
INFO - 2019-03-27 19:36:58 --> Input Class Initialized
INFO - 2019-03-27 19:36:58 --> Language Class Initialized
INFO - 2019-03-27 19:36:58 --> Loader Class Initialized
INFO - 2019-03-27 19:36:58 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:36:58 --> Controller Class Initialized
INFO - 2019-03-27 19:36:58 --> Helper loaded: form_helper
INFO - 2019-03-27 19:36:58 --> Helper loaded: url_helper
INFO - 2019-03-27 19:36:58 --> Helper loaded: date_helper
INFO - 2019-03-27 19:36:58 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:36:58 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:36:58 --> Encrypt Class Initialized
INFO - 2019-03-27 19:36:58 --> Email Class Initialized
INFO - 2019-03-27 19:36:58 --> Model Class Initialized
INFO - 2019-03-27 19:36:58 --> Database Driver Class Initialized
INFO - 2019-03-27 19:36:58 --> Model Class Initialized
DEBUG - 2019-03-27 19:36:58 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:36:58 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:36:58 --> Final output sent to browser
DEBUG - 2019-03-27 19:36:58 --> Total execution time: 0.1058
INFO - 2019-03-27 19:37:27 --> Config Class Initialized
INFO - 2019-03-27 19:37:27 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:37:27 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:37:27 --> Utf8 Class Initialized
INFO - 2019-03-27 19:37:27 --> URI Class Initialized
INFO - 2019-03-27 19:37:27 --> Router Class Initialized
INFO - 2019-03-27 19:37:27 --> Output Class Initialized
INFO - 2019-03-27 19:37:27 --> Security Class Initialized
DEBUG - 2019-03-27 19:37:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:37:27 --> CSRF cookie sent
INFO - 2019-03-27 19:37:27 --> Input Class Initialized
INFO - 2019-03-27 19:37:27 --> Language Class Initialized
INFO - 2019-03-27 19:37:27 --> Loader Class Initialized
INFO - 2019-03-27 19:37:27 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:37:27 --> Controller Class Initialized
INFO - 2019-03-27 19:37:27 --> Helper loaded: form_helper
INFO - 2019-03-27 19:37:27 --> Helper loaded: url_helper
INFO - 2019-03-27 19:37:27 --> Helper loaded: date_helper
INFO - 2019-03-27 19:37:27 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:37:27 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:37:27 --> Encrypt Class Initialized
INFO - 2019-03-27 19:37:27 --> Email Class Initialized
INFO - 2019-03-27 19:37:27 --> Model Class Initialized
INFO - 2019-03-27 19:37:27 --> Database Driver Class Initialized
INFO - 2019-03-27 19:37:27 --> Model Class Initialized
DEBUG - 2019-03-27 19:37:27 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:37:27 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:37:27 --> Final output sent to browser
DEBUG - 2019-03-27 19:37:27 --> Total execution time: 0.1055
INFO - 2019-03-27 19:38:18 --> Config Class Initialized
INFO - 2019-03-27 19:38:18 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:38:18 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:38:18 --> Utf8 Class Initialized
INFO - 2019-03-27 19:38:18 --> URI Class Initialized
INFO - 2019-03-27 19:38:18 --> Router Class Initialized
INFO - 2019-03-27 19:38:18 --> Output Class Initialized
INFO - 2019-03-27 19:38:18 --> Security Class Initialized
DEBUG - 2019-03-27 19:38:18 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:38:18 --> CSRF cookie sent
INFO - 2019-03-27 19:38:18 --> Input Class Initialized
INFO - 2019-03-27 19:38:18 --> Language Class Initialized
INFO - 2019-03-27 19:38:18 --> Loader Class Initialized
INFO - 2019-03-27 19:38:18 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:38:18 --> Controller Class Initialized
INFO - 2019-03-27 19:38:18 --> Helper loaded: form_helper
INFO - 2019-03-27 19:38:18 --> Helper loaded: url_helper
INFO - 2019-03-27 19:38:18 --> Helper loaded: date_helper
INFO - 2019-03-27 19:38:18 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:38:18 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:38:18 --> Encrypt Class Initialized
INFO - 2019-03-27 19:38:18 --> Email Class Initialized
INFO - 2019-03-27 19:38:18 --> Model Class Initialized
INFO - 2019-03-27 19:38:18 --> Database Driver Class Initialized
INFO - 2019-03-27 19:38:18 --> Model Class Initialized
DEBUG - 2019-03-27 19:38:18 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:38:18 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:38:18 --> Final output sent to browser
DEBUG - 2019-03-27 19:38:18 --> Total execution time: 0.1171
INFO - 2019-03-27 19:39:11 --> Config Class Initialized
INFO - 2019-03-27 19:39:11 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:39:11 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:39:11 --> Utf8 Class Initialized
INFO - 2019-03-27 19:39:11 --> URI Class Initialized
INFO - 2019-03-27 19:39:11 --> Router Class Initialized
INFO - 2019-03-27 19:39:11 --> Output Class Initialized
INFO - 2019-03-27 19:39:11 --> Security Class Initialized
DEBUG - 2019-03-27 19:39:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:39:11 --> CSRF cookie sent
INFO - 2019-03-27 19:39:11 --> Input Class Initialized
INFO - 2019-03-27 19:39:11 --> Language Class Initialized
INFO - 2019-03-27 19:39:11 --> Loader Class Initialized
INFO - 2019-03-27 19:39:11 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:39:11 --> Controller Class Initialized
INFO - 2019-03-27 19:39:11 --> Helper loaded: form_helper
INFO - 2019-03-27 19:39:11 --> Helper loaded: url_helper
INFO - 2019-03-27 19:39:11 --> Helper loaded: date_helper
INFO - 2019-03-27 19:39:11 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:39:11 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:39:11 --> Encrypt Class Initialized
INFO - 2019-03-27 19:39:11 --> Email Class Initialized
INFO - 2019-03-27 19:39:11 --> Model Class Initialized
INFO - 2019-03-27 19:39:11 --> Database Driver Class Initialized
INFO - 2019-03-27 19:39:11 --> Model Class Initialized
DEBUG - 2019-03-27 19:39:11 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:39:11 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:39:11 --> Final output sent to browser
DEBUG - 2019-03-27 19:39:11 --> Total execution time: 0.0917
INFO - 2019-03-27 19:39:23 --> Config Class Initialized
INFO - 2019-03-27 19:39:23 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:39:23 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:39:23 --> Utf8 Class Initialized
INFO - 2019-03-27 19:39:23 --> URI Class Initialized
INFO - 2019-03-27 19:39:23 --> Router Class Initialized
INFO - 2019-03-27 19:39:23 --> Output Class Initialized
INFO - 2019-03-27 19:39:23 --> Security Class Initialized
DEBUG - 2019-03-27 19:39:23 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:39:23 --> CSRF cookie sent
INFO - 2019-03-27 19:39:23 --> Input Class Initialized
INFO - 2019-03-27 19:39:23 --> Language Class Initialized
INFO - 2019-03-27 19:39:23 --> Loader Class Initialized
INFO - 2019-03-27 19:39:23 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:39:23 --> Controller Class Initialized
INFO - 2019-03-27 19:39:23 --> Helper loaded: form_helper
INFO - 2019-03-27 19:39:23 --> Helper loaded: url_helper
INFO - 2019-03-27 19:39:23 --> Helper loaded: date_helper
INFO - 2019-03-27 19:39:23 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:39:23 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:39:23 --> Encrypt Class Initialized
INFO - 2019-03-27 19:39:23 --> Email Class Initialized
INFO - 2019-03-27 19:39:23 --> Model Class Initialized
INFO - 2019-03-27 19:39:23 --> Database Driver Class Initialized
INFO - 2019-03-27 19:39:23 --> Model Class Initialized
DEBUG - 2019-03-27 19:39:23 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:39:23 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:39:23 --> Final output sent to browser
DEBUG - 2019-03-27 19:39:23 --> Total execution time: 0.0900
INFO - 2019-03-27 19:40:08 --> Config Class Initialized
INFO - 2019-03-27 19:40:08 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:40:08 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:40:08 --> Utf8 Class Initialized
INFO - 2019-03-27 19:40:08 --> URI Class Initialized
INFO - 2019-03-27 19:40:08 --> Router Class Initialized
INFO - 2019-03-27 19:40:08 --> Output Class Initialized
INFO - 2019-03-27 19:40:08 --> Security Class Initialized
DEBUG - 2019-03-27 19:40:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:40:08 --> CSRF cookie sent
INFO - 2019-03-27 19:40:08 --> Input Class Initialized
INFO - 2019-03-27 19:40:08 --> Language Class Initialized
INFO - 2019-03-27 19:40:08 --> Loader Class Initialized
INFO - 2019-03-27 19:40:08 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:40:08 --> Controller Class Initialized
INFO - 2019-03-27 19:40:08 --> Helper loaded: form_helper
INFO - 2019-03-27 19:40:08 --> Helper loaded: url_helper
INFO - 2019-03-27 19:40:08 --> Helper loaded: date_helper
INFO - 2019-03-27 19:40:08 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:40:08 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:40:08 --> Encrypt Class Initialized
INFO - 2019-03-27 19:40:08 --> Email Class Initialized
INFO - 2019-03-27 19:40:08 --> Model Class Initialized
INFO - 2019-03-27 19:40:08 --> Database Driver Class Initialized
INFO - 2019-03-27 19:40:08 --> Model Class Initialized
DEBUG - 2019-03-27 19:40:08 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:40:08 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:40:08 --> Final output sent to browser
DEBUG - 2019-03-27 19:40:08 --> Total execution time: 0.1634
INFO - 2019-03-27 19:40:32 --> Config Class Initialized
INFO - 2019-03-27 19:40:32 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:40:32 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:40:32 --> Utf8 Class Initialized
INFO - 2019-03-27 19:40:32 --> URI Class Initialized
INFO - 2019-03-27 19:40:32 --> Router Class Initialized
INFO - 2019-03-27 19:40:32 --> Output Class Initialized
INFO - 2019-03-27 19:40:32 --> Security Class Initialized
DEBUG - 2019-03-27 19:40:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:40:32 --> CSRF cookie sent
INFO - 2019-03-27 19:40:32 --> Input Class Initialized
INFO - 2019-03-27 19:40:32 --> Language Class Initialized
INFO - 2019-03-27 19:40:32 --> Loader Class Initialized
INFO - 2019-03-27 19:40:32 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:40:32 --> Controller Class Initialized
INFO - 2019-03-27 19:40:32 --> Helper loaded: form_helper
INFO - 2019-03-27 19:40:32 --> Helper loaded: url_helper
INFO - 2019-03-27 19:40:32 --> Helper loaded: date_helper
INFO - 2019-03-27 19:40:32 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:40:32 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:40:32 --> Encrypt Class Initialized
INFO - 2019-03-27 19:40:32 --> Email Class Initialized
INFO - 2019-03-27 19:40:32 --> Model Class Initialized
INFO - 2019-03-27 19:40:32 --> Database Driver Class Initialized
INFO - 2019-03-27 19:40:32 --> Model Class Initialized
DEBUG - 2019-03-27 19:40:32 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:40:32 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:40:32 --> Final output sent to browser
DEBUG - 2019-03-27 19:40:32 --> Total execution time: 0.1082
INFO - 2019-03-27 19:40:53 --> Config Class Initialized
INFO - 2019-03-27 19:40:53 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:40:53 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:40:53 --> Utf8 Class Initialized
INFO - 2019-03-27 19:40:53 --> URI Class Initialized
INFO - 2019-03-27 19:40:53 --> Router Class Initialized
INFO - 2019-03-27 19:40:53 --> Output Class Initialized
INFO - 2019-03-27 19:40:53 --> Security Class Initialized
DEBUG - 2019-03-27 19:40:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:40:53 --> CSRF cookie sent
INFO - 2019-03-27 19:40:53 --> Input Class Initialized
INFO - 2019-03-27 19:40:53 --> Language Class Initialized
INFO - 2019-03-27 19:40:53 --> Loader Class Initialized
INFO - 2019-03-27 19:40:53 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:40:53 --> Controller Class Initialized
INFO - 2019-03-27 19:40:53 --> Helper loaded: form_helper
INFO - 2019-03-27 19:40:53 --> Helper loaded: url_helper
INFO - 2019-03-27 19:40:53 --> Helper loaded: date_helper
INFO - 2019-03-27 19:40:53 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:40:53 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:40:53 --> Encrypt Class Initialized
INFO - 2019-03-27 19:40:53 --> Email Class Initialized
INFO - 2019-03-27 19:40:53 --> Model Class Initialized
INFO - 2019-03-27 19:40:53 --> Database Driver Class Initialized
INFO - 2019-03-27 19:40:53 --> Model Class Initialized
DEBUG - 2019-03-27 19:40:53 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/bond_view.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:40:53 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:40:53 --> Final output sent to browser
DEBUG - 2019-03-27 19:40:53 --> Total execution time: 0.1781
INFO - 2019-03-27 19:41:01 --> Config Class Initialized
INFO - 2019-03-27 19:41:01 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:41:01 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:41:01 --> Utf8 Class Initialized
INFO - 2019-03-27 19:41:01 --> URI Class Initialized
INFO - 2019-03-27 19:41:01 --> Router Class Initialized
INFO - 2019-03-27 19:41:01 --> Output Class Initialized
INFO - 2019-03-27 19:41:01 --> Security Class Initialized
DEBUG - 2019-03-27 19:41:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:41:01 --> CSRF cookie sent
INFO - 2019-03-27 19:41:01 --> Input Class Initialized
INFO - 2019-03-27 19:41:01 --> Language Class Initialized
INFO - 2019-03-27 19:41:01 --> Loader Class Initialized
INFO - 2019-03-27 19:41:01 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:41:01 --> Controller Class Initialized
INFO - 2019-03-27 19:41:01 --> Helper loaded: form_helper
INFO - 2019-03-27 19:41:01 --> Helper loaded: url_helper
INFO - 2019-03-27 19:41:01 --> Helper loaded: date_helper
INFO - 2019-03-27 19:41:01 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:41:01 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:41:01 --> Encrypt Class Initialized
INFO - 2019-03-27 19:41:01 --> Email Class Initialized
INFO - 2019-03-27 19:41:01 --> Model Class Initialized
INFO - 2019-03-27 19:41:01 --> Database Driver Class Initialized
INFO - 2019-03-27 19:41:01 --> Model Class Initialized
DEBUG - 2019-03-27 19:41:01 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/infactor_view.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:41:01 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:41:02 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:41:02 --> Final output sent to browser
DEBUG - 2019-03-27 19:41:02 --> Total execution time: 0.1333
INFO - 2019-03-27 19:41:45 --> Config Class Initialized
INFO - 2019-03-27 19:41:45 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:41:45 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:41:45 --> Utf8 Class Initialized
INFO - 2019-03-27 19:41:45 --> URI Class Initialized
INFO - 2019-03-27 19:41:45 --> Router Class Initialized
INFO - 2019-03-27 19:41:45 --> Output Class Initialized
INFO - 2019-03-27 19:41:45 --> Security Class Initialized
DEBUG - 2019-03-27 19:41:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:41:45 --> CSRF cookie sent
INFO - 2019-03-27 19:41:45 --> Input Class Initialized
INFO - 2019-03-27 19:41:45 --> Language Class Initialized
INFO - 2019-03-27 19:41:45 --> Loader Class Initialized
INFO - 2019-03-27 19:41:45 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:41:45 --> Controller Class Initialized
INFO - 2019-03-27 19:41:45 --> Helper loaded: form_helper
INFO - 2019-03-27 19:41:45 --> Helper loaded: url_helper
INFO - 2019-03-27 19:41:45 --> Helper loaded: date_helper
INFO - 2019-03-27 19:41:45 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:41:45 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:41:45 --> Encrypt Class Initialized
INFO - 2019-03-27 19:41:45 --> Email Class Initialized
INFO - 2019-03-27 19:41:45 --> Model Class Initialized
INFO - 2019-03-27 19:41:45 --> Database Driver Class Initialized
INFO - 2019-03-27 19:41:45 --> Model Class Initialized
DEBUG - 2019-03-27 19:41:45 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:41:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:41:45 --> Final output sent to browser
DEBUG - 2019-03-27 19:41:45 --> Total execution time: 0.2574
INFO - 2019-03-27 19:42:45 --> Config Class Initialized
INFO - 2019-03-27 19:42:45 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:42:45 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:42:45 --> Utf8 Class Initialized
INFO - 2019-03-27 19:42:45 --> URI Class Initialized
INFO - 2019-03-27 19:42:45 --> Router Class Initialized
INFO - 2019-03-27 19:42:45 --> Output Class Initialized
INFO - 2019-03-27 19:42:45 --> Security Class Initialized
DEBUG - 2019-03-27 19:42:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:42:45 --> CSRF cookie sent
INFO - 2019-03-27 19:42:45 --> Input Class Initialized
INFO - 2019-03-27 19:42:45 --> Language Class Initialized
INFO - 2019-03-27 19:42:45 --> Loader Class Initialized
INFO - 2019-03-27 19:42:45 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:42:45 --> Controller Class Initialized
INFO - 2019-03-27 19:42:45 --> Helper loaded: form_helper
INFO - 2019-03-27 19:42:45 --> Helper loaded: url_helper
INFO - 2019-03-27 19:42:45 --> Helper loaded: date_helper
INFO - 2019-03-27 19:42:45 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:42:45 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:42:45 --> Encrypt Class Initialized
INFO - 2019-03-27 19:42:45 --> Email Class Initialized
INFO - 2019-03-27 19:42:45 --> Model Class Initialized
INFO - 2019-03-27 19:42:45 --> Database Driver Class Initialized
INFO - 2019-03-27 19:42:45 --> Model Class Initialized
DEBUG - 2019-03-27 19:42:45 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:42:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:42:45 --> Final output sent to browser
DEBUG - 2019-03-27 19:42:45 --> Total execution time: 0.2055
INFO - 2019-03-27 19:42:55 --> Config Class Initialized
INFO - 2019-03-27 19:42:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:42:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:42:55 --> Utf8 Class Initialized
INFO - 2019-03-27 19:42:55 --> URI Class Initialized
INFO - 2019-03-27 19:42:55 --> Router Class Initialized
INFO - 2019-03-27 19:42:55 --> Output Class Initialized
INFO - 2019-03-27 19:42:55 --> Security Class Initialized
DEBUG - 2019-03-27 19:42:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:42:55 --> CSRF cookie sent
INFO - 2019-03-27 19:42:55 --> Input Class Initialized
INFO - 2019-03-27 19:42:55 --> Language Class Initialized
INFO - 2019-03-27 19:42:55 --> Loader Class Initialized
INFO - 2019-03-27 19:42:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:42:55 --> Controller Class Initialized
INFO - 2019-03-27 19:42:55 --> Helper loaded: form_helper
INFO - 2019-03-27 19:42:55 --> Helper loaded: url_helper
INFO - 2019-03-27 19:42:55 --> Helper loaded: date_helper
INFO - 2019-03-27 19:42:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:42:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:42:55 --> Encrypt Class Initialized
INFO - 2019-03-27 19:42:55 --> Email Class Initialized
INFO - 2019-03-27 19:42:55 --> Model Class Initialized
INFO - 2019-03-27 19:42:55 --> Database Driver Class Initialized
INFO - 2019-03-27 19:42:55 --> Model Class Initialized
DEBUG - 2019-03-27 19:42:55 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:42:55 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:42:55 --> Final output sent to browser
DEBUG - 2019-03-27 19:42:55 --> Total execution time: 0.2084
INFO - 2019-03-27 19:43:43 --> Config Class Initialized
INFO - 2019-03-27 19:43:43 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:43:43 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:43:43 --> Utf8 Class Initialized
INFO - 2019-03-27 19:43:43 --> URI Class Initialized
INFO - 2019-03-27 19:43:43 --> Router Class Initialized
INFO - 2019-03-27 19:43:43 --> Output Class Initialized
INFO - 2019-03-27 19:43:43 --> Security Class Initialized
DEBUG - 2019-03-27 19:43:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:43:43 --> CSRF cookie sent
INFO - 2019-03-27 19:43:43 --> Input Class Initialized
INFO - 2019-03-27 19:43:43 --> Language Class Initialized
INFO - 2019-03-27 19:43:43 --> Loader Class Initialized
INFO - 2019-03-27 19:43:43 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:43:43 --> Controller Class Initialized
INFO - 2019-03-27 19:43:43 --> Helper loaded: form_helper
INFO - 2019-03-27 19:43:43 --> Helper loaded: url_helper
INFO - 2019-03-27 19:43:43 --> Helper loaded: date_helper
INFO - 2019-03-27 19:43:43 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:43:43 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:43:43 --> Encrypt Class Initialized
INFO - 2019-03-27 19:43:43 --> Email Class Initialized
INFO - 2019-03-27 19:43:43 --> Model Class Initialized
INFO - 2019-03-27 19:43:43 --> Database Driver Class Initialized
INFO - 2019-03-27 19:43:43 --> Model Class Initialized
DEBUG - 2019-03-27 19:43:43 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:43:43 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:43:43 --> Final output sent to browser
DEBUG - 2019-03-27 19:43:43 --> Total execution time: 0.1041
INFO - 2019-03-27 19:45:52 --> Config Class Initialized
INFO - 2019-03-27 19:45:52 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:45:52 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:45:52 --> Utf8 Class Initialized
INFO - 2019-03-27 19:45:52 --> URI Class Initialized
INFO - 2019-03-27 19:45:52 --> Router Class Initialized
INFO - 2019-03-27 19:45:52 --> Output Class Initialized
INFO - 2019-03-27 19:45:52 --> Security Class Initialized
DEBUG - 2019-03-27 19:45:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:45:52 --> CSRF cookie sent
INFO - 2019-03-27 19:45:52 --> Input Class Initialized
INFO - 2019-03-27 19:45:52 --> Language Class Initialized
INFO - 2019-03-27 19:45:52 --> Loader Class Initialized
INFO - 2019-03-27 19:45:52 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:45:52 --> Controller Class Initialized
INFO - 2019-03-27 19:45:52 --> Helper loaded: form_helper
INFO - 2019-03-27 19:45:52 --> Helper loaded: url_helper
INFO - 2019-03-27 19:45:52 --> Helper loaded: date_helper
INFO - 2019-03-27 19:45:52 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:45:52 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:45:52 --> Encrypt Class Initialized
INFO - 2019-03-27 19:45:52 --> Email Class Initialized
INFO - 2019-03-27 19:45:52 --> Model Class Initialized
INFO - 2019-03-27 19:45:52 --> Database Driver Class Initialized
INFO - 2019-03-27 19:45:52 --> Model Class Initialized
DEBUG - 2019-03-27 19:45:52 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:45:52 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:45:52 --> Final output sent to browser
DEBUG - 2019-03-27 19:45:52 --> Total execution time: 0.0838
INFO - 2019-03-27 19:45:56 --> Config Class Initialized
INFO - 2019-03-27 19:45:56 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:45:56 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:45:56 --> Utf8 Class Initialized
INFO - 2019-03-27 19:45:56 --> URI Class Initialized
INFO - 2019-03-27 19:45:56 --> Router Class Initialized
INFO - 2019-03-27 19:45:56 --> Output Class Initialized
INFO - 2019-03-27 19:45:56 --> Security Class Initialized
DEBUG - 2019-03-27 19:45:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:45:56 --> CSRF cookie sent
INFO - 2019-03-27 19:45:56 --> Input Class Initialized
INFO - 2019-03-27 19:45:56 --> Language Class Initialized
INFO - 2019-03-27 19:45:56 --> Loader Class Initialized
INFO - 2019-03-27 19:45:56 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:45:56 --> Controller Class Initialized
INFO - 2019-03-27 19:45:56 --> Helper loaded: form_helper
INFO - 2019-03-27 19:45:56 --> Helper loaded: url_helper
INFO - 2019-03-27 19:45:56 --> Helper loaded: date_helper
INFO - 2019-03-27 19:45:56 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:45:56 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:45:56 --> Encrypt Class Initialized
INFO - 2019-03-27 19:45:56 --> Email Class Initialized
INFO - 2019-03-27 19:45:56 --> Model Class Initialized
INFO - 2019-03-27 19:45:56 --> Database Driver Class Initialized
INFO - 2019-03-27 19:45:56 --> Model Class Initialized
DEBUG - 2019-03-27 19:45:56 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/infactor_view.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:45:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:45:56 --> Final output sent to browser
DEBUG - 2019-03-27 19:45:56 --> Total execution time: 0.0880
INFO - 2019-03-27 19:46:57 --> Config Class Initialized
INFO - 2019-03-27 19:46:57 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:46:57 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:46:57 --> Utf8 Class Initialized
INFO - 2019-03-27 19:46:57 --> URI Class Initialized
INFO - 2019-03-27 19:46:57 --> Router Class Initialized
INFO - 2019-03-27 19:46:57 --> Output Class Initialized
INFO - 2019-03-27 19:46:57 --> Security Class Initialized
DEBUG - 2019-03-27 19:46:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:46:57 --> CSRF cookie sent
INFO - 2019-03-27 19:46:57 --> Input Class Initialized
INFO - 2019-03-27 19:46:57 --> Language Class Initialized
INFO - 2019-03-27 19:46:57 --> Loader Class Initialized
INFO - 2019-03-27 19:46:57 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:46:57 --> Controller Class Initialized
INFO - 2019-03-27 19:46:57 --> Helper loaded: form_helper
INFO - 2019-03-27 19:46:57 --> Helper loaded: url_helper
INFO - 2019-03-27 19:46:57 --> Helper loaded: date_helper
INFO - 2019-03-27 19:46:57 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:46:57 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:46:57 --> Encrypt Class Initialized
INFO - 2019-03-27 19:46:57 --> Email Class Initialized
INFO - 2019-03-27 19:46:57 --> Model Class Initialized
INFO - 2019-03-27 19:46:57 --> Database Driver Class Initialized
INFO - 2019-03-27 19:46:57 --> Model Class Initialized
DEBUG - 2019-03-27 19:46:57 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:46:57 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:46:57 --> Final output sent to browser
DEBUG - 2019-03-27 19:46:57 --> Total execution time: 0.1068
INFO - 2019-03-27 19:47:00 --> Config Class Initialized
INFO - 2019-03-27 19:47:00 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:47:00 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:47:00 --> Utf8 Class Initialized
INFO - 2019-03-27 19:47:00 --> URI Class Initialized
INFO - 2019-03-27 19:47:00 --> Router Class Initialized
INFO - 2019-03-27 19:47:00 --> Output Class Initialized
INFO - 2019-03-27 19:47:00 --> Security Class Initialized
DEBUG - 2019-03-27 19:47:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:47:00 --> CSRF cookie sent
INFO - 2019-03-27 19:47:00 --> Input Class Initialized
INFO - 2019-03-27 19:47:00 --> Language Class Initialized
INFO - 2019-03-27 19:47:00 --> Loader Class Initialized
INFO - 2019-03-27 19:47:00 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:47:00 --> Controller Class Initialized
INFO - 2019-03-27 19:47:00 --> Helper loaded: form_helper
INFO - 2019-03-27 19:47:00 --> Helper loaded: url_helper
INFO - 2019-03-27 19:47:00 --> Helper loaded: date_helper
INFO - 2019-03-27 19:47:00 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:47:00 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:47:00 --> Encrypt Class Initialized
INFO - 2019-03-27 19:47:00 --> Email Class Initialized
INFO - 2019-03-27 19:47:00 --> Model Class Initialized
INFO - 2019-03-27 19:47:00 --> Database Driver Class Initialized
INFO - 2019-03-27 19:47:00 --> Model Class Initialized
DEBUG - 2019-03-27 19:47:00 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:47:00 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:47:00 --> Final output sent to browser
DEBUG - 2019-03-27 19:47:00 --> Total execution time: 0.1617
INFO - 2019-03-27 19:47:16 --> Config Class Initialized
INFO - 2019-03-27 19:47:16 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:47:16 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:47:16 --> Utf8 Class Initialized
INFO - 2019-03-27 19:47:16 --> URI Class Initialized
INFO - 2019-03-27 19:47:16 --> Router Class Initialized
INFO - 2019-03-27 19:47:16 --> Output Class Initialized
INFO - 2019-03-27 19:47:16 --> Security Class Initialized
DEBUG - 2019-03-27 19:47:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:47:16 --> CSRF cookie sent
INFO - 2019-03-27 19:47:16 --> Input Class Initialized
INFO - 2019-03-27 19:47:16 --> Language Class Initialized
INFO - 2019-03-27 19:47:16 --> Loader Class Initialized
INFO - 2019-03-27 19:47:16 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:47:16 --> Controller Class Initialized
INFO - 2019-03-27 19:47:16 --> Helper loaded: form_helper
INFO - 2019-03-27 19:47:16 --> Helper loaded: url_helper
INFO - 2019-03-27 19:47:16 --> Helper loaded: date_helper
INFO - 2019-03-27 19:47:16 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:47:16 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:47:16 --> Encrypt Class Initialized
INFO - 2019-03-27 19:47:16 --> Email Class Initialized
INFO - 2019-03-27 19:47:16 --> Model Class Initialized
INFO - 2019-03-27 19:47:16 --> Database Driver Class Initialized
INFO - 2019-03-27 19:47:16 --> Model Class Initialized
DEBUG - 2019-03-27 19:47:16 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:47:16 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:47:16 --> Final output sent to browser
DEBUG - 2019-03-27 19:47:16 --> Total execution time: 0.0955
INFO - 2019-03-27 19:47:44 --> Config Class Initialized
INFO - 2019-03-27 19:47:44 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:47:44 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:47:44 --> Utf8 Class Initialized
INFO - 2019-03-27 19:47:44 --> URI Class Initialized
INFO - 2019-03-27 19:47:44 --> Router Class Initialized
INFO - 2019-03-27 19:47:44 --> Output Class Initialized
INFO - 2019-03-27 19:47:44 --> Security Class Initialized
DEBUG - 2019-03-27 19:47:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:47:44 --> CSRF cookie sent
INFO - 2019-03-27 19:47:44 --> Input Class Initialized
INFO - 2019-03-27 19:47:44 --> Language Class Initialized
INFO - 2019-03-27 19:47:44 --> Loader Class Initialized
INFO - 2019-03-27 19:47:44 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:47:44 --> Controller Class Initialized
INFO - 2019-03-27 19:47:44 --> Helper loaded: form_helper
INFO - 2019-03-27 19:47:44 --> Helper loaded: url_helper
INFO - 2019-03-27 19:47:44 --> Helper loaded: date_helper
INFO - 2019-03-27 19:47:44 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:47:44 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:47:44 --> Encrypt Class Initialized
INFO - 2019-03-27 19:47:44 --> Email Class Initialized
INFO - 2019-03-27 19:47:44 --> Model Class Initialized
INFO - 2019-03-27 19:47:44 --> Database Driver Class Initialized
INFO - 2019-03-27 19:47:44 --> Model Class Initialized
DEBUG - 2019-03-27 19:47:44 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:47:44 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:47:44 --> Final output sent to browser
DEBUG - 2019-03-27 19:47:44 --> Total execution time: 0.0999
INFO - 2019-03-27 19:48:13 --> Config Class Initialized
INFO - 2019-03-27 19:48:13 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:48:13 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:48:13 --> Utf8 Class Initialized
INFO - 2019-03-27 19:48:13 --> URI Class Initialized
INFO - 2019-03-27 19:48:13 --> Router Class Initialized
INFO - 2019-03-27 19:48:13 --> Output Class Initialized
INFO - 2019-03-27 19:48:13 --> Security Class Initialized
DEBUG - 2019-03-27 19:48:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:48:13 --> CSRF cookie sent
INFO - 2019-03-27 19:48:13 --> Input Class Initialized
INFO - 2019-03-27 19:48:13 --> Language Class Initialized
INFO - 2019-03-27 19:48:13 --> Loader Class Initialized
INFO - 2019-03-27 19:48:13 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:48:13 --> Controller Class Initialized
INFO - 2019-03-27 19:48:13 --> Helper loaded: form_helper
INFO - 2019-03-27 19:48:13 --> Helper loaded: url_helper
INFO - 2019-03-27 19:48:13 --> Helper loaded: date_helper
INFO - 2019-03-27 19:48:13 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:48:13 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:48:13 --> Encrypt Class Initialized
INFO - 2019-03-27 19:48:13 --> Email Class Initialized
INFO - 2019-03-27 19:48:13 --> Model Class Initialized
INFO - 2019-03-27 19:48:13 --> Database Driver Class Initialized
INFO - 2019-03-27 19:48:13 --> Model Class Initialized
DEBUG - 2019-03-27 19:48:13 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:48:13 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:48:13 --> Final output sent to browser
DEBUG - 2019-03-27 19:48:13 --> Total execution time: 0.1067
INFO - 2019-03-27 19:52:49 --> Config Class Initialized
INFO - 2019-03-27 19:52:49 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:52:49 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:52:49 --> Utf8 Class Initialized
INFO - 2019-03-27 19:52:49 --> URI Class Initialized
INFO - 2019-03-27 19:52:49 --> Router Class Initialized
INFO - 2019-03-27 19:52:49 --> Output Class Initialized
INFO - 2019-03-27 19:52:50 --> Security Class Initialized
DEBUG - 2019-03-27 19:52:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:52:50 --> CSRF cookie sent
INFO - 2019-03-27 19:52:50 --> Input Class Initialized
INFO - 2019-03-27 19:52:50 --> Language Class Initialized
INFO - 2019-03-27 19:52:50 --> Loader Class Initialized
INFO - 2019-03-27 19:52:50 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:52:50 --> Controller Class Initialized
INFO - 2019-03-27 19:52:50 --> Helper loaded: form_helper
INFO - 2019-03-27 19:52:50 --> Helper loaded: url_helper
INFO - 2019-03-27 19:52:50 --> Helper loaded: date_helper
INFO - 2019-03-27 19:52:50 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:52:50 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:52:50 --> Encrypt Class Initialized
INFO - 2019-03-27 19:52:50 --> Email Class Initialized
INFO - 2019-03-27 19:52:50 --> Model Class Initialized
INFO - 2019-03-27 19:52:50 --> Database Driver Class Initialized
INFO - 2019-03-27 19:52:50 --> Model Class Initialized
DEBUG - 2019-03-27 19:52:50 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:52:50 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:52:50 --> Final output sent to browser
DEBUG - 2019-03-27 19:52:50 --> Total execution time: 0.3776
INFO - 2019-03-27 19:54:51 --> Config Class Initialized
INFO - 2019-03-27 19:54:51 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:54:51 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:54:51 --> Utf8 Class Initialized
INFO - 2019-03-27 19:54:51 --> URI Class Initialized
INFO - 2019-03-27 19:54:51 --> Router Class Initialized
INFO - 2019-03-27 19:54:51 --> Output Class Initialized
INFO - 2019-03-27 19:54:51 --> Security Class Initialized
DEBUG - 2019-03-27 19:54:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:54:51 --> CSRF cookie sent
INFO - 2019-03-27 19:54:51 --> Input Class Initialized
INFO - 2019-03-27 19:54:51 --> Language Class Initialized
INFO - 2019-03-27 19:54:51 --> Loader Class Initialized
INFO - 2019-03-27 19:54:51 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:54:51 --> Controller Class Initialized
INFO - 2019-03-27 19:54:51 --> Helper loaded: form_helper
INFO - 2019-03-27 19:54:51 --> Helper loaded: url_helper
INFO - 2019-03-27 19:54:51 --> Helper loaded: date_helper
INFO - 2019-03-27 19:54:51 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:54:51 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:54:51 --> Encrypt Class Initialized
INFO - 2019-03-27 19:54:51 --> Email Class Initialized
INFO - 2019-03-27 19:54:51 --> Model Class Initialized
INFO - 2019-03-27 19:54:51 --> Database Driver Class Initialized
INFO - 2019-03-27 19:54:51 --> Model Class Initialized
DEBUG - 2019-03-27 19:54:51 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:54:51 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:54:51 --> Final output sent to browser
DEBUG - 2019-03-27 19:54:51 --> Total execution time: 0.1171
INFO - 2019-03-27 19:55:45 --> Config Class Initialized
INFO - 2019-03-27 19:55:45 --> Hooks Class Initialized
DEBUG - 2019-03-27 19:55:45 --> UTF-8 Support Enabled
INFO - 2019-03-27 19:55:45 --> Utf8 Class Initialized
INFO - 2019-03-27 19:55:45 --> URI Class Initialized
INFO - 2019-03-27 19:55:45 --> Router Class Initialized
INFO - 2019-03-27 19:55:45 --> Output Class Initialized
INFO - 2019-03-27 19:55:45 --> Security Class Initialized
DEBUG - 2019-03-27 19:55:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 19:55:45 --> CSRF cookie sent
INFO - 2019-03-27 19:55:45 --> Input Class Initialized
INFO - 2019-03-27 19:55:45 --> Language Class Initialized
INFO - 2019-03-27 19:55:45 --> Loader Class Initialized
INFO - 2019-03-27 19:55:45 --> Helper loaded: cache_helper
INFO - 2019-03-27 19:55:45 --> Controller Class Initialized
INFO - 2019-03-27 19:55:45 --> Helper loaded: form_helper
INFO - 2019-03-27 19:55:45 --> Helper loaded: url_helper
INFO - 2019-03-27 19:55:45 --> Helper loaded: date_helper
INFO - 2019-03-27 19:55:45 --> Helper loaded: notification_helper
INFO - 2019-03-27 19:55:45 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 19:55:45 --> Encrypt Class Initialized
INFO - 2019-03-27 19:55:45 --> Email Class Initialized
INFO - 2019-03-27 19:55:45 --> Model Class Initialized
INFO - 2019-03-27 19:55:45 --> Database Driver Class Initialized
INFO - 2019-03-27 19:55:45 --> Model Class Initialized
DEBUG - 2019-03-27 19:55:45 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_navn.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/header_publicn.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/login_modal.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages/public/consortium_view.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footer_commonn.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\pages_scripts/common_scripts.php
INFO - 2019-03-27 19:55:45 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/footern.php
INFO - 2019-03-27 19:55:45 --> Final output sent to browser
DEBUG - 2019-03-27 19:55:45 --> Total execution time: 0.0898
INFO - 2019-03-27 20:01:55 --> Config Class Initialized
INFO - 2019-03-27 20:01:55 --> Hooks Class Initialized
DEBUG - 2019-03-27 20:01:55 --> UTF-8 Support Enabled
INFO - 2019-03-27 20:01:55 --> Utf8 Class Initialized
INFO - 2019-03-27 20:01:55 --> URI Class Initialized
INFO - 2019-03-27 20:01:55 --> Router Class Initialized
INFO - 2019-03-27 20:01:55 --> Output Class Initialized
INFO - 2019-03-27 20:01:55 --> Security Class Initialized
DEBUG - 2019-03-27 20:01:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-03-27 20:01:55 --> CSRF cookie sent
INFO - 2019-03-27 20:01:55 --> Input Class Initialized
INFO - 2019-03-27 20:01:55 --> Language Class Initialized
INFO - 2019-03-27 20:01:55 --> Loader Class Initialized
INFO - 2019-03-27 20:01:55 --> Helper loaded: cache_helper
INFO - 2019-03-27 20:01:55 --> Controller Class Initialized
INFO - 2019-03-27 20:01:55 --> Helper loaded: form_helper
INFO - 2019-03-27 20:01:55 --> Helper loaded: url_helper
INFO - 2019-03-27 20:01:55 --> Helper loaded: date_helper
INFO - 2019-03-27 20:01:55 --> Helper loaded: notification_helper
INFO - 2019-03-27 20:01:55 --> Session: Class initialized using 'files' driver.
INFO - 2019-03-27 20:01:56 --> Encrypt Class Initialized
INFO - 2019-03-27 20:01:56 --> Email Class Initialized
INFO - 2019-03-27 20:01:56 --> Model Class Initialized
INFO - 2019-03-27 20:01:56 --> Database Driver Class Initialized
ERROR - 2019-03-27 20:01:56 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) C:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-03-27 20:01:56 --> Unable to connect to the database
INFO - 2019-03-27 20:01:56 --> Model Class Initialized
INFO - 2019-03-27 20:01:56 --> Database Driver Class Initialized
ERROR - 2019-03-27 20:01:56 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) C:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-03-27 20:01:56 --> Unable to connect to the database
DEBUG - 2019-03-27 20:01:56 --> Config file loaded: C:\xampp\htdocs\DemoTradeFinex\application\config/emailc.php
INFO - 2019-03-27 20:01:56 --> File loaded: C:\xampp\htdocs\DemoTradeFinex\application\views\includes/headern.php
ERROR - 2019-03-27 20:01:56 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) C:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-03-27 20:01:56 --> Unable to connect to the database
ERROR - 2019-03-27 20:01:56 --> Query error: Access denied for user 'demotrad_admin'@'localhost' (using password: YES) - Invalid query: SELECT *
FROM `tf_company`
WHERE `tfcom_user_ref` = ''
ERROR - 2019-03-27 20:01:56 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp\htdocs\DemoTradeFinex\application\models\Manage.php 151
