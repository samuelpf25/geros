 @extends('layouts.main')

 @section('title','Igrejas')

 @section('content')
 <div class="d-flex justify-content-around">
     <div class="col-sm-6">
         <div class="card" style="width: 18rem;">
             <img src="{{ asset('img/igrejas.png') }}" class="card-img-top" alt="..." style="width: 300px; height: 200px;">
             <div class="card-body">
                 <h5 class="card-title">Igrejas</h5>
                 <p class="card-text">Veja as igrejas cadastradas aqui</p>
                 <a href="{{route('igrejas.index')}}" class="btn btn-secondary mt-2">Carregar</a>
             </div>
         </div>
     </div>
     <div class="col-sm-6">
         <div class="card" style="width: 18rem;">
             <img src="{{ asset('img/pessoas.png') }}" class="card-img-top" alt="..." style="width: 300px; height: 200px;">
             <div class="card-body">
                 <h5 class="card-title">Pessoas</h5>
                 <p class="card-text">Veja as pessoas cadastradas aqui</p>
                 <a href="{{route('pessoas.index')}}" class="btn btn-secondary mt-2">Carregar</a>
             </div>
         </div>
     </div>
     <div class="col-sm-6">
         <div class="card" style="width: 18rem;">
             <img src="{{ asset('img/membros.png') }}" class="card-img-top" alt="..." style="width: 300px; height: 200px;">
             <div class="card-body">
                 <h5 class="card-title">Membros</h5>
                 <p class="card-text">Veja os membros cadastrados aqui</p>
                 <a href="{{route('membros.index')}}" class="btn btn-secondary mt-2">Carregar</a>
             </div>
         </div>
     </div>
 </div>

 @endsection