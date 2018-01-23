<?php

class Magicien extends Personnage
{
	private $magie;

	public function lancerUnSort($perso)
	{
		$perso->recevoirDegats($this->magie);
	}
}