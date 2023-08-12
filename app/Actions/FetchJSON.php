<?php
namespace App\Actions;

use Illuminate\Support\Facades\Http;

class FetchJSON {
    public function handle(
        string $param,
        int $page = 1,
        string $dateFrom = '2022-01-01',
        string $dateTo = '2024-01-01',
        int $limit = 500
    )
    {
        return Http::get('http://89.108.115.241:6969/api/'.$param, [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'page' => $page,
            'key' => config('app.api_key'),
            'limit' => $limit,
        ])->json();
    }
}
