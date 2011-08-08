<?php
Class Tipo extends AppModel{
    var $name = 'Tipo';
    
    var $hasMany = array('Restaurante');
}