<?php
class hamming
{
    /*
    Calculate the Hamming distance between two strings.
    */
    public function hamming_dis($string1, $string2)
    {
        // This section to check Strings length are equals or not 
        // And add pads to the end of string
        if (strlen($string1) != strlen($string2)) {
            
            if (strlen($string1) > strlen($string2)) {
                $diffrence = strlen($string1) - strlen($string2);
                for ($i = 0; $i <= $diffrence; $i++) {
                    $string2 = $string2 . " ";
                }
            }
            if (strlen($string1) < strlen($string2)) {
                $diffrence = strlen($string2) - strlen($string1);
                for ($i = 0; $i <= $diffrence; $i++) {
                    $string1 = $string1 . " ";
                }
            }
            return $this->hamming_dis($string1, $string2);
        }

        // Define distance var
        $distance = 0;

        // Make inputs array
        $s1arr = str_split($string1);
        $s2arr = str_split($string2);

        // Calulate the distance
        for ($i = 0; $i <= strlen($string1); $i++) {
            if ($s1arr[$i] != $s2arr[$i])
                $distance++;
        }
        // Set return value
        return $distance;
    }
}
