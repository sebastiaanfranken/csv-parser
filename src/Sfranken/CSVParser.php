<?php
namespace Sfranken

use SplFileObject;

class CSVParser
{
	/*
	 * The spl file object instance used later on
	 */
	protected $iterator;
	
	/*
	 * An array of lines from the CSV file
	 */
	protected $lines = [];
	
	/**
	 * The constructor. Initiates a new SplFileObject
	 *
	 * @param string $filename The file to parse
	 * @return void
	 */
	public function __construct($filename)
	{
		$this->iterator = new SplFileObject($filename);
	}
	
	/**
	 * The main parser function.
	 *
	 * @param bool $header Does the CSV file have a header row? If so, ignore it
	 * @return array
	 */
	public function parse($header = true)
	{
		while($this->iterator->valid())
		{
			$this->lines[] = $this->iterator->fgetcsv();
			$this->iterator->next();
		}
		
		if($this->header == true)
		{
			array_shift($this->lines);
		}
		
		return $this->lines;
	}
	
	
}
