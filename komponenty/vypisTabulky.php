<?php
class vypisTabulky
{
    protected $data = null;
    protected $sloupce = null;

    public function __construct($data)
    {
        $this->data=$data;
        print_r($data);
        $this->sloupce=array_keys($this->data[0]);
        print_r($this->sloupce);    }

    public function vykresli()
    {
        
        ?>
            <table>
                <tr>
                    <?php
                        for($i = 0; $i < count($this->sloupce); $i++)
                        {?>
                            <th><?=$this->sloupce[$i]?></th>
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
                                <td><?=$this->data[$i][$this->sloupce[$y]]?></td>
                            <?php
                            }
                            echo " </tr>";
                        }
                    ?>
                         
            </table>
        <?php
    }
}