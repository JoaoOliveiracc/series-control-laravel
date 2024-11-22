<form action="{{ $action }}" method="POST">
  @csrf
  
  @if($update)
    @method('PUT')
  @endif
  <div class="mb-3">
    <label for="name" class="form-label">Nome:</label>
    <input
      @isset($name)
        value="{{$name}}"
      @endisset
      type="text"
      id="name"
      name="name"
      class="form-control"
    >
  </div>
  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>