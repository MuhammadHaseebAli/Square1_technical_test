<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="grid ">
                <div class="row-span-3">
                    <h1><strong>{{$heading}} </strong></h1>
                </div>
                <div class="row-span-3">
                 @if($sort == "asc")
                    <a href="{{Request::url().'?sort=desc'}}" type="button"
                      class="float-right border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                      Sort By Publication date (Desc)
                    </a>
                 @else
                 <a href="{{Request::url().'?sort=asc'}}" type="button"
                    class="float-right border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                    Sort By Publication date (Asc)
                    </a>
                 @endif
                </div>
            </div>
                @if(count($blogs) == 0)
                   <br><p>Your blogs will show here</p>
                @endif
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                    @foreach($blogs as $blog)
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                             <article class="overflow-hidden rounded-lg shadow-lg">
                                 <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                     <h1 class="text-lg">
                                         <a class="no-underline hover:underline text-black" href="{{ url('/blog/view/'.$blog->id) }}">
                                             {{ \Illuminate\Support\Str::limit($blog->title,30,'...') }}
                                         </a>
                                     </h1>
                                     <p class="text-grey-darker text-sm">
                                         {{\Carbon\Carbon::parse($blog->publication_date)->diffForhumans()}}
                                     </p>
                                 </header>
                                    <p class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    {{ \Illuminate\Support\Str::limit($blog->description,35,'...')}}
                                    </p>
                             </article>
                         </div>
                    @endforeach
                </div>
                {{ $blogs->appends(request()->query())->links() }}
        </div>
    </div>
</div>
