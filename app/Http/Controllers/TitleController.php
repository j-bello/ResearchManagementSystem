<?php

namespace App\Http\Controllers;

use App\DataTables\TitlesDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use Illuminate\Support\Facades\File;
use App\Models\Title;
use App\Models\Theme;
use App\Models\File as ModelsFile;
use Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;

use Symfony\Component\HttpFoundation\Response;


class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TitlesDataTable $dataTable)
    {
        $themes = Theme::all();
        $titles = Title::all();

        if ($request->ajax()) {
            $data = Title::latest()->get();
            return datatables()->of(Title::select('*'))
                ->addColumn('action', 'titles.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       // return $dataTable->render('titles.index', compact('titles', 'themes'));

        //  $titles = DB::table('titles')->select("*", DB::raw("CONCAT(titles.program,'',titles.id) AS titlecode"))->get();
        return view('titles.index', compact('titles', 'themes'));


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
    public function store(Request $request)
    {


        $request->validate([
            'program' => 'required',
            'title' => 'required|unique:titles',
            'description' => 'required',
            'year' => 'required',
            'adviser' => 'required',
            'themes' => 'required',

        ], [
            // custom error message
        ]);
        // if ever may foreign keys / relationships nang nakaset up, uncomment $book = Auth::user(); and $book->books()->save($book); and delete $book->save();
        // $book = Auth::user();
        $title = new Title();
        $title->program = $request->program;
        $title->title = $request->title;
        $title->description = $request->description;
        $title->year = $request->year;
        $title->adviser = $request->adviser;
        $title->themes = $request->themes;


        $title->save();


       // $input = $request->all();
        $tags = explode(",", $request->tags);
       // $title = Title::create($input);
        $title->tag($tags);


        Alert::success('Success', 'Title added successfully!');

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

        return view('titles.show', compact('title', 'file'));
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

        return view('titles.edit', compact('title', 'themes'));
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

        $request->validate([
            'program' => 'required',
            'title' => 'required|unique:titles',
            'description' => 'required',
            'year' => 'required',
            'adviser' => 'required',
            'themes' => 'required',

        ], [
            // custom error message
        ]);
        // if ever may foreign keys / relationships nang nakaset up, uncomment $book = Auth::user(); and $book->books()->save($book); and delete $book->save();
        // $book = Auth::user();
        $title = Title::find($id);
        $title->program = $request->program;
        $title->title = $request->title;
        $title->description = $request->description;
        $title->year = $request->year;
        $title->adviser = $request->adviser;
        $title->themes = $request->themes;


        $title->save();


       // $input = $request->all();
        $tags = explode(",", $request->tags);
       // $title = Title::create($input);
        $title->tag($tags);




        Alert::success('Success', 'Title updated successfully!');

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
        Alert::warning('Delete Title', 'Title was deleted successfully.');

        return redirect()->route('titles.index');
    }


    public function upload(Request $request, $id)
    {

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
        return response()->download(public_path('assets/' . $file));
    }





    public function search()
    {
        $titles = Title::all();
        $searchTerm = $_GET["searchTerm"];


        $searchTerm = '%' . $_GET["searchTerm"] . '%';

        $titles = title::where('title', 'LIKE', $searchTerm)->paginate(10);

        return view('titles.create')->with(['titles' => $titles]);
    }


    public function view($id)
    {
        //
        // $titles = DB::table('titles')->select("*", DB::raw("CONCAT(titles.program,'',titles.id) AS titlecode"))->get();

        $title = Title::find($id);
        $file = DB::table('files')->where('title_id', $id)->latest('created_at')->first();

        return view('titles.view', compact('title', 'file'));
    }


}
