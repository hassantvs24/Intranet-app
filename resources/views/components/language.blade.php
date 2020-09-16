    <div class="row">
        <ul class="navbar-nav ml-auto">
            @foreach ( config('app.languages' ) as $locale )
                <li class="nav-item">
               {{--      <a class="nav-link"
                       href="{{ route( Route::currentRouteName(), $locale ) }}"
                        @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a> --}}

                    <a class="nav-link"
                       href="{{ route( Route::currentRouteName(), $locale ) }}"
                       {{-- href="{{ url('locale/{$locale}') }}" --}}
                        @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
{{-- <li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li> --}}
{{-- <li><a href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a></li> --}}
                </li>
            @endforeach
        </ul>
    </div>
