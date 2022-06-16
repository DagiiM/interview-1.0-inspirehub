<!DOCTYPE>
<html style="scrollbar-width:none;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <x-meta title="{{ $title ?? ''}}" image="{{ $image ?? config('app.url') }}" url="{{ $url ?? config('app.url')}}" description="{{ $description ?? ''}}" keywords="{{ $keywords ?? '' }}"></x-meta>

     <link href="{{asset('css/eleso.css')}}" rel="stylesheet">
     <link href="{{asset('eleso-v1.0/eleso-fonts.css')}}" rel="stylesheet">
     <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
      
  <script src="{{ asset('js/eleso.js') }}" defer></script>
    <!-- Scripts -->
    <x-svg></x-svg>


 
</head>
<body oncontextmenu="return true">

<!--  Loader  -->
<x-loader></x-loader>

  <!--Display Alert-->

   <article class="flash-card" id="type" aria-live="polite" aria-atomic="true">
   <script>
       replaceButtonText = (buttonId, text) => {
        if (document.getElementById)
        {
          var button=document.getElementById(buttonId);

          if (button)
          {
            if (button.childNodes[0])
            {
              button.childNodes[0].nodeValue=text;
            }
            else if (button.value)
            {
              button.value=text;
            }
            else
            {
              button.innerHTML=text;
            }
          }
        }
      }
            flash = (type,message,delay=5000) => {
            const flashCard = document.querySelector('.flash-card');
            const flashCardSvg = document.querySelector('.flash-card>svg');
            const flashCardSvgUse = document.querySelector('.flash-card>svg>use');
            const flashCardSvgUseLink = document.querySelector('.flash-card>svg>use');
            const buttonClose = document.querySelector('.button-close');
  
            flashCard.classList.add('alert-'+type);
            flashCardSvg.className = '';
            flashCard.classList.add('icon,'+type);
            flashCardSvgUseLink.setAttribute('xlink:href', '#'+type);
            flashCardSvgUse.classList.add('alert-'+type);
  
            replaceButtonText('flashMessage', message);
  
            flashCard.style.display="flex";
            
            setTimeout(function() {
              flashCard.classList.remove('alert-'+type);
              flashCardSvgUse.classList.remove('alert-'+type);
              flashCard.style.display = "none";
  
            }, delay);
  
            buttonClose.onclick = ()=>{
               flashCard.style.display = "none";
            }
      }
 </script>
    <x-icon type="success" icon="success"/>
    <section class="flash-card-body">
       <strong id="flashMessage">{{config('app.name')}}</strong>
      </section>
      <x-icon type="button-close" icon="times"/>     
</article>


          @if($message = Session::get('success'))
         <script>
                flash("success","{{$message}}");
         </script>
          @endif
          @if($message = Session::get('warning'))
            <script>
                flash("warning","{{$message}}");
         </script>
          @endif
          @if($message = Session::get('error'))
          <script>
                flash("danger","{{$message}}");
         </script>
          @endif
          @if($message = Session::get('info'))
            <script>
                flash("info","{{$message}}");
         </script>
          @endif
    <!--End of Alert Display Section-->


<!---Navigation Section-->
@section('navigation')
    @include('layouts.navigation')
@show

<!---Sidebar Section-->
@section('sidebar')
    @include('layouts.sidebar')
@show

<!---Main Section-->
<main >
  <section class="app-content">
     {{$slot}}
  </section>

</main>
  <!---footer Section-->
 
</body>
</html
