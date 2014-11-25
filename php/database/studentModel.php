<?php
    require_once('utils.php');
    class StudentModel extends Utils {

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

    }