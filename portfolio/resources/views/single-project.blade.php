@extends('layouts.master')

@section('title', $project->localization->name)
@section('meta-description', $project->localization->description)

@section('content')
    <main class="main single">
        <div class="section fullpage">
            <div class="section__body">
                @include('layouts.project')
            </div>
        </div>
    </main>
@endsection
