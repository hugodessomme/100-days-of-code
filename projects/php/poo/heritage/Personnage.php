<?php

class Personnage
{
	public function say()
	{
		static::msg();
	}

	public function msg()
	{
		echo "Je suis la classe <strong>Mère</strong>";
	}
}