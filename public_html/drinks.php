<?php
require '../bootloader.php';
$modelDrinks = new \App\Drinks\Model();
$form = [
	'title' => 'Paskanauti',
    'fields' => [
        'selector' => [
			'type' => 'select',
			'label' => 'Pasirinkti gėrimą:',
			'options' => get_options(),
		],
    ],
    'buttons' => [
        'drink' => [
            'type' => 'submit',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];
function get_options() {
	$drinks = [];
	$modelDrinks = new \App\Drinks\Model();
	
	foreach ($modelDrinks->get() as $drink) {
		$drinks[$drink->getID()] = $drink->getName();
	}
	
	return $drinks;
}
function form_success($filtered_input, &$form) {
	$modelDrinks = new \App\Drinks\Model();
	// Masyvas Drink klases objektu
	$drinks = $modelDrinks->get();
	$drink = $drinks[$filtered_input['selector']];
	$drink->drink();
	$modelDrinks->update($drink);
}
function form_fail($filtered_input, &$form) {
	print 'form fail';
}
$filtered_input = get_filtered_input($form);
if (!empty($filtered_input)) {
	validate_form($filtered_input, $form);
}
$navigation = [
	'image' => 'media/icon.png',
	'links' => [
		[
			'url' => '/drinks.php',
			'title' => 'Drinks'
		],
		[
			'url' => '/login.php',
			'title' => 'Login'
		],
		[
			'url' => '/register.php',
			'title' => 'Register'
		],
	]
];
$formView = new \Core\View($form);
$navigationView = new Core\View($navigation);
?>
<html>
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Drinks</title>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!--Render navigation-->
		<?php print $navigationView->render(ROOT . '/app/templates/navigation.tpl.php'); ?>
		
		<!--Render form-->
		<?php print $formView->render(ROOT . '/core/templates/form.tpl.php'); ?>
		
		<div class="catalogue">
			<div class="wrapper">
				<?php foreach ($modelDrinks->get() as $drink): ?>
					<div class="bottle">
						<img src="<?php print $drink->getImage(); ?>" alt="<?php $drink->getName(); ?>">
						<div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
						<div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
						<div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
    </body>
</html>
