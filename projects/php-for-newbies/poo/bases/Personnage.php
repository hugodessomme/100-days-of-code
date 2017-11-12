<?php

class Personnage {
	private $id;
	private $nom;
	private $forcePerso;
	private $degats;
	private $niveau;
	private $experience;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	// Hydratation
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	public function getId() { return $this->id; }
	public function getNom() { return $this->nom; }
	public function getForcePerso() { return $this->forcePerso; }
	public function getDegats() { return $this->degats; }
	public function getNiveau() { return $this->niveau; }
	public function getExperience() { return $this->experience; }

	// Setter : setId
	public function setId($id) {
		$id = (int) $id;

		if ($id > 0)
		{
			$this->id = $id;
		}
	}

	// Setter : setNom
	public function setNom($nom) {
		if (is_string($nom))
		{
			$this->nom = $nom;
		}
	}

	// Setter : setForcePerso
	public function setForcePerso($forcePerso) {
		$forcePerso = (int) $forcePerso;

		if ($forcePerso >= 1 && $forcePerso <= 100)
		{
			$this->forcePerso = $forcePerso;
		}
	}

	// Setter : setDegats
	public function setDegats($degats) {
		$degats = (int) $degats;

		if ($degats >= 0 && $degats <= 100)
		{
			$this->degats = $degats;
		}
	}

	// Setter : setNiveau
	public function setNiveau($niveau) {
		$niveau = (int) $niveau;

		if ($niveau >= 1 && $niveau <= 100)
		{
			$this->niveau = $niveau;
		}
	}

	// Setter : setExperience
	public function setExperience($experience) {
		$experience = (int) $experience;

		if ($experience >= 1 && $experience <= 100)
		{
			$this->experience = $experience;
		}
	}
}
