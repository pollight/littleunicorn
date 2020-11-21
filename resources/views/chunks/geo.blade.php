    <ul>
        @foreach($cities as $city)
            <li city_id="{{ $city->id }}" >{{ $city->name_ru }}</li>
        @endforeach
    </ul>
