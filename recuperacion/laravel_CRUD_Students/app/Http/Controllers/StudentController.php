<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargamos array de estudiantes con Elocuent
        $studens = Student::all()->sortBy('id');

        // Vista Main de estudientes -> Cargamos el array en la vista
        return view('student.home', ['students' => $studens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra la vista de Nuevo Alumno

        // Obtengo los cursos de la tabla ordenados por course
        $cursos = Course::all()->sortBy('course');

        // LLamo a la vista y le paso los cursos
        return view('student.create', ['cursos' => $cursos]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Comprobamos que el formulario manda bien la información
        // Este metodo para la ejecucion y muestra los datos en pantalla
        // dd($request);

        // Con los datos del formulario creamos un objeto de la clase Student
        // Validamos los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:35',
            'lastname' => 'required|string|max:45',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:13',
            'city' => 'required|string|max:40',
            'dni' => 'required|string|max:9|unique:students,dni',
            'email' => 'required|email|max:40|unique:students,email',
            'course_id' => 'required|integer|exists:courses,id',
        ]);

        // Con los datos validados, creamos un objeto de la clase Student
        $alumno = Student::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'birt_date' => $validatedData['birth_date'],
            'phone' => $validatedData['phone'],
            'city' => $validatedData['city'],
            'dni' => $validatedData['dni'],
            'email' => $validatedData['email'],
            'course_id' => $validatedData['course_id'],
        ]);

        // Insertamos el registro en la tabla
        $alumno->save();

        return redirect()->route('students.index')->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
