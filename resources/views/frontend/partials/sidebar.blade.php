<div class="col-xl-4">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          The current link item
        </a>
        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
        <a data-bs-toggle="collapse" href="#collapseExample{{$parent->id}}" class="list-group-item list-group-item-action"><img style="float: left;" src="{{ asset('storage/images/'.$parent->image) }}" width="25" alt="">{{ $parent->name }}</a>
        <div class="collapse" id="collapseExample{{$parent->id}}">
          <div class="card card-body">
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
              <a href="" class="list-group-item list-group-item-action">
                <img style="float: left;" width="25" src="{{asset('storage/images/'.$child->image)}}" alt="">
                {{$child->name}}
              </a>
            @endforeach
          </div>
        </div>
        @endforeach
        
        
      </div>
</div>