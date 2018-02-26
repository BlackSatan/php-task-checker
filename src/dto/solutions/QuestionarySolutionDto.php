<?php
namespace src\dto\solutions;


class QuestionarySolutionDto
{

    private $solutions;

    public function getSolutions() {
        return $this->solutions;
    }

    public function __construct($data)
    {
        $solutions = $data['solutions'] ?? [];
        foreach ($solutions as $solution) {
            $this->solutions[] = new SolutionDto($solution);
        }
    }
}