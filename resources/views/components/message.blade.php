@if(session()->has('message'))

<div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible fade show" role="alert">
  {{ session()->get('message')['message'] }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif