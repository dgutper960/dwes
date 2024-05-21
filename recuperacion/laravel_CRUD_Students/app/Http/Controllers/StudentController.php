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
        // Cargamos los datos en la vista y redirigimos

        // Cargamos el alumno
        $student = Student::find($id);

        // Cargamos la vista con los datos
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostramos la vista de editar con los datos del alumno

        // Cargamos el alumno
        $student = Student::find($id);
        // Cargamos los cursos para la lista desplegable
        $cursos = Course::all()->sortBy('course'); // orden alfabetico

        // Cargamos la vista con los datos
        return view('student.edit', ['student' => $student, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validación
        // Con los datos del formulario creamos un objeto de la clase Student
        // Validamos los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:35'],
            'lastname' => ['required', 'string', 'max:45'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:13'],
            'city' => ['required', 'string', 'max:40'],
            'dni' => ['required', 'string', 'max:9', Rule::unique('students')->ignore($id)],
            'email' => ['required', 'email', 'max:40', Rule::unique('students')->ignore($id)],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
        ]);


        // Cargamos de la table el objeto original de este alumno
        $student = Student::find($id);

        // Actualizamos con los datos del formulario
        $student->name = $request['name'];
        $student->lastname = $request['lastname'];
        $student->birt_date = $request['birth_date'];
        $student->phone = $request['phone'];
        $student->city = $request['city'];
        $student->dni = $request['dni'];
        $student->email = $request['email'];
        $student->course_id = $request['course_id'];

        // Actualizamos en la base de datos
        $student->save();

        // Redirecciono a la vista principal
        return redirect()->route('students.index')->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELiminar alumno
        Student::destroy($id);

        // Redireccion
        return redirect()->route('students.index')->with('success', 'Alumno eliminado correctamente');

    }
}
