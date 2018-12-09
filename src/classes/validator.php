<?php

class Validator {


    /**
     * @param $name
     * @return bool
     */

    public function mfgName($name)
    {
        if ( $name != '' && !preg_match('/[^A-Za-z]/',$name)){
            return true;
        }else{
            return false;
        }
    }


}

$validator = new Validator();