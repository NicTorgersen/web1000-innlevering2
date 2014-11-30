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

        public function getPlural ($count, $singular, $plural) {
            if ($count == 1) {
                return $singular;
            } else {
                return $plural;
            }
        }

        protected function generateQMarks (array $qMarkThis) {
            $qMarks = "";
            for ($i = 0; $i < count($qMarkThis); $i++) {
                if ($i == count($qMarkThis)-1) {
                    $qMarks .= "?";
                } else {
                    $qMarks .= "?, ";
                }
            }
            return $qMarks;
        }

        protected function validateFirstName ($fn) {
            $fn = ucfirst(trim(strip_tags($fn)));
            return (strlen($fn) < 20 && strlen($fn) >= 3) ? $fn : false;
        }

        protected function validateLastName ($ln) {
            $ln = ucfirst(trim(strip_tags($ln)));
            return (strlen($ln) < 20 && strlen($ln) >= 3) ? $ln : false;
        }

        protected function validateUserName ($u) {
            $u = strtolower(trim(strip_tags($u)));
            return (strlen($u) == 2) ? $u : false;
        }

        protected function validateUserNames (array $u) {
            $cleanVals = array();
            foreach ($u as $key => $value) {
                if ($this->validateUserName($value)) {
                    $cleanVals[] = $this->validateUserName($value);
                }
            }
            return $cleanVals;
        }

        protected function validateName ($fn, $ln) {
            return ($this->validateFirstName($fn) && $this->validateLastName($ln)) ? array('fn' => $fn, 'ln' => $ln) : false;
        }

        protected function validateClassCode ($cc) {
            $cc = strtoupper(trim(strip_tags($cc)));
            return (strlen($cc) >= 3 && ctype_digit(substr($cc, -1)) && ctype_upper(substr($cc, 0, -1))) ? $cc : false;
        }

        protected function validateClassCodes (array $cc) {
            $cleanVals = array();
            foreach ($cc as $key => $value) {
                if ($this->validateClassCode($value)) {
                    $cleanVals[] = $this->validateClassCode($value);
                }
            }
            return $cleanVals;
        }
        
        protected function validateClassName ($cn) {
            $cn = trim(strip_tags($cn));
            return (strlen($cn) < 30 && strlen($cn) > 1) ? $cn : false;
        }
    }