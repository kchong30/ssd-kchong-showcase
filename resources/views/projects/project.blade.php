<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col items-top min-h-screen bg-gray-100 dark:bg-gray-900 items-center py-4 sm:pt-0 ">
            <a href="/projects/" class = "my-5 self-start ml-6">← Back to Projects</a>
            <div class = "w-5/6">
                <x-projects.project-card :project="$project" :showBody="true" />
            </div>
        </div>
    </x-slot>
</x-layout>
