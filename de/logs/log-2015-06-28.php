<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-06-28 09:32:06 --> Severity: Notice --> Undefined index: domain F:\apache\onlyjp2015\www\libraries\Localization.php 121
ERROR - 2015-06-28 09:32:07 --> Severity: Parsing Error --> syntax error, unexpected 'get_teacher_branch' (T_STRING), expecting variable (T_VARIABLE) F:\apache\onlyjp2015\www\models\teacher_model.php 9
ERROR - 2015-06-28 09:32:33 --> Severity: Notice --> Undefined index: domain F:\apache\onlyjp2015\www\libraries\Localization.php 121
ERROR - 2015-06-28 09:32:33 --> Severity: Parsing Error --> syntax error, unexpected 'get_teacher_branch' (T_STRING), expecting variable (T_VARIABLE) F:\apache\onlyjp2015\www\models\teacher_model.php 9
ERROR - 2015-06-28 09:32:36 --> Severity: Notice --> Undefined index: domain F:\apache\onlyjp2015\www\libraries\Localization.php 121
ERROR - 2015-06-28 09:32:36 --> Severity: Parsing Error --> syntax error, unexpected 'get_teacher_branch' (T_STRING), expecting variable (T_VARIABLE) F:\apache\onlyjp2015\www\models\teacher_model.php 9
ERROR - 2015-06-28 09:32:58 --> Severity: Parsing Error --> syntax error, unexpected 'get_teacher_branch' (T_STRING), expecting variable (T_VARIABLE) F:\apache\onlyjp2015\www\models\teacher_model.php 9
ERROR - 2015-06-28 09:51:57 --> Severity: Notice --> Undefined variable: teacher_list F:\apache\onlyjp2015\www\views\teacher\index.php 20
ERROR - 2015-06-28 09:51:57 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\teacher\index.php 20
ERROR - 2015-06-28 09:52:48 --> Severity: Notice --> Undefined variable: teacher_list F:\apache\onlyjp2015\www\views\teacher\index.php 20
ERROR - 2015-06-28 09:52:48 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\teacher\index.php 20
ERROR - 2015-06-28 09:53:57 --> Query error: Unknown column 'fbf_teacher.id2' in 'on clause' - Invalid query: SELECT `fbf_teacher`.*
FROM `fbf_teacher`
JOIN `fbf_teacher_branch` ON `fbf_teacher_branch`.`teacher_id` = `fbf_teacher`.`id2`
WHERE `fbf_teacher_branch`.`branch_id` IS NULL
AND 1 IS NULL
ORDER BY `fbf_teacher_branch`.`postion` DESC, `fbf_teacher`.`postion` DESC, `fbf_teacher`.`id` ASC
 LIMIT 18
ERROR - 2015-06-28 09:54:52 --> Query error: Unknown column 'fbf_teacher.id2' in 'on clause' - Invalid query: SELECT `fbf_teacher`.*
FROM `fbf_teacher`
JOIN `fbf_teacher_branch` ON `fbf_teacher_branch`.`teacher_id` = `fbf_teacher`.`id2`
WHERE `fbf_teacher_branch`.`branch_id` = '1'
ORDER BY `fbf_teacher_branch`.`postion` DESC, `fbf_teacher`.`postion` DESC, `fbf_teacher`.`id` ASC
 LIMIT 18
