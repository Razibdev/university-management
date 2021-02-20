@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a href="#" aria-label="Previous">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        @else
            <li class="page-item "><a href="{{ $paginator->previousPageUrl() }}" rel="prev"> <i class="fa fa-angle-left"></i></a></li>
        @endif


            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="page-item disabled"><span>{{ $element }}</span></li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><a href="#" class="active" >{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next"  aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
            @else
                <li class="page-item disabled"> <a href="#" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                    </a></li>
            @endif


        {{--<li class="page-item"><a class="active" href="#">1</a></li>--}}
        {{--<li class="page-item"><a href="#">2</a></li>--}}
        {{--<li class="page-item"><a href="#">3</a></li>--}}
        {{--<li class="page-item">--}}
            {{--<a href="#" aria-label="Next">--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
    @endif
