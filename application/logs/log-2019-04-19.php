<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-19 05:43:16 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-19 05:43:27 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-19 05:53:44 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:53:44 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:54:18 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:54:18 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:55:32 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 05:55:32 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:55:32 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 05:55:47 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 05:55:47 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 05:55:47 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:56:03 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 05:56:03 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 05:56:03 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:56:04 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 05:56:04 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:06:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 06:06:23 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 06:06:24 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:06:24 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:06:24 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:07:42 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 06:07:42 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 06:07:42 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:07:43 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:07:43 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:07 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 06:08:07 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 06:08:07 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:08 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:08 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:31 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 06:08:31 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 06:08:31 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:32 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:32 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:48 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 06:08:48 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 06:08:49 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:49 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:08:49 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:11:21 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 06:11:21 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 06:11:21 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 06:38:43 --> Severity: Notice --> Undefined variable: row /opt/lampp/htdocs/dbstock/application/models/Report_model.php 21
ERROR - 2019-04-19 06:38:43 --> Severity: Notice --> Trying to get property 'id' of non-object /opt/lampp/htdocs/dbstock/application/models/Report_model.php 21
ERROR - 2019-04-19 07:23:17 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 07:23:17 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 07:23:17 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 07:24:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:25:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:26:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:26:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:26:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:27:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:27:43 --> Severity: error --> Exception: Call to a member function result() on array /opt/lampp/htdocs/dbstock/application/models/Report_model.php 46
ERROR - 2019-04-19 07:27:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:28:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:28:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:28:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:28:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`' at line 4 - Invalid query: SELECT `cont_issue_receive`.`batch2`, `batch_master`.`batch` as `batchnm`, sum(cont_issue_receive.tob) as tob, sum(cont_issue_receive.leaves) as lev, sum(cont_issue_receive.bl_yarn) as bl_yarn, sum(cont_issue_receive.wh_yarn) as wh_yarn, sum(cont_issue_receive.filter) as fil
FROM `cont_issue_receive`
JOIN `batch_master` ON `batch_master`.`id`=`cont_issue_receive`.`batch2`
WHERE `date` < `IS` `NULL`
AND `batch2` = '1'
AND `cont_name` = '18'
GROUP BY `batch2`
ERROR - 2019-04-19 07:30:16 --> Severity: error --> Exception: Call to a member function result() on array /opt/lampp/htdocs/dbstock/application/models/Report_model.php 13
ERROR - 2019-04-19 07:33:32 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 07:33:32 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 07:33:32 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 07:33:54 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 07:33:54 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 07:33:55 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 07:40:40 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 07:40:40 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 07:40:40 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 07:41:34 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 07:41:34 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 07:41:34 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:02:53 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:02:53 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:02:53 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:03:44 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:03:44 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:03:45 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:04:25 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:04:26 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:04:26 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:04:43 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:04:43 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:04:43 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:06:10 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:06:10 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:06:10 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:06:42 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:06:42 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:06:42 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:07:43 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:07:44 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:07:44 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:08:43 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:08:43 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:08:44 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:09:22 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:09:22 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:09:23 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:10:04 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:10:04 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:10:04 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:10:24 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:10:24 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:10:25 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:10:52 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:10:52 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:10:52 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:11:18 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 08:11:18 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 08:11:19 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 08:12:29 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-19 08:12:38 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-19 09:25:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 - Invalid query: SELECT *
FROM 
ERROR - 2019-04-19 09:25:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 - Invalid query: SELECT *
FROM 
ERROR - 2019-04-19 09:25:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 - Invalid query: SELECT *
FROM 
ERROR - 2019-04-19 09:25:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 - Invalid query: SELECT *
FROM 
ERROR - 2019-04-19 10:44:42 --> Severity: Notice --> Undefined variable: data /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 66
ERROR - 2019-04-19 11:16:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '), sum(), sum(), sum(), sum(), SUM(`asal_bidi`) AS `asal_bidi`, SUM(`chant_bidi_' at line 1 - Invalid query: SELECT sum(), sum(), sum(), sum(), sum(), SUM(`asal_bidi`) AS `asal_bidi`, SUM(`chant_bidi_pcs`) AS `chant_bidi_pcs`
FROM `cont_issue_receive`
WHERE `cont_name` = '18'
AND `batch1` = '2'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 11:21:48 --> Query error: Unknown column 'batch1' in 'where clause' - Invalid query: SELECT sum(tobacco) as tobacco, sum(leaves) as leaves, sum(blackYarn) as blackYarn, sum(whiteyarn) as whiteyarn, sum(filter) as filter
FROM `contractor_master`
WHERE `c_id` = '18'
AND `batch1` = '1'
ERROR - 2019-04-19 11:37:09 --> Severity: error --> Exception: Call to a member function result() on array /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 62
ERROR - 2019-04-19 11:38:50 --> Severity: error --> Exception: Call to a member function result() on array /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 62
ERROR - 2019-04-19 12:34:25 --> Query error: Unknown column 'tob,tob_bag,leaves,leaves_bag' in 'field list' - Invalid query: SELECT SUM(`tob,tob_bag,leaves,leaves_bag`) AS `tob,tob_bag,leaves,leaves_bag`
FROM `cont_issue_receive`
WHERE `cont_name` = '18'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 12:34:39 --> Query error: Unknown column 'tob,tob_bag,leaves,leaves_bag' in 'field list' - Invalid query: SELECT SUM(`tob,tob_bag,leaves,leaves_bag`) AS `tob,tob_bag,leaves,leaves_bag`
FROM `cont_issue_receive`
WHERE `cont_name` = '18'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 12:34:39 --> Query error: Unknown column 'tob,tob_bag,leaves,leaves_bag' in 'field list' - Invalid query: SELECT SUM(`tob,tob_bag,leaves,leaves_bag`) AS `tob,tob_bag,leaves,leaves_bag`
FROM `cont_issue_receive`
WHERE `cont_name` = '18'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 12:34:40 --> Query error: Unknown column 'tob,tob_bag,leaves,leaves_bag' in 'field list' - Invalid query: SELECT SUM(`tob,tob_bag,leaves,leaves_bag`) AS `tob,tob_bag,leaves,leaves_bag`
FROM `cont_issue_receive`
WHERE `cont_name` = '18'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 12:35:11 --> Query error: Unknown column 'tob,tob_bag,leaves,leaves_bag' in 'field list' - Invalid query: SELECT SUM(`tob,tob_bag,leaves,leaves_bag`) AS `tob,tob_bag,leaves,leaves_bag`
FROM `cont_issue_receive`
WHERE `cont_name` = '18'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 13:08:03 --> Severity: Notice --> Undefined variable: sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 105
ERROR - 2019-04-19 13:36:31 --> Severity: Notice --> Undefined variable: t /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 137
ERROR - 2019-04-19 13:36:31 --> Severity: Notice --> Undefined variable: t /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 137
ERROR - 2019-04-19 13:36:31 --> Severity: Notice --> Undefined variable: t /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 137
ERROR - 2019-04-19 13:36:31 --> Severity: Notice --> Undefined variable: t /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 137
ERROR - 2019-04-19 13:36:31 --> Severity: Notice --> Undefined variable: t /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 137
ERROR - 2019-04-19 13:36:31 --> Severity: Notice --> Undefined variable: t /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 137
ERROR - 2019-04-19 14:02:09 --> Severity: Notice --> Undefined variable: calculation /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 122
ERROR - 2019-04-19 14:08:02 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 14:08:02 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: consuptionT /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 128
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: cat /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 153
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: cal /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable:  /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:15:16 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 154
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: cat /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 150
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: cal /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable:  /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:11 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: cat /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 150
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: cal /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable:  /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:16:19 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:17:05 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:17:05 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:17:05 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:17:05 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:17:05 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:17:05 --> Severity: Notice --> Undefined variable: 0 /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 151
ERROR - 2019-04-19 14:28:13 --> Severity: Notice --> Undefined variable: row /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 26
ERROR - 2019-04-19 14:28:13 --> Severity: Notice --> Trying to get property 'batch' of non-object /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 26
ERROR - 2019-04-19 14:28:13 --> Severity: Notice --> Undefined variable: row /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 27
ERROR - 2019-04-19 14:28:13 --> Severity: Notice --> Trying to get property 'tobacco' of non-object /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 27
ERROR - 2019-04-19 14:28:13 --> Severity: Notice --> Undefined variable: row /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 28
ERROR - 2019-04-19 14:28:13 --> Severity: Notice --> Trying to get property 'leaves' of non-object /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 28
ERROR - 2019-04-19 14:48:42 --> Query error: Unknown column 'asal_bidi+chant_bidi_pcs' in 'field list' - Invalid query: SELECT SUM(`asal_bidi+chant_bidi_pcs`) AS `asal_bidi+chant_bidi_pcs`
FROM `cont_issue_receive`
WHERE `cont_name` = '2'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$asal_bidi /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 39
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$chant_bidi_pcs /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 40
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$asal_bidi /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 39
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$chant_bidi_pcs /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 40
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$asal_bidi /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 39
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$chant_bidi_pcs /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 40
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$asal_bidi /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 39
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$chant_bidi_pcs /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 40
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$asal_bidi /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 39
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$chant_bidi_pcs /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 40
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$asal_bidi /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 39
ERROR - 2019-04-19 14:48:59 --> Severity: Notice --> Undefined property: stdClass::$chant_bidi_pcs /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 40
ERROR - 2019-04-19 14:49:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as asal_bidi+chant_bidi_pcs as chant_bidi_pcs)
FROM `cont_issue_receive`
WHERE `' at line 1 - Invalid query: SELECT sum(asal_bidi as asal_bidi+chant_bidi_pcs as chant_bidi_pcs)
FROM `cont_issue_receive`
WHERE `cont_name` = '2'
AND `batch1` = '1'
AND `date` >= '2019-04-01'
AND `date` <= '2019-04-05'
ERROR - 2019-04-19 15:15:16 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 194
ERROR - 2019-04-19 15:19:11 --> Severity: Notice --> Undefined property: stdClass::$sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 41
ERROR - 2019-04-19 15:19:11 --> Severity: Notice --> Undefined property: stdClass::$sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 41
ERROR - 2019-04-19 15:19:11 --> Severity: Notice --> Undefined property: stdClass::$sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 41
ERROR - 2019-04-19 15:19:11 --> Severity: Notice --> Undefined property: stdClass::$sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 41
ERROR - 2019-04-19 15:19:11 --> Severity: Notice --> Undefined property: stdClass::$sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 41
ERROR - 2019-04-19 15:19:11 --> Severity: Notice --> Undefined property: stdClass::$sum /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 41
ERROR - 2019-04-19 15:23:34 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF), expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 159
ERROR - 2019-04-19 15:30:49 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF), expecting function (T_FUNCTION) or const (T_CONST) /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 160
ERROR - 2019-04-19 16:02:03 --> Severity: error --> Exception: syntax error, unexpected 'Asal' (T_STRING), expecting ',' or ';' /opt/lampp/htdocs/dbstock/application/models/Date_Report_model.php 69
ERROR - 2019-04-19 16:43:23 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-19 16:43:29 --> 404 Page Not Found: Assets/css
ERROR - 2019-04-19 16:52:31 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 16:52:31 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 16:52:31 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 16:54:46 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 16:54:46 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 16:54:46 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 16:55:51 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 16:55:51 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 16:55:51 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 16:57:42 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 16:57:42 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 16:57:43 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 16:59:29 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 16:59:29 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 16:59:35 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 16:59:35 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 16:59:35 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 17:00:06 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 17:00:07 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 17:00:07 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 17:00:08 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 17:00:08 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 17:00:36 --> 404 Page Not Found: Assets/js
ERROR - 2019-04-19 17:00:36 --> 404 Page Not Found: Assets/datatable
ERROR - 2019-04-19 17:00:36 --> 404 Page Not Found: Assets/toastr
ERROR - 2019-04-19 17:08:55 --> 404 Page Not Found: Assets/css
