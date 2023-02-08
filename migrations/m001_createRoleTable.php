 <?php
    /**
     * Truong Pham
     */
    class m001_createRoleTable {
        public function up($db){
            $sql = "CREATE TABLE `role` (
                `id` int(2) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `name` varchar(50) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            return $db->query($sql, "crm");
        }

        public function down($db){
            $sql = "DROP TABLE  IF EXISTS `role`;";
            return $db->query($sql, "crm");
        }
    }