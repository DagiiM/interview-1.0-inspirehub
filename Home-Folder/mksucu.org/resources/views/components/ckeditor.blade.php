<div>

<script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>

<script>

      ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.warn("Build id: {{ config('app.name')}}");
            console.log(error);
        });
        </script>
</div>