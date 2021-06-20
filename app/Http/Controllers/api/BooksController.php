<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;
use App\Models\Books;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Books::all();
        return response([
            'total' => $books->count(),
            'messages' => 'Retrieved successfuly',
            'data' => BooksResource::collection($books)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pictures' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $books = Books::create($request->all());
        return response(['data' => new BooksResource($books), 'message' => "Books has been created!"], 201);

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
        $books = Books::find($id);
        if ($books != null) {
            return response(['project' => new BooksResource($books), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $books = Books::findOrFail($id);
        return view('books.edit', compact('books'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pictures' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $books = Books::find($id);
        if ($books != null) {
            $books->update($request->all());
            return response(['data' => new BooksResource($books), 'message' => 'Books has been updated!'], 202);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $books = Books::find($id);
        if ($books != null) {
            $books->delete();
            return response(['message' => 'Books has been deleted!']);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }




    public function studentsBooksSubmit(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'is_nugas' => 'required',
            'is_ngaji' => 'required',
            'is_doabanguntidur' => 'required',
            'is_doabelumtidur' => 'required',
            'book_content' => 'required',
            'is_subuh' => 'required',
            'is_dzuhur' => 'required',
            'is_azhar' => 'required',
            'is_maghrib' => 'required',
            'is_isya' => 'required',
            'bookisreviewed' => 'required',
            'Surah_id' => 'required',
            'Students_id' => 'required',
            'Students_Teacher_id' => 'required',
            'Students_Class_id' => 'required'
            
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $id1 = $request->post('is_nugas');
        $id2 = $request->post('is_ngaji');
        $id3 = $request->post('is_doabanguntidur');
        $id4 = $request->post('is_doabelumtidur');
        $id5 = $request->post('book_content');
        $id6 = $request->post('is_subuh');
        $id7 = $request->post('is_dzuhur');
        $id8 = $request->post('is_azhar');
        $id9 = $request->post('is_maghrib');
        $id10 = $request->post('is_isya');
        $id11 = $request->post('bookisreviewed');
        $id12 = $request->post('Surah_id');
        $id13 = $request->post('Students_id');
        $id14 = $request->post('Students_Teacher_id');
        $id15 = $request->post('Students_Class_id');


        $sql = "INSERT INTO books
(is_nugas, is_ngaji, is_doabanguntidur, is_doabelumtidur, book_content, is_subuh, is_dzuhur, is_azhar, is_maghrib, is_isya, `date`, bookisreviewed, Surah_id, Students_id, Students_Teacher_id, Students_Class_id)
VALUES($id1, $id2, $id3, $id4, '$id5', $id6, $id7, $id8, $id9, $id10, current_timestamp(1),$id11 , $id12, $id13, $id14, $id15);
";
        $books = DB::select($sql);

        //$books = Books::create($request->all());
        return response(['data' => new BooksResource($books), 'message' => "Books has been created!"], 201);

    }

}
