<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FieldsOfPractice;
use App\Models\Practice;
use App\Models\Practices_FieldsOfPractices;
use Illuminate\Http\Request;

class FieldsOfPracticesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $fields_of_practices = FieldsOfPractice::paginate(2);
        return view('fields_of_practices.index', [
            'fields_of_practices' => $fields_of_practices,
        ]);
    }

    public function show($fields_of_practice){
        $fields_of_practice = FieldsOfPractice::findOrFail($fields_of_practice);
        return view(
            'fields_of_practices.show',
            [
                'fields_of_practice' => $fields_of_practice,
            ]);
    }

    public function create(){
        $fields_of_practices = FieldsOfPractice::all();
        $practices = Practice::all();

        return view('fields_of_practices.create',
            [
                'fields_of_practices' => $fields_of_practices,
                'practices' => $practices
            ]);
    }

    public function store(){
        $data = request()->validate([
            'tag' => 'required',
            'name' => 'required',
            'practice' => 'required',
        ]);

        $tags = explode(" ", $data['tag']);


        $fields_of_practice = FieldsOfPractice::create(
        [
            'tags' => $tags,
            'name' => $data['name'],
        ]);

        Practices_FieldsOfPractices::create([
            'fields_of_practice_id' => $fields_of_practice->id,
            'practice_id' => $data['practice'],
        ]);

        return redirect('fields_of_practices/' . $fields_of_practice->id);
    }

    public function edit($fields_of_practice){
        $fields_of_practice = FieldsOfPractice::findOrFail($fields_of_practice);
        $practices = Practice::all();
        return view('fields_of_practices.edit',[
            'fields_of_practice' => $fields_of_practice,
            'practices' => $practices,
        ]);
    }

    public function update($fields_of_practice){
        $data = request()->validate([
            'tag' => 'required',
            'name' => 'required',
            'practice' => 'required',
        ]);

        $fields_of_practice = FieldsOfPractice::where('id', $fields_of_practice)->update([
            'name' => $data['name'],
        ]);

        $fields_of_practice->syncTags(explode(" ", $data['tag']));

        $fields_of_practice->practices()->update([
           'practice_id' => $data['practice']
        ]);

        return redirect('fields_of_practices/' . $fields_of_practice->id);
    }

    public function destroy($fields_of_practice){
        FieldsOfPractice::destroy($fields_of_practice);

        return redirect('fields_of_practices');
    }
}
