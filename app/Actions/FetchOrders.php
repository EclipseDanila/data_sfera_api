<?php
namespace App\Actions;

use App\Models\Order;

class FetchOrders {
    public function handle(FetchJSON $fetch_json)
    {
        $last_page = $fetch_json->handle('orders', 100);
        if (is_null($last_page)) {
            return 'API не вернул данные';
        }
        for ($i = 1; $i <= $last_page['meta']['last_page']; $i++) {
            $response = $fetch_json->handle('orders', $i);

            if (!is_null($response)) {
                Order::insert(
                    $response['data'],
                );
            } else {
                break;
            }
        }
        return 'Успех. Всего записей: '.$last_page['meta']['total'];
    }
}
