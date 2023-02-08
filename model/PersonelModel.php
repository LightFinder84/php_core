<?php
    /**
     * Truong Pham
     */
    class PersonelModel extends DBModel{

        public $id;
        public $fullName;
        public $identificationType;
        public $dayCreated;
        public $placeCreated;
        public $identificationLink;
        public $userId;
        

        public function __construct(array $data)
        {
            $this->id = null;
            $this->fullName = null;
            $this->identificationType = null;
            $this->dayCreated = null;
            $this->placeCreated = null;
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
            return "personel";
        }

        public function attributes(): array
        {
            return ['id', 'fullName', 'identificationType', 'dayCreated', 'placeCreated', 'identificationLink', 'userId'];
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