<?php
$plugins->registerPlugin("arguments.cli", "ArgumentsCliCommando");

class ArgumentsCliCommando {
	private $arguments;

	private $commando;

	public function __construct(&$arguments, $plugins){
		$commando = new Commando\Command();		

		$plugins->executeWorkspace("arguments.cli.commando", $commando);

		foreach($commando->getOptions() as $key => $value){
			$arguments->setArgument($key, $value->getValue());
		}
	}	
}

