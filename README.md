# BukuQue_API

BukuQue_API adalah Api Yang digunakan aplikasi yang sama yaitu BukuQue https://github.com/yahyarzq/BukuQue Dan mengunakan Laravel 8 sebagai Framework nya
Untuk database sendiri mengunakan RDBMS MariaDB.

# Endpoint

Teacher Endpoint
----------------
   Endpoint 1

    http://127.0.0.1:8000/api/teacher/login
     
   Output
     
    {
        "status": true,
        "teacher_id": [
            {
                "id": 5,
                "name": "Siti"
            }
        ],
        "message": "User Found!"
    }
    
    
   Endpoint 2

    http://127.0.0.1:8000/api/teacher/teacherData
     
   Output
     
    {
    "teacher_data1": [
        {
            "total_class": 1
        }
    ],
    "teacher_data2": [
        {
            "total_books_unreviewed": 2
        }
    ],
    "message": "Retrieved successfully"
    }
    
    Endpoint 2

    http://127.0.0.1:8000/api/teacher/teacherClassList
     
   Output
     
    {
        "status": true,
        "teacher_id": [
            {
                "id": 5,
                "name": "Siti"
            }
        ],
        "message": "User Found!"
    }
    
    
   Endpoint 3

    http://127.0.0.1:8000/api/teacher/teacherClassStudentList
     
   Output
     
    {
    "data": [
        {
            "id": 4,
            "class_name": "Kelas D"
        }
    ],
    "message": "Retrieved successfully"
   }
    
    
   Endpoint 4

    http://127.0.0.1:8000/api/teacher/teacherClassStudentDataList
     
   Output
     
    {
    "data": [
        {
            "book_id": 1,
            "is_nugas": 1,
            "is_ngaji": 1,
            "is_doabanguntidur": 1,
            "is_doabelumtidur": 1,
            "book_content": "Saya Baca Buku surat",
            "is_subuh": 1,
            "is_dzuhur": 1,
            "is_azhar": 1,
            "is_maghrib": 1,
            "is_isya": 1,
            "date": "2021-06-19 18:13:29.0",
            "Surah_id": 4,
            "Students_id": 4,
            "Students_Teacher_id": 4,
            "Students_Class_id": 4
        }
    ],
    "message": "Retrieved successfully"
    }}
    
    
Student Endpoint
----------------
    
   Endpoint 5

    http://127.0.0.1:8000/api/students/login
     
   Output
     
    {
    "status": true,
    "students_id": [
        {
            "id": 6,
            "name": "adi",
            "student_class_id": 5,
            "student_teacher_id": 5
        }
    ],
    "message": "User Found!"
    }
    
    
    
   Endpoint 6

    http://127.0.0.1:8000/api/students/studentsData
     
   Output
     
    {
    "students_data1": [
        {
            "total_books": 0
        }
    ],
    "students_data2": [
        {
            "total_class_members": 2
        }
    ],
    "message": "Retrieved successfully"
    }
    
    
    
   Endpoint 7

    http://127.0.0.1:8000/api/books/studentsBooksSubmit
     
   Output
     
    {
    "data": [],
    "message": "Books has been created!"
    }
    
    
  
