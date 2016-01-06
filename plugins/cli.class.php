<?php
$plugins->registerPlugin("arguments", "ArgumentsCli");

class ArgumentsCli {
	private $arguments;

	private $commando;

	public function __construct(&$arguments){
		$this->arguments = $arguments;

		$arguments->setArgument("lolo", "rope");

		$commando = new Commando\Command();
	}	
}

