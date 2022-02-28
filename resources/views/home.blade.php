@extends('layouts.base')

@section('content')
    <div class="title m-b-md">
        <h1 class="c-title c-title--h1">PHP Senior Level Test</h1>
    </div>
    <div>
        <h2 class="c-title c-title--h2">Properties</h2>

        <section class="c-properties-grid__wrapper">
            <div class="c-properties-grid">
                @foreach($propertiesdata as $properties)
                <div class="c-properties-grid__item">
                    <h3 class="c-properties-grid-item__title">{{$properties->title }}</h3>
                    <p>{{ $properties->description }}</p>
                    <ul class="c-properties-grid-item__list">
                        <li>Price: {{ $properties->price }}€</li>
                        <li>Location: {{ $properties->locName }}</li>
                        <li>Rooms: {{ $properties->bedrooms }}</li>
                        <li>Bathrooms: {{ $properties->bathrooms }}</li>
                        <li>Built Area: {{ $properties->built_area }} m2</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </section>

    </div>
@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
