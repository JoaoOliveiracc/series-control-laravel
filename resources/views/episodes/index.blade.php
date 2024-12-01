
<x-layout title="Episódios" :msg-success="$msgSuccess">
  <form method="post">
    @csrf
    <ul class="list-group">
      @foreach ($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{ $episode->number }}
          
            <input
              @if($episode->watched) checked @endif
              type="checkbox"
              name="episodes[]"
              value=""{{$episode->id}}
            >
        </li>
      @endforeach
    </ul>

    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
  </form>
</x-layout>