<?php
require_once __DIR__."/vendor/autoload.php";

class ImageGenerator {

}

class Arguments {
	private $arguments;

	public function getArguments(){
		return $this->arguments;
	}

	public function setArguments($arguments){
		$this->arguments = $arguments;
	}

	public function setArgument($name, $value){
		$this->arguments[$name] = $value;
	}

	public function getArgument($name){
		return $this->arguments[$name];
	}
}

class PluginSystem {
	private $plugins;

	public function __construct (){
		ob_start();

		$dir = new DirectoryIterator(__DIR__."/plugins");
		foreach ($dir as $fileinfo){
			if(!$fileinfo->isDot()){
				$plugins = $this;

				require_once($fileinfo->getPathName());
			}
		}

		ob_clean();
	}

	public function registerPlugin($workspace, $name, $priority = 0){
		if(!isset($this->plugins[$workspace])){
			$this->plugins[$workspace] = [];
		}

		if(!isset($this->plugins[$workspace][$priority])){
			$this->plugins[$workspace][$priority] = [];
		}
	
		$this->plugins[$workspace][$priority][] = $name;
	}

	public function executeWorkspace($workspace, &$arguments){
		foreach($this->plugins[$workspace] as $priority){
			foreach($priority as $plugin){
				new $plugin($arguments, $this);
			}
		}	
	}
}

$arguments = new Arguments();
$plugins = new PluginSystem();

$plugins->executeWorkspace("arguments", $arguments);

print_r($arguments->getArguments());

