<?php
namespace src\repository\solutions\impl;

use src\dto\solutions\SolutionDto;
use src\repository\base\mysql\RedisRepository;
use src\repository\solutions\SolutionsRepository;

class SolutionRedisRepositoryImpl extends RedisRepository implements SolutionsRepository
{

    public function findSolution(): ?SolutionDto
    {
        $data = $this->findByPk(1);
        if (!$data) {
            return null;
        }
        return new SolutionDto($data);
    }

    public function saveSolution(SolutionDto $solutionDto)
    {
        $data = $solutionDto->getData();
        $data['id'] = 1;
        $this->save($data);
    }
}