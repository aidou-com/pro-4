<?php

defined('BASEPATH') OR exit('No direct script access allowed');

# 课程分类基本数据存放地，如需更改需手工调整本文件
# 一般情况下，有了用户数据后，可以追加分类，但不要修改本分类，因为本分类已与学员及课程数据关联，一旦修改可能引起数据混乱
# 因为本分类作为标准，以及与数据的高度关联性，所以只提供在此文件手工编辑的方式

$config['courses']['time_systems'] = array (
  0 => 
  array (
    'id' => '50',
    'title' => '平日晚上',
  ),
  1 => 
  array (
    'id' => '60',
    'title' => '周六',
  ),
  2 => 
  array (
    'id' => '70',
    'title' => '周日',
  ),
  3 => 
  array (
    'id' => '80',
    'title' => '全日制',
  ),
  4 => 
  array (
    'id' => '808',
    'title' => '钻石小班',
  ),
  5 => 
  array (
    'id' => '805',
    'title' => '寒假班',
  ),
  6 => 
  array (
    'id' => '806',
    'title' => '暑假班',
  ),
);


$config['courses']['jp_categorys'] = array (
  0 => 
  array (
    'id' => '10',
    'title' => '一级(N1)',
  ),
  1 => 
  array (
    'id' => '20',
    'title' => '二级(N2)',
  ),
  2 => 
  array (
    'id' => '30',
    'title' => '三级(N3)',
  ),
  3 => 
  array (
    'id' => '40',
    'title' => '四级(N4)',
  ),
  4 => 
  array (
    'id' => '50',
    'title' => '五级(N5)',
  ),
  5 => 
  array (
    'id' => '5',
    'title' => '口译',
  ),
  6 => 
  array (
    'id' => '60',
    'title' => '会话',
  ),
  7 => 
  array (
    'id' => '70',
    'title' => 'J-Test',
  ),
  8 => 
  array (
    'id' => '80',
    'title' => '学历证书',
  ),
  9 => 
  array (
    'id' => '88',
    'title' => 'VIP',
  ),
  10 => 
  array (
    'id' => '3',
    'title' => '同传',
  ),
  11 => 
  array (
    'id' => '65',
    'title' => '商务日语',
  ),
  12 => 
  array (
    'id' => '66',
    'title' => '留学',
  ),
  13 => 
  array (
    'id' => '67',
    'title' => '少儿日语',
  ),
  14 => 
  array (
    'id' => '68',
    'title' => '日语入门',
  ),
);

$config['courses']['jp_levels'] = array (
  0 => 
  array (
    'id' => '10',
    'title' => '一级',
  ),
  1 => 
  array (
    'id' => '20',
    'title' => '二级',
  ),
  2 => 
  array (
    'id' => '30',
    'title' => '三级',
  ),
  3 => 
  array (
    'id' => '40',
    'title' => '四级',
  ),
  4 => 
  array (
    'id' => '50',
    'title' => '五级',
  ),
  5 => 
  array (
    'id' => '100',
    'title' => '零基础',
  ),
  6 => 
  array (
    'id' => '5',
    'title' => '口译',
  ),

);

$config['courses']['jp_bases'] = array (
  0 => 
  array (
    'id' => '100',
    'title' => '零基础',
  ),
  1 => 
  array (
    'id' => '50',
    'title' => '5级基础',
  ),
  2 => 
  array (
    'id' => '40',
    'title' => '4级基础',
  ),

  3 => 
  array (
    'id' => '30',
    'title' => '3级基础',
  ),
  4 => 
  array (
    'id' => '20',
    'title' => '2级基础',
  ),
  5 => 
  array (
    'id' => '10',
    'title' => '1级基础',
  ),
);
