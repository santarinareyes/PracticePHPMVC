<?php 
    class FormValidator {
        public static function validateString($string){
            $error = "";
            
            if(strlen($string) < 2){
                $error = "Must be atleast 2 characters";
            } else if (strlen($string) > 25){
                $error = "Max 25 characters";
            }

            return $error;
        }
    }