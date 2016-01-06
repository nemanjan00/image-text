<?php
$plugins->registerPlugin("arguments.cli", "ArgumentsCli");

class ArgumentsCli {
	private $arguments;

	private $commando;

	public function __construct(&$arguments, $plugins){
		$this->arguments = $arguments;

		$commando = new Commando\Command();		

		$plugins->executeWorkspace("arguments.cli.commando", $commando);

		foreach($commando->getOptions() as $key => $value){
			$arguments->setArgument($key, $value->getValue());
		}
	}	
}
