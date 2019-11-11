<?php

/**
 * Paprastoji Klasė - propertiečių ir metodų rinkinys
 * 
 * Property (čiai) - Kintamieji
 * Metodai - Funkcijos
 * 
 * Pasiekiamumo Scope'ai:
 * private, protected, public
 */
class ManoKlase {

    // Property/Metodas pasiekiamas tik iš klasės vidaus 
    private $privateProperty = 'privatePropertyValue is ManoKlase';
    // Property/Metodas pasiekamas iš klasės vidaus ir extend'inant klasę
    protected $protectedProperty = 'protectedPropertyValue is ManoKlase';
    // Visada pasiekamas, įskaitant ir už klasės ribų
    public $publicProperty = 'publicPropertyValue is ManoKlase';

    /**
     * Konstruktorius - 
     * metodas, kuris išsikviečia naujo objekto sukūrimo metu
     * (magiškas metodas. Jo negalima pakartotinai iškviesti)
     */
    public function __construct($konstr_param_1, $konstr_param_2) {
        //Paramaterai $konstr_param_1, ir $konstr_param_2, paduodami 
        // sukuriant naują objektą. Pvz.:
        // $obj = new ManoKlase(10, 20);
        //                      ^    ^
    }

    public function testPrivate() {
        return $this->privateProperty;
    }

    public function testProtected() {
        return $this->protectedProperty;
    }

    public function testPublic() {
        return $this->publicProperty;
    }

    /**
     * Destruktorius - 
     * metodas, kuris išsikviečia objekto prieš pat susinaikinant objektui
     * Kada susinaikina objektas?
     *  * Pasibaugs visam kodui
     *  * unset($object)
     *  * jeigu obj. buvo sukurtas f-ijos viduje, tai įsivykdžius f-ijai
     */
    public function __destruct() {
        // Destruktorius parametrų turėti negali
    }

}

/**
 * Extend'inančioji klasė - ji paveldi visas savybes iš ManoKlase
 * + gali turėti ir savo unikalių properčių/metodų
 * 
 * Ką paveldi?
 * Properčius - protected ir public
 * Metodus - protected ir public
 * 
 */
class ManoIsplestineKlase extends ManoKlase {

    public function testPrivatePaveldeta() {
        // Neveiks šitaip, nes private properčių nepaveldi
        // return $this->privateProperty;
        return 'Neveikia';
    }

    public function testProtectedPaveldeta() {
        return $this->protectedProperty;
    }

    public function testPublicPaveldeta() {
        return $this->publicProperty;
    }

}

$paprKlase = new ManoKlase('test_param_1', 'test_param_2');
$manoIsplKlase = new ManoIsplestineKlase('test_param_1', 'test_param_2');
?>
<html>
    <body>
        <h1>Paprastoji klasė <pre>ManoKlase</pre></h1>
        <h2>Galima iškviesti HTML'e tik public metodus:</h2>
        <ul>
            <li>
                <pre>
    // Property/Metodas pasiekiamas tik iš klasės vidaus 
    private $privateProperty = 'privatePropertyValue is ManoKlase';

    public function testPrivate() {
        return $this->privateProperty;
    }
                </pre>
            </li>
            <li>$paprKlase->testPrivate(): <b><?php print $paprKlase->testPrivate(); ?></b></li>
            <li>
                <pre>
    // Property/Metodas pasiekamas iš klasės vidaus ir extend'inant klasę
    protected $protectedProperty = 'protectedPropertyValue is ManoKlase';

    public function testProtectedPaveldeta() {
        return $this->protectedProperty;
    }
                </pre>
            </li>
            <li>$paprKlase->testProtected(): <b><?php print $paprKlase->testProtected(); ?></b></li>
            <li>
                <pre>
    // Visada pasiekamas, įskaitant ir už klasės ribų
    public $publicProperty = 'publicPropertyValue is ManoKlase';

    public function testPublicPaveldeta() {
        return $this->publicProperty;
    }
                </pre>
            </li>
            <li>$paprKlase->testPublic(): <b><?php print $paprKlase->testPublic(); ?></b></li>           
        </ul>
        <h2>Tiesiogiai pasiekti galima tik public properčius:</h2>
        <ul>
            <li>$paprKlase->privateProperty; <b>Negalima, nes private!</b></li>
            <li>$paprKlase->protectedProperty; <b>Negalima, nes protected!</b></li>
            <li>$paprKlase->publicProperty; <b><?php print $paprKlase->publicProperty; ?></b></li>           
        </ul>        

        <h1>Isplestine klasė <pre>ManoIsplestineKlase</pre></h1>
        <h2>Galima iškviesti HTML'e tik public metodus:</h2>
        <ul>
            <li>
                <pre>
    public function testPrivatePaveldeta() {
        // Neveiks šitaip, nes private properčių nepaveldi
        // return $this->privateProperty;
        return 'Neveikia';
    }
                </pre>
            </li>            
            <li>$manoIsplKlase->testPrivatePaveldeta(): <b><?php print $manoIsplKlase->testPrivatePaveldeta(); ?></b></li>
            <li>
                <pre>
    public function testProtectedPaveldeta() {
        return $this->protectedProperty;
    }
                </pre>
            </li>
            <li>$manoIsplKlase->testProtectedPaveldeta(): <b><?php print $manoIsplKlase->testProtectedPaveldeta(); ?></b></li>
            <li>
                <pre>
    public function testPublicPaveldeta() {
        return $this->publicProperty;
    }
                </pre>
            </li>            
            <li>$manoIsplKlase->testPublicPaveldeta(): <b><?php print $manoIsplKlase->testPublicPaveldeta(); ?></b></li>           
        </ul>               
        <h2>Nepamirškime, kad ManoIsplestineKlase paveldi ir public + protected metodus iš ManoKlase irgi:</h2>
        <ul>
            <li>$manoIsplKlase->testPublic(): <b><?php print $manoIsplKlase->testPublic(); ?></b></li>                       
            <li>$manoIsplKlase->testPrivate(): <b><?php print $manoIsplKlase->testPublic(); ?></b></li>                       
            <li>$manoIsplKlase->testProtected(): <b><?php print $manoIsplKlase->testPublic(); ?></b></li>                       
        </ul>               
    </body>
</html>