<?php
namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $series = Series::all();
    $msgSuccess = session('msg.success');
    $request->session()->forget('msg.success');
    
    return view('series.index')->with('series', $series)->with('msgSuccess', $msgSuccess);
  }

  public function create()
  {
    return view('series.create');
  }

  public function store(SeriesFormRequest $request)
  {
    $series = Series::create($request->all());
    $seasons = [];

    for ($i=1; $i <= $request->seasonsQty; $i++) { 
      $seasons[] = [
        'series_id' => $series->id,
        'number' => $i,
      ];
    }

    Season::insert($seasons);
    $episodes = [];

    foreach ($series->seasons as $season) {
      for ($j=1; $i <= $request->episodesPerSeason; $i++) { 
       $episodes[] = [
          'season_id' => $season->id,
          'number' => $j
        ];
      }
    }

    Episode::insert($episodes);
    
    return to_route('series.index')->with(['msg.success' => "Série '{$series->name}' adicionada com sucesso"]);
  }

  public function destroy(Series $series)
  {
    $series->delete();

    return to_route('series.index')->with('msg.success', "Série '{$series->name}' removida com sucesso");
  }

  public function edit(Series $series)
  {
    return view('series.edit')->with('series', $series);
  }

  public function update(Series $series, SeriesFormRequest $request)
  {
    $series->fill($request->all());
    $series->save();

    return to_route('series.index')->with('msg.success', "Série {$series->name} atualizada com sucesso");
  } 

}
