<?php
class Loan {
    public $id;
    public $book_id;
    public $member_id;
    public $loan_date;
    public $return_date;

    public function __construct($id, $book_id, $member_id, $loan_date, $return_date) {
        $this->id = $id;
        $this->book_id = $book_id;
        $this->member_id = $member_id;
        $this->loan_date = $loan_date;
        $this->return_date = $return_date;
    }
}
?>