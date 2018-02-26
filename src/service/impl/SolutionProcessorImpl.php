<?php
namespace src\service\impl;

use src\App;
use src\dto\questionary\QuestionaryDto;
use src\dto\solutions\QuestionarySolutionDto;
use src\repository\solutions\SolutionsRepository;
use src\dto\solutions\SolutionSummaryDto;
use src\service\impl\checkers\SolutionCheckerFactory;
use src\service\interfaces\SolutionProcessorInterface;


class SolutionProcessorImpl implements SolutionProcessorInterface {

    public function getSolutionRepositoryService(): SolutionsRepository {
        return App::$app->getDIContainer()->get(SolutionsRepository::class);
    }

    public function saveAndProcess(QuestionaryDto $questionaryDto, QuestionarySolutionDto $questionarySolutionDto): SolutionSummaryDto
    {
        $solutionRepository = $this->getSolutionRepositoryService();

        $solutions = $questionarySolutionDto->getSolutions();
        $lastSolution = array_values(array_slice($solutions, -1))[0];
        $solutionRepository->saveSolution($lastSolution);

        $checker = SolutionCheckerFactory::getChecker($questionaryDto->getScoreStrategy());
        $result = new SolutionSummaryDto([
            'score' => $checker->getScore(),
        ]);
        return $result;
    }
}