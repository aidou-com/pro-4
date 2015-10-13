<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-07-24 09:52:07 --> 404 Page Not Found: 
ERROR - 2015-07-24 10:29:41 --> Severity: Warning --> file_get_contents(F:\apache\onlyjp2015\www\cache/branch): failed to open stream: No such file or directory F:\apache\system_3.0\libraries\Cache\drivers\Cache_file.php 275
ERROR - 2015-07-24 11:43:55 --> Severity: Warning --> array_merge(): Argument #2 is not an array F:\apache\onlyjp2015\www\models\courses\course_model.php 145
ERROR - 2015-07-24 11:43:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IS NULL
ORDER BY `begindate` ASC, `fbf_branch`.`branchid` ASC
 LIMIT 4' at line 5 - Invalid query: SELECT `fbf_class`.`classid`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`, `fbf_branch`.`livechat`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `courseid` = '1404'
AND  IS NULL
ORDER BY `begindate` ASC, `fbf_branch`.`branchid` ASC
 LIMIT 4
ERROR - 2015-07-24 11:46:28 --> Query error: Unknown column 'date' in 'where clause' - Invalid query: SELECT `fbf_class`.`classid`, `fbf_branch`.`name`, `fbf_class`.`alias`, `fbf_class`.`branchid`, `begindate`, `fbf_branch`.`livechat`
FROM `fbf_class`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `courseid` = '1404'
AND `date` IN('2015-07-24')
ORDER BY `begindate` ASC, `fbf_branch`.`branchid` ASC
 LIMIT 4
ERROR - 2015-07-24 11:47:26 --> Severity: Parsing Error --> syntax error, unexpected ')', expecting ']' F:\apache\onlyjp2015\www\models\courses\course_model.php 81
ERROR - 2015-07-24 12:21:08 --> 404 Page Not Found: 
ERROR - 2015-07-24 12:21:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-18, 18' at line 8 - Invalid query: SELECT `fbf_branch`.`name` AS `branch_name`, `fbf_branch`.`livechat`, `fbf_class`.`begindate`, `fbf_class`.`finishdate`, `fbf_class`.`timedetail`, `fbf_class`.`courseid`, `fbf_course`.`name`, `fbf_course`.`discount`, `fbf_course`.`tuition`, `fbf_course`.`viewnum`, `fbf_course`.`promotion`
FROM `fbf_class`
JOIN `fbf_course` ON `fbf_course`.`courseid` = `fbf_class`.`courseid`
JOIN `fbf_branch` ON `fbf_branch`.`branchid` = `fbf_class`.`branchid`
WHERE `begindate` >= '2015-07-24'
AND `pid` = 1
ORDER BY `begindate` ASC, `fbf_branch`.`branchid` ASC
 LIMIT -18, 18
