<?php
namespace src\dto\solutions;

class SolutionDto {

    private $answer;

    private $result;

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setResult(string $result)
    {
        $this->result = $result;
    }

    public function __construct(array $data)
    {
        $this->answer = $data['answer'] ?? null;
    }

    public function getData() {
        return [
            'answer' => $this->answer,
            'result' => $this->result,
        ];
    }
}