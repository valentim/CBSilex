<?php
namespace Clickbus\RestHandler;

use Clickbus\RestHandler\DtoInterface;

class Response implements \JsonSerializable
{
    private $dto;

    public function __construct(DtoInterface $dto)
    {
        $this->dto = $dto;
    }

    public function jsonSerialize()
    {
        $properties = get_object_vars($this->dto);
        $contentType = key($properties);
        $meta = (isset($properties['meta'])) ? $properties['meta'] : null;

        return [
            'meta' => $meta,
             $contentType => $properties[$contentType]
        ];
    }
}