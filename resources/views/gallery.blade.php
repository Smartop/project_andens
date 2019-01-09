@extends('layouts.app')

@section('content')
<h2>Latest photoes</h2>
<div class="col-4">
    {{-- asset('storage/img/'. --}}
    <div class="infinite-scroll">
        @foreach ($photos as $photo)
        <a href="/photo/{{ $photo->id }}">
            <img src="{!! $photo->file_name  !!}" 
                alt="{{ $photo->title }}" 
                width="400px" height="200px">
        </a>
        <p>{{ $photo->star_count }}</p>
        @endforeach
        {{ $photos->links() }}
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function () {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function () {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@stop
