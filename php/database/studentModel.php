<?php
    require_once('utils.php');
    class StudentModel extends Utils {
        private $db;

        public function __construct(PDO $db) {
            if ($db) {
                $this->db = $db;
                return true;
            }
            throw new Exception('Database connection required.');
        }
		
	public function updateStudent ($u, $fn, $ln, $cc) {
		$u = $this->validateUserName($u);
		$fn = $this->validateFirstName($fn);
		$ln = $this->validateLastName($ln);
        	$cc = $this->validateClassCode($cc);
            
    		if ($cc && $u && $fn && $ln) {
                    $stmt = $this->db->prepare("UPDATE student SET fornavn = ?, etternavn = ?, klassekode = ? WHERE brukernavn = ?");
                    $stmt = $stmt->execute(array($fn, $ln, $cc, $u));

                    $return = array(
		        'u' => $u,
		        'fn' => $fn,
		        'ln' => $ln,
                        'cc' => $cc
                    );

                    if ($stmt) {
                        $return['success'] = true;
        	    } else {
             	        $return['error'] = $stmt;
        	    }

                    return $return;
                } else {
	            return "error, some field didn't validate";
	        }
        }
		
        public function deleteStudent (array $u) {
            $cleanVals = $this->validateUserNames($u);
            $qMarks = $this->generateQMarks($cleanVals);
            $stmt = $this->db->prepare("DELETE FROM student WHERE brukernavn IN (" . $qMarks . ")");
            $stmt = $stmt->execute($cleanVals);
            $return = array(
                'u' => $cleanVals
            );

            if ($stmt) {
                $return['success'] = true;
            } else {
                $return['error'] = $stmt;
            }

            return $return;
        }

        public function postStudent ($u, $fn, $ln, $cc) {
            if ($this->validateUserName($u) && $this->validateName($fn, $ln) && $this->validateClassCode($cc)) {
                $u = $this->validateUserName($u);
                $fn = $this->validateFirstName($fn);
                $ln = $this->validateLastName($ln);
                $cc = $this->validateClassCode($cc);
                $stmt = $this->db->prepare('INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)');
                $stmt = $stmt->execute(array($u, $fn, $ln, $cc));
                $return = array(
                    'u' => $u,
                    'fn' => $fn,
                    'ln' => $ln,
                    's_cc' => $cc
                );

                if ($stmt) {
                    $return['success'] = true;
                } else {
                    $return['error'] = true;
                }

                return $return;
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

        public function getStudents () {
            $stmt = $this->db->query('SELECT brukernavn, fornavn, etternavn, klassekode FROM student ORDER BY klassekode ASC');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
