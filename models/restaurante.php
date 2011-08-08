<?php
Class Restaurante extends AppModel{
    var $name = 'Restaurante';
    
    var $belongsTo = array('Tipo');
    
    /*
     *  A fórmula de Haversine 
     *  geralmente é usada para calcular 
     *  distâncias circulares entre dois 
     *  pares de coordenadas em uma esfera
     * 
     */
    function haversine($lat, $lng, $radius){
        $pontos = $this->query('SELECT Restaurante.*, ( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance FROM restaurantes AS Restaurante HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20');
    
        return $pontos;
    }
}