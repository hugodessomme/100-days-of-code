<?php

class Personnage
{
	private $id,
			$nom,
			$degats;

	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Renvoie l'ID du personnage
	public function getId()
	{
		return $this->id;
	}

	// Renvoie le nom du personnage
	public function getNom()
	{
		return $this->nom;
	}

	// Renvoie les dégâts du personnage
	public function getDegats()
	{
		return $this->degats;
	}

	// Définit l'ID
	public function setId($id)
	{
		$id = (int) $id;

		if ($id > 0)
		{
			$this->id = $id;
		}
	}

	// Définit le nom
	public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->nom = $nom;
		}
	}

	// Définit les dégats
	public function setDegats($degats)
	{
		$degats = (int) $degats;

		if ($degats >= 0 && $degats <= 100)
		{
			$this->degats = $degats;
		}
	}

	// Frapper un autre personnage
	public function frapper(Personnage $perso)
	{
		/**
		 * Si on se frappe soi-même, stopper la fonction en renvoyant un message
		 * précisant que le personnage ciblé est celui qui attaque
		 */
		if ($perso->getId() == $this->id)
		{
			return self::CEST_MOI;
		}

		/**
		 * On indique au personnage frappé qu'il doit recevoir des dégâts
		 */
		return $perso->recevoirDegats();
	}

	// Recevoir des dégâts lorsqu'un autre personnage le frappe
	public function recevoirDegats()
	{
		/**
		 * On augmente de 5 les dégâts
		 */
		$this->degats += 5;

		/**
		 * Si le personnage a 100 dégats, on renvoie une valeur signifiant que le
		 * personnage est tué
		 */
		if ($this->degats >= 100)
		{
			return self::PERSONNAGE_TUE;
		}

		/**
		 * Sinon, on renvoie une valeur précisant que le personnage a bien été frappé
		 */
		return self::PERSONNAGE_FRAPPE;
	}

	// Vérifie la validité du nom du personnage
	public function nomValide()
	{
		return !empty($this->nom);
	}
}