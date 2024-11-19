<?php
namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {

    $series = Serie::query()->orderBy('name');

    return view('series.index')->with('series', $series);
  }

  public function create()
  {
    return view('series.create');
  }

  public function store(Request $request)
  {
    $serieName = $request->input('name');
    $serie = new Serie();
    $serie->name = $serieName;
    $serie->save();

    return redirect('/series');
  }
}
