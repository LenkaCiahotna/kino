
<?php
class Tabulka
{
    
    protected $data = null;
    protected $sloupce = null;
    protected $nazevTabulky = null;

    public static $stranka = "index";

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
 
    public function FormularVyber()
    {
       
        echo "<table>";
        foreach($this->sloupce as $sl)
        {
            $zaskrknuto = isset($_POST[$sl->nazevDb]) && $_POST["zmenaTabulky"] != 1;;
         ?>
            <tr>
            <td><?=$sl->nazevUziv?></td>
            <td><input type="checkbox" name=<?=$sl->nazevDb?> <?= $zaskrknuto ? "checked" : "" ?>></td>
            </tr>
         <?php
        }
        echo "</table>";
    }

    public function Vyber()
    {
        $vyber = array();
        foreach($this->sloupce as $sl)
        {         
            if(!isset($_POST[$sl->nazevDb]))
            {
                $sl->zobrazit = false;
            }
            if($sl->zobrazit == true)
            {
                $vyber[] = $sl->nazevDb;
            }
        }
        $vyberString = join(", ", $vyber);
        if($vyberString != "")
        {
            $this->data = Db::queryAll("select ".$vyberString." from ".$this->nazevTabulky);
        }
        else
        {
            echo "Vyber alespoň 1 položku";
        }
        
       
    }
    public function FormularPridavani()
    {
        echo "<table>";
        foreach(array_slice($this->sloupce,1) as $sl)
        {
            
            ?>
            <tr>
            <td><?=$sl->nazevUziv?></td>
            <td>
            <?php
             if($sl->datTyp == "datum")
             {
                 echo "<input type='date' name='".$sl->nazevDb."'>";
             }
             else if($sl->datTyp == "cas")
             {
                 echo "<input type='time' name='".$sl->nazevDb."'>";
             }
             else if($sl->datTyp == "int")
             {
                 echo "<input type='number' name='".$sl->nazevDb."'>";
             }
             else if($sl->ciziklic == null)
            {
                 echo "<input type='text' name='".$sl->nazevDb."'>";
            }
             else
            {
                $data = Db::queryAll("select ".$sl->ciziklic->sloupec.",".$sl->ciziklic->data." from ".$sl->ciziklic->tabulka);
                ?>
                <select name='<?= $sl->nazevDb ?>'>
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

    public function serad()
    {
        $sloupec = null;
        $sestupnost = isset($_POST["sestupnost"]) && $_POST["zmenaTabulky"] != 1;
        if(isset($_POST["sloupec"]))
        {
        $sloupec = $_POST["sloupec"];
        }
       ?> <br>
        Vyber sloupec, podle kterého chceš řadit: 
        <?php
          ?>
          <select name="sloupec">
                <?php
                foreach($this->sloupce as $sl)
                {
                    ?>
                    <option value="<?= $sl->nazevDb ?>"  <?= ($sloupec==$sl->nazevDb && $_POST["zmenaTabulky"] != 1 ?  ' selected' : '' ) ?>><?= $sl->nazevUziv?></option>
                    <?php
                }
                ?>
        </select>
       Sestupně: <input type="checkbox" name="sestupnost" <?= ($sestupnost ? 'checked' : '') ?>>
       <br>
       <input type="submit" value="ulož">

      <?php
        if($sloupec != null && $_POST["zmenaTabulky"] != 1)
        {
            $this->data = Db::queryAll("select * from ".$this->nazevTabulky." order by ".$sloupec." ".($sestupnost ? 'desc' : ''));
        }
        
        
         
    }
    public function pridej()
    {
        $chyba = "";
        $chybi=false;

            foreach(array_slice($this->sloupce,1) as $sl)
            {    
                if($sl->jePrazdny())
                {
                    $chyba = "Nebyly doplněny všechny údaje!";
                    $chybi = true;
                    break;
                }
            }     
        
       if(!$chybi)
       {
        $sloupceString = array();
        $dataString = array();
        foreach(array_slice($this->sloupce,1) as $sl)
        {
            if($sl->ciziklic == null)
            {
                $sloupceString[] = $sl->nazevDb;
                $dataString[]= "\"".$_POST[$sl->nazevDb]."\"";
            }
            else if($sl->ciziklic != null)
            {
                $dataString[] =$_POST[$sl->nazevDb];
                $sloupceString[] = $sl->nazevDb;
            }   
        }
        $sloupceString2 = join(", ", $sloupceString);
        $dataString2 = join(", ", $dataString);

        Db::queryAll("insert into ".$this->nazevTabulky." (".$sloupceString2.") values (".$dataString2.")");
        header("Location: pridavani.php?druh=".$this->nazevTabulky);
       }
       else
       {
        echo $chyba;
       }
    
    }
    public function vykresli()
    {
        if($this->data != null)   
        {
            ?>
            <table class="table table-striped table-secondary w-auto px-3" >
                <thead class="table-dark">
                <tr>
                    <?php
                        foreach($this->sloupce as $sl)
                        {
                            if($sl->zobrazit)
                            {
                                ?>
                            <th class="align-middle"><?=$sl->nazevUziv?></th>
                        <?php 
                            }
                        }
                    ?>
                </tr>    
                    </thead> 
                    <tbody> 
                    <?php
                        for($i = 0; $i < count($this->data); $i++)
                        {
                            echo "<tr>";

                            foreach($this->sloupce as $sl)
                            {
                                if($sl->zobrazit)
                                {
                                ?>
                                <td><?=$this->data[$i][$sl->nazevDb]?></td>  
                            <?php
                                }
                            }
                            echo "</tr>";
                        } 
                      
         }
                    ?> 
                    </tbody>                 
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
            new Sloupec("delkaVMinutach","Délka v minutách", "int"),
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
            new Sloupec("id_filmu","Id filmu", null, new CiziKlic("filmy", "id_filmu", "nazev")),
            new Sloupec("id_saly","Id sály", null, new CiziKlic("saly", "id_saly", "id_saly")),
            new Sloupec("termin","Termín", "datum"),
            new Sloupec("cas", "Čas", "cas")
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
            new Sloupec("kapacita","Kapacita", "int")
        );
    }
}