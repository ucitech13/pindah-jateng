@extends('layouts.public')

@push('styles')
<link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">
@endpush

@section('hero')
    @include('landing.sections.hero')
@endsection

@section('content')
    @include('landing.sections.tentang')
    @include('landing.sections.riset')
    @include('landing.sections.inovasi-masyarakat')

    <hr class="hairline">

    @include('landing.sections.krenova')
    @include('landing.sections.pemerintahan')
    @include('landing.sections.informasi')
    @include('landing.sections.unggulan')
@endsection

@push('scripts')
<script src="{{ asset('assets/js/landing.js') }}"></script>
@endpush
