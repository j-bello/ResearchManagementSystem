<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use Illuminate\Support\Facades\File;
use App\Models\Title;
use App\Models\Theme;
use App\Models\File as ModelsFile;
use Auth;
use Illuminate\Support\Facades\DB;


class TitleController extends Controller
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
        $titles = Title::all();
        $titles = DB::table('titles')->select("*", DB::raw("CONCAT(titles.program,'',titles.id) AS titlecode"))->get();
        return view('titles.index', compact('titles','themes'));

    }

    public function search()
    {
        $themes = Theme::all();

        $titles = Title::all();
        return view('titles.search', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Theme $themes)
    {
        //
        $themes = Theme::all();

        return view('titles.create')->with(['themes' => $themes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitleRequest $request)
    {
        //
       // Title::create($request->validated());
        $input = $request->all();
        $tags = explode(",", $request->tags);
        $title = Title::create($input);
        $title->tag($tags);

       // $themes = implode(",", $request->themes);
       // $title->themes($themes);

        return redirect()->route('titles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       // $titles = DB::table('titles')->select("*", DB::raw("CONCAT(titles.program,'',titles.id) AS titlecode"))->get();

       $title = Title::find($id);
       $file = DB::table('files')->where('title_id', $id)->latest('created_at')->first();

        return view('titles.show', compact('title','file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title, Theme $themes)
    {
        //
        $themes = Theme::all();

        return view('titles.edit', compact('title','themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTitleRequest $request, Title $title)
    {
        //
        $title->update($request->validated());
        return redirect()->route('titles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
        $title->delete();

        return redirect()->route('titles.index');
    }


    public function upload(Request $request, $id){

        $request->validate([
            'docFile' => ['nullable', 'mimes:doc,docx,pdf,csv', 'max:15000']

        ], [
            // custom error message
        ]);
        $docfile = new ModelsFile();

                //saving image
                $file = $request->file('docFile');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('assets'), $fileName);

                $docfile->title_id = $id;
                $docfile->file = $fileName;

                $docfile->save();
                return back()->with('updated', '');
    }




    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/'.$file));

    }


}
