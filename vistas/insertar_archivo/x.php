<?php

$iniciot ="";
$iniciof ="";
$inicioc ="";
$fin ="";
$iniciot='<div class="table">';
$iniciof='<div class="row">';
$inicioc='<div class="cell">';
$fin='</div>';
if(isset($_POST['MAX_FILE_SIZE'])){

    echo($iniciot);
    for($i=0;$i<sizeof($this->tabla)-1;$i++)
    {
        echo($iniciof);
        for($j=0;$j<sizeof($this->tabla[$i])-1;$j++) {
            echo($inicioc);
            if (isset($this->tabla)) {echo($this->tabla[$i][$j]);}
            echo($fin);
        }
        echo($fin);
    }
    echo($fin);
    for($i=0;$i<sizeof($this->sql)-1;$i++)
    {
        echo($iniciof);
        echo($inicioc);
        if (isset($this->tabla)) {echo($this->sql[$i]);}
        echo($fin);
        echo($fin);
    }

}
?>
