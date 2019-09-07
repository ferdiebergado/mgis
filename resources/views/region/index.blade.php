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
        @render(\App\Http\ViewComponents\RegionsComponent::class)
    </div>
</div>

@endsection

@push('scripts')

<script>
    function confirmDelete(id) {

        if (confirm('Are you sure?')) {
            // Post the form
            var frm = document.getElementById('frmDelete[' + id + ']');
            frm.submit(); // Post the surrounding form
        }
    }

</script>

@endpush
