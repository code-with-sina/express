
@vite(['resources/js/client-express-chat.js'])
<div id="node_id" class="invisible">
    {{ auth()->user()->id }}
</div>
<div class="container-fluid text-dark">
    <div class="card rounded-4 w-100 ">
     <div class="card-body px-2 py-2 justify-content-start">
         <div class="row px-4">
             <div class="col-1 p-0 m-0">
                <img src="{{ asset('front/image/Payoneer.png') }}" alt="" class="w-50">
             </div>
             <div class="col-3">
                 <span class="float-start chat-username py-1">
                    {{ __(auth()->user()->username) }}
                 </span>
             </div>
         </div>
     </div>
     <div class="invisible" id="user_id">
        {{ auth()->user()->id }}
    </div>
     <div class="card-body text-dark px-3 py-0">
        <div class="container-fluid px-3 py-3 m-0 ">
        
            <div class="row bg-white" id="list-message" style="height: 500px !important; overflow-y:auto;">

            </div>

        </div>
     </div>
     <div class="card-body">
         <form id="form">
             <div class="input-group">
                 <input type="text" class="form-control border-0" id="input-message" name="message" placeholder="start type..." autofocus autocomplete="off">
                 <span class="input-group-text bg-white border border-0 common" id="send"><i class="bi bi-send text-ratefy"></i></span>
                 <span class="input-group-text bg-white border border-0 common" id="upload"><i class="bi bi-paperclip text-ratefy"></i></span>
             </div>
         </form>
     </div>
    </div>
  
    
 </div>