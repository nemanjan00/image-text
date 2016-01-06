<?php
$plugins->registerPlugin("arguments.cli.commando", "ArgumentsCliCommando");

class ArgumentsCliCommando {
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

