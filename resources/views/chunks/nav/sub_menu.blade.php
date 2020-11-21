<li>
    <a href="{{ url('/').'/category/'.$category->slug.'/'.$child_category->slug }}">{{ $child_category->name }}</a>
</li>


{{--@if ($child_category->categories)--}}
{{--    @foreach($child_category->categories as $childCategory)--}}
{{--        @include('chunks.nav.sub_menu', ['child_category' => $childCategory])--}}
{{--    @endforeach--}}
{{--@endif--}}
