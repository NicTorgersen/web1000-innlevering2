<?php
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
    }