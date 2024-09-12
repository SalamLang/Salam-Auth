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

    public function success2(mixed $data = null, int $code = 200, bool $message = true): array
    {
        return $this->formatResponse2($message, $data, $code);
    }

    public function fail2(mixed $data = null, int $code = 500, bool $message = false): array
    {
        return $this->formatResponse2($message, $data, $code);
    }

    private function formatResponse(string $status, mixed $data, int $code): array
    {
        return [
            'status' => $status,
            'data' => $data,
            'code' => $code,
        ];
    }

    private function formatResponse2(bool $status, mixed $data, int $code): array
    {
        return [
            'status' => $status,
            'data' => $data,
            'code' => $code,
        ];
    }
}
