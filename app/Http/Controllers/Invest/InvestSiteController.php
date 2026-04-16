<?php

namespace App\Http\Controllers\Invest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestSiteController extends Controller
{
    public function banner()
    {
        return view('backend.setting.invest.banner');
    }

    public function faq()
    {
        return view('backend.setting.invest.faq');
    }

    public function general()
    {
        return view('backend.setting.invest.general');
    }


    public function investPlan()
    {
        return view('backend.setting.invest.investPlan');
    }

    public function traction()
    {
        return view('backend.setting.invest.traction');
    }
    public function factSheet()
    {
        return view('backend.setting.invest.factSheet');
    }   
}
