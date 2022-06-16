<section class="btn-primary" id="filter">
 <i class="icon-sliders-v-alt"></i> Filter
</section>

<form action="" method="get" onsubmit="return true;" style="margin-top:1%;display:;margin:5px 0" class="search-none" id="searchForm">
    <div class="flex flow" style="background-color: var(--input-color);border-radius:var(--app-br)">
      
  <x-button style="padding: 0;background:transparent;border:0;color:#222">
  <x-icon type="search" icon="search"></x-icon>
  </x-button>
    <input type="search" name="search" id="search" placeholder="{{ $placeholder }}" onkeyup="showHint(this.value)" autofocus required /> 
    
    </div>
  </form>
<style>
  .search-none{
    display: none;
  }
.show-search-form{
  display: block;
}
  </style>

  <script>
    const filter = document.getElementById('filter');
    const searchForm = document.getElementById('searchForm');

    filter.addEventListener('click',()=>{
        searchForm.classList.toggle('show-search-form');
    });
  </script>