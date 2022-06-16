@extends('layouts.system')

@section('content')

<center class="text-center" id="initFeedBack" style="display:none;">
  Almost there
  <h3>
    <img alt="loading" src="{{asset('../img/loader.gif')}}"/>
    Initializing System ...
  </h3>
  <div class="">
    <p>By Douglas Mutethia</p>
  </div>

</center>
<center>
  <div id="installp">
      Let's Install Our System
    </div>
  <button id="install" class="btn btn-primary">

    <svg class="w-6 h-6" height="30px" width="30px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
    Install DMIS Now
  </button>
</center>


@endsection

<style>
::-webkit-scrollbar{
  width:0;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(function(){
  $('#install').click(function() {
    $('#initFeedBack').show();
    $('#installp').hide();
    $('#install').hide();
    $('#install').attr("disabled",true);

    $.ajax({
      url:'{{route('system')}}',
      error: function(error){
        $('#install').attr("disabled",false);
      },
      success: function(data){
        $('#install').attr("disabled",false);
        if(data == 1)
        {
          $('#initFeedBack').hide();
          $('#installp').show();
          $('#install').show();
          showFeedBack('#initFeedBack','Make Sure, DB Connection is Working, <br/>Tip: check your .env file');
          setTimeout(function(){
            $('#systeminit').attr("disabled",false);
          },1000);
        } else if (data == 2) {
          $('#initFeedBack').hide();
          $('#installp').show();
          $('#install').show();
          showFeedBack('#initFeedBack','Make Sure, DB Connection is Working, <br/>Tip: check your .env file');
        } else{
            $('#initFeedBack').hide();
            showFeedBack('#initFeedBack','Successfully initilised!',false);
          setTimeout(function(){
              window.location = "";
          },2000);
        }
      },
      type: 'GET'
    });

  });
});


  function showFeedBack(el,str,error = true,url = null)
  {
      if(url != null)
      {
        if (!error) {
          var newDiv = $('<div/>').addClass('alert alert-success flush').html('<h6 style="margin-top:5%"><i class="fas fa-check-circle"></i>'+str+'</h6>').delay(2000).fadeOut('normal',function(){
            window.location = url;
          });
        }
        else{
          var newDiv = $('<div/>').addClass('alert alert-danger flush').html('<h6 style="margin-top:5%"><i class="fas fa-check-close"></i>'+str+'</h6>').delay(2000).fadeOut('normal',function(){
            window.location = url;
          });
        }
        $(el).before(newDiv);
      }
      else {
        if (!error) {
          var newDiv = $('<div/>').addClass('alert alert-success flush').html('<h6 style="margin-top:5%"><i class="fas fa-check-circle"></i>'+str+'</h6>').delay(2000).fadeOut();
        }
        else{
          var newDiv = $('<div/>').addClass('alert alert-danger flush').html('<h5><i class="fa f-check-close"></i>'+str+'</h5>').delay(8000).fadeOut();
        }
        $(el).before(newDiv);
      }
  }


</script>
