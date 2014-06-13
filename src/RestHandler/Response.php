<?php
namespace Clickbus\RestHandler;

use Clickbus\RestHandler\Dto;

class Response implements \JsonSerializable
{
    private $dto;

    public function __construct(Dto $dto)
    {
        $this->dto = $dto;
    }

    public function jsonSerialize()
    {
        return [
            'meta' => null,
            'content' => get_object_vars($this->dto)
        ];
    }
}
