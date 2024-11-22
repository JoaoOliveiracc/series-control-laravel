<?php
namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $series = Serie::query()->orderBy('name')->get();
    $msgSuccess = session('msg.success');
    $request->session()->forget('msg.success');
    
    return view('series.index')->with('series', $series)->with('msgSuccess', $msgSuccess);
  }

  public function create()
  {
    return view('series.create');
  }

  public function store(Request $request)
  {

    $request->validate([
      'name' => ['required', 'min:3']
    ]);

    $series = Serie::create($request->all());
    
    return to_route('series.index')->with(['msg.success' => "Série '{$series->name}' adicionada com sucesso"]);
  }

  public function destroy(Serie $series)
  {
    $series->delete();

    return to_route('series.index')->with('msg.success', "Série '{$series->name}' removida com sucesso");
  }

  public function edit(Serie $series)
  {
    return view('series.edit')->with('series', $series);
  }

  public function update(Serie $series, Request $request)
  {
    $series->fill($request->all());
    $series->save();

    return to_route('series.index')->with('msg.success', "Série {$series->name} atualizada com sucesso");
  } 

}
