@extends('layouts.main')
@include('layouts.header')
{{--  @section('content')
<section class="gallery no-frame">
    <div class="infinite-scroll">
        @foreach ($photos as $photo)
        <div class="photo-block">
            <a href="/photo/{{ $photo->id }}">
                <img src="{!! $photo->file_name  !!}" 
                alt="{{ $photo->title }}" width="400px" height="200px">
            </a>
            <div class="actions">
                <div>
                    <p>{{ $photo->star_count }}</p>
                    <i class="fas fa-star"></i>
                </div>
                <div>
                    <p>{{ $photo->comment_count }}</p>
                    <a href="/photo/{{ $photo->id }}"><i class="fas fa-comment"></i></a>
                </div>
                @auth
                <div class="favor">
                    @if ( $photo->isFavorite($photo->id) == 0)
                    <i class="icon far fa-bookmark"></i>
                    <form action="/favorite" id="favorForm" method="POST">
                    @csrf
                        <input type="hidden" value="{{ $photo->id }}" name="photo_id">
                        <input type="hidden" value="1" name="favor">
                    </form>
                    @else
                    <i class="icon fas fa-bookmark"></i>
                    <form action="/favorite" id="favorForm" method="POST">
                    @csrf
                        <input type="hidden" value="{{ $photo->id }}" name="photo_id">
                        <input type="hidden" value="0" name="favor">
                    </form>
                    @endif
                </div>
                @endauth
            </div>
        </div>
        @endforeach
        {{ $photos->links() }}
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function () {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/img/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function () {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@stop  --}}


@section('gallery')

   <div id="vue">
        <infinite-loading></infinite-loading>
   </div>

@endsection
