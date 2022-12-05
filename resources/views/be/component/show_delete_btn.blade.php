<form class="d-inline" method="POST" action="{{ route('be.'.$model.'.destroy',$item->id) }}">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-outline-secondary btn-sm delete del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá"><i
            class="fa fa-trash"></i></button>
</form>
