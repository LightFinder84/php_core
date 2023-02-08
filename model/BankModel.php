<?php
    /**
     * Truong Pham
     */
    class BankModel extends DBModel{

        public $bankId;
        public $acronym;
        public $bankName;

        public function __construct(array $data)
        {
            $this->bankId = null;
            $this->acronym = null;
            $this->bankName = null;
            parent::__construct($data);
        }

        static function db_name(): string
        {
            return "sharing";
        }

        static function db_type(): string
        {
            return "SQLite3";
        }

        static function tableName(): string
        {
            return "bank";
        }

        public function attributes(): array
        {
            $data = [];
            foreach ($this as $attribute => $value ) {
                $data[] = $attribute;
            }
            return $data;
        }

        public function attributesValue(): array
        {
            $data = [];
            foreach ($this as $attribute => $value) {
                $data[] = $this->{$attribute};
            }
            return $data;
        }

        public function attributesKeyValue(): array
        {
            $data = [];
            foreach ($this as $attribute => $value) {
                $data[$attribute] = $value;
            }
            return $data;
        }
    
    }