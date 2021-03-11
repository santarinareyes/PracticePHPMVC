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

        public static function validatePassword($string){
            $error = "";
            
            if(strlen($string) < 6){
                $error = "Password must contain atleast 6 characters";
            }

            return $error;
        }

        public static function validateConfirmPassword($string1, $string2){
            $error = "";
            
            if(strlen($string1) < 6){
                $error = "Password must contain atleast 6 characters";
            } else if ($string1 !== $string2){
                $error = "Password does not match";
            }

            return $error;
        }

        public static function validateConfirmEmail($string1, $string2){
            $error = "";
            
            if ($string1 !== $string2){
                $error = "Email does not match";
            }

            return $error;
        }
    }