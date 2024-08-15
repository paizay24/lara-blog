<div>
    <div class=" my-3">
        <form action="{{ route('page.index') }}" method="get">
            <div class="input-group ">
                <input type="text" name="keyword" required class="form-control" placeholder="Search..." aria-label="Recipient's username"
                    aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>
    <div class=" my-3">
            <h3>Category Lists</h3>
            <div class=" list-group">
                <a href="{{ route('page.index') }}" class=" list-group-item {{ route('page.index') === request()->url() ? 'active' : '' }}">All Categories</a>
                @foreach ($categories as $category )
                    <a href="{{ route('page.category',$category->slug) }}" class=" list-group-item {{ request()->url() === route('page.category',$category->slug) ? 'active' : '' }}">{{ $category->title }}</a>
                @endforeach

            </div>

    </div>
</div>
