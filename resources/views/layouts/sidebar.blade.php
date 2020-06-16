<div class="max-w-sm rounded overflow-hidden shadow-md">
    <div class="px-6 py-4">
        <div class="font-bold text-2xl mb-2">Search</div>
        <form class="w-full max-w-sm" method="get" action="/search">
            <div class="flex items-center border-b border-b-2 border-gray-700 py-2">
                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="search" name="search" placeholder="Blog Post">
                <button class="bg-transparent hover:bg-gray-600 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-600 hover:border-transparent rounded" type="submit">
                    Search
                </button>
            </div>
        </form>
    </div>
</div>

<div class="max-w-sm rounded overflow-hidden shadow mt-4">
    <div class="px-6 py-4">
        <div class="font-bold text-2xl mb-2">Categories</div>
        <ul class="m-2">
            @foreach($categories as $category)
                <li><a href="/categories/{{ $category->id }}">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>

<div class="max-w-sm rounded overflow-hidden shadow mt-4">
    <div class="px-6 py-4">
        <div class="font-bold text-2xl mb-2">Social Media</div>
        <ul class="m-2">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Facebook</a></li>
        </ul>
    </div>
</div>