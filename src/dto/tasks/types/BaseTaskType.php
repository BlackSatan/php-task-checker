<?php
namespace src\dto\tasks\types;

abstract class BaseTaskType {
    protected $answer;

    public function getAnswer()
    {
        return $this->answer;
    }

}