<?php
    /**
     * Truong Pham
     */
    class UserModel extends DBModel{

        public $id;
        public $username;
        public $password;
        public $roleId;
        public $phoneNumber;
        public $email;
        public $point;
        public $avatarLink;

        public function __construct(array $data)
        {
            $this->id = null;
            $this->username = null;
            $this->password = null;
            $this->roleId = null;
            $this->phoneNumber = null;
            $this->email = null;
            $this->point = 0;
            $this->avatarLink = null;
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
            return "user";
        }

        public function attributes(): array
        {
            return ['id', 'username', 'password', 'roleId', 'phoneNumber', 'email', 'point', 'avatarLink'];
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