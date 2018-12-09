<?php

class Validator {


    /**
     * @param $value
     * @return bool
     */

    public function alphaOnly($value)
    {
        if ( $value != '' && !preg_match('/\s[^A-Za-z]/',$value)){
            return true;
        }else{
            return false;
        }
    }

    public function digitOnly($value)
    {

        if ( $value != '' && !preg_match('/[^0-9]/',$value)){
            return true;
        }else{
            return false;
        }

    }

    public function dateYearOnly($value)
    {

        return true;

        /*if ( $value != '' && !preg_match('/^[0-9]{4}$/',trim($value))){
            return true;
        }else{
            return false;
        }*/

    }

    public function imageValidation($value)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $type = finfo_file($finfo, $value['tmp_name']);

        if (isset($type) && in_array($type, array("image/png", "image/jpeg"))) {
            return true;
        } else {
            return false;
        }

    }


}

$validator = new Validator();