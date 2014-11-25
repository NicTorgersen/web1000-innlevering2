<?php
    require_once('utils.php');
    class ClassModel extends Utils {
        private $db;

        public function __construct(PDO $db) {
            if ($db) {
                $this->db = $db;
                return true;
            }
            throw new Exception('Database connection required.');
        }

        public function postClass ($cc, $cn) {
            if ($this->validateClassCode($cc) && $this->validateClassName($cn)) {
                $cc = $this->validateClassCode($cc);
                $cn = $this->validateClassName($cn);
                $stmt = $this->db->prepare('INSERT INTO klasse (klassekode, klassenavn) VALUES (?, ?)');
                $stmt = $stmt->execute(array($cc, $cn));
                $return = array(
                    'cc' => $cc,
                    'cn' => $cn
                );

                if ($stmt) {
                    $return['success'] = true;
                } else {
                    $return['error'] = true;
                }

                return $return;
            }
            return array(
                'error' => 0
            );
        }

        public function countClasses () {
            $stmt = $this->db->query('SELECT count(klassekode) as classes FROM klasse');
            $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt[0]['classes'];
        }

        public function getClassCodes () {
            return $this->db->query('SELECT klassekode FROM klasse')->fetchAll(PDO::FETCH_NUM);
        }
    }