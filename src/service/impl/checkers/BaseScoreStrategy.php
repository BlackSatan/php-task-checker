<?php
namespace src\service\impl\checkers;

use src\dto\solutions\SolutionDto;
use src\dto\tasks\TaskDto;
use src\service\interfaces\SolutionChecker;

abstract class BaseScoreStrategy implements SolutionChecker {

    private $tasks;

    private $solutions;

    public function __construct(array $data)
    {
        $this->tasks = $data['tasks'] ?? [];
        $this->solutions = $data['solutions'] ?? [];
    }

    public function isLastSolutionRight(): bool
    {
        /** @var TaskDto $lastTask */
        $lastTask = array_values(array_slice($this->tasks, -1))[0];
        /** @var SolutionDto $lastSolution */
        $lastSolution = array_values(array_slice($this->solutions, -1))[0];
        if ($lastTask->getTypedTask()->getAnswer() == $lastSolution->getAnswer()) {
            return true;
        }
        return false;
    }

    abstract public function getScore(): int;
}