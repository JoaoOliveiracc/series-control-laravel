<x-layout>
  <form action="/series/save" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nome:</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
  </form>
</x-layout>