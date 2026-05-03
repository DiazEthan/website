<?php
class Member {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $join_date;

    public function __construct($id, $name, $email, $phone, $join_date) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->join_date = $join_date;
    }
}
?>