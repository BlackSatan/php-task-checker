<?php
namespace src\dto\tasks;

use src\dto\tasks\types\BaseTaskType;
use src\dto\tasks\types\TaskInputTypeDto;
use src\dto\tasks\types\TaskSelectTypeDto;

class TaskDto {
    private $title;

    private $typedTask;

    public function getTypedTask(): ?BaseTaskType
    {
        return $this->typedTask;
    }

    public function __construct($data)
    {
        $this->title = $data['title'] ?? 'Default Title';
        $typedTaskClass = $data['type'] == 'input' ? TaskInputTypeDto::class : TaskSelectTypeDto::class;
        $this->typedTask = new $typedTaskClass($data['typedTask'] ?? []);
    }
}