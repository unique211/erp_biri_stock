<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-12 06:02:04 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-12 06:02:07 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-12 06:12:12 --> Severity: error --> Exception: syntax error, unexpected end of file /opt/lampp/htdocs/dbstock/application/models/Report_model.php 208
ERROR - 2019-04-12 06:14:46 --> Severity: error --> Exception: syntax error, unexpected '?>', expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Report_model.php 206
ERROR - 2019-04-12 06:18:03 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:18:03 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:18:03 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 06:19:03 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:19:03 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:19:04 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 06:19:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:19:23 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:19:24 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 06:20:57 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:20:57 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:20:57 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 06:29:16 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:29:16 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:29:16 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 06:43:47 --> Query error: Column 'tobacco' in field list is ambiguous - Invalid query: SELECT `contractor_master`.`batch`, `batch_master`.`batch` as `batchnm`, `con-party_master`.`name` as `bname`, sum(tobacco) as tobacco, sum(leaves) as leaves, sum(blackYarn) as blackYarn, sum(whiteYarn) as whiteYarn, sum(filter) as filter, `contractor_master`.`c_id`
FROM `contractor_master`
JOIN `con-party_master` ON `con-party_master`.`id`=`contractor_master`.`c_id`
JOIN `batch_master` ON `batch_master`.`id`=`contractor_master`.`batch`
WHERE `c_id` = '2'
GROUP BY `batch`
ORDER BY `batch` ASC
ERROR - 2019-04-12 06:44:29 --> Query error: Column 'tobacco' in field list is ambiguous - Invalid query: SELECT `contractor_master`.`batch`, `batch_master`.`batch` as `batchnm`, `con-party_master`.`name` as `bname`, sum(tobacco) as tobacco, sum(leaves) as leaves, sum(blackYarn) as blackYarn, sum(whiteYarn) as whiteYarn, sum(filter) as filter, `contractor_master`.`c_id`
FROM `contractor_master`
JOIN `con-party_master` ON `con-party_master`.`id`=`contractor_master`.`c_id`
JOIN `batch_master` ON `batch_master`.`id`=`contractor_master`.`batch`
WHERE `c_id` = '2'
GROUP BY `batch`
ORDER BY `batch` ASC
ERROR - 2019-04-12 06:50:45 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:50:45 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:50:45 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 06:51:16 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 06:51:16 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 06:51:16 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:23:47 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:23:47 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:23:47 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:24:37 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:24:37 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:24:38 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:25:05 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:25:05 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:25:05 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:25:06 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:25:06 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:25:07 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:25:51 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:25:51 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:25:51 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:26:28 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:26:28 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:26:28 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:29:05 --> Severity: error --> Exception: Call to a member function result() on string /opt/lampp/htdocs/dbstock/application/models/Report_model.php 68
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:05 --> Severity: Notice --> Undefined property: stdClass::$batchnm /opt/lampp/htdocs/dbstock/application/models/Report_model.php 35
ERROR - 2019-04-12 07:42:23 --> Query error: Unknown column 'cont_issue_receive.batch' in 'on clause' - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch`
WHERE `date` <= '2019-04-08'
AND `batch2` = '3'
AND `cont_name` = '3'
ERROR - 2019-04-12 07:42:51 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:42:51 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:42:51 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:43:06 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 07:43:06 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 07:43:06 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 07:43:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '3'
AND `cont_name` = '3'' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '3'
AND `cont_name` = '3'
ERROR - 2019-04-12 07:44:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '3'
AND `cont_name` = '3'' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '3'
AND `cont_name` = '3'
ERROR - 2019-04-12 07:44:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '3'
AND `cont_name` = '3'' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '3'
AND `cont_name` = '3'
ERROR - 2019-04-12 07:48:31 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) /opt/lampp/htdocs/dbstock/application/models/Report_model.php 188
ERROR - 2019-04-12 07:55:05 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Report_model.php 209
ERROR - 2019-04-12 08:53:56 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 08:53:56 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 09:05:54 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file /opt/lampp/htdocs/dbstock/application/models/Report_model.php 239
ERROR - 2019-04-12 09:12:08 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) /opt/lampp/htdocs/dbstock/application/models/Report_model.php 216
ERROR - 2019-04-12 09:16:50 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Report_model.php 235
ERROR - 2019-04-12 09:23:41 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 09:23:41 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 09:26:47 --> Severity: error --> Exception: syntax error, unexpected '$data' (T_VARIABLE), expecting ',' or ';' /opt/lampp/htdocs/dbstock/application/models/Report_model.php 202
ERROR - 2019-04-12 10:53:41 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 10:53:41 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 10:55:41 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 10:55:41 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 10:58:54 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 10:58:54 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 11:00:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '*
FROM `batch_master`, `cont_adj`
WHERE `id` = '1'
AND `contractor` = '6'
AND `b' at line 1 - Invalid query: SELECT *, *
FROM `batch_master`, `cont_adj`
WHERE `id` = '1'
AND `contractor` = '6'
AND `batch` = '1'
AND `date` <= '2019-04-05'
ERROR - 2019-04-12 11:28:19 --> Severity: error --> Exception: syntax error, unexpected '}' /opt/lampp/htdocs/dbstock/application/models/Report_model.php 192
ERROR - 2019-04-12 11:28:57 --> Severity: error --> Exception: syntax error, unexpected '}' /opt/lampp/htdocs/dbstock/application/models/Report_model.php 192
ERROR - 2019-04-12 11:28:59 --> Severity: error --> Exception: syntax error, unexpected '}' /opt/lampp/htdocs/dbstock/application/models/Report_model.php 192
ERROR - 2019-04-12 12:32:52 --> Severity: error --> Exception: syntax error, unexpected '?>', expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Report_model.php 272
ERROR - 2019-04-12 12:34:27 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 12:34:27 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 12:34:27 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 12:35:09 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-12 12:35:09 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-12 12:35:09 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-12 14:12:50 --> Severity: error --> Exception: Call to undefined function avg() /opt/lampp/htdocs/dbstock/application/models/Report_model.php 210
ERROR - 2019-04-12 14:36:19 --> Query error: Column 'tobacco' in field list is ambiguous - Invalid query: SELECT `contractor_master`.`batch`, `batch_master`.`batch` as `batchnm`, `con-party_master`.`name` as `bname`, sum(tobacco) as tobacco, sum(leaves) as leaves, sum(blackYarn) as blackYarn, sum(whiteYarn) as whiteYarn, sum(filter) as filter, `contractor_master`.`c_id`
FROM `contractor_master`
JOIN `con-party_master` ON `con-party_master`.`id`=`contractor_master`.`c_id`
JOIN `batch_master` ON `batch_master`.`id`=`contractor_master`.`batch2`
WHERE `c_id` = '2'
GROUP BY `batch`
ORDER BY `batch` ASC
ERROR - 2019-04-12 14:36:20 --> Query error: Column 'tobacco' in field list is ambiguous - Invalid query: SELECT `contractor_master`.`batch`, `batch_master`.`batch` as `batchnm`, `con-party_master`.`name` as `bname`, sum(tobacco) as tobacco, sum(leaves) as leaves, sum(blackYarn) as blackYarn, sum(whiteYarn) as whiteYarn, sum(filter) as filter, `contractor_master`.`c_id`
FROM `contractor_master`
JOIN `con-party_master` ON `con-party_master`.`id`=`contractor_master`.`c_id`
JOIN `batch_master` ON `batch_master`.`id`=`contractor_master`.`batch2`
WHERE `c_id` = '2'
GROUP BY `batch`
ORDER BY `batch` ASC
ERROR - 2019-04-12 14:36:22 --> Query error: Column 'tobacco' in field list is ambiguous - Invalid query: SELECT `contractor_master`.`batch`, `batch_master`.`batch` as `batchnm`, `con-party_master`.`name` as `bname`, sum(tobacco) as tobacco, sum(leaves) as leaves, sum(blackYarn) as blackYarn, sum(whiteYarn) as whiteYarn, sum(filter) as filter, `contractor_master`.`c_id`
FROM `contractor_master`
JOIN `con-party_master` ON `con-party_master`.`id`=`contractor_master`.`c_id`
JOIN `batch_master` ON `batch_master`.`id`=`contractor_master`.`batch2`
WHERE `c_id` = '2'
GROUP BY `batch`
ORDER BY `batch` ASC
ERROR - 2019-04-12 14:36:58 --> Query error: Unknown column 'contractor_master.batch2' in 'on clause' - Invalid query: SELECT `contractor_master`.`batch`, `batch_master`.`batch` as `batchnm`, `con-party_master`.`name` as `bname`, sum(contractor_master.tobacco) as tobacco, sum(contractor_master.leaves) as leaves, sum(contractor_master.blackYarn) as blackYarn, sum(contractor_master.whiteYarn) as whiteYarn, sum(contractor_master.filter) as filter, `contractor_master`.`c_id`
FROM `contractor_master`
JOIN `con-party_master` ON `con-party_master`.`id`=`contractor_master`.`c_id`
JOIN `batch_master` ON `batch_master`.`id`=`contractor_master`.`batch2`
WHERE `c_id` = '2'
GROUP BY `batch`
ORDER BY `batch` ASC
