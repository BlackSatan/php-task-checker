<?php
namespace src\service\impl\checkers;

use src\service\interfaces\SolutionChecker;

class DefaultScoreStrategy extends BaseScoreStrategy implements SolutionChecker {
    const DEFAULT_RIGHT_SCORE = 10;
    const DEFAULT_WRONG_SCORE = 0;

    public function getScore(): int
    {
        return $this->isLastSolutionRight() ? self::DEFAULT_RIGHT_SCORE : self::DEFAULT_WRONG_SCORE;
    }
}