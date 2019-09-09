@extends('layouts.app')

@section('cardtitle')
Regions
<span>
    <a class="btn btn-success float-right" href="{{ route('regions.create') }}" role="button">CREATE NEW</a>
</span>
@endsection

@section('content')

<div class="row">
    <div class="col">
        {{-- @render(\App\Http\ViewComponents\RegionsComponent::class) --}}
        <regions-data-table url="{{ route('regions.index') }}"></regions-data-table>
    </div>
</div>

@endsection
