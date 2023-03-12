<x-layout>
    <x-slot name="content">
        <main class="bg-black flex flex-col justify-center items-center p-10">
            <div id="banner" class="flex flex-col">
                <div class="font-nunito font-extrabold text-5xl text-white">Kevin Chong - Show Me What You Got.</div>
            </div>
            <div id="projects" class="flex flex-col items-center mt-10">
                <div class="mb-5 font-nunito  text-white text-5xl">Project De Jour</div>
                <div class="flex flex-col justify-center items-center text-center" >
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" :showBody="true" />
                    @endforeach
                </div>

                <div class="bg-green-900 hover:bg-green-500 text-white text-sm py-2 px-7 rounded w-fit h-fit my-5"><a href="/projects">View More Projects</a></div>
            </div>
        </main>
    </x-slot>
</x-layout>