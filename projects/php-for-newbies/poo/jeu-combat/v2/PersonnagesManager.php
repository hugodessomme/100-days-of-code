<?php

class PersonnagesManager
{
	private $db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	/**
	 * Crée un nouveau personnage
	 *
	 * @param Personnage $perso Personnage à créer
	 */
	public function add(Personnage $perso)
	{
		$query = $this->db->prepare('INSERT INTO personnagesCombat(nom) VALUES(:nom)');
		$query->bindValue(':nom', $perso->getNom());
		$query->execute();

		$perso->hydrate([
			'id' => $this->db->lastInsertId(),
			'degats' => 0
		]);
	}

	/**
	 * Mettre à jour un personnage existant
	 *
	 * @param Personnage $perso Personnage à mettre à jour
	 */
	public function update(Personnage $perso)
	{
		$query = $this->db->prepare('
			UPDATE personnagesCombat
			SET degats = :degats
			WHERE id = :id
		');
		$query->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
		$query->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
		$query->execute();
	}

	/**
	 * Supprime un personnage
	 *
	 * @param Personnage $perso Personnage à supprimer
	 */
	public function delete(Personnage $perso)
	{
		$this->db->exec('DELETE FROM personnagesCombat WHERE id = ' . $perso->getId());
	}

	/**
	 * Compte le nombre total de personnages
	 *
	 * @return integer
	 */
	public function count()
	{
		return (int) $this->db->query('SELECT COUNT(*) FROM personnagesCombat')->fetchColumn();
	}

	/**
	 * Retourne un personnage
	 *
	 * @param integer|string $info ID ou nom du personnage
	 * @return Personnage
	 */
	public function get($info)
	{
		if (is_int($info))
		{
			$query = $this->db->query('SELECT * FROM personnagesCombat WHERE id = ' . $info);
			$result = $query->fetch(PDO::FETCH_ASSOC);

			return new Personnage($result);
		}

		$query = $this->db->prepare('SELECT * FROM personnagesCombat WHERE nom = :nom');
		$query->execute(['nom' => $info]);
		$result = $query->fetch(PDO::FETCH_ASSOC);

		return new Personnage($result);
	}

	/**
	 * Récupère la liste des personnages SAUF le personnage courant
	 *
	 * @param string $nom Nom du personnage
	 * @return array $personnages
	 */
	public function getList($nom)
	{
		$personnages = [];

		$query = $this->db->prepare('SELECT * FROM personnagesCombat WHERE nom <> :nom ORDER BY nom');
		$query->execute(['nom' => $nom]);

		while ($data = $query->fetch(PDO::FETCH_ASSOC))
		{
			$personnages[] = new Personnage($data);
		}

		return $personnages;
	}

	/**
	 * Indique si le personnage existe déjà
	 *
	 * @param integer|string $info ID ou nom du personnage
	 * @return boolean
	 */
	public function exists($info)
	{
		if (is_int($info))
		{
			return (bool) $this->db->query('SELECT COUNT(*) FROM personnagesCombat WHERE id = ' . $info)->fetchColumn();
		}

		$query = $this->db->prepare('SELECT COUNT(*) FROM personnagesCombat WHERE nom = :nom');
		$query->execute([':nom' => $info]);
		return (bool) $query->fetchColumn();
	}

	/**
	 * Initialise la base de données
	 *
	 * @param PDO $db Object de connexion à la base de données
	 */
	public function setDB(PDO $db)
	{
		$this->db = $db;
	}
}