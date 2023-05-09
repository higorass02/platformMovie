<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModulesRequest;
use App\Models\Courses;
use Illuminate\Support\Facades\Response;

class ConfigController extends Controller
{
    public function course()
    {
        $courses = Courses::select('id', 'name', 'description', 'created_at', 'updated_at')->where('status',1)->get()->all();
        return view('modules.manager',['courses' => $courses]);
    }
    
    public function courseForm()
    {
        return view('modules.new');
    }

    public function courseCreate(ModulesRequest $request)
    {

        $payload = $request->all();

        $courses = new Courses();
        $courses->create([
            'name' => $payload['name'],
            'description' => $payload['desc'],
            'thumbnail' => 'URL_thumbnail',
        ]);

        return redirect()->route('course');
    }

    public function courseEdit($id)
    {
        $course = Courses::select('id', 'name', 'description', 'created_at', 'updated_at')->where('id', $id)->get()->last();
        //validate if exists
        return view('modules.update',[ 'course' => $course ]);
    }

    public function courseUpdate(ModulesRequest $request, $id)
    {
        $payload = $request->all();

        $course = Courses::where('id', $id)->get()->last();
        $course->update([
            'name' => $payload['name'],
            'description' => $payload['desc'],
            'thumbnail' => 'URL_thumbnail',
        ]);

        return redirect()->route('course');
    }

    public function courseDelete($id)
    {
        $course = Courses::where('id', $id)->get()->last();

        $course->update([
            'status' => 0
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Curso Excluido com sucesso!'
        ]);
    }
}
