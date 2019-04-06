<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotel;
use App\Http\Requests\StorePackage;
use App\Hotel;
use App\Package;

class PackageController extends Controller
{
    //

    /**
     * Show Hotels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::getPackages();
        if($packages->count() > 0){
            $packages->map(function($package){
                $actions = '
                <a href="'.route('dashboard.packages.edit', ['id' => $package->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
                </a>';

                $actions .= '
                <a href="'.route('dashboard.packages.archive', ['id' => $package->id]).'" class="sa-warning">
                    <span class="label label-danger m-l-5"><i class="fa fa-trash"></i></span>
                </a>';

                $package['actions'] = $actions;
                return $package;
            });
        }

        return view('pages.package.main', ['packages' => $packages->toJson()]);
    }

    /**
     * Show Create Hotel Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.package.create');
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StorePackage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackage $request)
    {
        $package = Package::create($request->except('_token'));
        if($package->exists){
            return redirect()->route('dashboard.packages.index');
        }
        return redirect()->back()->withErrors(['Failed to create new package'])->withInput();
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
            $package = Package::where('id', $id)->first();
            return view('pages.package.create', ['package' => $package]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Http\Requests\StorePackage  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePackage $request, $id)
    {
        try {
            $inputs = $request->except('_token');
            $package = Package::where('id', $id)->update($inputs);
            if($package){
                return redirect()->route('dashboard.packages.index');
            }
            return redirect()->back()->withErrors(['Failed to update package'])->withInput();
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
            $package = Package::where('id', $id)->update(['archive'=>1]);
            if($package){
                return redirect()->route('dashboard.packages.index');
            }
            return redirect()->back()->withErrors(['Failed to delete package.'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

}
