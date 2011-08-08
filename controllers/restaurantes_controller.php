<?php

Class RestaurantesController extends AppController {

    var $name = 'Restaurantes';


    /*
     * Método index
     * 
     */

    function index() {
        
    }

    /*
     * Método para inicializar
     * a aplicaçao
     * 
     */

    function init($lnt, $lng, $radius = 5) {
        $this->autoRender = false;
        $locais = $this->Restaurante->haversine($lnt, $lng, $radius);

        echo '<ul>';
        if (empty($locais)) {
            echo '<p>não há restaurantes perto de você em um raio de ' . $radius . 'km</p>';
        } else {
            foreach ($locais as $l) {



                echo '<li>';
                echo '<h1>' . $l['Restaurante']['name'] . '</h1>';
                echo '<p>Endereço: ' . $l['Restaurante']['address'] . '';
                echo '<p>Comida tipica ' . $l['Restaurante']['tipo'] . '</p>';
                echo '<p>Horario de funcionamento ' . $l['Restaurante']['horarioAbertura'] . ' - ' . $l['Restaurante']['horarioFechamento'] . '</p>';

                $metro = substr(number_format($l[0]['distance'], 3), 0, 1);

                if ($metro == 0) {
                    echo '<p>Distancia de você ' . substr(number_format($l[0]['distance'], 3), 2, 5) . 'm </p>';
                } else {
                    echo '<p>Distancia de você ' . substr(number_format($l[0]['distance'], 3), 0, 3) . 'Km </p>';
                }
                echo '</li>';
            }
            echo '<ul>';
        }
    }

    /*
     * Método para visualizar
     * todos os pontos dado o parametro
     * 
     */

    function visulisarPontos() {
        $this->autoRender = false;
        if (empty($this->data['Restaurante']['address'])) {
            echo 'Digite o endereço primeiro';
        } else {
            $locais = $this->Restaurante->haversine($this->data['Restaurante']['lnt'], $this->data['Restaurante']['lng'], $this->data['Restaurante']['radius']);

            echo '<ul>';
            if (empty($locais)) {
                echo '<p>não há restaurantes perto de você em um raio de ' . $this->data['Restaurante']['radius'] . 'km</p>';
            } else {
                foreach ($locais as $l) {



                    echo '<li>';
                    echo '<h1>' . $l['Restaurante']['name'] . '</h1>';
                    echo '<p>Endereço: ' . $l['Restaurante']['address'] . '';
                    echo '<p>Comida tipica ' . $l['Restaurante']['tipo'] . '</p>';
                    echo '<p>Horario de funcionamento ' . $l['Restaurante']['horarioAbertura'] . ' - ' . $l['Restaurante']['horarioFechamento'] . '</p>';

                    $metro = substr(number_format($l[0]['distance'], 3), 0, 1);

                    if ($metro == 0) {
                        echo '<p>Distancia de você ' . substr(number_format($l[0]['distance'], 3), 2, 5) . 'm </p>';
                    } else {
                        echo '<p>Distancia de você ' . substr(number_format($l[0]['distance'], 3), 0, 3) . 'Km </p>';
                    }
                    echo '</li>';
                }
                echo '<ul>';
            }
        }
    }

}