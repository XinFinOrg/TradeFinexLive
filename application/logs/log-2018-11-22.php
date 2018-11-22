<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-22 11:55:53 --> Unable to delete cache file for 
ERROR - 2018-11-22 11:56:12 --> Unable to delete cache file for 
ERROR - 2018-11-22 12:00:49 --> Unable to delete cache file for login
ERROR - 2018-11-22 12:00:51 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-22 12:00:56 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ERROR - 2018-11-22 12:01:05 --> Unable to delete cache file for auth/get_csrf
ERROR - 2018-11-22 12:01:06 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
ERROR - 2018-11-22 12:03:40 --> Query error: [Microsoft][ODBC Driver 13 for SQL Server][SQL Server]Column 'tf_project_posts.ID' is invalid in the select list because it is not contained in either an aggregate function or the GROUP BY clause. - Invalid query: SELECT *, count(*) as pcount
FROM "tf_project_posts" "tpp"
LEFT JOIN "tf_user" "tfu" ON "tfu"."tfu_id" = "tpp"."userID"
WHERE "row_deleted" = '0' AND "userID" = '4' AND "tfu"."tfu_domain_type" = 'localhost' AND "tfu"."tfu_domain_name" = ''
