<x-app-layout>
   <section class="page-leader">
       <h2> Let's Create a Student</h2>
       <button class="btn-primary">View All Students</button>
</section>

<form action="" class="form">
    @csrf
      <div class="form-fields-group">
        <label for="firstname">Student Firstname</label>
        <input type="text" name="firstname" id="firstname">
    </div>

    <div class="form-fields-group">
    <label for="lastname">Student Lastname</label>
    <input type="text" name="lastname" id="lastname">
    </div>

    <div class="form-fields-group">
        <label for="email">Student Email</label>
        <input type="text" name="lastname" id="email">
        </div>

    <div class="form-fields-group">
    <label for="student_class">Student Class</label>
    <select name="student_class" id="student_class">
        <option value="">--Select Student Class--</option>
        <option value="">Chemistry</option>
        <option value="">Mathematics</option>
    </select>
</div>

<div class="form-fields-group">
    <label for="registration_number">Student Registration Number</label>
    <input type="number" name="registration_number" id="registration_number">
</div>

<button class="btn-primary" type="submit">Create Student</button>

</form>
</x-app-layout>
