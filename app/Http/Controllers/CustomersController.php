<?php

namespace App\Http\Controllers;
use App\Models\Customers;
// use App\Models\Customers as ModelsCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        return redirect('show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        Customers::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Customers::create($request->all());
        //return view('register_log');
        return redirect('register_log');
        // return redirect()->route('register_log')
        //                 ->with('success','Post created successfully.');
        // $model = new Customers();
        //var_dump($model);

       // return view('student',['name1'=> 'Anisha','name2'=>'Nishka','name3'=>'Sumit']);
        echo "hello" ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $customers = DB::select('select * from customers');
        return view('show',['customers'=>$customers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::update('update customers set name = ?,email=?,password=? where id = ?',[$name,$email,$password,$id]);
        return redirect('show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from customers where id = ?',[$id]);
         return redirect('show');
    }
}
