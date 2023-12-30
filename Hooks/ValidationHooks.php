<?php
    function phoneValidation($number) {
        $phoneRegex = '/^\d{10}$/';
        if (!preg_match($phoneRegex, $number)) {
            return false;
        }
        return true;
    }

    function idCardValidation($number) {
        $idRegex = '/^\d{11}$/';
        if (!preg_match($idRegex, $number)) {
            return false;
        }
        return true;
    }
?>