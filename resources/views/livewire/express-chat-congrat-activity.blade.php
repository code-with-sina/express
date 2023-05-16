<div>
    @if ($props->buyer_disbursment_confirmation == 1)
    <div class="container-fluid text-dark">
        <div class="card rounded-4 w-100">
             <form  method="post" wire:submit.prevent='create()'>
                 @csrf
                 <div class="card-body text-dark  px-3 py-5">
                 <div class="container-fluid px-2 px-sm-2 py-5 m-0">

                     <h1 class="rate-form-heading mb-5">
                         Help Us Improve <i class="bi bi-patch-question"></i>
                     </h1>
                     <p class="rate-form-text">
                         What are the challenges, pains you had with this platform?
                     </p>

                     <input type="text" name="" class="form-control w-100 border-0 border-bottom bg-white mb-5" wire:model='question_a' >
                     <p class="rate-form-text">
                         What do you like most about Ratefy?
                     </p>
                     <input type="text" name="" class="form-control w-100 border-0 border-bottom bg-white mb-5" wire:model='question_b'>
                     <p class="rate-form-text"> 
                         Rate your experience 
                     </p>
                     <div class="my-3 mb-5">
                         <span class="bi bi-star-fill checked h1"></span>
                         <span class="bi bi-star-fill checked h1"></span>
                         <span class="bi bi-star-fill checked h1"></span>
                         <span class="bi bi-star-fill checked h1"></span>
                         <span class="bi bi-star h1"></span>
                     </div>

                     <select class="form-controll w-100 border-o border-bottom bg-white mb-5" wire:model='rate'>
                        
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                     </select>
                     <div class="d-grid">
                         <button class="btn btn-success rounded-5">
                             submit
                         </button>
                     </div>
                 </div>
                 </div>
             </form>
        </div>
     </div>
    @else 
        @include('back.chat.index')
    @endif

   

   
</div>
