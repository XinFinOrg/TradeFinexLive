<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-21 14:35:17 --> Severity: error --> Exception: Call to undefined function sqlsrv_connect() G:\xampp\htdocs\tradefinex\system\database\drivers\sqlsrv\sqlsrv_driver.php 144
ERROR - 2018-11-21 14:39:39 --> Severity: Error --> Maximum execution time of 30 seconds exceeded G:\xampp\htdocs\tradefinex\system\database\drivers\sqlsrv\sqlsrv_driver.php 144
ERROR - 2018-11-21 14:41:42 --> Unable to connect to the database
ERROR - 2018-11-21 14:49:59 --> Unable to connect to the database
ERROR - 2018-11-21 14:55:16 --> Unable to connect to the database
ERROR - 2018-11-21 14:56:42 --> Unable to delete cache file for 
ERROR - 2018-11-21 14:56:43 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Invalid object name 'tf_project_posts'. - Invalid query: SELECT "tpp".*, "tcom".*, "tcoun".*, "tfb".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tca"."imagePath" as "cat_image", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name", "tct"."imagePath" as "cont_image"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_country" "tcoun" ON "tcoun"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = '1'
ERROR - 2018-11-21 15:02:56 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:05:57 --> Unable to delete cache file for login
ERROR - 2018-11-21 15:05:57 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:06:07 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:07:14 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:07:14 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Cannot insert the value NULL into column 'tfsp_posted_project_list', table 'tradefinex.dbo.tf_service_provider'; column does not allow nulls. INSERT fails. - Invalid query: INSERT INTO "tf_service_provider" ("tfsp_fname", "tfsp_lname", "tfsp_email", "tfsp_user_ref") VALUES ('Mansi', 'Vora', 'mansivora36@gmail.com', '1')
ERROR - 2018-11-21 15:25:58 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:26:04 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:26:28 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:26:29 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Cannot insert the value NULL into column 'tfsp_address', table 'tradefinex.dbo.tf_service_provider'; column does not allow nulls. INSERT fails. - Invalid query: INSERT INTO "tf_service_provider" ("tfsp_fname", "tfsp_lname", "tfsp_email", "tfsp_user_ref") VALUES ('Mansi', 'Vora', 'mansivora36@gmail.com', '1')
ERROR - 2018-11-21 15:26:45 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:28:15 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:29:42 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:31:07 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:32:07 --> Unable to delete cache file for login
ERROR - 2018-11-21 15:32:07 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:32:21 --> Unable to delete cache file for login
ERROR - 2018-11-21 15:32:21 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:35:34 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:36:12 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:36:29 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:39:44 --> Unable to delete cache file for verify/account
ERROR - 2018-11-21 15:39:47 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:40:15 --> Unable to delete cache file for login
ERROR - 2018-11-21 15:40:15 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 15:40:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:40:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:41:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:41:02 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 15:41:05 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:41:09 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:41:40 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:41:40 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Cannot insert the value NULL into column 'tff_address', table 'tradefinex.dbo.tf_financier'; column does not allow nulls. INSERT fails. - Invalid query: INSERT INTO "tf_financier" ("tff_fname", "tff_lname", "tff_email", "tff_user_ref") VALUES ('Dora', 'Vora', 'mansi.vora@tradefinex.org', '3')
ERROR - 2018-11-21 15:44:34 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:48:23 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:49:22 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:51:41 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:51:53 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:53:03 --> Unable to delete cache file for verify/account
ERROR - 2018-11-21 15:54:50 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:55:05 --> Unable to delete cache file for login
ERROR - 2018-11-21 15:55:05 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 15:55:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:55:10 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 15:55:11 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 15:55:11 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 15:55:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 15:55:12 --> Unable to delete cache file for 
ERROR - 2018-11-21 15:55:17 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:55:37 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:55:37 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Cannot insert the value NULL into column 'tfsp_contact', table 'tradefinex.dbo.tf_service_provider'; column does not allow nulls. INSERT fails. - Invalid query: INSERT INTO "tf_service_provider" ("tfsp_fname", "tfsp_lname", "tfsp_email", "tfsp_user_ref") VALUES ('Manu', 'Vora', 'mansivora3@outlook.com', '2')
ERROR - 2018-11-21 15:56:08 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:56:46 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:56:46 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Cannot insert the value NULL into column 'tfsp_pic_file', table 'tradefinex.dbo.tf_service_provider'; column does not allow nulls. INSERT fails. - Invalid query: INSERT INTO "tf_service_provider" ("tfsp_fname", "tfsp_lname", "tfsp_email", "tfsp_user_ref") VALUES ('Manu', 'Vora', 'mansivora3@outlook.com', '3')
ERROR - 2018-11-21 15:57:19 --> Unable to delete cache file for registration
ERROR - 2018-11-21 15:58:25 --> Unable to delete cache file for login
ERROR - 2018-11-21 15:58:26 --> Unable to delete cache file for 
ERROR - 2018-11-21 16:29:02 --> Unable to delete cache file for login
ERROR - 2018-11-21 16:29:05 --> Unable to delete cache file for 
ERROR - 2018-11-21 16:32:15 --> Unable to delete cache file for registration
ERROR - 2018-11-21 16:32:35 --> Unable to delete cache file for registration
ERROR - 2018-11-21 16:34:15 --> Unable to delete cache file for registration
ERROR - 2018-11-21 16:34:24 --> Unable to delete cache file for 
ERROR - 2018-11-21 16:35:30 --> Unable to delete cache file for verify/account
ERROR - 2018-11-21 16:35:44 --> Unable to delete cache file for login
ERROR - 2018-11-21 16:35:44 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_invites.tfpi_project_ref' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *
FROM "tf_project_invites" "tfpi"
LEFT JOIN "tf_proposal_provider" "tppr" ON "tppr"."tpp_project_ref" = "tfpi"."tfpi_project_ref"
WHERE "tfpi"."tfpi_user_ref" = '4' AND "tfpi"."tfpi_accept" = 1 
GROUP BY "tfpi"."tfpi_user_ref", "tfpi"."tfpi_id"
ERROR - 2018-11-21 16:39:31 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.title' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT "tpp".*, "tcom".*, "tfb".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tca"."imagePath" as "cat_image", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name", "tct"."imagePath" as "cont_image"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_cat_ref" = "tca"."ID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tcom"."tfcom_user_ref" = '4'
GROUP BY "tpp"."ID"
ERROR - 2018-11-21 16:43:25 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 16:43:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:43:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:43:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:43:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:43:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:43:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:43:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:44:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:44:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:44:11 --> Unable to delete cache file for 
ERROR - 2018-11-21 16:44:16 --> Unable to delete cache file for registration
ERROR - 2018-11-21 16:45:41 --> Unable to delete cache file for registration
ERROR - 2018-11-21 16:45:46 --> Unable to delete cache file for 
ERROR - 2018-11-21 16:47:45 --> Unable to delete cache file for verify/account
ERROR - 2018-11-21 16:47:49 --> Unable to delete cache file for 
ERROR - 2018-11-21 16:48:18 --> Unable to delete cache file for login
ERROR - 2018-11-21 16:48:19 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 16:48:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:48:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:49:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:08 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 16:50:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:10 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 16:50:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:50:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:51:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:52:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:53:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:54:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:55:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:56:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:57:59 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 16:58:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:58:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 16:59:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:00:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:24 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:01:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:01:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:22 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:02:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:24 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:02:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:51 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:02:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:02:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:03:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:04:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:05:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:06:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:07:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:16 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:08:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:28 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:08:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:39 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 17:08:39 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 17:08:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:08:40 --> Unable to delete cache file for 
ERROR - 2018-11-21 17:08:56 --> Unable to delete cache file for login
ERROR - 2018-11-21 17:08:56 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:08:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:27 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:09:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:29 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:09:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:09:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:20 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:10:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:23 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:10:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:10:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:11 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:11:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:21 --> Unable to delete cache file for 
ERROR - 2018-11-21 17:11:29 --> Unable to delete cache file for login
ERROR - 2018-11-21 17:11:29 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:11:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:53 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:11:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:11:56 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:11:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:12:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:02 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:13:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:05 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:13:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:13:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:14 --> Unable to delete cache file for user/edit
ERROR - 2018-11-21 17:14:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:27 --> Unable to delete cache file for 
ERROR - 2018-11-21 17:14:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:14:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:15:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:16:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:17:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:18:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:19:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:20:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:21:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:22:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:23:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:24:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:25:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:26:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:30 --> Unable to delete cache file for 
ERROR - 2018-11-21 17:27:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:27:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:30 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Error converting data type varchar to numeric. - Invalid query: INSERT INTO "tf_project_posts" ("userID", "userType", "title", "description", "pimage", "mainCategoryId", "contractID", "stateID", "currency_ref", "countryID", "refnum", "closingDate", "updatingDate", "postdate_timestr", "sectors", "fixedBudget", "requestStartDate", "requestFinishDate", "visibility", "special_remarks", "featured", "financing", "financing_currency_ref", "financing_amount", "financing_tenure_value", "financing_tenure_ref", "isDraft") VALUES (1, 3, 'Gouwehsvjbsdfiu', 'Osidghsheoqhnjlvndohasjdvbsduvbsgewugheugbsvkj', 'no-image.png', '1', '19', NULL, NULL, '1', '1255152SO', '2018-11-23 00:00:00', '2018-11-21 17:28:30', 1542738600, 'precious-metals', '1000', '2018-11-24 00:00:00', '2018-11-25 00:00:00', '1', 'Nskjvnsdlewfiusbvkjsdbdskjfb', '1', 0, NULL, '', '', '3', '0')
ERROR - 2018-11-21 17:28:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:28:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:05 --> Unable to delete cache file for 
ERROR - 2018-11-21 17:29:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:29:33 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_proposal_provider.tpp_id' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
GROUP BY "tpp"."ID"
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 17:30:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:30:43 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_proposal_provider.tpp_id' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
GROUP BY "tpp"."ID"
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 17:33:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:33:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:34:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:35:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:36:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:37:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:38:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:39:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:40:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:41:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:42:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:43:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:44:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:45:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:46:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:47:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:48:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:49:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:50:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:51:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:52:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:53:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:54:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:55:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:56:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:57:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:58:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 17:59:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:00:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:01:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:02:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:03:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:04:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:05:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:06:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:07:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:08:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:16 --> Unable to delete cache file for 
ERROR - 2018-11-21 18:09:27 --> Unable to delete cache file for login
ERROR - 2018-11-21 18:09:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:09:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:01 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The data types text and varchar are incompatible in the equal to operator. - Invalid query: SELECT *
FROM "tf_notification"
WHERE "notify_type" = 'invitaion_received' AND "notify_for_project" = '1' AND "notify_user_ref" = '4' AND "notify_user_type_ref" = '1' AND "notify_text" = 'Project invitation from Mansi Vora(Beneficiary)'
ERROR - 2018-11-21 18:10:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:21 --> Unable to delete cache file for 
ERROR - 2018-11-21 18:10:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:30 --> Unable to delete cache file for login
ERROR - 2018-11-21 18:10:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:35 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '2' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:10:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:49 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:10:51 --> Unable to delete cache file for 
ERROR - 2018-11-21 18:10:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:10:59 --> Unable to delete cache file for login
ERROR - 2018-11-21 18:11:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:07 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:11:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:11:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:12:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:13:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:14:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:15:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:01 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:16:01 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:16:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:03 --> Unable to delete cache file for 
ERROR - 2018-11-21 18:16:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:16:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:16 --> Unable to delete cache file for 
ERROR - 2018-11-21 18:17:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:39 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:17:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:08 --> Unable to delete cache file for 
ERROR - 2018-11-21 18:18:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:19 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:24 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:29 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:34 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:18:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:19:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:20:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:21:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:22:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:44 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:49 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:54 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:23:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:04 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:09 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:14 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:24:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:25:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:36 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:41 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:46 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:56 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:26:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:01 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:06 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:11 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:16 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:21 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:26 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:31 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:27:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:28:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:29:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:30:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:31:58 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:03 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:08 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:12 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:13 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:17 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:18 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:22 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:23 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:27 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:32 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:33 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:37 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:38 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:42 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:43 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:47 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The data types text and varchar are incompatible in the equal to operator. - Invalid query: SELECT *
FROM "tf_notification"
WHERE "notify_type" = 'invitaion_received' AND "notify_for_project" = '3' AND "notify_user_ref" = '5' AND "notify_user_type_ref" = '2' AND "notify_text" = 'Project invitation from Mansi Vora(Beneficiary)'
ERROR - 2018-11-21 18:32:47 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:48 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:49 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The data types text and varchar are incompatible in the equal to operator. - Invalid query: SELECT *
FROM "tf_notification"
WHERE "notify_type" = 'invitaion_received' AND "notify_for_project" = '3' AND "notify_user_ref" = '4' AND "notify_user_type_ref" = '1' AND "notify_text" = 'Project invitation from Mansi Vora(Beneficiary)'
ERROR - 2018-11-21 18:32:52 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:53 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:57 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:32:59 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:02 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:07 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:07 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:33:07 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:33:09 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:33:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:33:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:34:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:32 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:35:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:40 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:35:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:35:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:36:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:37:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:38:55 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:00 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:10 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:15 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:20 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:25 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:30 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:35 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:40 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:45 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:48 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:39:49 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:39:49 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:39:49 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:39:50 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:39:50 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_proposal_provider.tpp_id' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
GROUP BY "tpp"."ID"
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 18:40:36 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 18:47:02 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 18:47:04 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 18:47:17 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:47:23 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 18:47:28 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-21 18:47:32 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpprf".*, "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
LEFT JOIN "tf_proposal_provider" "tpprf" ON "tpprf"."tpp_project_ref" = "tpp"."ID"
WHERE "tpp"."row_deleted" = '0' AND ("tpp"."awarded_provider" = 2 OR "tpp"."awarded_provider" = 3 OR "tpp"."awarded_financier" = 2 OR "tpp"."awarded_financier" = 3) AND tpp.userID = '1'OR ( tpprf.tpp_beneficiary_accept = 1 AND "tpprf"."tpp_user_ref" = '1')
ORDER BY "tpp"."ID" DESC
ERROR - 2018-11-21 18:47:52 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 18:47:53 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:50:43 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:50:48 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:50:50 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]The text data type cannot be selected as DISTINCT because it is not comparable. - Invalid query: SELECT DISTINCT "tpp".*, "tcom".*, "tc".*, "tfb".*, "tcu".*, "tca"."ID" as "cat_id", "tca"."cName" as "cat_name", "tct"."ID" as "cont_id", "tct"."cName" as "cont_name"
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_company" "tcom" ON "tcom"."tfcom_user_ref" = "tpp"."userID"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
LEFT JOIN "tf_industry_categories" "tca" ON "tca"."ID" = "tpp"."mainCategoryId"
LEFT JOIN "tf_beneficiary" "tfb" ON "tfb"."tfb_user_ref" = "tpp"."userID"
LEFT JOIN "tf_contracts" "tct" ON "tct"."ID" = "tpp"."contractID"
LEFT JOIN "tf_country" "tc" ON "tc"."tfc_id" = "tpp"."countryID"
LEFT JOIN "tf_currency" "tcu" ON "tcu"."tfcu_id" = "tpp"."currency_ref"
WHERE "tpp"."row_deleted" = '0' AND "tpp"."isDraft" = '0' AND "tpp"."admin_approval" = 1 AND ("tpp"."visibility" = '1' OR "tpp"."visibility" = '0') AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ORDER BY "tpp"."ID" DESC
 OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY
ERROR - 2018-11-21 18:52:26 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ERROR - 2018-11-21 18:54:53 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ERROR - 2018-11-21 18:54:56 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ERROR - 2018-11-21 18:55:10 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ERROR - 2018-11-21 19:17:51 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 19:17:51 --> Unable to delete cache file for notify/update_notifyc
ERROR - 2018-11-21 19:17:53 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
