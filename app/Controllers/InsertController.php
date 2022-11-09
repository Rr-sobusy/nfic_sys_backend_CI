<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Fg;
use App\Models\Macro;
use App\Models\Micro;
use App\Models\Sales;
use mysqli_result;

class InsertController extends BaseController
{

    //Insert New FG
    function insertNewFg()
    {
        $fg = new Fg();
        $data = [
            'Product_name' => $this->request->getVar('pname'),
            'Packaging_in_kls' => $this->request->getVar('psize'),
            'Quantity' => $this->request->getVar('quantity'),
            'repros' => '0',
            'bin_content' => '0',
        ];
        $fg->save($data);
    }

    //Insert New Macro
    function insertNewMacro()
    {
        $macro = new Macro();
        $data = [
            'rawmat_name' => $this->request->getVar('macroName'),
            'rawmat_type' => 'Macro',
            'current_stocks' => $this->request->getVar('quantity'),
            'bin_content' => '0',
        ];
        $macro->save($data);
    }

    //Insert New Macro
    function insertNewMicro()
    {
        $micro = new Micro();
        $data = [
            'micro_name' => $this->request->getVar('microName'),
            'type' => 'Micro',
            'current_stocks' => $this->request->getVar('quantity'),
            'pending' => '0',
        ];
        $micro->save($data);
    }

    //Insert datas of consumed materials
    function addConsumed()
    {
        $db = db_connect();
        $db->query(
            'Insert into `consumed`(`date`,`type`,`description`,`details`,`total`) values (?,?,?,?,?)',
            [$this->request->getVar('date'), $this->request->getVar('type'), $this->request->getVar('description'), json_encode($this->request->getVar('items')), $this->request->getVar('total')]
        );
    }

    //Insert data of released materials from warehouse
    function postReleased()
    {
        $db = db_connect();
        $db->query(
            'Insert into `poured_mats` (`date`,`name`,`quantity`) values (?,?,?)',
            [$this->request->getVar('date'), $this->request->getVar('matname'), $this->request->getVar('quantity')]
        );
    }

    //Insert data after submitting from daily production
    function postDailyProd()
    {
        $db = db_connect();
        $db->query("Insert into `daily_production` (`production_date`,`product_name`,`packaging_size`,`bags_made`,`in_kls`,
        `remarks`) values (?,?,?,?,?,?)
        ", [
            $this->request->getVar('proddate'), $this->request->getVar('prodname'), $this->request->getVar('packsize'),
            $this->request->getVar('bagsmade'), $this->request->getVar('inkls'), $this->request->getVar('remarks')
        ]);
    }

    //Insert sales data
    function postSales()
    {
        $sales = new Sales();
        $data = [
            'date' => $this->request->getVar('date'),
            'cust_name' => $this->request->getVar('custName'),
            'inv_no' => $this->request->getVar('si_no'),
            'product_and_quantity' => $this->request->getVar('data')
        ];
        $sales->save($data);
    }
}
