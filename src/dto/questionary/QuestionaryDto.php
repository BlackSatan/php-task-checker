<?php
namespace src\dto\questionary;

use src\dto\tasks\TaskDto;

class QuestionaryDto {
    private $title;

    private $tasks;

    private $scoreStrategy;

    public function getScoreStrategy(): int
    {
        return $this->scoreStrategy;
    }

    public function __construct(array $data)
    {
        $this->title = $data['title'] ?? 'Default Title';
        $tasks = $data['tasks'] ?? [];
        foreach ($tasks as $task) {
            $this->tasks[] = new TaskDto($task);
        }
        $this->scoreStrategy = $data['scoreStrategy'] ?? QuestionaryScoreStrategyEnum::UNMEMOIZED_SCORE_STRATEGY;
    }
}