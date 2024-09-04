<?php

namespace App\Trait;

trait BaseApiTrait
{
    public function success(mixed $data = null, int $code = 200, string $message = 'Success'): array
    {
        return $this->formatResponse($message, $data, $code);
    }

    public function fail(mixed $data = null, int $code = 500, string $message = 'Fail'): array
    {
        return $this->formatResponse($message, $data, $code);
    }

    private function formatResponse(string $status, mixed $data = null, int $code): array
    {
        return [
            "status" => $status,
            "data" => $data,
            "code" => $code
        ];
    }
}