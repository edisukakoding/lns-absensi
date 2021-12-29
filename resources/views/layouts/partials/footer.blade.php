<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to logout?</p>
        </div>
        <div class="modal-footer">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <script>
                document.write(new Date().getFullYear());
            </script> - developed by
                <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
        </div>
    </div>

    <div class="container my-auto py-2">
        <div class="copyright text-center my-auto">
            <script>
                document.write(new Date().getFullYear());
            </script> - distributed by
                <b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
