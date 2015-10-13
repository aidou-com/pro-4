<?php

defined('BASEPATH') OR exit('No direct script access allowed');

# 课程分类基本数据存放地，如需更改需手工调整本文件
# 一般情况下，有了用户数据后，可以追加分类，但不要修改本分类，因为本分类已与学员及课程数据关联，一旦修改可能引起数据混乱
# 因为本分类作为标准，以及与数据的高度关联性，所以只提供在此文件手工编辑的方式

$config['branches'] = array (
  0 => 
  array (
    'branchid' => '1',
    'name' => '上海',
    'type' => 'region',
    'pid' => '0',
  ),
  1 => 
  array (
    'branchid' => '2',
    'name' => '徐汇总校',
    'type' => 'school',
    'pid' => '1',
  ),
  2 => 
  array (
    'branchid' => '4',
    'name' => '浦东总校',
    'type' => 'school',
    'pid' => '1',
  ),
  3 => 
  array (
    'branchid' => '3',
    'name' => '杨浦总校',
    'type' => 'school',
    'pid' => '1',
  ),
  4 => 
  array (
    'branchid' => '14',
    'name' => '长宁总校',
    'type' => 'school',
    'pid' => '1',
  ),

  5 => 
  array (
    'branchid' => '9',
    'name' => '南京分校',
    'type' => 'school',
    'pid' => '0',
  ),
  6 => 
  array (
    'branchid' => '17',
    'name' => '无锡分校',
    'type' => 'school',
    'pid' => '0',
  ),
  7 => 
  array (
    'branchid' => '12',
    'name' => '南通分校',
    'type' => 'school',
    'pid' => '0',
  ),
  8 => 
  array (
    'branchid' => '10',
    'name' => '苏州分校',
    'type' => 'school',
    'pid' => '0',
  ),
);