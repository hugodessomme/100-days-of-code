<?php

class PersonnagesManager
{
	private $db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	// Crée un nouveau personnage
	public function add(Personnage $perso)
	{
		$query = $this->db->prepare('
			INSERT INTO personnagesCombat(nom)
			VALUES(:nom)
		');
		$query->bindValue(':nom', $perso->getNom());
		$query->execute();

		$perso->hydrate(array(
			'id' => $this->db->lastInsertId(),
			'degats' => 0
		));
	}

	// Modifie un personnage existant
	public function update(Personnage $perso)
	{
		$query = $this->db->prepare('
			UPDATE personnagesCombat
			SET degats = :degats
			WHERE id = :id
		');
		$query->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
		$query->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
		$query->execute();
	}

	// Supprimer un personnage existant
	public function delete(Personnage $perso)
	{
		$this->db->exec('
			DELETE FROM personnagesCombat
			WHERE id = ' . $perso->getId() . '
		');
	}

	// Retourne un personnage par son identifiant ou nom
	public function get($info)
	{
		if (is_int($info))
		{
			$query = $this->db->query('
				SELECT * FROM personnagesCombat
				WHERE id = ' . $info
			);
			$data = $query->fetch(PDO::FETCH_ASSOC);

			return new Personnage($data);
		}
		else
		{
			$query = $this->db->prepare('
				SELECT * FROM personnagesCombat
				WHERE nom = :nom
			');
			$query->bindValue(':nom', $info);

			$query->execute();

			return new Personnage($query->fetch(PDO::FETCH_ASSOC));
		}
	}

	// Retourne une liste des personnages différent de $nom
	public function getList($nom)
	{
		$personnages = [];

		$query = $this->db->prepare('
			SELECT * FROM personnagesCombat
			WHERE nom != :nom
		');
		$query->bindValue(':nom', $nom);

		$query->execute();

		while ($data = $query->fetch(PDO::FETCH_ASSOC))
		{
			$personnages[] = new Personnage($data);
		}

		return $personnages;
	}

	// Compte le nombre de personnage
	public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM personnagesCombat')->fetchColumn();
	}

	// Vérifie si un personnage existe
	public function exists($info)
	{
		if (is_int($info))
		{
			return (bool) $this->db->query('
				SELECT COUNT(*) FROM personnagesCombat
				WHERE id = ' . $info
			)->fetchColumn();
		}

		$query = $this->db->prepare('
			SELECT COUNT(*) FROM personnagesCombat
			WHERE nom = :nom
		');
		$query->bindValue(':nom', $info);
		$query->execute();

		return (bool) $query->fetchColumn();
	}

	// Initialise la connexion à la base de données
	public function setDb(PDO $db)
	{
		$this->db = $db;
	}
}