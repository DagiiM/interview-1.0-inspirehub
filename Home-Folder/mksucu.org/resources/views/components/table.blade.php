 <!--======================== Search form ==================================-->
 <x-search placeholder="Search from {{ $caption }}"></x-search>
 <!--======================== End of Search form ===========================-->

<section class="section-table"> 

  <table  class="table">
   
    {{-- <caption>{{ $caption }}</caption> --}}

    <thead>
         <tr>
           {{$th}}
         </tr>
       </thead>
       <tbody class="tbody">
         {{$slot}}
       </tbody>
  </table>

</section>

<script>

  //Let's initialize baseURI
  let base = document.baseURI;

  function showHint(str) {
    if (str.length == 0) { 
      document.getElementById("search").innerHTML = "";
      return "";
    }
  //Lets build a search url
  let url = base+"?search="+str;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = () => {
          
      let tr = document.getElementsByTagName('tr');

      for(let i=0;i<tr.length;i++)
      {
        document.getElementsByTagName("td").innerHTML = this.responseText;
      }

    }
    xhttp.open("GET", url);

    xhttp.send(); 
  }
  </script>
