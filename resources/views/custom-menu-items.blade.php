@foreach($items as $item)
    <li @if($item->hasChildren()) @endif>
        <a  href="{!! $item->url() !!}">{!! $item->title !!} </a>
{{--        @if($item->hasChildren())--}}
{{--            <ul class="footer_item">--}}
{{--                @include('custom-menu-items', ['items' => $item->children()])--}}
{{--            </ul>--}}
{{--        @endif--}}
    </li>
@endforeach
