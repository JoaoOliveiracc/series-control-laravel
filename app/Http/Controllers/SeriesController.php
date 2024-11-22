<?php
namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $series = Serie::query()->orderBy('name')->get();
    $msgSuccess = session('mensagem.sucesso');
    $request->session()->forget('mensagem.sucesso');
    
    return view('series.index')->with('series', $series)->with('msgSuccess', $msgSuccess);
  }

  public function create()
  {
    return view('series.create');
  }

  public function store(Request $request)
  {
    $serie = Serie::create($request->all());
    
    return to_route('series.index')->with(['mensagem.sucesso' => "Série '{$serie->name}' adicionada com sucesso"]);
  }

  public function destroy(Serie $series) {
    $series->delete();

    return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso");
  }

}
