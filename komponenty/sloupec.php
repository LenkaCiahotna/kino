<?php
class Sloupec
{
 public  $nazevDb;
 public  $nazevUziv;
 public  $zobrazit;
 public  $ciziklic;
 public  $datTyp;


  public function __construct($nazevDb,$nazevUziv, $datTyp=null, $ciziklic = null,  $zobrazit = true)
  {
    $this->nazevDb = $nazevDb;
    $this->nazevUziv = $nazevUziv;
    $this->zobrazit = $zobrazit;
    $this->ciziklic = $ciziklic;
    $this->datTyp = $datTyp;
  }

  public function jePrazdny()
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
    public  $tabulka;
    public  $sloupec;
    public  $data;

    public function __construct($tabulka, $sloupec, $data)
    {
        $this->tabulka = $tabulka;
        $this->sloupec= $sloupec;
        $this->data= $data;
    }
}