ERROR - 2015-06-28 11:27:58 --> Severity: 4096 --> Object of class Teacher could not be converted to string F:\apache\onlyjp2015\www\controllers\Teacher.php 27
ERROR - 2015-06-28 11:27:58 --> Severity: Notice --> Object of class Teacher to string conversion F:\apache\onlyjp2015\www\controllers\Teacher.php 27
ERROR - 2015-06-28 11:27:58 --> Severity: Notice --> Undefined property: Teacher::$Object F:\apache\onlyjp2015\www\controllers\Teacher.php 27
ERROR - 2015-06-28 11:27:58 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\controllers\Teacher.php 27
ERROR - 2015-06-28 11:27:58 --> Severity: Error --> Call to a member function count_teacher_branch() on a non-object F:\apache\onlyjp2015\www\controllers\Teacher.php 27
ERROR - 2015-06-28 11:32:45 --> 404 Page Not Found: Teacher/10
ERROR - 2015-06-28 11:32:54 --> 404 Page Not Found: Teacher/10
ERROR - 2015-06-28 11:33:00 --> 404 Page Not Found: Teacher/10
ERROR - 2015-06-28 11:36:24 --> Severity: Warning --> Missing argument 1 for Teacher::page() F:\apache\onlyjp2015\www\controllers\Teacher.php 37
ERROR - 2015-06-28 11:36:24 --> Severity: Notice --> Undefined variable: page F:\apache\onlyjp2015\www\controllers\Teacher.php 39
ERROR - 2015-06-28 11:41:27 --> Severity: Warning --> Missing argument 1 for Teacher::page() F:\apache\onlyjp2015\www\controllers\Teacher.php 37
ERROR - 2015-06-28 11:41:27 --> Severity: Notice --> Undefined variable: page F:\apache\onlyjp2015\www\controllers\Teacher.php 39
ERROR - 2015-06-28 12:14:49 --> 404 Page Not Found: 
ERROR - 2015-06-28 12:14:51 --> 404 Page Not Found: 
ERROR - 2015-06-28 12:14:53 --> 404 Page Not Found: 
ERROR - 2015-06-28 12:14:55 --> 404 Page Not Found: 
ERROR - 2015-06-28 12:16:18 --> 404 Page Not Found: 
ERROR - 2015-06-28 12:16:19 --> 404 Page Not Found: 
ERROR - 2015-06-28 12:59:18 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `branchid` = 10
 LIMIT 18
ERROR - 2015-06-28 12:59:21 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `branchid` = 10
 LIMIT 18
ERROR - 2015-06-28 12:59:28 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `branchid` = 10
 LIMIT 18
