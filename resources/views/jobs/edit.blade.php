<x-layout>
    <x-slot:title>{{$job->title}}</x-slot:title>
    <x-slot:heading>Edit Job: {{$job->title}}</x-slot:heading>


    <form action="/jobs/{{$job->id}}" method="POST" class="px-3">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <x-form-field class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" value="{{$job->title}}"
                                          placeholder="Human Resources Manager" required/>
                        </div>
                        <x-form-error name="title"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="salary" id="salary" value="{{$job->salary}}"
                                          placeholder="$50,000" required/>
                        </div>
                    </x-form-field>
                    <x-form-error name="salary"/>
                </x-form-field>
            </div>

        </div>


        <div class="mt-6 flex items-center justify-between ">
            <div class="flex items-center">
                <button form="delete-form"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Delete
                </button>
            </div>
            <div class="flex items-center gap-x-6">
                <a type="button" href="/jobs/{{$job->id}}"
                   class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <div>
                    <x-form-button>Update</x-form-button>
                </div>
            </div>
        </div>
    </form>

    <form action="/jobs/{{$job->id}}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
