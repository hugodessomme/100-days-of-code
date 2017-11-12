<?php

class PersonnagesManager
{
	private $db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	// Connexion à la BDD
	public function setDb(PDO $db)
	{
		$this->db = $db;
	}

	// Ajout d'un personnage
	public function add(Personnage $perso) {
		$query = $this->db->prepare('
			INSERT INTO personnages(nom, forcePerso, degats, niveau, experience)
			VALUES(:nom, :forcePerso, :degats, :niveau, :experience)
		');
		$query->bindValue(':nom', $perso->getNom());
		$query->bindValue(':forcePerso', $perso->getForcePerso(), PDO::PARAM_INT);
		$query->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
		$query->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
		$query->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);

		$query->execute();
	}

	// Suppression d'un personnage
	public function delete(Personnage $perso) {
		$this->db->exec('
			DELETE FROM personnages
			WHERE id = ' . $perso->getId() . '
		');
	}

	// Modification d'un personnage
	public function update(Personnage $perso) {
		$query = $this->db->query('
			UPDATE personnages
			SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience
			WHERE id = :id
		');
		$query->bindValue(':forcePerso', $perso->getForcePerso(), PDO::PARAM_INT);
		$query->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
		$query->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
		$query->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);
		$query->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		$query->execute();
	}

	// Récupère une entité
	public function get($id)
	{
		$id = (int) $id;

		$query = $this->db->query('SELECT * FROM personnages WHERE id = ' . $id);
		$output = $query->fetch(PDO::FETCH_ASSOC);

		return new Personnage($output);
	}

	// Récupère toutes les entités
	public function getList()
	{
		$query = $this->db->query('SELECT * FROM personnages');

		while($data = $query->fetch(PDO::FETCH_ASSOC)) {
			$personnages[] = new Personnage($data);
		}

		return $personnages;
	}
}