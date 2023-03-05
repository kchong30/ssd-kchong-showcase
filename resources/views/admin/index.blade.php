<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col items-top min-h-screen bg-gray-100 dark:bg-gray-900 content-center px-10 py-5">
            <div class = "text-center pb-5 text-xl font-bold ">
                <h1>Admin</h1>
            </div>
            <div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg w-full rounded-lg flex flex-col mb-10">
                <div>
                    <h1>Projects</h1>
                </div>
                <div class = "flex justify-end my-5">
                    <a href = "/admin/projects/create">
                        <button class = "bg-green-900 hover:bg-green-500 text-white text-sm py-2 px-7 rounded w-fit h-fit">Create Project</button>
                    </a>
                </div>
                @foreach ($projects as $project)
                <div class = "flex odd:bg-gray-100 px-2">
                     <h2 class = "mr-auto">{{ $project->title }}</h2>
                     <div class = "ml-auto flex">
                        <a href = "/admin/projects/{{$project->id}}/edit">
                            <button class = "flex">
                                Edit
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            </button> 
                        </a>
                        <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                            @csrf
                            @method('delete')
                            <button class = "text-red-500 ml-3 flex">Delete
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>    
                            </button> 
                        </form>
                     </div>
                </div>
                @endforeach
            </div>
            <div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg w-full rounded-lg flex flex-col mb-10">
                <div>
                    <h1>Categories</h1>
                </div>
                <div class = "flex justify-end my-5">
                    <a href = "/admin/users/create">
                        <button class = "bg-green-900 hover:bg-green-500 text-white text-sm py-2 px-7 rounded w-fit h-fit">Create Category</button>
                    </a>
                </div>
                @foreach ($categories as $category)
                <div class = "flex odd:bg-gray-100 px-2">
                     <h2 class = "mr-auto">{{ $category->name }}</h2>
                     <div class = "ml-auto flex">
                        <a href = "/admin/users/{{$category->id}}/edit">
                            <button class = "flex">
                                Edit
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            </button> 
                        </a>
                        <a href = "/admin/users/{{$category->id}}/delete">
                            <button class = "text-red-500 ml-3 flex">Delete
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>    
                            </button> 
                        </a>
                     </div>
                </div>
                @endforeach
            </div>
            <div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg w-full rounded-lg flex flex-col mb-10">
                <div>
                    <h1>Tags</h1>
                </div>
                <div class = "flex justify-end my-5">
                    <a href = "/admin/users/create">
                        <button class = "bg-green-900 hover:bg-green-500 text-white text-sm py-2 px-7 rounded w-fit h-fit">Create Tag</button>
                    </a>
                </div>
                @foreach ($tags as $tag)
                <div class = "flex odd:bg-gray-100 px-2">
                     <h2 class = "mr-auto">{{ $tag->name }}</h2>
                     <div class = "ml-auto flex">
                        <a href = "/admin/users/{{$tag->id}}/edit">
                            <button class = "flex">
                                Edit
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            </button> 
                        </a>
                        <a href = "/admin/users/{{$tag->id}}/delete">
                            <button class = "text-red-500 ml-3 flex">Delete
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>    
                            </button> 
                        </a>
                     </div>
                </div>
                @endforeach
            </div>
            <div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg w-full rounded-lg flex flex-col">
                <div>
                    <h1>Users</h1>
                </div>
                <div class = "flex justify-end my-5">
                    <a href = "/admin/users/create">
                        <button class = "bg-green-900 hover:bg-green-500 text-white text-sm py-2 px-7 rounded w-fit h-fit">Create User</button>
                    </a>
                </div>
                @foreach ($users as $user)
                <div class = "flex odd:bg-gray-100 px-2">
                     <h2 class = "mr-auto">{{ $user->name }}</h2>
                     <div class = "ml-auto flex">
                        <a href = "/admin/users/{{$user->name}}/edit">
                            <button class = "flex">
                                Edit
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            </button> 
                        </a>
                        <a href = "/admin/users/{{$user->name}}/delete">
                            <button class = "text-red-500 ml-3 flex">Delete
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>    
                            </button> 
                        </a>
                     </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-layout>