<?php
namespace App\Actions;

use App\Models\Stock;
use Carbon\Carbon;

class FetchStocks {
    public function handle(FetchJSON $fetch_json)
    {
        $now = Carbon::now()->format('Y-m-d');
        $last_page = $fetch_json->handle('stocks', 100, $now);
        if (is_null($last_page)) {
            return 'API не вернул данные';
        }
        for ($i = 1; $i <= $last_page['meta']['last_page']; $i++) {
            $response = $fetch_json->handle('stocks', $i, $now);
            Stock::insert(
                $response['data'],
            );
        }
        return 'Успех. Всего записей: '.$last_page['meta']['total'];
    }
}
