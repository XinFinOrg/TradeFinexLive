<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2019-04-08 12:28:36 --> Config Class Initialized
INFO - 2019-04-08 12:28:36 --> Hooks Class Initialized
DEBUG - 2019-04-08 12:28:36 --> UTF-8 Support Enabled
INFO - 2019-04-08 12:28:36 --> Utf8 Class Initialized
INFO - 2019-04-08 12:28:36 --> URI Class Initialized
INFO - 2019-04-08 12:28:36 --> Router Class Initialized
INFO - 2019-04-08 12:28:36 --> Output Class Initialized
INFO - 2019-04-08 12:28:36 --> Security Class Initialized
DEBUG - 2019-04-08 12:28:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-04-08 12:28:36 --> CSRF cookie sent
INFO - 2019-04-08 12:28:36 --> Input Class Initialized
INFO - 2019-04-08 12:28:36 --> Language Class Initialized
ERROR - 2019-04-08 12:28:36 --> Severity: Warning --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Error' does not have a method 'p404' G:\xampp\htdocs\DemoTradeFinex\system\core\CodeIgniter.php 532
INFO - 2019-04-08 12:28:36 --> Final output sent to browser
DEBUG - 2019-04-08 12:28:36 --> Total execution time: 0.0838
INFO - 2019-04-08 14:41:31 --> Config Class Initialized
INFO - 2019-04-08 14:41:31 --> Hooks Class Initialized
DEBUG - 2019-04-08 14:41:31 --> UTF-8 Support Enabled
INFO - 2019-04-08 14:41:31 --> Utf8 Class Initialized
INFO - 2019-04-08 14:41:31 --> URI Class Initialized
DEBUG - 2019-04-08 14:41:31 --> No URI present. Default controller set.
INFO - 2019-04-08 14:41:31 --> Router Class Initialized
INFO - 2019-04-08 14:41:31 --> Output Class Initialized
INFO - 2019-04-08 14:41:31 --> Security Class Initialized
DEBUG - 2019-04-08 14:41:31 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-04-08 14:41:31 --> CSRF cookie sent
INFO - 2019-04-08 14:41:31 --> Input Class Initialized
INFO - 2019-04-08 14:41:31 --> Language Class Initialized
INFO - 2019-04-08 14:41:31 --> Loader Class Initialized
INFO - 2019-04-08 14:41:31 --> Helper loaded: cache_helper
INFO - 2019-04-08 14:41:31 --> Controller Class Initialized
INFO - 2019-04-08 14:41:31 --> Helper loaded: form_helper
INFO - 2019-04-08 14:41:31 --> Helper loaded: url_helper
INFO - 2019-04-08 14:41:31 --> Helper loaded: date_helper
INFO - 2019-04-08 14:41:31 --> Session: Class initialized using 'files' driver.
INFO - 2019-04-08 14:41:31 --> Encrypt Class Initialized
INFO - 2019-04-08 14:41:32 --> Model Class Initialized
INFO - 2019-04-08 14:41:32 --> Database Driver Class Initialized
ERROR - 2019-04-08 14:41:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) G:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-04-08 14:41:32 --> Unable to connect to the database
INFO - 2019-04-08 14:41:32 --> Model Class Initialized
INFO - 2019-04-08 14:41:32 --> Database Driver Class Initialized
ERROR - 2019-04-08 14:41:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) G:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-04-08 14:41:32 --> Unable to connect to the database
ERROR - 2019-04-08 14:41:32 --> Unable to delete cache file for 
ERROR - 2019-04-08 14:41:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) G:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-04-08 14:41:32 --> Unable to connect to the database
ERROR - 2019-04-08 14:41:32 --> Query error: Access denied for user 'demotrad_admin'@'localhost' (using password: YES) - Invalid query: SELECT `tpp`.*, `tcom`.*, `tcoun`.*, `tfb`.*, `tca`.`ID` as `cat_id`, `tca`.`cName` as `cat_name`, `tca`.`imagePath` as `cat_image`, `tct`.`ID` as `cont_id`, `tct`.`cName` as `cont_name`, `tct`.`imagePath` as `cont_image`
FROM `tf_project_posts` `tpp`
LEFT JOIN `tf_company` `tcom` ON `tcom`.`tfcom_user_ref` = `tpp`.`userID`
LEFT JOIN `tf_country` `tcoun` ON `tcoun`.`tfc_id` = `tpp`.`countryID`
LEFT JOIN `tf_beneficiary` `tfb` ON `tfb`.`tfb_user_ref` = `tpp`.`userID`
LEFT JOIN `tf_industry_categories` `tca` ON `tca`.`ID` = `tpp`.`mainCategoryId`
LEFT JOIN `tf_contracts` `tct` ON `tct`.`ID` = `tpp`.`contractID`
WHERE `tpp`.`row_deleted` = '0' AND `tpp`.`isDraft` = '0' AND `tpp`.`admin_approval` = '1'
GROUP BY `tpp`.`ID`
ERROR - 2019-04-08 14:41:32 --> Severity: error --> Exception: Call to a member function result() on boolean G:\xampp\htdocs\DemoTradeFinex\application\models\Plisting.php 371
INFO - 2019-04-08 14:43:10 --> Config Class Initialized
INFO - 2019-04-08 14:43:10 --> Hooks Class Initialized
DEBUG - 2019-04-08 14:43:10 --> UTF-8 Support Enabled
INFO - 2019-04-08 14:43:10 --> Utf8 Class Initialized
INFO - 2019-04-08 14:43:10 --> URI Class Initialized
DEBUG - 2019-04-08 14:43:10 --> No URI present. Default controller set.
INFO - 2019-04-08 14:43:10 --> Router Class Initialized
INFO - 2019-04-08 14:43:10 --> Output Class Initialized
INFO - 2019-04-08 14:43:10 --> Security Class Initialized
DEBUG - 2019-04-08 14:43:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-04-08 14:43:10 --> CSRF cookie sent
INFO - 2019-04-08 14:43:10 --> Input Class Initialized
INFO - 2019-04-08 14:43:10 --> Language Class Initialized
INFO - 2019-04-08 14:43:10 --> Loader Class Initialized
INFO - 2019-04-08 14:43:10 --> Helper loaded: cache_helper
INFO - 2019-04-08 14:43:10 --> Controller Class Initialized
INFO - 2019-04-08 14:43:10 --> Helper loaded: form_helper
INFO - 2019-04-08 14:43:11 --> Helper loaded: url_helper
INFO - 2019-04-08 14:43:11 --> Helper loaded: date_helper
INFO - 2019-04-08 14:43:11 --> Session: Class initialized using 'files' driver.
INFO - 2019-04-08 14:43:11 --> Encrypt Class Initialized
INFO - 2019-04-08 14:43:11 --> Model Class Initialized
INFO - 2019-04-08 14:43:11 --> Database Driver Class Initialized
ERROR - 2019-04-08 14:43:11 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) G:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-04-08 14:43:11 --> Unable to connect to the database
INFO - 2019-04-08 14:43:11 --> Model Class Initialized
INFO - 2019-04-08 14:43:11 --> Database Driver Class Initialized
ERROR - 2019-04-08 14:43:11 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) G:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-04-08 14:43:11 --> Unable to connect to the database
ERROR - 2019-04-08 14:43:11 --> Unable to delete cache file for 
ERROR - 2019-04-08 14:43:11 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'demotrad_admin'@'localhost' (using password: YES) G:\xampp\htdocs\DemoTradeFinex\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-04-08 14:43:11 --> Unable to connect to the database
ERROR - 2019-04-08 14:43:11 --> Query error: Access denied for user 'demotrad_admin'@'localhost' (using password: YES) - Invalid query: SELECT `tpp`.*, `tcom`.*, `tcoun`.*, `tfb`.*, `tca`.`ID` as `cat_id`, `tca`.`cName` as `cat_name`, `tca`.`imagePath` as `cat_image`, `tct`.`ID` as `cont_id`, `tct`.`cName` as `cont_name`, `tct`.`imagePath` as `cont_image`
FROM `tf_project_posts` `tpp`
LEFT JOIN `tf_company` `tcom` ON `tcom`.`tfcom_user_ref` = `tpp`.`userID`
LEFT JOIN `tf_country` `tcoun` ON `tcoun`.`tfc_id` = `tpp`.`countryID`
LEFT JOIN `tf_beneficiary` `tfb` ON `tfb`.`tfb_user_ref` = `tpp`.`userID`
LEFT JOIN `tf_industry_categories` `tca` ON `tca`.`ID` = `tpp`.`mainCategoryId`
LEFT JOIN `tf_contracts` `tct` ON `tct`.`ID` = `tpp`.`contractID`
WHERE `tpp`.`row_deleted` = '0' AND `tpp`.`isDraft` = '0' AND `tpp`.`admin_approval` = '1'
GROUP BY `tpp`.`ID`
ERROR - 2019-04-08 14:43:11 --> Severity: error --> Exception: Call to a member function result() on boolean G:\xampp\htdocs\DemoTradeFinex\application\models\Plisting.php 371
