
<td>
<section class="status">

     @can('ability-list')
        <a class="status status--active" href="{{$viewLink}}">
            View
            </a>
     @endcan
     @can('ability-edit')
        <a class="status status--active" href="{{$editLink}}">
          Edit
        </a>
    @endcan
    @can('ability-delete')
            <form method="POST" enctype="application/x-www-form-urlencoded" action="{{$deleteLink}}" id="formE">
                @csrf
                @method('DELETE')
                <button class="status status--trash" type="submit">
                Delete
                </button>
            </form>
     @endcan
    
    </section>
</td>
