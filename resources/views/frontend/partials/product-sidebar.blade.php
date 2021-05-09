<div class="list-group mt-5">
    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
      <a data-bs-toggle="collapse" href="#sidebar" class="list-group-item list-group-item-action" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-cart-plus text-warning"></i>
         {{ $parent->name }}
      </a>
      <div class="collapse" id="sidebar">
        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
          <a href="{{ route('categories.show', $child->id) }}" class="list-group-item list-group-item-action"><i class="fas fa-cart-plus text-warning
            @if (Route::is('categories.show'))
              @if ($child->id === $category->id)
                active
              @endif
            @endif
          "></i>
             {{ $child->name }}
          </a>
        @endforeach
      </div>
    @endforeach
</div>
