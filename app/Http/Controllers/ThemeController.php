<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Theme;
class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $themes = new Theme();
        $themes->theme = $request->theme;
        $themes->save();
        return redirect()->back()->with('message', 'Theme Added Successfully');
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
    public function edit(Request $request, $id)
    {
        //
        $themes = Theme::find($id);
        $themes->theme = $request->theme;
        $themes->save();
        return redirect()->back()->with('message', 'Theme Updated Successfully');
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
        $themes = Theme::find($id);
        $themes->theme = $request->theme;
        $themes->save();
        return redirect()->back()->with('message', 'Theme Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $themes)
    {
        //
        $themes->delete();

        return redirect()->route('themes.index');
    }
}
