<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Practice;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PracticesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $practices = Practice::paginate(2);
        return view('practices.index', [
            'practices' => $practices,
        ]);
    }

    public function show($practice){
        $practice = Practice::findOrFail($practice);

        return view(
            'practices.show',
            [
                'practice' => $practice,
            ]);
    }

    public function create(){
        return view('practices.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => ['image','dimensions:min_width=100,min_height=100'],
            'website_url' => 'url',
        ]);

        $image_path = request('logo')->store('logos', 'public');

        $practice = Practice::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $image_path,
            'website_url' => $data['website_url'],
        ]);

        return redirect('practices/' . $practice->id);
    }

    public function edit($practice){
        $practice = Practice::findOrFail($practice);
        return view('practices.edit',[
            'practice' => $practice,
        ]);
    }

    public function update($practice){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => ['image','dimensions:min_width=100,min_height=100'],
            'website_url' => '',
        ]);

        if (request('logo')) {
            $image_path = request('logo')->store('logos', 'public');
            $imageArray = ['logo' => $image_path];
        }

        Practice::where('id', $practice)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('practices/');
    }

    public function destroy($practice){
        Practice::destroy($practice);

        return redirect('practices');
    }

    public function public(){
        $practices = Practice::all();
        return response()
            ->json($practices);
    }
}
