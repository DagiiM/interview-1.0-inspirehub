<section class="flex align-items-center">
    <a class="status status--active" href="{{$viewLink}}">View</a>
    <a class="status status--active" href="{{$editLink}}">Edit</a>
    <a class="status status--trash">
            <form method="POST" enctype="application/x-www-form-urlencoded" action="{{$deleteLink}}">
                @csrf
                @method('DELETE')
                <x-button style="background-color:transparent;display;margin:0;padding:0;border-radius:0;width:100%;height:100%;color:currentColor;outline:0;border:0">
                Delete
                </x-button>
            </form>
    </a>
</section>
