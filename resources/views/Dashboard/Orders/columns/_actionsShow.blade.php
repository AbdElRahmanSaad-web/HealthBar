<div class="d-flex">
       <a class="has_action badge rounded-pill text-bg-primary" style="--bs-bg-opacity: .2;" href="{{ route("$route_name.find",$model->id) }}" data-type="show"--}}
              data-action="{{ route("$route_name.find",$model->id) }}" data-method="get">
            <i class="fa-regular fa-eye  text-primary fa-lg"></i>
        </a>
        {{-- <a class="has_action badge rounded-pill text-bg-warning" style="--bs-bg-opacity: .2;" href="{{ route("$route_name.edit",$model->id) }}" data-type="edit"
           data-action="{{ route("$route_name.edit",$model->id) }}">
            <i class="fa-solid fa-pen-to-square text-warning fa-lg"></i>
        </a> --}}
        {{-- <a class="has_action badge rounded-pill text-bg-danger" style="--bs-bg-opacity: .2;" href="#" data-type="destroy"
           data-action="{{ route("$route_name.destroy",$model->id) }}">
            <i class="fa-solid fa-trash text-danger fa-lg"></i>
        </a> --}}
        {{-- <form action="{{ route("$route_name.destroy", $model->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="has_action badge rounded-pill text-bg-danger" style="--bs-bg-opacity: .2;border-style: hidden;background: unset;" data-type="destroy">
                <i class="fa-solid fa-trash text-danger fa-lg"></i>
            </button>
        </form> --}}
    </div>
    
    