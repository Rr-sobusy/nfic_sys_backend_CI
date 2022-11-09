<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CountController extends BaseController
{
    public function countCriticalMacros()
    {
        $db = db_connect();
        $result = $db->query( "SELECT
        SUM(CASE WHEN current_stocks <4500 THEN 1 ELSE 0 END) as count
        FROM raw_mats")->getResultArray();
        echo json_encode($result);
    }

    public function countCriticalMicros()
    {
        $db = db_connect();
        $result = $db->query("SELECT
        SUM(CASE WHEN current_stocks <50 THEN 1 ELSE 0 END) as count
        FROM micros")->getResultArray();
        echo json_encode($result);
    }

    public function countCriticalPackagings(){
        $db = db_connect();
        $result = $db->query("SELECT
        SUM(CASE WHEN current_stocks <500 THEN 1 ELSE 0 END) as count
        FROM packagings")->getResultArray();
        echo json_encode($result);
    }

    public function countTotalProducts(){
        $db = db_connect();
        $result = $db->query("SELECT
        count(*) as count
        FROM finished_goods")->getResultArray();
        echo json_encode($result);
    }

    public function countTotalCustomers(){
        $db = db_connect();
        $result = $db->query("SELECT
        count(*) as count
        FROM customers")->getResultArray();
        echo json_encode($result);
    }

    public function countTotalSuppliers(){
        $db = db_connect();
        $result = $db->query("SELECT
        count(*) as count
        FROM suppliers")->getResultArray();
        echo json_encode($result);
    }
}
