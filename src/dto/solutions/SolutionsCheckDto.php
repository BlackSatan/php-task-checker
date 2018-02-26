<?php
namespace src\dto\solutions;

class SolutionsCheckDto {
    private $results;

    public function __construct(array $data)
    {
        $this->results = $data['results'] ?? [];
    }
}