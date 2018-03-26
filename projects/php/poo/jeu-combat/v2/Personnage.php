<?php

class Personnage
{
	protected $id,
			$nom,
			$degats,
			$atout,
			$timeEndormi,
			$type;

	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;
	const PERSONNAGE_ENSORCELE = 4;
	const PAS_DE_MAGIE = 5;
	const PERSONNAGE_ENDORMI = 6;

	/**
	 * Constructeur
	 *
	 * @param array $data Un tableau associatif avec les données de configuration d'un personnage
	 */
	public function __construct(array $data)
	{
		$this->hydrate($data);
		$this->type = strtolower(static::class);
	}

	/**
	 * Appel dynamique des setters
	 *
	 * @param array $data Un tableau associatif avec les données de configuration d'un personnage
	 */
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

	/**
	 * Retourne l'ID
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Retourne le nom
	 *
	 * @return string
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Retourne le nombre de dégâts
	 *
	 * @return integer
	 */
	public function getDegats()
	{
		return $this->degats;
	}

	/**
	 * Retourne l'atout
	 *
	 * @return integer
	 */
	public function getAtout()
	{
		return $this->atout;
	}

	/**
	 * Retourne le temps endormi
	 *
	 * @return integer
	 */
	public function getTimeEndormi()
	{
		return $this->timeEndormi;
	}

	/**
	 * Retourne le type
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Définit l'ID
	 *
	 * @param integer $id
	 */
	public function setId($id)
	{
		$id = (int) $id;

		if ($id > 0)
		{
			$this->id = $id;
		}
	}

	/**
	 * Définit le nom
	 *
	 * @param string $nom
	 */
	public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->nom = $nom;
		}
	}

	/**
	 * Définit le nombre de dégâts
	 *
	 * @param integer $degats
	 */
	public function setDegats($degats)
	{
		$degats = (int) $degats;

		if ($degats >= 0 && $degats <= 100)
		{
			$this->degats = $degats;
		}
	}

	/**
	 * Définit l'atout
	 */
	public function setAtout($atout)
	{
		$atout = (int) $atout;

		if ($atout >= 0 && $atout <= 100)
		{
			$this->atout = $atout;
		}
	}

	/**
	 * Définit le temps endormi
	 */
	public function setTimeEndormi($time)
	{
		$this->timeEndormi = (int) $time;
	}

	/**
	* Définit le type
	*/
	public function setType()
	{
		$this->type = strtolower(static::class);
	}


	/**
	 * Frapper un autre personnage
	 *
	 * @param Personnage $perso Personnage à frapper
	 */
	public function frapper(Personnage $perso)
	{
		// Vérifier qu'on ne se frappe pas soi-même
		// Si c'est le cas, renvoyer une valeur précisant qu'on se frappe soi-même
		if ($perso->getId() === $this->id)
		{
			return self::CEST_MOI;
		}

		if ($this->estEndormi())
		{
			return self::PERSONNAGE_ENDORMI;
		}

		// Sinon, indiquer au personnage frappé qu'il doit recevoir des dégâts
		return $perso->recevoirDegats();
	}

	/**
	 * Le personnage reçoit des dégâts (a été frappé)
	 *
	 * @return integer Statut du personnage
	 **/

	public function recevoirDegats()
	{
		// Chaque coup reçu incrémente de 5 le nombre de dégâts
		$this->degats += 5;

		// Si les dégats sont supérieurs à 100, on indique que le personnage est mort
		if ($this->degats > 100)
		{
			return self::PERSONNAGE_TUE;
		}

		// Sinon, on indique que le personnage a bien été frappé
		return self::PERSONNAGE_FRAPPE;
	}

	/**
	 * Vérifie si le nom entré n'est pas vide
	 *
	 * @return boolean
	 */
	public function nomValide()
	{
		return !empty($this->getNom());
	}

	/**
	 * Vérifie si l personnage est endormi
	 *
	 * @return boolean
	 */
	public function estEndormi()
	{
		return $this->timeEndormi > time();
	}

	/**
	 * Définit le temps restant avant que le personnage ne se réveille
	 *
	 * @return string
	 */
	public function reveil()
	{
		$secondes = $this->timeEndormi;
		$secondes -= time();

		$heures = floor($secondes / 3600);
		$secondes -= $heures * 3600;
		$minutes = floor($secondes / 60);
		$secondes -= $minutes * 60;

		$heures .= $heures <= 1 ? ' heure' : ' heures';
		$minutes .= $minutes <= 1 ? ' minute' : ' minutes';
		$secondes .= $secondes <= 1 ? ' seconde' : ' secondes';

		return $heures . ', ' . $minutes . ' et ' . $secondes;
	}
}