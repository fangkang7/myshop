@if(count($errors)>0)
    <div class="mark">
        @if(is_object($errors))
            @foreach($errors->all() as $error)
                <p>{!! $error !!}</p>
            @endforeach
        @else
            <p>{!! $error !!}</p>
        @endif
    </div>
@endif