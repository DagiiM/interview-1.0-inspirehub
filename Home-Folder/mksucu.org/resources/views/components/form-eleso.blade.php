<script>
  /**
  * The function Takes
  * method | GET | POST | DELETE
  * requestUrl
  * redirectUrl
  */

        formEleso = (method,requestUrl,redirectUrl)=>{
formElem.addEventListener('submit', (e) => {
    e.preventDefault();

      data = new FormData(formElem);

      const request = new XMLHttpRequest();

      request.open(method,requestUrl,true);

      request.upload.onprogress = (event) =>{
              if (event.lengthComputable) {
                  let loadedLength = Math.trunc((event.loaded/event.total)*100);
                  document.querySelector('.progress-bar').style='--rotate-scale:'+loadedLength;
                  document.querySelector('.progress').style='--width:'+loadedLength+'%';
                  replaceButtonText('progress',loadedLength+'%');
              }
          };

          request.upload.addEventListener("error", (e)=>{
            flash("danger", "Upload Failed");
             document.querySelector('.loader-container').style="display:none";
             document.querySelector('.progress-bar').style='display:none';
          });
          request.upload.addEventListener("abort", (e)=>{
            flash("danger", "Upload Cancelled");
             document.querySelector('.loader-container').style="display:none";
             document.querySelector('.progress-bar').style='display:none';
          });

          request.onloadstart = (event) => {
              document.querySelector('.progress-bar').style='display:grid';
              document.querySelector('.loader-container').style="display:grid";
          }
          request.onloadend = (event) => {
                let requestObject = null;
               try{
                 requestObject = JSON.parse(request.responseText);
                  flash(requestObject.type, requestObject.message);
                  document.querySelector('.loader-container').style="display:none";
                  document.querySelector('.progress-bar').style='display:none';
                  if(redirectUrl!= ''){
                    location.href=redirectUrl;
                  }
                  
               }catch(e){
                 console.log('Could not parse Json');
               }
           }      

      request.send(data);
  });
};

formEleso("{{$method}}","{{$requestUrl}}","{{$redirectUrl}}");

</script>