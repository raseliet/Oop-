<?php
require '../bootloader.php';
$modelDrinks = new \App\Drinks\Model();
//var_dump($_POST);
//var_dump($_GET);
$form = [
	'title' => 'Insert Drink',
    'fields' => [
        'name' => [
            'type' => 'text',
			'label' => 'Drink name:',
			'extra' => [
				'attr' => [
					'placeholder' => 'Pavadinimas',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'amount_ml' => [
            'type' => 'number',
			'label' => 'Amount in ml:',
            'extra' => [
				'attr' => [
					'placeholder' => 'Talpa',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
			'label' => 'Abarot:',
			'extra' => [
				'attr' => [
					'placeholder' => 'Laipsniai',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'image' => [
            'type' => 'url',
			'label' => 'Image URL:',
			'extra' => [
				'attr' => [
					'placeholder' => 'Paveikslelio nuoroda',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ]
    ],
    'buttons' => [
        'insert' => [
            'type' => 'submit',
        ],
        'delete all' => [
            'type' => 'submit',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success'
    ],
];
function form_success($filtered_input, &$form) {
    $modelDrinks = new \App\Drinks\Model();
	$drink = new App\Drinks\Drink($filtered_input);
    $modelDrinks->insert($drink);
}
$filtered_input = get_filtered_input($form);
$button = get_form_action();
switch ($button) {
	case 'insert':
		if (!empty($filtered_input)) {
			validate_form($filtered_input, $form);
		}
		break;
	case 'delete all':
		$modelDrinks->deleteAll();
		break;
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
		<title>Home</title>
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
						<div class='name'><?php print $drink->getName(); ?></div>
						<div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
						<div class="Amount"><?php print "Tūris {$drink->getAmount()} ml"; ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<script src="js/app.js"></script>
    </body>
</html>
