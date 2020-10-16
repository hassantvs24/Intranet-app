<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName() == 'groups.create' ? 'active':''}}" href="{{route('groups.create', app()->getLocale())}}">{{__('Create group')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName() == 'groups.board' ? 'active':''}}" href="{{route('groups.board', app()->getLocale())}}">{{__('Add Board')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName() == 'groups.admin' ? 'active':''}}" href="{{route('groups.admin', app()->getLocale())}}">{{__('Add admin')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName() == 'groups.invite' ? 'active':''}}" href="{{route('groups.invite', app()->getLocale())}}">{{__('Invite users')}}</a>
    </li>
</ul>
