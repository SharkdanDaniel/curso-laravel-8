 <!-- Modal -->
 <div class="modal fade" id="modal" data-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="BackdropLabel">{{ $title }}</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 {{ $body }}
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <form action="{{ $route }}" method="post">
                     @csrf
                     @method('DELETE')
                     <button type="submit"
                         class="btn btn-{{ $type }}">Confirmar</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
