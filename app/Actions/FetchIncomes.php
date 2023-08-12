<?php
namespace App\Actions;

use App\Models\Income;
use Carbon\Carbon;

class FetchIncomes {
    public function handle(FetchJSON $fetch_json)
    {
        $last_page = $fetch_json->handle('incomes', 100);
        if (is_null($last_page)) {
            return 'API не вернул данные';
        }
        for ($i = 1; $i <= $last_page['meta']['last_page']; $i++) {
            $response = $fetch_json->handle('incomes', $i);
            Income::insert(
                $response['data'],
            );
        }
        return 'Успех. Всего записей: '.$last_page['meta']['total'];
    }
}
