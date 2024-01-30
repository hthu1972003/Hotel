<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Models\Customer;
use App\Models\Home;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function index(){
        $obj = new Home();
        $homes = $obj->index();

        $obj = new RoomType();
        $typerooms = $obj->index();
        $obj  = new Customer();
        // Goi den funtion index o trong mpdels de lay du lieu
        $customers = $obj->show();
        return view('home.index', ['homes'=>$homes,
            'typerooms'=>$typerooms,
            'customers' =>$customers
        ]);
    }


    public function store(Request $request)
    {
        //
        $obj = new Home();
        $obj->roomtype_id = $request->roomtype_id;
        $obj->time_start = $request->check_in;
        $obj->time_end = $request->check_out;
        $obj->people = $request->people;
        $obj->method = $request->paymentmethod;
        //Gọi function để lưu dữ liệu lên db trong model
        $obj->store();
        //quay veef route hiển thị danh sách
        return Redirect::route('home.index');
    }
    public function show($customer_id){
        $obj = new Home();
        $orders = $obj->show($customer_id);
        return view('home.booking', [
            'orders' => $orders,
        ]);
    }
}
