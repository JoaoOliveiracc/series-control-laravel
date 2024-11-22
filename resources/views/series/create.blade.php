<x-layout title="Adicionar Série">
  <x-series.form :action="route('series.store')" :name="old('name')" :update="false"/>
</x-layout>