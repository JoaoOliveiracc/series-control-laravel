<x-layout title="Adicionar Série">
  <form action="{{route('series.store')}}" method="POST">
    @csrf
    

    <div class="row mb-3">
      <div class="col-8">
        <label for="name" class="form-label">Nome:</label>
        <input
          value="{{old('name')}}"
          type="text"
          id="name"
          name="name"
          class="form-control"
          autofocus
        >
      </div>

      <div class="col-2">
        <label for="numberOfSeasons" class="form-label">Nº Temporadas:</label>
        <input
          id="numberOfSeasons"
          name="numberOfSeasons"
          class="form-control"
          value="{{old('numberOfSeasons')}}"
          type="text"
        >
      </div>

      <div class="col-2">
        <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
        <input
          value="{{old('episodesPerSeason')}}"
          type="text"
          id="episodesPerSeason"
          name="episodesPerSeason"
          class="form-control"
        >
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
  </form>
</x-layout>