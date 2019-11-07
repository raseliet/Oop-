<?php

namespace Core;

class View {

    protected $data;

    //jeigu nieko nepaduos, tai paduos protected data su tusciu array
    public function __construct($data = []) {
        $this->data = $data;
    }

//view klase turi vieninteli metoda render, neskaitant construct
    public function render(string $template_path) {
        //tikrina, ar egzistuoja, tikisi stringo
        if (!file_exists($template_path)) {
            throw (new \Exception("Template with filename: "
            . "$template_path does not exist!"));
        }

//data paduoda template, kurio reikia
        $data = $this->data;

//start buffering output  to memory
        //pradeddam outputa sekti, sudarom stringa ir uzbufferinam html

        ob_start();

//load the view (template)
//grazinamas sugeneruotas htmlas
        require $template_path;

//isvalo data, kuri buvo tvarkoma, isvalo vieta ir imasi kitos tvarkymo
        return ob_get_clean();
    }

}
