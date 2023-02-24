<?php

namespace App\Http\Controllers;

use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use mysql_xdevapi\Table;
use App\Models\Customers;
use App\Models\Address;
use App\Models\TypeAdress;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;


class OrmCustomersController extends Controller
{
    public function index()
    {
        $cus = Customers::with(['address' => function($query){
            $query->where('typeAddress_id', 1);
        }])->paginate(5);
        return view('ORM.customers', compact('cus'));
    }

    public function addCustomers()
    {
        $type = TypeAdress::all();
        return view('ORM.addCustomers', compact('type'));
    }

    public function postAddCustomers(Request $request)
    {
        $customers = Customers::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);

        if ($customers) {
            foreach ($request->address as $address){
                Address::create([
                    'number' => $request->number,
                    'street' => $request->street,
                    'district' => $request->district,
                    'city' => $request->city,
                    'typeAddress_id' => $address,
                    'customer_id' => $customers->id
                ]);
            }
        }
        return redirect()->route('customers.index');
    }

    public function editCustomers($id)
    {
        $detail = Customers::find($id);
        $address = $detail->address;
        $type = Address::all();

        return view('ORM.editCustomers ', ['editCustomers' => $detail, 'editAddress' => $address, 'editType'=>$type]);
    }
    public function postEditCustomers(Request $request, $id){
        $updateCustomer = Customers::where('id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'username' => $request->username,
            'email' => $request->email
        ]);
        if($updateCustomer){
            foreach ($request->address as $address) {
                Address::update([
                    'number' => $request->number,
                    'street' => $request->street,
                    'district' => $request->district,
                    'city' => $request->city,
                    'typeAddress_id' => $address,
                    'customer_id' => $updateCustomer->id
                ]);
            }
        }
        return redirect()->route('customers.index');
    }
}
