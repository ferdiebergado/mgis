@extends('layouts.app')

@section('cardtitle')
Region
<span class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
    <a class="btn btn-light" href="{{ route('regions.index') }}" role="button" title="List"><span class="mdi mdi-format-list-bulleted-square"></span></a>
    @unless (Route::is('*.create'))
        <a class="btn btn-light" href="{{ route('regions.create') }}" role="button" title="Create New"><span class="mdi mdi-pencil-plus"></span></a>
    @endunless
</span>

@endsection

@section('content')

<form action="{{ route('regions.'.$action, ['region' => $region->id]) }}" method="POST">
    @csrf
    @if (Route::is('*.edit'))
        @method('PUT')
    @endif
  <div class="form-row">
      <div class="col">
          <div class="form-group">
              <label>ID
                  <span class="badge badge-info">{{ (Route::is('*.create')) ? '(New)' : old('id', optional($region)->id) }}</span></label>
                </div>
            </div>
  </div>
    <div class="form-row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" placeholder="Name of the region" value="{{ old('name', optional($region)->name) }}" required>
      @error('name')
      <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
      @enderror
    </div>
    </div>
</div>

<div class="form-row">
    <div class="col-3">
        <div class="form-group">
            <label for="sequence">Sequence</label>
            <input type="number" class="form-control {{ $errors->has('sequence') ? 'is-invalid' : '' }}" name="sequence" id="sequence" aria-describedby="sequenceHelp" placeholder="Sequence number" value="{{ old('sequence', optional($region)->sequence) }}" min="1" required>
            @error('sequence')
            <small id="sequenceHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
          <label for="area">Area</label>
          <select class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area" id="area">
              @php
                  $area = old('area', optional($region)->area)
              @endphp
              <option value="">Select an area...</option>
            <option value="L" {{ ($area == 'L') ? 'selected' : '' }}>Luzon</option>
            <option value="V" {{ ($area == 'V') ? 'selected' : '' }}>Visayas</option>
            <option value="M" {{ ($area == 'M') ? 'selected' : '' }}>Mindanao</option>
          </select>
            @error('area')
            <small id="areaHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="form-row mb-3">
    <div class="col">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="active" name="active" {{ old('active', optional($region)->active) ? 'checked' : '' }}>
            <label class="custom-control-label" for="active">Active</label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-12">
        @include('button')
    </div>
</div>

</form>
@endsection

