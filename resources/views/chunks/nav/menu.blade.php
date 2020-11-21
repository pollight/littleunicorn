<ul class="catalog-menu">
    @foreach( App\Models\Category::CategoryFilter()
        ->with('childrenCategories')
        ->get() as $category )
        @if($category->name != 'Группы')
        <li class="with-submenu">
            <a href="{{ route('category',[$category->slug]) }}">{{ $category->name }}</a>
            <ul class="catalog-submenu">
            @foreach ($category->childrenCategories as $childCategory)
                @include('chunks.nav.sub_menu', [
                'child_category' => $childCategory,
                    'category' => $category
                    ])
            @endforeach
            </ul>
        </li>
        @endif
    @endforeach
</ul>




{{--<ul class="catalog-menu">--}}
{{--    @foreach( App\Models\Category::category()->get() as $category )--}}
{{--        <li class="with-submenu">--}}
{{--            <a  href="{{ route('category') }}">{{ $category->name }}</a>--}}
{{--            @if(count($category->categories))--}}
{{--                <ul class="catalog-submenu">--}}
{{--                    @foreach($category->categories as $child)--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('category') }}">{{ $child->name }}</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            @endif--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}