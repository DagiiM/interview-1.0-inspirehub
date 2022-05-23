<x-app-layout>
<x-main-sub-heading>
  <x-slot:h2>
      Email Communications
  </x-slot:h2>
  <x-slot:button>
      <a href="{{ route('dashboard') }}" class="app-link">Dashboard</a>
  </x-slot:button>
</x-main-sub-heading>

<form action="" class="form">
    @csrf
  <div class="text-field">
    <label for="recepient">Select Name to Add Student To</label>
    <select name="recepient" id="recepient">
      <option value="">All Students</option>
      <option value="">All Parents/Guardians</option>
    </select>
</div>
    
    <x-input>
      <x-slot:name>Email Subject</x-slot:name>
      <x-slot:placeholder>Enter Email Subject</x-slot:placeholder>
      <x-slot:id>subject</x-slot:id>
      <x-slot:value>{{ old('subject') }}</x-slot:value>
  </x-input>

    <div class="text-field" style="width:92%">
      <label for="firstname">Message Here</label>
      <textarea name="textarea" id="editor" style="display:none;width:90%"></textarea>
  </div>

<button class="btn-primary flex align-items-center" type="submit"> <i class="icon icon-message"></i> Send Email</button>

</form>
</x-app-layout>
