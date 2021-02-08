<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog View') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <label><strong>Title</strong></label>
                    <p>{{$blog->title}}</p>

                    <br>

                    <label><strong>Description</strong></label>
                    <p>{{$blog->description}}</p>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
