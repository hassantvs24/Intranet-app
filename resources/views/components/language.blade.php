    <div class="row">
        <ul class="navbar-nav ml-auto">
            @foreach ( config('app.languages' ) as $locale )
                <li class="nav-item">
{{-- {{ dd(Route::currentRouteName()) }} --}}
{{-- {{ dd( Request::segment(4)  )}} --}}
@php
    if( in_array( Route::currentRouteName(), [ 'edit-infocards', 'view-group', 'edit-group' ] ) ) {
        $segment = Request::segment(4);
    } else{
        $segment = Request::segment(3);
    }
@endphp


                    <a class="nav-link"
                       href="{{ route( Route::currentRouteName(), [ $locale, $segment ] ) }}"
                        @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
{{-- <li><a href="{{ url("locale/{$locale}") }}" ><i class="fa fa-language"></i> {{ $locale }}</a></li> --}}
                </li>
            @endforeach
        </ul>
    </div>
