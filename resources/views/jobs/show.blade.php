<x-layout>
    <x-slot:title>Job</x-slot:title>
    <x-slot:heading>Job Page</x-slot:heading>

    <h2 class="font-bold text-lg">{{$job['title']}}</h2>

    <p>
        This job pays {{$job['salary']}} per year
    </p>

    <p class="text-xs font-bold text-blue-500">By: <span>{{$job->employer->name}}</span></p>
    @can('edit', $job)
        <div class="mt-6">
            <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
        </div>
    @endcan


</x-layout>
