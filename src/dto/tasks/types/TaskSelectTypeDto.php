<?php
namespace src\dto\tasks\types;

class TaskSelectTypeDto extends BaseTaskType {
    private $title;

    private $options;

    public function __construct(array $data)
    {
        $this->title = $data['title'] ?? 'Default Title';
        $this->options = $data['options'] ?? [];
        $this->answer = $data['answer'] ?? null;
    }
}