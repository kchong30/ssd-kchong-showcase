@props(['project', 'showBody' => false, 'showExcerpt' => false])


    <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg w-full">
        <div class="text-xl font-bold">
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        </div>
        @if ($showExcerpt)
        <div class = "flex align-middle my-5">
            @if ($project->thumb)
                <img class = "w-1/4 h-1/4"  src="{{url('storage/' . $project->thumb)}}" alt = "Thumbnail">
            @else
                <img class = "w-1/4 h-1/4"  src="{{url('storage/images/placeholder-thumbnail.png')}}" alt = "Thumbnail">
            @endif
            <div class = "my-4 ml-4">{!! $project->excerpt !!}</div>
        </div>
        @endif
        @if ($showBody)
        <div class = "flex flex-col my-5">
            @if ($project->image)
                <img class = "w-5/6 mx-auto my-auto"  src="{{url('storage/' . $project->image)}}" alt = "Image">
            @else
                <img class = "w-5/6 mx-auto my-auto"  src="{{url('storage/images/placeholder-image.png')}}" alt = "Image">
            @endif
            <div class = "space-y-4 my-4">{!! $project->body !!}</div>
        </div>
        @endif
        <footer class = "my-4">
            @if ($project->category)
                <span>Category: <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a></span>
            @endif
            <br>
            @if ($project->tags && count($project->tags) > 0)
                <span>Tags:</span>
            @foreach ($project->tags as $projectTag)
                <a href="/tags/{{ $projectTag->slug }}">{{ $projectTag->name }}</a>
            @endforeach
            @endif
        </footer>
    </div>
