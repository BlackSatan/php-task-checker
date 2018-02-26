<?php
namespace src\dto\solutions;

class SolutionSummaryDto {

    private $score;

    public function getScore()
    {
        return $this->score;
    }

    public function __construct(array $data)
    {
        $this->score = $data['score'] ?? 0;
    }

    public function getData(): array {
        return [
            'score' => $this->getScore(),
        ];
    }
}
