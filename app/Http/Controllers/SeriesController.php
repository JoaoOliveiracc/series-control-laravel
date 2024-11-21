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
    Serie::create($request->all());
    $request->session()->put(['mensagem.sucesso' => 'Série adicionada com sucesso']);
    
    return to_route('series.index');
  }

  public function destroy(Request $request) {
    Serie::destroy($request->series);
    $request->session()->put('mensagem.sucesso', 'Série removida com sucesso');
    return to_route('series.index');
  }

}
