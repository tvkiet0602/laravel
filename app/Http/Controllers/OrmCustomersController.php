<?php

namespace App\Http\Controllers;

use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $cus = Customers::with(['address' => function ($query) {
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
            foreach ($request->address as $address) {
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
        return view('ORM.editCustomers ', ['editCustomers' => $detail, 'editAddress' => $address, 'id' => $id]);
    }

    public function postEditCustomers(Request $request, $id)
    {
        $updateCustomer = Customers::where('id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'username' => $request->username,
            'email' => $request->email
        ]);
        if ($updateCustomer) {
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

    public function addAddress($id)
    {
        $detail = Customers::find($id);
        $addresses = TypeAdress::orderBy('id')->get(['id', 'type']);

        $adrs = $detail->address->groupBy(function ($item) {
            return $item->typeAddress_id;
        })->toArray();

        $lists = [];
        foreach ($addresses as $address) {
            $lists[$address->id] = array_merge([
                'label' => $address->type
            ], Arr::get($adrs, "{$address->id}.0", [
                "number" => "",
                "street" => "",
                "district" => "",
                "city" => "",
                "typeAddress_id" => $address->id,
                "customer_id" => $detail->id,
            ]));
        }

        return view('ORM.addAddress ', ['editCustomers' => $detail, 'lists' => $lists]);
    }

    public function postAddress(Request $request)
    {
        foreach ($request->input('address') as $key_id => $address) {
            dd($address['number']);
        }
    }
}
