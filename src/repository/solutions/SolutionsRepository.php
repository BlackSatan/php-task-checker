<?php
namespace src\repository\solutions;

use src\dto\solutions\SolutionDto;

interface SolutionsRepository {

    public function saveSolution(SolutionDto $solutionDto);

    public function findSolution(): ?SolutionDto;

}