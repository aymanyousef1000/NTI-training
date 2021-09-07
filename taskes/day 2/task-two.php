<?php
    #--- ayman yousef mohamed
    #--- seconed day
    #--- first task
    function getChar($char){ 

        $newChar = ord($char)+1;
        #--- 90 & 122 are ascii values for 'z' & 'Z'
        if($newChar === 91 || $newChar === 123){ 
            $newChar -= 26;     #-- according to ascii values
            return chr($newChar);
        }else{
            return chr($newChar);
        }
        
    }

    echo getChar('A');

?>