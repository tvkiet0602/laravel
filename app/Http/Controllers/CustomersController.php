<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysql_xdevapi\Table;

class CustomersController extends Controller
{
    public function index(){
        return view('customers', [
            'customers' => DB::table('customers')->paginate(5)
        ]);
    }

    public function editCustomers($id){
        $detail = DB::select('SELECT * FROM customers WHERE id = ?', [$id]);
        return view('editCustomers', compact('detail'));
    }
    public function postEditCustomers(Request $request, $id){
        DB::table('customers')->where('id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return redirect()->route('customers');
    }

    public function postAddCustomers(Request $request){
        if($request->method() == 'POST'){
            DB::table('customers')->insert([
                'name' => $request->name,
                'gender' => $request->gender,
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
                'address' => $request->address
            ]);
            return redirect()->route('customers');
        }else{
            return view('addCustomers');
        }
    }

    public function deleteCustomers($id){
        $delete = DB::delete('DELETE FROM customers WHERE id = ?', [$id]);
        return redirect()->route('customers');
    }

}
