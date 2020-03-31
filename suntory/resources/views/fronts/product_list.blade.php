@extends('layouts/nav')
@csrf

@section('css')

@endsection


@section('content')
<checkout-area></checkout-area>
@endsection


@section('js')
{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@endsection
