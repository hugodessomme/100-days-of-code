<?php

abstract class Personnage
{
	protected $id,
			$nom,
			$degats,
			$niveau,
			$experience,
			$puissance,
			$type,
			$atout;

	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;

	/**
	 * Constructeur
	 *
	 * @param array $data Un tableau associatif avec les données de configuration d'un personnage
	 */
	public function __construct(array $data)
	{
		$this->hydrate($data);
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
	 * Retourne le niveau
	 *
	 * @return integer
	 */
	public function getNiveau()
	{
		return $this->niveau;
	}

	/**
	 * Retourne l'expérience
	 *
	 * @return integer
	 */
	public function getExperience()
	{
		return $this->experience;
	}

	/**
	 * Retourne la puissance
	 *
	 * @return integer
	 */
	public function getPuissance()
	{
		return $this->puissance;
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
	 * Déifnit le niveau
	 *
	 * @param integer $niveau
	 */
	public function setNiveau($niveau)
	{
		$niveau = (int) $niveau;

		if ($niveau >= 1 && $niveau <= 5)
		{
			$this->niveau = $niveau;
		}
	}

	/**
	 * Définit l'expérience
	 *
	 * @param integer
	 */
	public function setExperience($experience)
	{
		$experience = (int) $experience;

		if ($experience >= 0 && $experience <= 100) {
			$this->experience = $experience;
		}
	}

	/**
	 * Définit la puissance
	 *
	 * @param integer $puissance
	 */
	public function setPuissance($puissance)
	{
		$puissance = (int) $puissance;

		if ($puissance >= 1 && $puissance <= 5)
		{
			$this->puissance = $puissance;
		}
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

		// Sinon, indiquer au personnage frappé qu'il doit recevoir des dégâts
		return $perso->recevoirDegats($this->puissance);
	}

	/**
	 * Le personnage reçoit des dégâts (a été frappé)
	 *
	 * @return integer Statut du personnage
	 **/

	public function recevoirDegats($puissance)
	{
		// Chaque coup reçu incrémente de 5 le nombre de dégâts
		$this->degats += (5 * $puissance);

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
	 * Le personnage gagne un niveau
	 */
	public function gagnerNiveau()
	{
		$this->niveau++;
	}

	/**
	 * Le personnage gagne de l'exéprience
	 */
	public function gagnerExperience()
	{
		$this->experience += 20;

		if ($this->experience > 100)
		{
			$this->gagnerNiveau();
			$this->experience = 0;
		}
	}

	/**
	 * Le personnage gagne de la puissance
	 */
	public function gagnerPuissance()
	{
		if ($this->puissance <= 5)
		{
			$this->puissance++;
		}
	}
}