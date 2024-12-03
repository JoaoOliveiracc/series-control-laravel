@component('mail::message')

  # {{ $seriesName }} criada
  
  A série {{ $seriesName }} com {{ $numberOfSeasons }} temporadas e {{ $episodesPerSeason }} episódios.
  
  Acesse aqui:

  @component('mail::button', ['url' => route('seasons.index', $seriesId)])
    Ver série
  @endcomponent
@endcomponent