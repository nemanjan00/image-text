<?php
$plugins->registerPlugin("arguments.cli", "ArgumentsCli");

class ArgumentsCli {
	private $arguments;

	private $commando;

	public function __construct(&$arguments, $plugins){
		$this->arguments = $arguments;

		$commando = new Commando\Command();		

		$plugins->executeWorkspace("arguments.cli.params", $commando);

		foreach($commando->getOptions() as $key => $value){
			$arguments->setArgument($key, $value->getValue());
		}
	}	
}

$plugins->registerPlugin("arguments.cli.params", "ArgumentsCliParams");

class ArgumentsCliParams {
	public function __construct(&$commando, $plugins){
		$commando->option('f')
			->aka('force')
			->describedAs('Force image override')
			->boolean();

		$commando->option('s')
			->aka('source')
			->describedAs('Source image.')
			->require();

		$commando->option('d')
			->aka('destination')
			->describedAs('Destination image')
			->require();
			
		$commando->option('t')
			->aka('text')
			->describedAs('Text inside image')
			->require();
	}
}

