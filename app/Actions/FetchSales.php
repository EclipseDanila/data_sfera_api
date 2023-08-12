<?php
namespace App\Actions;

use App\Models\Sale;

class FetchSales {
    public function handle(FetchJSON $fetch_json)
    {
        $last_page = $fetch_json->handle('sales', 1000);
        if (is_null($last_page)) {
            return 0;
        }
        for ($i = 151; $i <= $last_page['meta']['last_page']; $i++) {
            $response = $fetch_json->handle('sales', $i);
            if (!is_null($response)) {
                Sale::insert(
                    $response['data'],
                );
            } else {
                break;
            }
        }
        return 'Успех. Всего записей: '.$last_page['meta']['total'];
    }
}
