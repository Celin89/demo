<?php

class Change {
    public $coin2 =0;
    public $bill5 =0;
    public $bill10 =0;
}

function optimalChange($s) 
{
    if ($s <= 1 || $s === 3 || $s > 2 ** 31 - 1) {
    return null;
}
    
    $lastNumber = (int)substr($s, -1);
    
    $firstPart = $s - $lastNumber;
    
    $change = new Change();
    
    $change->bill10 = $firstPart / 10;

    if ($lastNumber === 1) { 
        if ($firstPart >= 10) 
        {
            $change->bill10--;
        }
        $change->bill5 = 1;
        $change->coin2 = 3;
    } else if ($lastNumber % 2 === 0) {
        
        $change->coin2 = $lastNumber / 2;
    } else if ($lastNumber === 3) {
        if ($firstPart >= 10) {
            $change->bill10--;
        }
        $change->bill5 = 1;
        $change->coin2 = 4;
    } else {
        
        $change->bill5 = 1;
        $change->coin2 = ($lastNumber - 5) / 2;
    }
    
    return $change;
}

?>