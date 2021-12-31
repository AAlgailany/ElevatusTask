<?php

class levenshtein {
    /*
    Calculate the Levenshtein distance between two strings.
    */
    
    public function levenshtein_dis($string1 , $string2)
    {
        // Check which input is longer than the other one
        if (strlen($string1) < strlen($string2))
            return $this->levenshtein_dis($string2 , $string1);
        // Check if one of them is empty
        if (!isset($string1))
            return strlen($string2);
        
        // Make the first row in the 2d array
        $previous_row = range(0 , (strlen($string2) + 1));

        // Convert the 1st input into array
        foreach (str_split($string1) as $key1 => $value1)
        {
            // make the first column of the 2d array
            $current_row = [ $key1 + 1 ];

            // make the 2ed input into array
            foreach (str_split($string2) as $key2 => $value2)
            {
                // make the calculation
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