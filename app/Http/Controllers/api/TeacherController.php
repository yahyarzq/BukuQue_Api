<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teacher = Teacher::all();
        return response([
            'total' => $teacher->count(),
            'messages' => 'Retrieved successfuly',
            'data' => TeacherResource::collection($teacher)
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
        return view('teacher.create');
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
        $teacher = Teacher::create($request->all());
        return response(['data' => new TeacherResource($teacher), 'message' => "Teacher has been created!"], 201);
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
        $teacher = Teacher::find($id);
        if ($teacher != null) {
            return response(['data' => new TeacherResource($teacher), 'message' => 'Retrieved successfully'], 200);
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
        $teacher = Teacher::findOrFail($id);
        return view('teacher.edit', compact('teacher'));
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
        $teacher = Teacher::find($id);
        if ($teacher != null) {
            $teacher->update($request->all());
            return response(['data' => new TeacherResource($teacher), 'message' => 'Teacher has been updated!'], 202);
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
        $teacher = Teacher::find($id);
        if ($teacher != null) {
            $teacher->delete();
            return response(['message' => 'Teacher has been deleted!']);
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
    public function teacherLogin(Request $request)
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
        $sql = "SELECT id, name FROM teacher WHERE username = '$username' AND password = '$password' ";
        $teacher = DB::select($sql);

        //$teachers = Teacher::find($username);
        if ($teacher  != null) {
            return response(['status' => true ,'teacher_id' => new TeacherResource($teacher) , 'message' => 'User Found!'], 200);
        } else {
            return response(['status' => false , 'message' => 'User Not Found! '], 200);
        }

        /**ff 
        $sql = "SELECT username, password FROM teacher WHERE username = 'siti' and password = 'siti123' ";
        $students = DB::select($sql);
        $students = Students::find($id);
        if ($students != null) {
            return response(['project' => new StudentsResource($students), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
         */
    }

    public function teacherData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $id = $request->post('teacher_id');
        $sql1 = "SELECT COUNT(class.id) AS total_class FROM teacher JOIN class ON teacher.id = class.id WHERE teacher.id = '$id' ";
        $teacher1 = DB::select($sql1);

        $sql2 = "SELECT COUNT(books.id) AS  total_books_unreviewed
        FROM teacher
        join students ON students.Teacher_id = teacher.id
        join books ON books.Students_id = students.id
        WHERE books.bookisreviewed = 0 AND books.Students_Teacher_id = '$id'";
        $teacher2 = DB::select($sql2);


        if (($teacher1 != null) || ($teacher1 != null)) {
            return response(['teacher_data1' => new TeacherResource($teacher1), 'teacher_data2' => new TeacherResource($teacher2), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function teacherClassList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $id1 = $request->post('teacher_id');

        $sql = "SELECT class.id, class.class_name
        FROM class 
        JOIN teacher ON teacher.Class_id = class.id
        WHERE teacher.id= '$id1'";
        $teacher = DB::select($sql);
        if ($teacher != null) {
            return response(['data' => new TeacherResource($teacher), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    

    public function teacherClassStudentList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
            'class_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $tid1 = $request->post('teacher_id');
        $cid1 = $request->post('class_id');
        $sql = "SELECT students.id as students_id , students.name as students_name, students.number AS students_number ,books.id as book_id, books.date as date_submitted
        FROM books 
        JOIN students ON students.id = books.Students_id
        WHERE books.bookisreviewed = 0 AND Students_Teacher_id = '$tid1' AND Students_Class_id = '$cid1' ";
        $teacher = DB::select($sql);
        if ($teacher != null) {
            return response(['data' => new TeacherResource($teacher), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function teacherClassStudentDataList(Request $request)
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
        $tid1 = $request->post('teacher_id');
        $tid2 = $request->post('teacher_name');
        $cid1 = $request->post('class_id');
        $cid2 = $request->post('class_name');
        $sid = $request->post('students_id');
        $sql = "SELECT id as book_id ,is_nugas, is_ngaji, is_doabanguntidur, is_doabelumtidur, book_content, is_subuh, is_dzuhur, is_azhar, is_maghrib, is_isya, `date`, Surah_id, Students_id, Students_Teacher_id, Students_Class_id
        FROM books
        WHERE books.Students_Teacher_id = '$tid1' AND books.Students_Class_id = '$cid1' AND books.Students_id = '$sid' AND books.id";
        $teacher = DB::select($sql);
        if ($teacher != null) {
            return response(['data' => new TeacherResource($teacher), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }




























































    public function teacherClassDayDateStudentList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
            'teacher_name' => 'required',
            'class_name' => 'required',
            'class_id' => 'required',
            'date' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $tid1 = $request->post('teacher_id');
        $tid2 = $request->post('teacher_name');
        $cid1 = $request->post('class_id');
        $cid2 = $request->post('class_name');
        $date = $request->post('date');
        $sql = "SELECT students.id,students.name
        FROM students 
        JOIN books ON books.Students_id = students.id
        WHERE books.Students_Teacher_id = '$tid1' AND books.Students_Class_id = '$cid1' AND books.date = '$date'
        GROUP BY DATE($date)";
        $teacher = DB::select($sql);
        if ($teacher != null) {
            return response(['data' => new TeacherResource($teacher), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }



  
}