ERROR - 2015-06-28 13:28:08 --> Severity: Notice --> Undefined variable: courses F:\apache\onlyjp2015\www\controllers\Courses.php 11
ERROR - 2015-06-28 13:30:44 --> Severity: Notice --> Undefined variable: courses F:\apache\onlyjp2015\www\controllers\Courses.php 11
ERROR - 2015-06-28 13:30:56 --> Severity: Notice --> Undefined variable: courses F:\apache\onlyjp2015\www\controllers\Courses.php 11
ERROR - 2015-06-28 13:44:19 --> Severity: Notice --> Undefined property: MY_Loader::$courses F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:44:19 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:44:30 --> Severity: Notice --> Undefined property: MY_Loader::$courses F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:44:30 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:45:40 --> Severity: Notice --> Undefined index: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:45:40 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:45:44 --> Severity: Notice --> Undefined property: MY_Loader::$courses F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:45:44 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:01 --> Severity: Notice --> Undefined index: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:01 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:08 --> Severity: Notice --> Undefined property: MY_Loader::$courses F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:08 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:16 --> Severity: Notice --> Undefined index: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:16 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 30
ERROR - 2015-06-28 13:46:56 --> Severity: Notice --> Undefined index: time_systems F:\apache\onlyjp2015\www\controllers\Courses.php 15
ERROR - 2015-06-28 13:47:47 --> Severity: Notice --> Undefined index: jp_levels F:\apache\onlyjp2015\www\controllers\Courses.php 15
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:43 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:49:45 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:29 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 13:50:34 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 31
ERROR - 2015-06-28 14:19:08 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:08 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:08 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:08 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:08 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:19:09 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 14:20:44 --> 404 Page Not Found: Courses/list-20-0-0-0-0.html
ERROR - 2015-06-28 14:20:48 --> 404 Page Not Found: Courses/list-10-0-0-0-0.html
ERROR - 2015-06-28 14:20:51 --> 404 Page Not Found: Courses/list-40-0-0-0-0.html
ERROR - 2015-06-28 15:20:10 --> 404 Page Not Found: Courses/list-10-0-0-0-0.html
ERROR - 2015-06-28 15:20:14 --> 404 Page Not Found: Courses/list-10-0-0-0-0.html
ERROR - 2015-06-28 16:01:29 --> Severity: Warning --> substr() expects parameter 1 to be string, array given F:\apache\onlyjp2015\www\controllers\Courses.php 32
ERROR - 2015-06-28 16:02:27 --> Severity: Parsing Error --> syntax error, unexpected ')' F:\apache\onlyjp2015\www\controllers\Courses.php 32
ERROR - 2015-06-28 16:02:33 --> 404 Page Not Found: 
ERROR - 2015-06-28 16:04:14 --> Severity: Notice --> Undefined variable: substr F:\apache\onlyjp2015\www\controllers\Courses.php 33
ERROR - 2015-06-28 16:04:14 --> Severity: Error --> Function name must be a string F:\apache\onlyjp2015\www\controllers\Courses.php 33
ERROR - 2015-06-28 16:04:25 --> Severity: Notice --> Undefined variable: substr F:\apache\onlyjp2015\www\controllers\Courses.php 33
ERROR - 2015-06-28 16:04:25 --> Severity: Error --> Function name must be a string F:\apache\onlyjp2015\www\controllers\Courses.php 33
ERROR - 2015-06-28 16:09:09 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 40
AND `time_system` = 70
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:09:14 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 40
AND `time_system` = 60
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:09:23 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 3
AND `time_system` = 60
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:11:39 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 20
AND `time_system` = 60
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:12:32 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `time_system` = 50
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:12:34 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `time_system` = 50
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:12:36 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `time_system` = 50
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:14:06 --> Severity: Notice --> Undefined variable: time_system F:\apache\onlyjp2015\www\controllers\Courses.php 55
ERROR - 2015-06-28 16:14:06 --> Severity: Notice --> Undefined variable: time_system F:\apache\onlyjp2015\www\controllers\Courses.php 62
ERROR - 2015-06-28 16:14:16 --> Severity: Notice --> Undefined variable: time_system F:\apache\onlyjp2015\www\controllers\Courses.php 55
ERROR - 2015-06-28 16:14:16 --> Severity: Notice --> Undefined variable: time_system F:\apache\onlyjp2015\www\controllers\Courses.php 62
ERROR - 2015-06-28 16:14:29 --> Severity: Notice --> Undefined variable: time_system F:\apache\onlyjp2015\www\controllers\Courses.php 62
ERROR - 2015-06-28 16:16:43 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 20
AND `time_system` = 80
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:16:45 --> Query error: Unknown column 'time_system' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 20
AND `time_system` = 80
AND `pid` = 1
 LIMIT 18
ERROR - 2015-06-28 16:23:13 --> Severity: Parsing Error --> syntax error, unexpected '}', expecting ',' or ';' F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:23:42 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\index.php 25
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:29:31 --> Severity: Notice --> Undefined variable: time_systems F:\apache\onlyjp2015\www\views\courses\index.php 32
ERROR - 2015-06-28 16:33:02 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE), expecting identifier (T_STRING) F:\apache\onlyjp2015\www\controllers\Courses.php 16
ERROR - 2015-06-28 16:36:59 --> Severity: Notice --> Undefined index: branches F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 16:36:59 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:13 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:25 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:25 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:25 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:25 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:25 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: id F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:37:26 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:38:03 --> Severity: Notice --> Undefined index: title F:\apache\onlyjp2015\www\views\courses\index.php 39
ERROR - 2015-06-28 16:39:08 --> Query error: Unknown column 'branch' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branch` = 1
 LIMIT 18
ERROR - 2015-06-28 16:39:17 --> Query error: Unknown column 'branch' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branch` = 1
 LIMIT 18
ERROR - 2015-06-28 16:39:20 --> Query error: Unknown column 'branch' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branch` = 1
 LIMIT 18
ERROR - 2015-06-28 16:39:52 --> Query error: Unknown column 'branch_id' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branch_id` = 4
 LIMIT 18
