<?php
require '../../../bootloader.php';
$model = new App\Drinks\Model();
// $conditions bus i $_POST atsiusti duomenys
// Jei i $_POST niekas nebuvo atsiusta, $conditions bus tuscias masyvas.
$conditions = $_POST ?? [];
//Gaunam visus gerimus pagal duotus parametrus $conditions
$drinks = $model->get($conditions);
// Pasiruosiam atsakymo masyva
$response = [
	'status' => '',
	'data' => [],
	'errors' => []
];
if (is_array($drinks)) {
    foreach ($drinks as $drink) {
//		Kiekvieno gauto gerimo duomenys irasomi i $response masyva
        $response['data'][] = $drink->getData();
    }
	
	$response['status'] = 'success';
} else {
	$response['status'] = 'fail';
    $response['errors'][] = 'Could not pull data from database!';
}
// Masyva paversta JSON string'u isprintinam
print json_encode($response);
