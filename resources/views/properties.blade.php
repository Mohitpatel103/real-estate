@extends('layouts.base')

@section('content')
    <div class="title m-b-md">
        <h1 class="c-title c-title--h1">Properties</h1>
    </div>
    <div class="c-grid">
        <aside class="c-grid__left">
            @include('partials.filters')
        </aside>
        <aside class="c-grid__right">
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
                            <li>Agent: {{ $properties->agentname }}</li>
                            <li>Property Type: {{ $properties->ptype }}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </section>
            {{ $propertiesdata->render() }}

        </aside>
    </div>
@endsection

@push('css')
    <style>
        .c-grid {
            display: grid;
            grid-template-columns: 30% 70%;
        }
        .c-grid__left {
            background-color: rgba(40, 40, 40, 0.1);
            height: 100vh;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
