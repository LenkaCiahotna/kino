<?php
class Sloupec
{
 public string $nazevDb;
 public string $nazevUziv;
 public bool $zobrazit;
 public $ciziklic;


  public function __construct($nazevDb,$nazevUziv, $ciziklic = null, $zobrazit = true)
  {
    $this->nazevDb = $nazevDb;
    $this->nazevUziv = $nazevUziv;
    $this->zobrazit = $zobrazit;
    $this->ciziklic = $ciziklic;
  }

  public  function jePrazdny()
  {
    if(isset($_POST[$this->nazevDb]))
    {
      if(trim($_POST[$this->nazevDb]) != "")
      {
        return false;
      }
    }
    return true;
  }
}

class CiziKlic
{
    public string $tabulka;
    public string $sloupec;
    public string $data;

    public function __construct($tabulka, $sloupec, $data)
    {
        $this->tabulka = $tabulka;
        $this->sloupec= $sloupec;
        $this->data= $data;
    }
}