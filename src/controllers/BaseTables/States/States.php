<?php
include '../../../autoload.php';
use model\States;
$States = new States();
if (isset($_REQUEST['controller_type'])) {
    if (isset($_REQUEST['controller_type'])) {
        $type = $_REQUEST['controller_type'];
    }
    unset($_REQUEST['controller_type']);
    switch ($type) {
        case 'add':
            $_REQUEST = checkAll($_REQUEST,true);
            $_REQUEST['sdate'] = time();
            echo showResult($States->add($_REQUEST), 'استان', 'افزودن');
            break;
        case 'get':
            $state_id = $_REQUEST['state_id'];
            echo jsonEncode($States->get($state_id));
            break;
        case 'edit':
            $_REQUEST = checkAll($_REQUEST);
            echo showResult($States->edit($_REQUEST['state_id'], $_REQUEST), 'استان', 'ویرایش');
            break;
        case "delete":
            echo showResult($States->delete($_REQUEST['state_id']), 'استان', 'حذف');
            break;
    }
} else {
    echo jsonEncode($States->getAll());
}