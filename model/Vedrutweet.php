<?php

class Vedrutweet{
    protected $text;
    protected $userId;
    protected $createDate;
    public function __construct($userId, $text, $createDate){
        $this->userId = $userId;
        $this->text = $text;
        $this->createDate = $createDate;
    }
}

?>