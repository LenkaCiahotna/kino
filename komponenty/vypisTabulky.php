<?php
class Tabulka
{
    protected $data = null;
    protected $sloupce = null;
    protected $nazevTabulky = null;

//nazev v DB, nazev česky, skrývání/odkryty
    public function __construct($sloupce = array())
    {
        //$this->sloupce=array_keys($this->data[0]);
        $this->sloupce=$sloupce;
    }

    public function nactidata()
    {
        $this->data = Db::queryAll("select * from ".$this->nazevTabulky);
    }
 
    public function uprava()
    {
        echo "<table>";
        foreach($this->sloupce as $sl)
        {
            ?>
            <tr>
            <td><?=$sl->nazevUziv?></td><td>
            <?php
            if($sl->ciziklic == null)
            {
                echo "<input type='text'>";
            }
            else
            {
                $data = Db::queryAll("select ".$sl->ciziklic->sloupec.",".$sl->ciziklic->data." from ".$sl->ciziklic->tabulka);
                ?>
                <select>
                <?php
                foreach($data as $d)
                {
                    ?>
                    <option value=<?= $d[$sl->ciziklic->sloupec]?>><?= $d[$sl->ciziklic->data]?></option>
                    <?php
                }
                ?>
                </select>
                <?php
            }
            ?>
            </td>
            </tr>
            
            <?php
        }
        echo "</table>";
    }

    public function vykresli()
    {
        
        ?>
            <table border="2" >
                <tr>
                    <?php
                        for($i = 0; $i < count($this->sloupce); $i++)
                        {?>
                            <th><?=$this->sloupce[$i]->nazevUziv?></th>
                        <?php }
                    ?>
                </tr>
                
                    <?php
                        for($i = 0; $i < count($this->data); $i++)
                        {
                            echo "<tr>";
                            for($y = 0; $y < count($this->sloupce); $y++)
                            {
                                ?>
                                <td><?=$this->data[$i][$this->sloupce[$y]->nazevDb]?></td>
                            <?php
                            }
                            echo " </tr>";
                        }
                    ?>
                         
            </table>
        <?php
    }
}

class Filmy extends Tabulka
{
    public function __construct()
    {
        parent::__construct(); 
        $this->nazevTabulky = "filmy";
        $this->sloupce = array(
            new Sloupec("id_filmu", "Id filmu"),
            new Sloupec("nazev","Název"),
            new Sloupec("zanr","Žánr"),
            new Sloupec("delkaVMinutach","Délka v minutách"),
            new Sloupec("popis","Popis")
        );
    }
}
  
class Promitani extends Tabulka
{
    public function __construct()
    {
        parent::__construct(); 
        $this->nazevTabulky = "promitani";
        $this->sloupce = array(
            new Sloupec("id_promitani", "Id promítání"),
            new Sloupec("id_filmu","Id filmu", new CiziKlic("filmy", "id_filmu", "nazev")),
            new Sloupec("id_saly","Id sály",  new CiziKlic("saly", "id_saly", "id_saly")),
            new Sloupec("termin","Termín")
        );
    }
}

class Saly extends Tabulka
{
    public function __construct()
    {
        parent::__construct(); 
        $this->nazevTabulky = "saly";
        $this->sloupce = array(
            new Sloupec("id_saly", "Id sály"),
            new Sloupec("kapacita","Kapacita")
        );
    }
}