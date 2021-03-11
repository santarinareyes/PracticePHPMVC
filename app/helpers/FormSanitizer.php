<?php 
    /*
     * For the registration
     * Removes bad characters and spaces 
     * Replace first letter to uppercase
     */

     class FormSanitizer {

         public static function sanitizeString($string){
             $string = strip_tags($string);
             $string = str_replace("  ", " ", $string);
             $string = trim($string);
             $string = strtolower($string);
             $string = ucwords($string);
             return $string;
        }

        public static function sanitizeUsername($string){
            $string = strip_tags($string);
            $string = str_replace(" ", "", $string);
            return $string;
       }

        public static function sanitizeEmail($string){
            $string = strip_tags($string);
            $string = str_replace(" ", "", $string);
            return $string;
       }

        public static function sanitizePassword($string){
            $string = strip_tags($string);
            return $string;
       }
    }