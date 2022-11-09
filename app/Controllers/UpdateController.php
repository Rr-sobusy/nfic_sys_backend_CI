<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Fg;
use App\Models\Macro;
use App\Models\Micro;
use App\Models\Packaging;

class UpdateController extends BaseController
{

    //Add Pending Micro after Release from warehouse
    public function addMicroPending()
    {
        $micro = new Micro();
        $micro->where('micro_name', $this->request->getVar('microName'))
        ->set(['pending' => $this->request->getVar('quantitymicro')])->update();
    }

    //Add Pending Macro after Release from warehouse
    public function AddMacroPending()
    {
        $macro = new Macro();
        $macro->where('rawmat_name', $this->request->getVar('macroName'))
        ->set(['bin_content' => $this->request->getVar('quantity')])->update();
    }

    //Add Pending repro after release from warehouse
    public function addReproPending()
    {
        $fg = new Fg();
        $fg->where(
            'Product_name',
            $this->request->getVar('productName')
        )
        ->set(['bin_content' => $this->request->getVar('quantity')])->update();
    }

    //Reset Pending Macro to zero
    public function resetMacroPending()
    {
        $macro = new Macro();
        $macro->where('rawmat_name', $this->request->getVar('macroName'))
        ->set(['bin_content' => '0'])->update();
    }

    //Reset Pending Micro to zero
    public function resetMicroPending()
    {
        $micro = new Micro();
        $micro->where('micro_name', $this->request->getVar('microName'))
        ->set(['pending' => '0'])->update();
    }

    //Reset Pending Micro to zero
    public function resetReproPending()
    {
        $fg = new Fg();
        $fg->where('Product_name', $this->request->getVar('reproName'))
            ->set(['bin_content' => '0'])->update();
    }

    //Update the micro pending after submit from consumed materials
    public function updateMicroPending()
    {
        $micro = new Micro();
        $micro->where('micro_name', $this->request->getVar('microName'))
        ->set(['pending' => $this->request->getVar('difference')])->update();
    }

    //Update the repro pending after submit from consumed materials
    public function updateReproPending()
    {
        $fg = new Fg();
        $fg->where(
            'Product_name',
            $this->request->getVar('reproName')
        )
            ->set(['bin_content' => $this->request->getVar('quantity')])->update();
    }

    //Update the Macro pending after submit from consumed materials
    public function updateMacroPending()
    {
        $macro = new Macro();
        $macro->where('rawmat_name', $this->request->getVar('macroName'))
        ->set(['bin_content' => $this->request->getVar('difference')])->update();
    }

    //Update repro stocks after releasing from warehouse
    public function subtractRepro()
    {
        $fg = new Fg();
        $fg->where('Product_name', $this->request->getVar('productName'))
            ->set(['repros' => $this->request->getVar('difference')])->update();
    }

    //Update Micro stocks after releasing from warehouse and from delivery reception
    public function updateMicro()
    {
        $micro = new Micro();
        $micro->where('micro_name', $this->request->getVar('microName'))
            ->set(['current_stocks' => $this->request->getVar('difference')])->update();
    }

    //Update Macro stocks after releasing from warehouse and from delivery reception
    public function updateMacro()
    {
        $macro = new Macro();
        $macro->where('rawmat_name' ,$this->request->getVar('macroName'))
        ->set(['current_stocks' => $this->request->getVar('difference')])->update();
    }

    //Update the packaging stocks after releasing from warehouse and from delivery reception
    public function updatePackaging()
    {
        $packaging = new Packaging();
        $packaging->where('packaging_name', $this->request->getVar('packagingName'))
            ->set(['current_stocks' => $this->request->getVar('quantity')])->update();
    }

    //Update FG stocks after adding sales and submitting from production
    public function updateFg()
    {
        $fg = new Fg();
        $fg->where('Product_name',$this->request->getVar('fgname'))
        ->set(['Quantity' => $this->request->getVar('quantity')])->update();
    }
    
}

