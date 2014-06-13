<?php
namespace Clickbus\RestHandler;

use Clickbus\RestHandler\Dto;

class Response implements \JsonSerializable
{
    private $dto;

    private $responseKey;

    public function __construct(Dto $dto, $responseKey = 'content')
    {
        $this->dto = $dto;
        $this->responseKey = $responseKey;
    }

    public function jsonSerialize()
    {
        $properties = get_object_vars($this->dto);
        $contentType = key($properties);

        return [
            'meta' => null,
             $contentType => $properties[$contentType]
        ];
    }
}
