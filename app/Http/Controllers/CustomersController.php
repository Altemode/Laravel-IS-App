<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()  // <-- gia to export - data
    {

      $customers = Customer::all();


//If we want wlla data, $Nama_10r_2gdp = nama_10r_2gdp::all();  // <-this is the model - table
//Customer::active <- Here Customer is the Model
  //    $activeCustomers = Customer::active()->get();
  //    $inactiveCustomers = Customer::inactive()->get();

      return view('customers.index', compact('customers'));  // return this to view-page
        //  'activeCustomers' => $activeCustomers, compact to idio me autes tis 2 seires
    //      'inactiveCustomers' => $inactiveCustomers,
    ///   'nama_10r_2gdp' => $Nama_10r_2gdp,
    }

    public function create()
    {
      $companies = Company::all();
      $customer = new Customer();

      return view('customers.create', compact('companies','customer'));

    }

    public function store()
    {      /*
      $data = request()->validate([
        'name' => 'required | min:3',
        'email' => 'required | email',
        'active' => 'required',
        'company_id' => 'required',
      ]);*/ // to svinoume auto epeidh einai kai allh fora sto update kai ftiaxnoume to apo katw

      Customer::create($this->validateRequest());
/*
      $nama_10r_2gdp = new nama_10r_2gdp();
      $nama_10r_2gdp->name = request('name');
      $nama_10r_2gdp->email = request('email');
      $nama_10r_2gdp->active = request('active');
      $nama_10r_2gdp->save(); // ean den ta valoume etsi xwrista tote vgazei error gia filable ,
      giati me tin apo panw seira ta xwnei ola mazi , etsi thelei dieukrinish
*/
      return redirect('customers');


    }
      public function show(Customer $customer)
      {
      //  $customer = Customer::find($customer);
        return view('customers.show', compact('customer'));

      }

      public function edit(Customer $customer)
      {
          $companies = Company::all();
          return view('customers.edit', compact('customer','companies'));


      }

      public function update(Customer $customer)
      {


        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);

      }

      public function destroy(Customer $customer)
      {
        $customer->delete();

        return redirect('customers');

      }


      public function validateRequest()
      {
        return request()->validate([
          'name' => 'required | min:3',
          'email' => 'required | email',
          'active' => 'required',
          'company_id' => 'required',
        ]);

      }





}
