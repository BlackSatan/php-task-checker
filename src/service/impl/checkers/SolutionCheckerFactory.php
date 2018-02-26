<?php
namespace src\service\impl\checkers;

use src\dto\questionary\QuestionaryScoreStrategyEnum;
use src\service\interfaces\SolutionChecker;

class SolutionCheckerFactory {
    private static $map = [
        QuestionaryScoreStrategyEnum::UNMEMOIZED_SCORE_STRATEGY => DefaultScoreStrategy::class,
        QuestionaryScoreStrategyEnum::MEMOIZED_SCORE_STRATEGY => MemoizedScoreStrategy::class,
    ];

    public static function getChecker(int $type): ? SolutionChecker {
        return self::$map[$type] ?? null;
    }
}