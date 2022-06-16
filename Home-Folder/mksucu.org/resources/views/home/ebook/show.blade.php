<style>

.top-bar {
  background:#fff;
  color:#fff;
  padding: 0.5rem;
  font-size: 9px;
  text-align: center;
  color:blue;
  border-bottom:1px solid #eee;
}

.btn {
  background:transparent;
  color:#fff;
  border:0;
  outline:0;
  cursor:pointer;
  padding:0.6rem;
}
.btn i{
  font-size: 9px;
  color:blue;
}
.btn:hover{
  opacity:0.9;
}
.page-info{
  margin-left: 1rem;
}
.error{
  background:orangered;
  color:white;
  padding: 1rem;
}
::-webkit-scrollbar{
  width: 0px;

}

</style>
<x-app-layout>

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('css/pdf.css')}}" rel="stylesheet">


    <div class="top-bar">
      <button class="btn">

        <a href="{{route('ebooks.index')}}"  class="text-decoration-none">
          <div class="ml-2">
            <i class="fas fa-arrow-circle-left">All Ebooks</i>
        </div>
      </a>
      </button>
      <button class="btn" id="prev-page">
    <i class="fas fa-arrow-circle-left">Prev Page</i>
      </button>
      <button class="btn" id="next-page">
        <i class="fas fa-arrow-circle-right">Next Page</i>
          </button>
          <span class="page-info"> Page <span id="page-num">
            </span> of <span id="page-count"></span>
          </span>
          @can('ability-delete')
          <button  style="background-color: transparent">
          <form method="post" enctype="multipart/form-data" action="{{route('ebooks.destroy',$data)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">
              Delete Ebook
          </button>
          </form>
        </button>
        @endcan
    </div>
    <canvas id="pdf-render" style="width:100%; border-bottom:1px solid #eee;padding-right:0;padding-left:0"></canvas>

<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>


<script >
const urlx = "{{ asset('/img/'.$data->url) }} ";

let pdfDoc = null,
pageNum = 1;
pageIsRendering = false;
pageNumIsPending = null;

const scale = 1.5;
canvas = document.querySelector('#pdf-render'),
ctx = canvas.getContext('2d');

//Render the Page
const renderPage = num =>{
   pageIsRendering=true;
   //Get page
   pdfDoc.getPage(num).then(page=>{
       //set scale
       const viewport = page.getViewport({scale});
       canvas.height = viewport.height;
       canvas.width = viewport.width;

       const renderCtx = {
           canvasContext: ctx,
           viewport
       }
       page.render(renderCtx).promise.then(()=>{
        pageIsRendering = false;

        if(pageNumIsPending !== null){
            renderPage(pageNumIsPending);
            pageNumIsPending = null;
        }
       });
       //Output current page
       document.querySelector('#page-num').textContent = num;
   });
};

//Check for pages rendering
const queueRenderPage = num =>{
if(pageIsRendering)
{
    pageNumIsPending = num;
}
else{
    renderPage(num);
}
}
// Show prev Page
const showPrevPage = () => {
    if(pageNum <= 1)
    {
        return;
    }
    pageNum--;
    queueRenderPage(pageNum);
}

// Show Next Page
const showNextPage = () => {
    if(pageNum >= pdfDoc.numPages)
    {
        return;
    }
    pageNum++;
    queueRenderPage(pageNum);
}

//Get Document
pdfjsLib.getDocument(urlx).promise.then(pdfDoc_ =>{
    pdfDoc = pdfDoc_;

    document.querySelector('#page-count').textContent =pdfDoc.numPages;

    renderPage(pageNum);
})
.catch(err => {
  //Display Error
  const div = document.createElement('div');
  div.className = 'error';
  div.appendChild(document.createTextNode(err.message));
  document.querySelector('body').insertBefore(div,canvas);
  //Remove top bar
  document.querySelector('.top-bar').style.display='none';
});

//Button Events
document.querySelector('#prev-page').addEventListener('click',showPrevPage);
document.querySelector('#next-page').addEventListener('click',showNextPage);
  </script>


    </x-app-layout>

