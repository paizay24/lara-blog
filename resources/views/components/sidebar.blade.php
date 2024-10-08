<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('home') }}">
        Home
    </a>
    <a class="list-group-item list-group-item-action" href="{{ route('photos.index') }}">
        User's photos
    </a>



</div>


<p class="small text-black-50 mb-1">Manage Post</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('post.create') }}">
        Create Post
    </a>
    <a class="list-group-item list-group-item-action" href="{{ route('post.index') }}">
        Post List
    </a>



</div>

<p class="small text-black-50 mb-1">Manage Category</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('category.index') }}">
        Category List
    </a>

    <a class="list-group-item list-group-item-action" href="{{ route('category.create') }}">
        Create Category
    </a>
</div>

@admin
<p class="small text-black-50 mb-1">Manage User</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('user.index') }}">
       User List
    </a>


</div>
@endadmin
