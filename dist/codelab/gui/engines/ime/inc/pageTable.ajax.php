<?php

$where = rtrim($where, 'AND ');
// Count totalData
$param = array(
    'table' => $table,
);
$dataTotal = count(sql::get($param, false));

// Count Filtered Data
// Count filtered
if ($where != ''):
    $param['where'] = $where;
    $dataFiltered = count(sql::get($param, false));
else:
    $dataFiltered = $dataTotal;
endif;


$param = array(
    'table' => $table,
    'columns' => $columns,
    'limit' => $requestData['length'],
    'order' => $columns[$requestData['order'][0]['column']],
    'sort' => $requestData['order'][0]['dir'],
    'offset' => $requestData['start']
);

if ($where != ''):
    $param['where'] = $where;
endif;

$data = array();
$sqlList = sql::get($param, false);
