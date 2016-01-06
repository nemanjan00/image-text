# image-text

image-text is PHP framework for fast and automated modular image processing. 

Example will be used for generating framed images with centered text but you can fork it and create whatever fits your needs best. 

## Flow

The idea behind flow is to create plug and play solution for plugins. You just place plugins inside /plugins/ directory of project and they are called when needed. For example for if your function needs some custom arguments in CLI version, you will use `arguments.cli.params` to manipulate Commando. 

## Plugin example

```PHP
$plugins->registerPlugin("your_custom_hook", "ClassName", 0); // 0 is default priority and it is used to determing by which order plugins are executed

class ClassName{
	public function __construct(&$data, $plugins){
		//Here goes your code that can manipulate whatever you passed when you called hook called "your_custom_hook"
		//You can also call some more plugins using $plugins variable
	}	
}
```

## Running hook

If you want to run specific hook, you can simply call

```PHP
$plugins->executeWorkspace("hook_name", $arguments);
```

## Default CLI hooks

`arguments.cli` - This is hook called when `arguments` need to be populated in CLI versions of application. If you want to use commando plugin, you do not need to hook to this one. 

`arguments.cli.commando` - This is hook called when you need to populate `commando` arguments. To understand this one better, read commando documentation. 

## Interface for Arguments class

getArguments() -> Get all arguments as an Array

setArguments($arguments) -> Replace current arguments with Arguments from passed Array

getArgument($name) -> Get argument with passed name

setArgument($name, $value) -> Set argument with provided name and value. 

