<?php

//App::uses('Model', 'Model');

class Shop extends AppModel { 
	public $name = 'Shop';
    public $hasMany = 'Ramen';
}

?>