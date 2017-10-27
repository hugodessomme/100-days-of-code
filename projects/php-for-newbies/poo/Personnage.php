<?php

class Personnage {

	// Attributs
	private $force;
	private $localisation;
	private $experience;
	private $degats;

	// Constantes
	const FORCE_PETITE = 20;
	const FORCE_MOYENNE = 50;
	const FORCE_GRANDE = 80;

	// Attributs statiques privés
	private static $texteADire = "Je vais tous vous tuer";

	// Constructeur
	public function __construct($force)
	{
		echo "Le constructeur !";

		$this->setForce($force);
		$this->experience = 1;
	}

	// Afficher la force du personnage
	public function force()
	{
		return $this->force;
	}

	// Afficher l'expérience du personnage
	public function experience()
	{
		return $this->experience;
	}

	// Afficher les dégâts du personnage
	public function degats()
	{
		return $this->degats;
	}

	// Définit la valeur de force du personnage
	public function setForce($force)
	{
		if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
		{
			$this->force = $force;
		}
	}

	// Définit la valeur d'expérience du personnage
	public function setExperience($experience)
	{
		if (!is_int($experience))
		{
			trigger_error("La expérience d'un personnage doit être un entier", E_USER_WARNING);
			return;
		}

		// On n'autorise pas une expérience supérieure à 100
		if ($experience > 100)
		{
			trigger_error("La expérience d'un personnage ne peut pas être supérieure à 100", E_USER_WARNING);
			return;
		}

		$this->experience = $experience;
	}

	// Définit la valeur de dégâts du personnage
	public function setDegats($degats)
	{
		if (!is_int($degats))
		{
			trigger_error("La expérience d'un personnage doit être un entier", E_USER_WARNING);
			return;
		}

		// On n'autorise pas une expérience supérieure à 100
		if ($degats > 100)
		{
			trigger_error("La expérience d'un personnage ne peut pas être supérieure à 100", E_USER_WARNING);
			return;
		}

		$this->degats = $degats;
	}

	// Déplacement du personnage (localisation)
	public function deplacer()
	{

	}

	// Frapper un personnage (force)
	public function frapper(Personnage $persoAFrapper)
	{
		$persoAFrapper->degats += $this->force;
	}

	// Augmente l'expérience du personnage
	public function gagnerExperience()
	{
		$this->experience = $this->experience + 1;
	}

	// Faire parler le personnage
	public static function parler()
	{
		echo self::$texteADire;
	}

}
