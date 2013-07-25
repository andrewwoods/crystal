<?php
/**
* Run a test suite
*
* @package Crystal
* @subpackage App
* @author Andrew Woods <andrew@andrewwoods.net>
*/

class App
{
	protected $filename = '';
	protected $regex = '';

	public function __construct()
	{
		// intentionally blank
	}

	public function set_file( $filename )
	{
		$this->filename = $filename;
	}

	public function set_regex( $regex )
	{
		$this->regex = $regex;
	}

	public function run_tests()
	{
		if ( ! file_exists( $this->filename ) )
		{
			echo $this->filename . " does not exist!\n";
		}


		$fh = fopen($this->filename, 'r');
		if ( ! $fh)
		{
			echo "Could not open file " . $this->filename;
		}

		while ( $line = fgetcsv($fh) )
		{
			$result = preg_match($this->regex, $line[0], $matches);
			if ($result > 0 && $line[1] == 'PASS')
			{
				echo "Expected ${line[0]} to pass\n";
			}
			elseif ($result === 0 && $line[1] === 'FAIL')
			{
				echo "Expected ${line[0]} to FAIL - ${line[2]}\n";
			}
			else 
			{
				echo $this->regex . " failed on ${line[0]}\n";	
			}
		}
	}


	public function help()
	{
		echo "help for running tests.\n";
		echo "=======================\n";
		echo "directions go here.\n";
		echo "$ php test.php -r|--regex '/\d{5}/' -f|--file data/us/zip.txt\n";
		echo "=======================\n";
	}

}

/*
 * Process command line switches
 */
$opt = getopt('r:f:h', array('regex:', 'file:', 'help'));

$app = new App();

if ( isset( $opt['h'] ) || isset( $opt['help'] ) )
{
	$app->help();
	exit;
}

if ( isset( $opt['f'] ) )
{
	$opt['file'] = $opt['f'];
}

if ( isset( $opt['r'] ) )
{
	$opt['regex'] = $opt['r'];
}

/*
 * Main Program Flow
 */
if ( isset( $opt['regex'] ) && isset( $opt['file'] ) )
{
	$app->set_regex( $opt['regex'] );
	$app->set_file( $opt['file'] );
	$app->run_tests();
}
else
{
	$app->help();
	print_r($opt);
	exit;
}



