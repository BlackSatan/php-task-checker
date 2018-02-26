<?php
namespace src\service\impl\checkers;

use src\App;
use src\repository\solutions\SolutionsRepository;
use src\service\interfaces\SolutionChecker;

class MemoizedScoreStrategy extends BaseScoreStrategy implements SolutionChecker {
    const DEFAULT_RIGHT_SCORE = 10;
    const RIGHT_ALREADY_TRY_SCORE = 5;
    const DEFAULT_WRONG_SCORE = 0;

    public function getSolutionRepositoryService(): SolutionsRepository {
        return App::$app->getDIContainer()->get(SolutionsRepository::class);
    }

    public function getScore(): int
    {
        $solutionRepositoryService = $this->getSolutionRepositoryService();
        $solutionExist = $solutionRepositoryService->findSolution() ? true : false;
        if ($this->isLastSolutionRight()) {
            return $solutionExist ? self::RIGHT_ALREADY_TRY_SCORE : self::DEFAULT_RIGHT_SCORE;
        }
        return self::DEFAULT_WRONG_SCORE;
    }
}