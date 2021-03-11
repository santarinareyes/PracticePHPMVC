<?php 
    class FormValidator {
        public static function validateString($string){
            $error = "";
            
            if(strlen($string) < 2){
                $error = Constants::$regFirstNameErr1;
            } else if (strlen($string) > 25){
                $error = Constants::$regFirstNameErr2;
            }

            return $error;
        }

        public static function validatePassword($string){
            $error = "";
            
            if(strlen($string) < 6){
                $error = Constants::$regPasswordErr1;
            }

            return $error;
        }

        public static function validateConfirmPassword($string1, $string2){
            $error = "";
            
            if(strlen($string1) < 6){
                $error = Constants::$regPasswordErr1;
            } else if ($string1 !== $string2){
                $error = Constants::$regPasswordErr2;
            }

            return $error;
        }

        public static function validateConfirmEmail($string1, $string2){
            $error = "";
            
            if ($string1 !== $string2){
                $error = Constants::$regEmailErr1;
            }

            return $error;
        }
    }