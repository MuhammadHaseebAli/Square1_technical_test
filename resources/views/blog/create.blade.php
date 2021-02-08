<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container my-12 mx-auto px-4 md:px-12">

                       <div class="mt-5 md:mt-0 md:col-span-2">
                          <form action="/blog/save" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                  <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                      Title
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                      <input type="text" value="{{old('title')}}" name="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('title') border-red-500 @enderror" placeholder="How to Cook Black Beans">
                                    </div>
                                    @if($errors->has('title'))
                                        <div class="text-red-700">{{ $errors->first('title') }}</div>
                                    @endif
                                  </div>
                                </div>

                                <div>
                                  <label for="about" class="block text-sm font-medium text-gray-700">
                                    Description
                                  </label>
                                  <div class="mt-1">
                                    <textarea name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror" placeholder="When I opened the pantry last weekend, I found a bag of dried black beans that I’d been meaning to cook for weeks...">{{old('description')}}</textarea>
                                  </div>
                                  <div class="text-red-700">{{ $errors->first('description') }}</div>
                                </div>

                              </div>
                              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                  Save
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>

            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
