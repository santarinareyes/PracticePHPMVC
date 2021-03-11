<?php 
    class FormValidator {
        public static function validateString($string){
            $error = "";
            
            if(strlen($string) < 2){
                $error = Constants::$stringMin;
            } else if (strlen($string) > 25){
                $error = Constants::$stringMax;
            }

            return "<span class='error_message'>$error</span>";
        }

        public static function validatePassword($string){
            $error = "";
            
            if(strlen($string) < 6){
                $error = Constants::$passwordMin;
            }

            return "<span class='error_message'>$error</span>";
        }

        public static function validateConfirmPassword($string1, $string2){
            $error = "";
            
            if(strlen($string1) < 6){
                $error = Constants::$passwordMin;
            } else if ($string1 !== $string2){
                $error = Constants::$passwordDontMatch;
            }

            return "<span class='error_message'>$error</span>";
        }

        public static function validateEmails($string1, $string2){
            $error = "";
            
            if(!filter_var($string1, FILTER_VALIDATE_EMAIL)){
                $error = Constants::$emailInvalid;
            }

            if ($string1 !== $string2){
                $error = Constants::$emailDontMatch;
            }

            return "<span class='error_message'>$error</span>";
        }
    }