<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2" style="padding-top: 20px !important; padding-bottom: 20px !important;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                    @if(!empty($breadcrumbs))
                        @foreach($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{route('client.category', $breadcrumb->slug)}}">
                                    {{$breadcrumb->name}}
                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{route('client.category', $category->slug)}}">
                            {{$category->name}}
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
