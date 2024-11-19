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
    Serie::create($request->all());
    return redirect('/series');
  }
}
