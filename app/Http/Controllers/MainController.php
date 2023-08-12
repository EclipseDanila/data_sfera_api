<?php

namespace App\Http\Controllers;

use App\Actions\FetchJSON;
use App\Actions\FetchSales;
use App\Actions\FetchStocks;
use App\Actions\FetchOrders;
use App\Actions\FetchIncomes;

class MainController extends Controller
{
    public function fetch_sales(FetchSales $fetch_sales, FetchJSON $fetch_json) {
        ini_set('max_execution_time', 1800);
        $result = $fetch_sales->handle($fetch_json);
        return response(['message' => $result]);
    }

    public function fetch_stocks(FetchStocks $fetch_stocks, FetchJSON $fetch_json) {
        ini_set('max_execution_time', 1200);
        $result = $fetch_stocks->handle($fetch_json);
        return response(['message' => $result]);
    }

    public function fetch_orders(FetchOrders $fetch_orders, FetchJSON $fetch_json) {
        ini_set('max_execution_time', 1800);
        $result = $fetch_orders->handle($fetch_json);
        return response(['message' => $result]);
    }

    public function fetch_incomes(FetchIncomes $fetch_incomes, FetchJSON $fetch_json) {
        ini_set('max_execution_time', 1200);
        $result = $fetch_incomes->handle($fetch_json);
        return response(['message' => $result]);
    }
}
