<?php
namespace src\dto\tasks\types;

class TaskInputTypeDto extends BaseTaskType {
    private $title;

    public function __construct(array $data)
    {
        $this->title = $data['title'] ?? 'Default Title';
        $this->answer = $data['answer'] ?? null;
    }
}