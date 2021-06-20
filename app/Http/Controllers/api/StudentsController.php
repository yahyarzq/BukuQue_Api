<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentsResource;
use App\Models\Students;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Students::all();
        return response([
            'total' => $students->count(),
            'messages' => 'Retrieved successfuly',
            'data' => StudentsResource::collection($students)
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
        return view('students.create');
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
        $students = Students::create($request->all());
        return response(['data' => new StudentsResource($students), 'message' => "Students has been created!"], 201);

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
        $students = Students::find($id);
        if ($students != null) {
            return response(['project' => new StudentsResource($students), 'message' => 'Retrieved successfully'], 200);
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
        $students = Students::findOrFail($id);
        return view('students.edit', compact('students'));
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
        $students = Students::find($id);
        if ($students != null) {
            $students->update($request->all());
            return response(['data' => new StudentsResource($students), 'message' => 'Students has been updated!'], 202);
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
        $students = Students::find($id);
        if ($students != null) {
            $students->delete();
            return response(['message' => 'Students has been deleted!']);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentsLogin(Request $request)
    {

        //
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $username = $request->post('username');
        $password = $request->post('password');
        $sql = "SELECT id, name , Class_id as 'student_class_id' ,Teacher_id as 'student_teacher_id' FROM students WHERE username = '$username' AND password = '$password' ";
        $students = DB::select($sql);

        if ($students  != null) {
            return response(['status' => true ,'students_id' => new StudentsResource($students) , 'message' => 'User Found!'], 200);
        } else {
            return response(['status' => false , 'message' => 'User Not Found! '], 200);
        }


    }


    public function studentsData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'students_id' => 'required',
            'class_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $id = $request->post('students_id');
        $id2 = $request->post('class_id');
        $sql1 = "SELECT count(books.id) AS total_books
        FROM students 
        JOIN books ON books.Students_id = students.id
        WHERE books.Students_id = '$id'";
        $students1 = DB::select($sql1);

        $sql2 = "SELECT COUNT(students.id) AS total_class_members
        FROM students 
        WHERE students.Class_id = '$id2'";
        $students2 = DB::select($sql2);


        if (($students1 != null) || ($students2 != null)) {
            return response(['students_data1' => new StudentsResource($students1), 'students_data2' => new StudentsResource($students2), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }
    









    public function studentsDataSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
            'class_id' => 'required',
            'students_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }

        $students = Students::create($request->all());
        $tid1 = $request->post('teacher_id');
        $tid2 = $request->post('teacher_name');
        $cid1 = $request->post('class_id');
        $cid2 = $request->post('class_name');
        $sid = $request->post('students_id');
        $sql = "SELECT id as book_id ,is_nugas, is_ngaji, is_doabanguntidur, is_doabelumtidur, book_content, is_subuh, is_dzuhur, is_azhar, is_maghrib, is_isya, `date`, Surah_id, Students_id, Students_Teacher_id, Students_Class_id
        FROM books
        WHERE books.Students_Teacher_id = '$tid1' AND books.Students_Class_id = '$cid1' AND books.Students_id = '$sid' AND books.id";
        $teacher = DB::select($sql);

        return response(['data' => new StudentsResource($students), 'message' => "Students has been created!"], 201);
    }









}
