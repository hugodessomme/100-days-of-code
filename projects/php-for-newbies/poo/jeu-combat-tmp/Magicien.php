<?php

class Magicien extends Personnage
{
	public function lancerSort(Personnage $perso)
	{
		if ($perso->getId() !== $this->getId() && $this->getAtout() !== 0)
		{

		}
	}
}