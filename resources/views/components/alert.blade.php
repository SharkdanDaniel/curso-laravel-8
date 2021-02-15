@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupmodal').modal();
        });
        setTimeout(() => {
            $(document).ready(function() {
            $('#popupmodal').modal('hide');
        });
        }, {{ Session::has('timer') ? Session::get('timer') : 2000 }});
    </script>
    <div class="modal fade" id="popupmodal" data-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="alert alert-{{ Session::has('error') ? 'danger' : 'success' }} mb-0" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endif
