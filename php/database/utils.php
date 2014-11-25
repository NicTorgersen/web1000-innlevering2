<?php
    /*
        fil for å holde alle databasekall organisert
    */
    class Utils {
        private $db;
        public function __construct(PDO $db) {
            if ($db) {
                $this->db = $db;
                return true;
            }
            throw new Exception('Database connection required.');
        }

        private function validateFirstName ($fn) {
            $fn = ucfirst(trim(strip_tags($fn)));
            return (strlen($fn) < 20 && strlen($fn) >= 3) ? $fn : false;
        }

        private function validateLastName ($ln) {
            $ln = ucfirst(trim(strip_tags($ln)));
            return (strlen($ln) < 20 && strlen($ln) >= 3) ? $ln : false;
        }

        protected function validateUserName ($u) {
            $u = strtolower(trim(strip_tags($u)));
            return (strlen($u) == 2) ? $u : false;
        }

        protected function validateName ($fn, $ln) {
            return ($this->validateFirstName($fn) && $this->validateLastName($ln)) ? array('fn' => $fn, 'ln' => $ln) : false;
        }

        protected function validateClassCode ($cc) {
            $cc = strtoupper(trim(strip_tags($cc)));
            return (strlen($cc) == 3 && ctype_digit(substr($cc, -1))) ? $cc : false;
        }
        
        protected function validateClassName ($cn) {
            $cn = trim(strip_tags($cn));
            return (strlen($cn) < 30 && strlen($cn) > 1) ? $cn : false;
        }
    }