<!--

namespace App\Views;
//
//class navigation extends \Core\View {
//    protected $data = [
//        'icon' => '/media/icon.png',
//        'links' => [
//            [
//          'url' => 'drinks.php',
//            'title' => 'Drinks',
//        ],
//        [
//          'url' => 'register.php',
//            'title' => 'Register',
//        ],
//        [
//          'url' => 'login.php',
//            'title' => 'Login',
//        ],
//        [
//          'url' => '',
//            'title' => 'Logout',
//        ]
//       ] 
//    ]
//}-->


<?php if (isset($data) && !empty($data)) ; ?>
<nav>
    <div class="wrapper">

        <a href="<?php ?>"><img src="<?php print $data['icon']; ?> " alt="icon"></a>

        <?php if (isset($data['links'])): ?>
            <ul>
                <?php foreach ($data['links'] as $link): ?>
                    <li><a href="<?php print $link['url']; ?>"><?php print $link['title']; ?></a>
                    <?php endforeach; ?>   
            </ul>
        <?php endif; ?>
    </div>
</nav>
