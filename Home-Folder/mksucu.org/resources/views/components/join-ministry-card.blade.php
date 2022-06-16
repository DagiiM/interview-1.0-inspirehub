
<li>
        <x-nav-link href="{{route('users.ministries.create',Auth::user()->id)}}"> <x-icon type="add" icon="add"></x-icon> <div style="width:86%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
        <div>Join Ministry</div>
        </div>
        </x-nav-link>
    </li>
    <li>
        <x-nav-link href="{{route('dashboard')}}"> <x-icon type="dashboard" icon="dashboard"></x-icon>
        <div style="width:86%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
        <div> Dashboard</div> </div></x-nav-link>
    </li>
<li>
        <x-nav-link href="{{'/'}}"> <x-icon type="globe" icon="globe"></x-icon> <div style="width:86%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
        <div> Homepage</div>
        </div>
        </x-nav-link>
    </li>