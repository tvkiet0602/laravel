<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomersController extends Controller
{
    public $data = [];
    public function index()
    {
//        $customers = DB::select('SELECT * FROM customers ORDER BY created_at DESC')->paginate(5);
//        return view('customers', ['customers' => $customers]);
        return view('customers', [
            'customers' => DB::table('customers')->paginate(5)
        ]);
    }
}
