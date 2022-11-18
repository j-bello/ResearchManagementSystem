<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use Symfony\Component\Console\Input\Input;
//use DB;
use DataTables;
use Redirect,Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;



class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Theme::latest()->get();
            return datatables()->of(Theme::select('*'))
            ->addColumn('action', 'themes.action')
            ->rawColumns(['action'])
           ->addIndexColumn()
            ->make(true);
        }

        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('themes.create');
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
        $request->validate([
            'theme' => 'required|unique:themes|max:255',
            'description' => 'required|unique:themes',
        ], [
            // custom error message
        ]);





        $themes = new Theme();
        $themes->theme = $request->theme;
        $themes->description = $request ->description;
        $themes->save();

        Alert::success('Success', 'Theme added successfully!');

        return redirect()->back()->with('message', 'Theme added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
        return view('themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {

        Alert::success('Success', 'Theme updated successfully!');


         return view('themes.edit', compact('theme'));
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


        $request->validate([
           'theme' => "required|unique:themes|max:255,theme,$id",
            'description' => "required|unique:themes",

        ], [

        ]);
        $themes = Theme::find($id);
        $themes->theme = $request->theme;
       $themes->description = $request->description;

        $themes->save();
        Alert::success('Success', 'Theme updated successfully!');

        return redirect()->back()->with('message', 'Theme Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {



        $theme->delete();
        Alert::warning('Delete Theme', 'Theme was deleted successfully.');

       return redirect()->route('themes.index');
    }

   // public function addResearch(Request $request, Theme $id){


       // $themes = new Theme();
    //   $themes = Theme::find($id);
      // $themes->theme = $request->theme;

     //   foreach ($request->moreFields as $key => $value) {


           //Theme::create($value);

        //   DB::table('themes')->insert([
           // 'theme' => $themes,
        //    'area' => $value
        //   ]);
       //   $themes = Theme::create([
        //    'theme' => $themes,
         //   'area' => $value]);

          //$theme_id = $themes->$id();
          //$value = implode(" ", $value);

      //  }

    //    return back()->with('success', 'Research Areas Has Been Created Successfully.');



    }

