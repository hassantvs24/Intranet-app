    <div class="row">
        <ul class="navbar-nav ml-auto">
            @foreach ( config('app.languages' ) as $locale )
                <li class="nav-item">
               {{--      <a class="nav-link"
                       href="{{ route( Route::currentRouteName(), $locale ) }}"
                        @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a> --}}

    {{--                 <a class="nav-link"
                       href="{{ route( Route::currentRouteName(), $locale ) }}"
                        @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a> --}}
<li><a href="{{ url("locale/{$locale}") }}" ><i class="fa fa-language"></i> {{ $locale }}</a></li>
                </li>
            @endforeach
        </ul>
    </div>
