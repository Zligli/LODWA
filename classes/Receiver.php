<?php
class Receiver {
    public $id_receiver;
    public $fk_receiver_type;
    public $first_name;
    public $last_name;
    public $email;
    public $active;
    public $date_added;
    public $date_inactive;

    public function date(){
        echo $this->date_added;
    }
}
