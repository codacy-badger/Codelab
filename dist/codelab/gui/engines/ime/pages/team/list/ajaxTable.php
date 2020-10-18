<?php
    $clAjax = true;

    include('../../../../../../codelab.php');
    $table = 'clTeam';

    $columns = array(
		0=> 'id',
		1=> 'avatar',
		2=> 'active',
		3=> 'username',
		4=> 'email',
        5=> 'roles',
	);

    $requestData = $_POST;

    // Create where
    $where = '';
    // Search
    if (@$requestData['search'] != ''):
        $where .= '(id LIKE "%' .  sql::str($requestData['search']) . '%" OR LOWER(username) LIKE LOWER("%' .  sql::str($requestData['search']) . '%") OR LOWER(email) LIKE LOWER("%' .  sql::str($requestData['search']) . '%")) AND ';
    endif;
    // Active
    if (@$requestData['status'] == 'active'):
        $where .= 'active = 1 AND ';
    endif;
    if (@$requestData['status'] == 'inactive'):
        $where .= 'active = "0" AND ';
    endif;

    include(engine::path() . '/inc/pageTable.ajax.php');

    foreach ($sqlList as $row => $field):
    	$nestedData = array();
        $nestedData[] = $field["id"];
        $nestedData[] = '<div class="center"><img class="small" src="http://img.g3ck.com/' . rand(20,400) . 'x' . rand(20,400) . '/jpg/000000/fff/' .clRandom::readable(rand(3,10)) . '" /></div>';
        $nestedData[] = '<div class="center">' . engine::checkIco($field["active"]) . '</div>';
        $nestedData[] = $field["username"];
        $nestedData[] = $field["email"];
        $nestedData[] = $field["roles"];
        // Action
        $action = '<div class="action">';
            // Edit
            $action_edit = '<a class="btn xs" href="' . clUrl . '/team/edit/' . $field['id'] . '">Edit</a>';
            $action .= $action_edit;
            // Delete
            $action_edit = '<a class="btn xs red confirm" href="' . clUrl . '/team/delete/' . $field['id'] . '">Delete</a>';
            $action .= $action_edit;
        $action .= '</div>';

        $nestedData[] = $action;

        $data[] = $nestedData;
    endforeach;
    $jsonData = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($dataTotal),
		"recordsFiltered" => intval($dataFiltered),
		"data"            => $data
	);
	die(json_encode($jsonData));
