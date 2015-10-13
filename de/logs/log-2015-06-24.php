<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-06-24 00:32:24 --> Severity: Parsing Error --> syntax error, unexpected ';' F:\apache\onlyjp2015\www\models\courses\course_model.php 79
ERROR - 2015-06-24 00:32:39 --> Severity: Notice --> Undefined variable: _table_class F:\apache\onlyjp2015\www\models\courses\course_model.php 78
ERROR - 2015-06-24 00:32:39 --> Severity: Notice --> Undefined index: begindate F:\apache\onlyjp2015\www\models\courses\course_model.php 79
ERROR - 2015-06-24 00:32:39 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:33:04 --> Severity: Notice --> Undefined index: begindate F:\apache\onlyjp2015\www\models\courses\course_model.php 79
ERROR - 2015-06-24 00:33:04 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:33:26 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:34:01 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:34:05 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:34:45 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:34:47 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:36:35 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:36:48 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:36:50 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:37:03 --> Query error: Unknown table 'fbf_{this->_table}' - Invalid query: SELECT `fbf_{this->_table}`.*
FROM `fbf_course`
ERROR - 2015-06-24 00:38:07 --> Severity: Error --> Maximum execution time of 30 seconds exceeded F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2015-06-24 00:38:10 --> Query error: Unknown column 'fbf_course.1*' in 'field list' - Invalid query: SELECT `fbf_course`.`1*`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-24'
ERROR - 2015-06-24 00:40:19 --> Query error: Unknown column 'fbf_course.1*' in 'field list' - Invalid query: SELECT `fbf_course`.`1*`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-24'
 LIMIT 20
ERROR - 2015-06-24 10:06:57 --> Severity: Compile Error --> Cannot redeclare class Course_model F:\apache\onlyjp2015\www\models\courses\class_model.php 3
ERROR - 2015-06-24 11:13:56 --> Severity: Error --> Cannot use object of type stdClass as array F:\apache\onlyjp2015\www\models\courses\course_model.php 88
ERROR - 2015-06-24 11:14:29 --> Severity: Error --> Cannot use object of type stdClass as array F:\apache\onlyjp2015\www\models\courses\course_model.php 88
ERROR - 2015-06-24 12:02:02 --> Severity: Parsing Error --> syntax error, unexpected '->' (T_OBJECT_OPERATOR) F:\apache\onlyjp2015\www\models\courses\course_model.php 92
ERROR - 2015-06-24 12:02:07 --> Severity: Parsing Error --> syntax error, unexpected '->' (T_OBJECT_OPERATOR) F:\apache\onlyjp2015\www\models\courses\course_model.php 92
ERROR - 2015-06-24 12:02:22 --> Severity: Notice --> Undefined variable: _table_class F:\apache\onlyjp2015\www\models\courses\course_model.php 90
ERROR - 2015-06-24 12:02:22 --> Severity: Notice --> Undefined variable: _table_branch F:\apache\onlyjp2015\www\models\courses\course_model.php 90
ERROR - 2015-06-24 12:02:22 --> Severity: Notice --> Undefined variable: _table_class F:\apache\onlyjp2015\www\models\courses\course_model.php 90
ERROR - 2015-06-24 12:02:22 --> Severity: Notice --> Undefined variable: _table_class F:\apache\onlyjp2015\www\models\courses\course_model.php 90
ERROR - 2015-06-24 12:02:22 --> Severity: Error --> Call to undefined method Class_model::join() F:\apache\onlyjp2015\www\models\courses\course_model.php 91
ERROR - 2015-06-24 12:03:07 --> Severity: Error --> Call to undefined method Class_model::join() F:\apache\onlyjp2015\www\models\courses\course_model.php 91
ERROR - 2015-06-24 12:04:18 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::get_many_by() F:\apache\onlyjp2015\www\models\courses\course_model.php 92
ERROR - 2015-06-24 12:05:24 --> Query error: Unknown column 'branchname' in 'field list' - Invalid query: SELECT `fbf_class`.`classid`, `branchname`, `fbf_class`.`alias`, `fbf_class`.`branchid`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
 LIMIT 5
ERROR - 2015-06-24 12:08:04 --> Query error: Unknown column 'fbf_course.courseid2' in 'field list' - Invalid query: SELECT `fbf_course`.`courseid2`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-24'
 LIMIT 20
ERROR - 2015-06-24 12:08:07 --> Query error: Unknown column 'fbf_course.courseid2' in 'field list' - Invalid query: SELECT `fbf_course`.`courseid2`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-24'
 LIMIT 20
ERROR - 2015-06-24 12:11:47 --> Query error: Unknown column 'fbf_class.classid2' in 'field list' - Invalid query: SELECT `fbf_class`.`classid2`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
 LIMIT 5
ERROR - 2015-06-24 12:11:49 --> Query error: Unknown column 'fbf_class.classid2' in 'field list' - Invalid query: SELECT `fbf_class`.`classid2`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
 LIMIT 5
ERROR - 2015-06-24 12:13:06 --> Query error: Unknown column 'fbf_class.classid2' in 'field list' - Invalid query: SELECT `fbf_class`.`classid2`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
 LIMIT 5
ERROR - 2015-06-24 12:14:05 --> Query error: Unknown column 'fbf_class.classid2' in 'field list' - Invalid query: SELECT `fbf_class`.`classid2`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-24'
 LIMIT 5
ERROR - 2015-06-24 12:22:17 --> Severity: Notice --> Undefined variable: course_list F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:22:17 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:23:29 --> Severity: Notice --> Undefined variable: course_list F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:23:29 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:28:19 --> Severity: Notice --> Undefined variable: course_list F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:28:19 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:33:55 --> Severity: Notice --> Undefined variable: course_2 F:\apache\onlyjp2015\www\views\courses\index.php 57
ERROR - 2015-06-24 12:33:55 --> Severity: Notice --> Undefined variable: course_list F:\apache\onlyjp2015\www\views\courses\index.php 58
ERROR - 2015-06-24 12:33:55 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 58
ERROR - 2015-06-24 14:31:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition' at line 1 - Invalid query: SELECT `DISTINCT` `course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `begindate` >= '2015-06-24'
 LIMIT 20
ERROR - 2015-06-24 14:32:05 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::left_join() F:\apache\onlyjp2015\www\models\courses\course_model.php 78
ERROR - 2015-06-24 15:26:32 --> Query error: Unknown column 'fbf_class.coursei1d' in 'where clause' - Invalid query: SELECT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
LEFT JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
WHERE `fbf_class`.`coursei1d` IS NULL
AND `begindate` >= '2015-06-24'
 LIMIT 20
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:56 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:10:57 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 17:11:12 --> Severity: Notice --> Undefined property: stdClass::$branch_name F:\apache\onlyjp2015\www\views\courses\index.php 60
ERROR - 2015-06-24 23:47:01 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-24 23:47:06 --> Severity: Notice --> Undefined index: branch F:\apache\onlyjp2015\www\models\courses\course_model.php 74
ERROR - 2015-06-24 23:48:10 --> Severity: Error --> Maximum execution time of 30 seconds exceeded F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2015-06-24 23:48:10 --> Severity: Error --> Maximum execution time of 30 seconds exceeded F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 211
