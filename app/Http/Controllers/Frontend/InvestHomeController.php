<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investplan;
use App\Models\InvestFaqs;
use App\Models\InvestFact;
use App\Models\Investtraction;
use App\Models\InvestSetting;
use App\Models\InvestBanner;

class InvestHomeController extends Controller
{
    public function index()
    {
        $tractions = Investtraction::get();
        $facts = InvestFact::all();
        $faqs = InvestFaqs::get();
        $plans = InvestPlan::latest()->get();
        $setting = InvestSetting::first();
        $highlight = InvestBanner::latest()->first();
        return view('frontend.invest.index', compact('tractions', 'facts', 'faqs', 'plans', 'setting', 'highlight'));
    }
}
