<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function movies($idModules)
    {   
        $course = Courses::where('status',1)->where('id', $idModules)->get()->last();
        // var_dump($course->movies);exit;
        return view('modules.movie.manager',['course' => $course]);
    }

    public function moviesForm($idModules)
    {
        return view('modules.movie.new', ['id_course' => $idModules]);
    }

    public function moviesCreate(Request $request, $idModules)
    {
        $payload = $request->all();
        $movies = new Movies();
        $movies->create([
            'name' => $payload['name'],
            'description' => $payload['desc'],
            'summary' => $payload['summary'],
            'ordination' => $payload['ordination'],
            'id_course' => $idModules,
            'thumbnail' => 'URL_thumbnail',
        ]);

        return redirect()->route('movies', $idModules);
    }

    public function moviesEditForm($idModules, $id)
    {
        $movie = Movies::where('status', 1)->where('id', $id)->get()->last();
        return view('modules.movie.edit',['movie' => $movie]);
    }

    public function moviesEdit(Request $request, $idModules, $id)
    {
        $payload = $request->all();
        $movies = Movies::where('status', 1)->where('id', $id)->get()->last();
        $movies->update([
            'name' => $payload['name'],
            'description' => $payload['desc'],
            'summary' => $payload['summary'],
            'ordination' => $payload['ordination'],
            'id_course' => $idModules,
            'thumbnail' => 'URL_thumbnail',
        ]);

        return redirect()->route('movies',[$idModules]);
    }

    public function moviesOpen($idModules, $id)
    {
        var_dump('open movie');
    }

    public function moviesOpenAdmin($idModules, $id)
    {
        var_dump('open movie admin');
    }

    public function moviesDelete($idModules, $id)
    {
        $movies = Movies::where('id', $id)->get()->last();

        $movies->update([
            'status' => 0
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Video Excluido com sucesso!'
        ]);
    }

}
