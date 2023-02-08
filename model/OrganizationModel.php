<?php
    /**
     * Truong Pham
     */
    class OrganizationModel extends DBModel{

        public $id;
        public $fullName;
        public $addressId;
        public $identificationLink;
        public $userId;

        public function __construct(array $data)
        {
            $this->id = null;
            $this->fullName = null;
            $this->addressId = null;
            $this->identificationLink = null;
            $this->userId = null;
            parent::__construct($data);
        }

        static function db_name(): string
        {
            return "crm";
        }

        static function db_type(): string
        {
            return "Mysqli";
        }

        static function tableName(): string
        {
            return "organization";
        }

        public function attributes(): array
        {
            return ['id', 'fullName', 'addressId', 'identificationLink', 'userId'];
        }

        public function attributesValue(): array
        {
            $data = [];
            foreach ($this as $attribute => $value) {
                $data[] = $value;
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