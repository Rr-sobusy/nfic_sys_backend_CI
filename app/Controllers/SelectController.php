<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customers;
use App\Models\Delivery;
use App\Models\Fg;
use App\Models\Sales;
use App\Models\Suppliers;
use App\Models\Users;

class

SelectController extends BaseController
{

    //Get Finished Goods data
    function SelectFg()
    {
        $db = new Fg();
        $result = $db->findAll();
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    //Get Micros data
    function selectMicros()
    {
        $db = db_connect();
        $query = $db->query("SELECT ID, micro_name, type, current_stocks,pending, CASE WHEN current_stocks <50 THEN '--CRITICAL--' ELSE ' ' END annotation from micros ORDER BY `micro_name` ASC")->getResultArray();
        echo json_encode($query, JSON_PRETTY_PRINT);
    }

    //Get Macros data
    function selectMacros()
    {
        $db = db_connect();
        $query = $db->query("SELECT ID, rawmat_name,rawmat_type, current_stocks,bin_content, CASE WHEN current_stocks <4500 THEN '--CRITICAL--' ELSE ' ' END annotation from raw_mats ORDER BY `rawmat_name` ASC")->getResultArray();
        echo json_encode($query, JSON_PRETTY_PRINT);
    }

    //Get Packagings data
    function selectPackagings()
    {
        $db = db_connect();
        $query = $db->query("SELECT ID,packaging_name,type,current_stocks, CASE WHEN current_stocks <1000 then '--CRITICAL--' ELSE '' END annotation from packagings ORDER BY `packaging_name` ASC")->getResultArray();
        echo json_encode($query, JSON_PRETTY_PRINT);
    }

    //Get data from consumed materials
    function selectConsumed()
    {
        $db = db_connect();
        $query =  $db->query('SELECT * FROM `consumed` order by `date` DESC')->getResultArray();
        echo json_encode($query, JSON_PRETTY_PRINT);
    }

    //Get data from released materials from warehouse
    function selectReleased()
    {
        $db = db_connect();
        $query = $db->query('Select * from `poured_mats` order by `ID` DESC')->getResultArray();
        echo json_encode($query, JSON_PRETTY_PRINT);
    }

    //Get data from daily production
    function selectDailyProd()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM `daily_production` ORDER BY `ID` DESC")->getResultArray();
        echo json_encode($query, JSON_PRETTY_PRINT);
    }

    //Authenticate the users from login
    function authenticateUsers()
    {
        $users = new Users();
        $result =   $users->where(['username' => $this->request->getVar('userName'), 'password' => $this->request->getVar('passWord')])->find();
        foreach ($result as $user) {
            if ($result > 0) {
                echo 'User found';
            }
        }
    }

    //Get datas from delivery receptions
    function selectDelivery()
    {
        $delivery = new Delivery();
        $result = $delivery->orderBy('date','DESC')->find();
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    //Get data from sales
    function selectSales()
    {
        $sales = new Sales();
        $result = $sales->orderBy('date', 'Desc')->find();
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    //Get suppliers
    function selectSuppliers()
    {
        $supplier = new Suppliers();
        $result = $supplier->orderBy('supplier_name', 'asc')->find();
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    //Get Customers
    function selectCustomers()
    {
        $customer = new Customers();
        $result = $customer->orderBy('cust_name','asc')->find();
        echo json_encode($result,JSON_PRETTY_PRINT);
    }
}
