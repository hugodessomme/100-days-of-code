<?php

class A
{
	private $nom;

	public function __construct($nom) {
		$this->nom = $nom;
	}

	public function nom()
	{
		return $this->nom;
	}
}

class B extends A
{
	protected $age;

	public function __construct($nom, $age)
	{
		parent::__construct($nom);

		$this->age = $age;
	}

	public function tata()
	{
		return "Je suis la classe enfant  (tata()), et mon nom est : " . parent::nom() . ', ' . $this->age;
	}
}

echo (new B('test', 20))->tata();