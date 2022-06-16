<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
  @can('ability-list')
  <a href="{{route('themes.index')}}" class="text-decoration-none">
    <div class="d-flex ml-2">
      <x-icon icon="back" type="back"></x-icon>
    <p class="ml-2">Back to Themes </p>
  </div>
  </a>
  @endcan

<x-table>
  <thead>
      <h5 style="text-align:center">SEMESTER THEME</h5>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Semester Theme</th>
      <th scope="col">Subject</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
    <tbody>

  <tr>
      <th scope="row">{{$data->id}}</th>
      <td> {{$data->semester}}</td>
      <td> {{$data->subject}}</td>
      <td class="flex-div-td">

        @can('ability-edit')
            <a href="{{route('themes.edit',$data)}}">
               <x-icon icon="edit" type="edit"></x-icon>
            </a>
          @endcan

          @can('ability-delete')
            <a>
              <form method="post" enctype="multipart/form-data" action="{{route('themes.destroy',$data)}}">
                @csrf
                @method('DELETE')
                <button type="submit">
                  <x-icon icon="delete" type="delete"></x-icon>
              </button>
            </form>
          </a>
          @endcan

</td>
    </tr>
</x-table>
</x-app-layout>
