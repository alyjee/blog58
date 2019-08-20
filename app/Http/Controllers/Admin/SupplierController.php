<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplier;
use App\Supplier;

class SupplierController extends Controller
{
    //

    /**
     * Show Suppliers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::getSuppliers();
        if($suppliers->count() > 0){
            $suppliers->map(function($supplier){
                $actions = '
                <a href="'.route('dashboard.suppliers.edit', ['id' => $supplier->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
                </a>';

                $actions .= '
                <a href="'.route('dashboard.suppliers.archive', ['id' => $supplier->id]).'" class="sa-warning">
                    <span class="label label-danger m-l-5"><i class="fa fa-trash"></i></span>
                </a>';

                $supplier['actions'] = $actions;
                return $supplier;
            });
        }

        return view('pages.supplier.main', ['suppliers' => $suppliers->toJson()]);
    }

    /**
     * Show Create Supplier Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.create');
    }

    /**
     * Store Supplier.
     *
     * @param  \App\Http\Requests\StoreSupplier  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplier $request)
    {
        $supplier = Supplier::create($request->except('_token'));
        if($supplier->exists){
            return redirect()->route('dashboard.suppliers.index');
        }
        return redirect()->back()->withErrors(['Failed to create new supplier'])->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $supplier = Supplier::where('id', $id)->first();
            return view('pages.supplier.create', ['supplier' => $supplier]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Http\Requests\StoreSupplier  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplier $request, $id)
    {
        try {
            $inputs = $request->except('_token');
            $supplier = Supplier::where('id', $id)->update($inputs);
            if($supplier){
                return redirect()->route('dashboard.suppliers.index');
            }
            return redirect()->back()->withErrors(['Failed to update supplier'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archive($id)
    {
        try {
            $supplier = Supplier::where('id', $id)->update(['archive'=>1]);
            if($supplier){
                return redirect()->route('dashboard.suppliers.index');
            }
            return redirect()->back()->withErrors(['Failed to delete supplier.'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

}
