<?php
require '../bootloader.php';

$form = [
    'fields' => [
        'selector' => [
            'type' => 'select',
            'label' => 'Drink!',
            'options' => options(),
        ],
    ],
    'buttons' => [
        'drink' => [
            'type' => 'submit',
        ],
        'delete all' => [
            'type' => 'submit',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

function options() {
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
$button = get_form_action();

$modelDrinks = new \App\Drinks\Model();

switch ($button) {
    case 'drink':
        if (!empty($filtered_input)) {
            validate_form($filtered_input, $form);
        }
        break;
    case 'delete':
        $modelDrinks->deleteAll();
        break;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OOP</title>
        <link rel="stylesheet" href="css/style.css">
        <script defer src="js/app.js"></script>

        <style>
            .image {
                size: 55px;
                margin: auto;
            }
            .bottle {
                width: 200px;
                height: 400px;
                display: inline-block;
                margin-right: 5px;
                align-items: center;
            }

        </style>




    </head>
    <body>
        <div class="form-container">
<?php require ROOT . '/core/templates/form.tpl.php'; ?>
        </div>
        <div class="catalogue">
            <?php foreach ($modelDrinks->get() as $drink): ?>
                <div class="bottle">
                    <img src="<?php print $drink->getImage(); ?>" alt="<?php $drink->getName(); ?>">
                    <div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                    <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                    <div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
                </div>
<?php endforeach; ?>
        </div>
    </body>
</html>