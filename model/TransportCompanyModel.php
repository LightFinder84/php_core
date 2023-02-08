<?php
    /**
     * Truong Pham
     */
    class TransportCompanyModel extends DBModel{

        public $id;
        public $name;
        public $representative;
        public $email;
        public $address;
        public $phone;

        public function __construct(array $data)
        {
            $this->id = null;
            $this->name = null;
            $this->representative = null;
            $this->email = null;
            $this->address = null;
            $this->phone = null;
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
            return "transport_company";
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