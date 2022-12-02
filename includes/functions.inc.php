<?php

    // Functions
    
    function randstr ($len=0, $abc="ABCDEFGHIJKLMNOPQRSTUVWXYZ") {
        
        $letters = str_split($abc);
        $str = "";
        
        for ($i=0; $i<=$len; $i++) {
            $str .= $letters[rand(0, count($letters)-1)];
        };
        
        return $str;
        
    };
    
    function randnums ($len=2, $abc="0123456789") {
        
        $letters = str_split($abc);
        $str = "";
        
        for ($i=0; $i<=$len; $i++) {
            $str .= $letters[rand(0, count($letters)-1)];
        };
        
        return $str;
        
    };

?>