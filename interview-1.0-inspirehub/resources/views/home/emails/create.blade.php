<x-app-layout>
   <section class="page-leader">
       <h2> Let's Create a Student</h2>
       <button class="btn-primary">View All Students</button>
</section>

<form action="" class="form">
    @csrf
    <div class="form-fields-group">
      <label for="recepient">Email Recepients</label>
      <select name="recepient" id="">
         <option value="">-- select Email Recepient -- </option>
         <option value="">All Students</option>
         <option value="">All Parents/Guardians</option>
      </select>
  </div>
      <div class="form-fields-group">
        <label for="firstname">Email Subject</label>
        <input type="text" name="firstname" id="firstname">
    </div>

    <div class="form-fields-group" style="width:92%">
      <label for="firstname">Message Here</label>
      <textarea name="textarea" id="editor" style="display:none;width:90%"></textarea>
  </div>

<button class="btn-primary flex align-items-center" type="submit"> <i class="icon icon-message"></i> Send Email</button>

</form>
</x-app-layout>
