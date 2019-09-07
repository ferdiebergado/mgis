@extends('layouts.app')

@section('cardtitle')

Region
<span>
    <a class="btn btn-light float-right" href="{{ route('regions.index') }}" role="button">List</a>
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
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" placeholder="Name of the region" value="{{ old('name', optional($region)->name) }}" required>
      @error('name')
      <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
      @enderror
    </div>
    </div>
</div>

<div class="form-row">
    <div class="col-4">
        <div class="form-group">
            <label for="sequence">Sequence</label>
            <input type="number" class="form-control {{ $errors->has('sequence') ? 'is-invalid' : '' }}" name="sequence" id="sequence" aria-describedby="sequenceHelp" placeholder="Sequence number" value="{{ old('sequence', optional($region)->sequence) }}" required>
            @error('sequence')
            <small id="sequenceHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-4">
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
    <div class="col-4">
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="active" id="active" value="false"> Active
            </label>
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

