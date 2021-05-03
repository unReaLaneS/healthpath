<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Practice;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::paginate(2);
        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    public function show($employee){
        $employee = Employee::findOrFail($employee);
        return view(
            'employees.show',
            [
                'employee' => $employee,
            ]);
    }

    public function create(){
        $practices = Practice::all();

        return view('employees.create',
        [
            'practices' => $practices
        ]);
    }

    public function store(){
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'phone' => 'min:11|numeric',
            'practice' => 'required|numeric'
        ]);

        $practice = Practice::findOrFail($data['practice']);

        $employee = $practice->employees()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        return redirect('employees/' . $employee->id);
    }

    public function edit($employee){
        $employee = Employee::findOrFail($employee);
        $practices = Practice::all();
        return view('employees.edit',[
            'employee' => $employee,
            'practices' => $practices,
        ]);
    }

    public function update($employee){
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'phone' => 'min:11|numeric',
            'practice' => 'required|numeric'
        ]);

        $employee = Employee::where('id', $employee)->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'practice_id' => $data['practice'],
        ]);

        return redirect('employees/' . $employee);
    }

    public function destroy($employee){
        Employee::destroy($employee);

        return redirect('employees');
    }
}
