<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Fg;
use App\Models\Macro;

class DeleteController extends BaseController
{
    //Delete an item from Finished Goods
    public function deleteFg()
    {
        $fgmodel = new Fg();
        $fgmodel->where('Product_name',$this->request->getVar('pname'))->delete();
    }

    //Delete from Macros
    function deleteMacro()
    {
        $macro = new Macro();
        $macro->where('rawmat_name', $this->request->getVar('macroName'))->delete();
    }

    
}
