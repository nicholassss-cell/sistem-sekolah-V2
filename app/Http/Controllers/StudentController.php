<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
 
class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Dafta    r Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'Andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'
            ],
            
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi',
                'class' => 'XII AKL 3',
                'major' => 'AKL'
            ],
        ];
        return view('students.index', [
        'title' => $title,
        'students' => $students
        ]);
    }
    public function show(string $id)
    {
        return view('students.show');
    }
 
    public function create(){
        return view('students.create');  
    }
 
    public function edit(string $id){
        $title = "Sistem Sekolah - Edit Siswa";
        return view('students.edit');
    }
   
    public function store(){
        return"Melakukan penambahan data student baru";
    }
 
    public function update(string $id){
        return"Mengubah data student dengan ID: {$id}";
    }
 
    public function destroy(string $id){
        return"Menghapus data student dengan ID: {$id}";
    }
}
 
 