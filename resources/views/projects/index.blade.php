@props(['project', 'category', 'showTitle' => false, 'showReturnLink'=> false, 'showBody' => false, 'showExcerpt' => false])


<x-layout>
    <x-slot name="content">
            <div class="relative flex flex-col items-top min-h-screen bg-gray-100 dark:bg-gray-900 content-center p-10">
            <div class = " self-start justify-self-start m-0">
                <a href="/projects/" >← Back to Projects</a>
            </div>
            @if ($showTitle)
                <div class = "flex w-full my-5 self-start justify-center"> 
                    <h1> {{$category}} Projects</h1>
                </div>
            @endif
            <div>
                <section class="grid grid-cols-1 md:grid-cols-2 gap-2 my-5">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" :showExcerpt="true"/>
                    @endforeach
                </section>
                @if (count($projects))
                <div class="text-xs mt-4 w-full text-right">{{ $projects->links() }}</div>
                @else
                <div>Nothing to showcase, yet.</div>
                @endif
            </div>
        </div>
    </x-slot>
</x-layout>