ERROR - 2015-06-28 16:40:06 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branchid` = 4
 LIMIT 18
ERROR - 2015-06-28 16:40:55 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branchid` = 4
 LIMIT 18
ERROR - 2015-06-28 16:41:43 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branchid` = 2
 LIMIT 18
ERROR - 2015-06-28 16:41:48 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 65
AND `timesystem` = 80
AND `branchid` = 2
 LIMIT 18
ERROR - 2015-06-28 16:43:58 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 10
AND `branchid` = 4
 LIMIT 18
ERROR - 2015-06-28 16:46:11 --> Query error: Column 'branchid' in where clause is ambiguous - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 10
AND `branchid` = 12
 LIMIT 18
ERROR - 2015-06-28 16:47:05 --> Severity: Notice --> Undefined variable: _table_class F:\apache\onlyjp2015\www\models\courses\course_model.php 87
ERROR - 2015-06-28 16:47:05 --> Query error: Unknown column 'fbf_.branchid' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-06-28'
AND `category` = 10
AND `fbf_`.`branchid` = 12
 LIMIT 18
ERROR - 2015-06-28 16:52:05 --> Severity: Notice --> Undefined index: base F:\apache\onlyjp2015\www\views\courses\index.php 45
ERROR - 2015-06-28 16:52:05 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 45
ERROR - 2015-06-28 18:47:30 --> Severity: Error --> Call to undefined function 1506() F:\apache\onlyjp2015\www\models\courses\course_model.php 44
ERROR - 2015-06-28 18:47:53 --> Severity: Error --> Call to undefined function 1506() F:\apache\onlyjp2015\www\models\courses\course_model.php 44
ERROR - 2015-06-28 18:48:12 --> Severity: Error --> Call to undefined function 1506() F:\apache\onlyjp2015\www\models\courses\course_model.php 44
ERROR - 2015-06-28 18:48:42 --> Severity: Error --> Call to undefined function 1506() F:\apache\onlyjp2015\www\models\courses\course_model.php 45
ERROR - 2015-06-28 20:31:34 --> Severity: Notice --> Undefined index: begindate F:\apache\onlyjp2015\www\models\courses\course_model.php 141
ERROR - 2015-06-28 20:31:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IS NULL
 LIMIT 4' at line 5 - Invalid query: SELECT `fbf_class`.`classid`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `courseid` = '2186'
AND  IS NULL
 LIMIT 4
ERROR - 2015-06-28 20:31:36 --> Severity: Notice --> Undefined index: begindate F:\apache\onlyjp2015\www\models\courses\course_model.php 141
ERROR - 2015-06-28 20:31:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IS NULL
 LIMIT 4' at line 5 - Invalid query: SELECT `fbf_class`.`classid`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `courseid` = '2186'
AND  IS NULL
 LIMIT 4
ERROR - 2015-06-28 20:32:38 --> Query error: Unknown column 'begindate1' in 'where clause' - Invalid query: SELECT DISTINCT `fbf_course`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_course`
JOIN `fbf_class` ON `fbf_class`.`courseid` = `fbf_course`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate1` >= '2015-07-1'
AND `finishdate` < '2015-08-1'
AND `fbf_class`.`branchid` = 12
 LIMIT 18
ERROR - 2015-06-28 20:42:52 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: SELECT *
FROM `fbf_course`
WHERE `id` IN('1378')
ERROR - 2015-06-28 20:50:26 --> 404 Page Not Found: 
ERROR - 2015-06-28 20:50:28 --> 404 Page Not Found: 
ERROR - 2015-06-28 21:03:19 --> Severity: Error --> Call to undefined method Class_model::update_viewnum() F:\apache\onlyjp2015\www\controllers\Courses.php 127
ERROR - 2015-06-28 21:03:36 --> Severity: Warning --> Missing argument 1 for Course_model::update_viewnum(), called in F:\apache\onlyjp2015\www\controllers\Courses.php on line 127 and defined F:\apache\onlyjp2015\www\models\courses\course_model.php 154
ERROR - 2015-06-28 21:03:36 --> Severity: Notice --> Undefined variable: id F:\apache\onlyjp2015\www\models\courses\course_model.php 157
ERROR - 2015-06-28 21:03:39 --> Severity: Warning --> Missing argument 1 for Course_model::update_viewnum(), called in F:\apache\onlyjp2015\www\controllers\Courses.php on line 127 and defined F:\apache\onlyjp2015\www\models\courses\course_model.php 154
ERROR - 2015-06-28 21:03:39 --> Severity: Notice --> Undefined variable: id F:\apache\onlyjp2015\www\models\courses\course_model.php 157
ERROR - 2015-06-28 21:03:42 --> Severity: Warning --> Missing argument 1 for Course_model::update_viewnum(), called in F:\apache\onlyjp2015\www\controllers\Courses.php on line 127 and defined F:\apache\onlyjp2015\www\models\courses\course_model.php 154
ERROR - 2015-06-28 21:03:42 --> Severity: Notice --> Undefined variable: id F:\apache\onlyjp2015\www\models\courses\course_model.php 157
ERROR - 2015-06-28 21:03:54 --> Severity: Notice --> Array to string conversion F:\apache\system_3.0\database\DB_query_builder.php 662
ERROR - 2015-06-28 21:04:26 --> Severity: Notice --> Array to string conversion F:\apache\system_3.0\database\DB_query_builder.php 662
ERROR - 2015-06-28 21:04:26 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: UPDATE `fbf_course` SET viewnum = viewnum+1
WHERE `courseid` = `Array`
ERROR - 2015-06-28 21:49:14 --> Severity: Warning --> mysqli::real_connect(): MySQL server has gone away F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 121
ERROR - 2015-06-28 21:49:14 --> Severity: Warning --> mysqli::real_connect(): MySQL server has gone away F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 121
ERROR - 2015-06-28 21:49:14 --> Severity: Warning --> mysqli::real_connect(): MySQL server has gone away F:\apache\system_3.0\database\drivers\mysqli\mysqli_driver.php 121
ERROR - 2015-06-28 21:49:49 --> Invalid driver requested: Cache_xcache
ERROR - 2015-06-28 21:49:51 --> Invalid driver requested: Cache_xcache
ERROR - 2015-06-28 21:50:01 --> Invalid driver requested: Cache_xcache
ERROR - 2015-06-28 23:13:42 --> Severity: Error --> Call to undefined method Courses::select() F:\apache\onlyjp2015\www\controllers\Courses.php 26
ERROR - 2015-06-28 23:19:45 --> Severity: Notice --> Undefined variable: branch_list F:\apache\onlyjp2015\www\controllers\Courses.php 35
ERROR - 2015-06-28 23:28:44 --> Severity: Notice --> Undefined property: Courses::$load_branch F:\apache\onlyjp2015\www\controllers\Courses.php 20
ERROR - 2015-06-28 23:28:45 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:28:52 --> Severity: Notice --> Undefined property: Courses::$load_branch F:\apache\onlyjp2015\www\controllers\Courses.php 20
ERROR - 2015-06-28 23:28:52 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:29:13 --> Severity: Notice --> Undefined property: Courses::$load_branch F:\apache\onlyjp2015\www\controllers\Courses.php 20
ERROR - 2015-06-28 23:29:14 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:29:32 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:29:45 --> Severity: Error --> Cannot use object of type stdClass as array F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:29:51 --> Severity: Error --> Cannot use object of type stdClass as array F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:30:10 --> Severity: Error --> Cannot use object of type stdClass as array F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:31:41 --> Severity: Error --> Cannot use object of type stdClass as array F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:31:53 --> Severity: Warning --> Invalid argument supplied for foreach() F:\apache\onlyjp2015\www\views\courses\index.php 38
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:50 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:51 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:44:51 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 76
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
ERROR - 2015-06-28 23:49:41 --> Severity: Notice --> Trying to get property of non-object F:\apache\onlyjp2015\www\views\courses\course.php 75
