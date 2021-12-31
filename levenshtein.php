<?php

class levenshtein {
    /*
    Calculate the Levenshtein distance between two strings.
    */
    
    public function levenshtein_dis($string1 , $string2)
    {
        
        if (strlen($string1) < strlen($string2))
            return $this->levenshtein_dis($string2 , $string1);
        
        if (!isset($string1))
            return strlen($string2);
        
        $previous_row = range(0 , (strlen($string2) + 1));

        foreach (str_split($string1) as $key1 => $value1)
        {
            $current_row = [ $key1 + 1 ];
            foreach (str_split($string2) as $key2 => $value2)
            {
                $insertions = $previous_row[$key2 + 1] + 1;
                $deletions = $current_row[$key2] + 1 ;
                $substitutions = $previous_row[$key2] + (($value1 != $value2 )?(1):(0)) ;
                $min = min($insertions,$deletions,$substitutions);
                array_push($current_row , $min);

            }
            $previous_row = $current_row;

        }
        header("Location: index.php?result=".end($previous_row));
       
        
    }
}