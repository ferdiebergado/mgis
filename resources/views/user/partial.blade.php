@extends('layouts.app')

@section('cardtitle')
User Profile
<span class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
    <a class="btn btn-light" href="{{ route('users.index') }}" role="button" title="List"><span class="mdi mdi-format-list-bulleted-square"></span></a>
    @unless (Route::is('*.create'))
        <a class="btn btn-light" href="{{ route('users.create') }}" role="button" title="Create New"><span class="mdi mdi-pencil-plus"></span></a>
    @endunless
</span>

@endsection

@section('content')

<form action="{{ route('users.'.$action, ['user' => $user->id]) }}" method="POST">
    @csrf
    @if (Route::is('*.edit'))
        @method('PUT')
    @endif
  <div class="form-row">
      <div class="col">
          <div class="form-group">
              <label>ID
                  <span class="badge badge-info">{{ (Route::is('*.create')) ? '(New)' : old('id', optional($user)->id) }}</span></label>
                </div>
            </div>
  </div>
    <div class="form-row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" placeholder="Name of the user" value="{{ old('name', optional($user)->name) }}" required>
      @error('name')
      <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
      @enderror
    </div>
    </div>
</div>

<div class="form-row">
    <div class="col-3">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" aria-describedby="sequenceHelp" placeholder="Email" value="{{ old('email', optiona`l($user)->email) }}" required>
            @error('email')
            <small id="sequenceHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
          <label for="role">role</label>
          <select class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role" id="role">
              @php
                  $role = old('role', optional($user)->role)
              @endphp
              <option value="">Select an role...</option>
            <option value="L" {{ ($role == 'L') ? 'selected' : '' }}>Luzon</option>
            <option value="V" {{ ($role == 'V') ? 'selected' : '' }}>Visayas</option>
            <option value="M" {{ ($role == 'M') ? 'selected' : '' }}>Mindanao</option>
          </select>
            @error('role')
            <small id="areaHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="form-row mb-3">
    <div class="col">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="active" name="active" {{ old('active', optional($user)->active) ? 'checked' : '' }}>
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
