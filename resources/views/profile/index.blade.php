@extends('layouts.profile')
@section('content')
<h3>Hello {{ auth()->user()->name }}</h3>
@endsection
