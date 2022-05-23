<aside class="sidebar">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="aside__link"><i class="icon icon-apps"></i>Dashboard</a>
        </li>

        <li>
            <a href="{{route('darasas.index')}}" class="aside__link"><i class="icon icon-university"></i>Class Rooms</a>
        </li>

        @can('ability-list')
        <li>
            <a href="{{route('users.index')}}" class="aside__link"><i class="icon icon-user-plus"></i>All Users</a>
        </li>
        <li>
            <a href="{{ route('students.index') }}" class="aside__link"><i class="icon icon-graduation-cap"></i>Students</a>
        </li>
        @endcan
      

    @can('ability-create')  
        <li>
            <a href="{{ route('emails.index') }}" class="aside__link"><i class="icon icon-envelope-add"></i>Bulk Email</a>
        </li>


        <li>
            <a href="{{route('students.create')}}" class="aside__link"><i class="icon icon-plus"></i>Add Student</a>
        </li>

        <li>
            <a href="{{route('roles.create')}}" class="aside__link"> <i class="icon icon-plus"></i>Create Role</a>
        </li>

        <li>
            <a href="{{route('abilities.create')}}" class="aside__link"> <i class="icon icon-plus"></i>Create Ability</a>
        </li>
        <li>
            <a href="{{route('events.create')}}" class="aside__link"> <i class="icon icon-plus"></i>Create Event</a>
        </li>
        @endcan

    </ul>
    <a class="menu-icon-sidebar nav__link"><i class=" icon-angle-left-b"></i></a>
</aside>
