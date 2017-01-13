<?php 

class Parser
{
	protected $unwanted = [];
	protected $stopWords = [];
	protected $text;
	protected $tokens = [];
	protected $tags = [];
	protected $total;
	protected $minFrequency;


	// Constructor
	public function __construct($text, $minFrequency = 8)
	{
		$this->text = $text;
		$this->minFrequency = $minFrequency;
	}

	// GET THE TAGS FROM THE TEXT
	public function process()
	{

		return $this->filter()
					->tokenization()
					->frequency()
					->sortByFrequency()
					->cleanStopWords();
	}

	// remove ALL the SPECIAL CHARS
	protected function filter()
	{
		$this->text = str_replace($this->unwanted, '', $this->text);
		$this->text = str_replace('/\d/', '', $this->text);
		$this->text = str_replace(' ', '-', $this->text);
		$this->text = str_replace('/s', '-', $this->text);
		return $this;
	}

	// 'my-text-is-like-that' => ['my', 'text', 'is', 'like', 'that']
	protected function tokenization()
	{
		$this->text = strtolower($this->text);
		$this->tokens = explode('-', $this->text);
		return $this;
	}

	// Calcule the FREQUENCY of each word
	protected function frequency()
	{
		$this->tokens = array_count_values($this->tokens);
		return $this;
	}

	// SORT the array based on frequency
	protected function sortByFrequency()
	{
		arsort($this->tokens);
		return $this;
	}


	// CLEAN the array from STOPWORDS
	protected function cleanStopWords()
	{
		foreach($this->tokens as $key => $value)
		{
		if(!in_array($key, $this->stopWords) && $value>= $this->minFrequency)
			$this->tags[$key] = $value;
		}
		$this->total = array_sum($this->tags);
		return $this->tags;
	}

	//SET the LIST of unwanted Chars
	public function setUnwanted(array $unwanted)
	{
		$this->unwanted = $unwanted;
	}

	//SET the LIST of STOPWORDS 
	public function setStopWords(array $stopWords)
	{
		$this->stopWords = $stopWords;
	}


	// set the TEXT
	public function setText($text)
	{
		$this->text = $text;
	}
}
