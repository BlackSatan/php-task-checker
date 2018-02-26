<?php
namespace src\controller;

use src\App;
use src\dto\questionary\QuestionaryDto;
use src\dto\questionary\QuestionaryScoreStrategyEnum;
use src\dto\solutions\QuestionarySolutionDto;
use src\repository\solutions\SolutionsRepository;
use src\service\interfaces\SolutionProcessorInterface;

class IndexController {

    public function getSolutionProcessorService(): SolutionProcessorInterface {
        /** @var SolutionProcessorInterface $service */
        $service = App::$app->getDIContainer()->get(SolutionProcessorInterface::class);
        return $service;
    }

    public function getSolutionRepository(): SolutionsRepository {
        /** @var SolutionsRepository $service */
        $service = App::$app->getDIContainer()->get(SolutionsRepository::class);
        return $service;
    }


    public function IndexAction(array $request) {
        return [
            'response' => 'Hello World'
        ];
    }

    /**
     * @Route('POST', '/solution', QuestionarySolution $request)
     *
     * @param array $request
     * @return array
     */
    public function SaveSolutionAction(array $request) {
        $someQuestionary = new QuestionaryDto([
            'title' => 'test',
            'scoreStrategy' => QuestionaryScoreStrategyEnum::UNMEMOIZED_SCORE_STRATEGY,
            'tasks' => [
                [
                    'title' => 'Quest 1',
                    'type' => 'input',
                    'typedTask' => [
                        'title' => 'What is your name?',
                        'answer' => 'Bogdan'
                    ]
                ],
                [
                    'title' => 'Quest 2',
                    'type' => 'select',
                    'typedTask' => [
                        'title' => 'What is your age?',
                        'options' => [
                            '21' => 'Twenty One',
                            '22' => 'Twenty Two',
                            '23' => 'Twenty Three',
                        ],
                        'answer' => '22'
                    ]
                ],
            ]
        ]);
        $dto = new QuestionarySolutionDto($request);
        $solutionProcessor = $this->getSolutionProcessorService();
        $summary = $solutionProcessor->saveAndProcess($someQuestionary, $dto);
        return $summary->getData();
    }

    /**
     * @Route('GET', '/task/solutions')
     *
     * @param array $request
     * @return array
     */
    public function GetSolutionAction(array $request) {
        $repository = $this->getSolutionRepository();
        $solution = $repository->findSolution();
        return $solution ? $solution->getData() : null;
    }
}