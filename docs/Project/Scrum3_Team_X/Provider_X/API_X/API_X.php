<?php
// RESTful JSON API - Library Management Web Service
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

require_once("../Classes/Database.php");

$db = new Database();
$db->connect();

$action = $_REQUEST['action'] ?? '';
$table  = $_REQUEST['table']  ?? '';
$id     = $_REQUEST['id']     ?? 0;

$allowedTables = ['books', 'members', 'loans'];

if (!in_array($table, $allowedTables)) {
    $data = array();
    $data['error'] = "Invalid table";
    print(json_encode($data));
    exit;
}

switch ($action) {

    case 'getAll':
        $rows = $db->getAll($table);
        print(json_encode($rows));
        break;

    case 'getById':
        $row = $db->getById($table, $id);
        print(json_encode($row));
        break;

    case 'insert':
        $postData = $_POST;
        unset($postData['action'], $postData['table']);
        $result = $db->insert($table, $postData);
        $data = array();
        $data['success'] = $result;
        print(json_encode($data));
        break;

    case 'update':
        $postData = $_POST;
        unset($postData['action'], $postData['table'], $postData['id']);
        $result = $db->update($table, $id, $postData);
        $data = array();
        $data['success'] = $result;
        print(json_encode($data));
        break;

    case 'delete':
        $result = $db->delete($table, $id);
        $data = array();
        $data['success'] = $result;
        print(json_encode($data));
        break;

    default:
        $data = array();
        $data['error'] = "Invalid action";
        print(json_encode($data));
        break;
}
?>