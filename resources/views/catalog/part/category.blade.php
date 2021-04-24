<div class="col-md-6 mb-4">
    <div class="card">
        <div class="card-header">
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="card-body p-0">
            @php
                if ($category->image) {
                    $url = url('storage/catalog/category/image/' . $category->image);
                    // $url = Storage::disk('public')->url('catalog/category/image/' . $category->image);
                } else {
                    $url = url('storage/catalog/category/image/default.jpg');
                    // $url = Storage::disk('public')->url('catalog/category/image/default.jpg');
                }
            @endphp
            <img src="{{ $url }}" alt="" class="img-fluid">
        </div>
        <div class="card-footer">
            <a href="{{ route('catalog.category', ['slug' => $category->slug]) }}"
               class="btn btn-dark">Перейти в раздел</a>
        </div>
    </div>
</div>