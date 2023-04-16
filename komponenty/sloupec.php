<?php
class Sloupec
{
 public string $nazevDb;
 public string $nazevUziv;
 public bool $zobrazit;


  public function __construct($nazevDb,$nazevUziv, $zobrazit = true)
  {
    $this->nazevDb = $nazevDb;
    $this->nazevUziv = $nazevUziv;
    $this->zobrazit = $zobrazit;
  }
}

