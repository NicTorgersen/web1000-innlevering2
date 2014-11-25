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

        public function getClassCodes () {
            return $this->db->query('SELECT klassekode FROM klasse')->fetchAll(PDO::FETCH_NUM);
        }

        public function postClass ($cc, $cn) {
            if ($this->validateClassCode($cc) && $this->validateClassName($cn)) {
                $cc = $this->validateClassCode($cc);
                $cn = $this->validateClassName($cn);
                $stmt = $this->db->prepare('INSERT INTO klasse (klassekode, klassenavn) VALUES (?, ?)');
                $stmt = $stmt->execute(array($cc, $cn));
                return array(
                    'cc' => $cc,
                    'cn' => $cn,
                    'success' => $stmt
                );
            }
            return array(
                'error' => 0
            );
        }

        public function postStudent ($u, $fn, $ln, $cc) {
            if ($this->validateUserName($u) && $this->validateName($fn, $ln) && $this->validateClassCode($cc)) {
                $u = $this->validateUserName($u);
                $fn = $this->validateFirstName($fn);
                $ln = $this->validateLastName($ln);
                $cc = $this->validateClassCode($cc);
                $stmt = $this->db->prepare('INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)');
                $stmt = $stmt->execute(array($u, $fn, $ln, $cc));
                return array(
                    'u' => $u,
                    'fn' => $fn,
                    'ln' => $ln,
                    's_cc' => $cc,
                    'success' => $stmt
                );
            }
            return array(
                'u' => $u,
                'fn' => $fn,
                'ln' => $ln,
                'error' => 0
            );
        }

        public function countStudents () {
            $stmt = $this->db->query('SELECT count(brukernavn) as students FROM student');
            $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt[0]['students'];
        }

        public function countClasses () {
            $stmt = $this->db->query('SELECT count(klassekode) as classes FROM klasse');
            $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt[0]['classes'];
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