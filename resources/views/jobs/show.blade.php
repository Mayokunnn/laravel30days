<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Jobs Page</x-slot:heading>

    <h2 class="font-bold text-lg">{{$job['title']}}</h2>

    <p>
        This job pays {{$job['salary']}} per year
    </p>

    <p class="text-xs font-bold text-blue-500">By: <span>{{$job->employer->name}}</span></p>

</x-layout>
