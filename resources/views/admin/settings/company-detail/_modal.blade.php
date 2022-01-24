<!-- Modal Center -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3>{{ $companydetail->title }}</h3>
                        <span class="text-muted" style="font-size: 12px"> Diterbitkan {{ $companydetail->created_at->diffForHumans() }}</span>
                        <br>
                        <hr>
                        <img src="{{ Storage::url($companydetail->image) }}" alt="{{ $companydetail->title }}" class="mx-auto d-block">
                        <hr>
                        {!! $companydetail->content !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#modal").modal('show');
</script>
