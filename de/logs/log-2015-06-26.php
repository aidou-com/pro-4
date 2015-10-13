<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-06-26 09:32:00 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-26 09:32:04 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-26 09:34:05 --> Severity: Error --> Maximum execution time of 30 seconds exceeded F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2015-06-26 09:34:05 --> Severity: Error --> Maximum execution time of 30 seconds exceeded F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2015-06-26 11:59:27 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-26 11:59:44 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-26 12:06:54 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-26 12:16:55 --> Query error: Unknown column 'branch' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
LEFT JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-26'
AND `branch` IN(1)
 LIMIT 18
ERROR - 2015-06-26 12:17:17 --> Query error: Unknown column 'branch' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
LEFT JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-26'
AND `branch` IN(1)
 LIMIT 18
ERROR - 2015-06-26 12:17:59 --> Query error: Unknown column 'branch' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
LEFT JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-26'
AND `branch` IN(1)
 LIMIT 18
ERROR - 2015-06-26 12:19:51 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
LEFT JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-26'
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-26 12:20:31 --> Query error: Not unique table/alias: 'fbf_class' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_class` ON `fbf_branch`.`branchid` = `fbf_course`.`branchid`
WHERE `begindate` >= '2015-06-26'
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-26 12:21:38 --> Query error: Unknown column 'fbf_course.courseid2' in 'field list' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid2`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_course`.`branchid`
WHERE `begindate` >= '2015-06-26'
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-26 12:22:58 --> Severity: Notice --> Undefined property: Courses::$_class F:\apache\system_3.0\core\Model.php 77
ERROR - 2015-06-26 12:22:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE `begindate` >= '2015-06-26'
AND `pid` = 1
 LIMIT 18' at line 5 - Invalid query: SELECT DISTINCT `fbf_course`.`courseid2`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = .`branchid`
WHERE `begindate` >= '2015-06-26'
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-26 12:23:17 --> Query error: Unknown column 'fbf_course.courseid2' in 'field list' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid2`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-26'
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-26 12:28:10 --> 404 Page Not Found: School/index
ERROR - 2015-06-26 12:28:48 --> 404 Page Not Found: School/index
ERROR - 2015-06-26 12:29:46 --> 404 Page Not Found: School/index
ERROR - 2015-06-26 12:33:53 --> Severity: Notice --> Undefined variable: course_list F:\apache\onlyjp2015\www\views\school\index.php 58
ERROR - 2015-06-26 12:33:53 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\school\index.php 58
