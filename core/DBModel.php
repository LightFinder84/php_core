<?php
    abstract class DBModel{
        
        abstract static function db_name(): string;
        abstract static function db_type(): string;
        abstract static function tableName(): string;
        abstract public function attributes(): array;
        abstract public function attributesValue(): array;
        abstract public function attributesKeyValue(): array;

        public function __construct(array $data)
        {
            $this->loadData($data);
        }
        
        /**
         * Save data from Post request to property
         * input: @array $data with key and value
         */
        public function loadData(array $data) : void{
            // print_r("Loading data...");
            foreach ($data as $key => $value) {
                if(property_exists($this, $key)){
                    $this->{$key} = $value;
                }
            }
        }

        public function save(){
            $sql = Utilities::makeInsertStatment(static::tableName(), $this->attributes(), [$this->attributesValue()], static::db_type());
            $statement = Application::$database->prepare($sql, static::db_name());
            $statement = Application::$database->bindValue($statement, $this->attributesValue());
            return $statement->execute();
        }

        public static function select(
            bool $distinct = false, 
            array $column_list = [], 
            array $where_clause = [], 
            array $groupby_clause = [], 
            array $having_clause = [], 
            array $orderby_clause = [],
            int $limit = 0,
            int $offset = 0,
            string $db_type = "Mysqli")
        {
            $sql =  Utilities::makeSelectStatement($distinct, $column_list, static::tableName(), $where_clause, $groupby_clause, $having_clause, $orderby_clause, $limit, $offset, $db_type);
            $statement = Application::$database->prepare($sql, static::db_name());
            $values = [];
            foreach ($where_clause["conditions"] as $condition ) {
                $values[] = $condition[2];
            }
            $statement = Application::$database->bindParam($statement, $values);
            return Application::$database->getResult($statement);
        }

        public static function selectOne(
            bool $distinct = false, 
            array $column_list = [], 
            array $where_clause = [], 
            array $groupby_clause = [], 
            array $having_clause = [], 
            array $orderby_clause = [],
            int $limit = 0,
            int $offset = 0,
            string $db_type = "Mysqli")
        {
            $sql =  Utilities::makeSelectStatement($distinct, $column_list, static::tableName(), $where_clause, $groupby_clause, $having_clause, $orderby_clause, $limit, $offset, $db_type);
            $statement = Application::$database->prepare($sql, static::db_name());
            $values = [];
            foreach ($where_clause["conditions"] as $condition ) {
                $values[] = $condition[2];
            }
            $statement = Application::$database->bindParam($statement, $values);
            $data = Application::$database->getResult($statement);
            return $data[0];
        }
    }