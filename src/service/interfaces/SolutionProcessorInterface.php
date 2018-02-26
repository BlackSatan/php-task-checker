<?php
namespace src\service\interfaces;

use src\dto\questionary\QuestionaryDto;
use src\dto\solutions\QuestionarySolutionDto;
use src\dto\solutions\SolutionSummaryDto;

interface SolutionProcessorInterface {

    /**
     * Saves solutions to data storage and provides summary of solution
     *
     * @param QuestionaryDto $questionary
     * @param QuestionarySolutionDto $solutionDto
     * @return SolutionSummaryDto
     */
    public function saveAndProcess(QuestionaryDto $questionary, QuestionarySolutionDto $solutionDto): SolutionSummaryDto;
}