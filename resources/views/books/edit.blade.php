@extends('layouts.main')

@section('mainContainer')
<main class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 text-center uppercase">Books data filling</h1>
    </div>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <div class="ml-4 divide-y divide-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit books information</h3>
                <p class="mt-1 text-sm text-gray-600">Contains books information</p>
              </div>
              
              <div class="ml-4 px-4 py-3 bg-gray-50 text-center sm:px-6">
                <a href="/books" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 no-underline">Back to Books list</a>
              </div>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="/books/{{ $bookFind->id }}" method="POST">
              @method('put')
                @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="title" class="block text-sm font-medium text-gray-700">Title Book</label>
                        @error('title')
                            <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                        @enderror
                      <input required type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 px-2 shadow-md sm:text-sm border-gray-300 rounded-md" value="{{ old('title', $bookFind->title) }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="categories_id" class="block text-sm font-medium text-gray-700">Categories</label>
                        @error('categories_id')
                            <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                        @enderror
                        <select id="categories_id" name="categories_id" autocomplete="categories_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option></option>
                          @foreach ($categories as $category)    
                            @if (old('category_id', $bookFind->categories_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
      
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="text" class="block text-sm font-medium text-gray-700">Author</label>
                        @error('author')
                            <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                        @enderror
                      <input required type="text" name="author" id="author" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 px-2 shadow-md sm:text-sm border-gray-300 rounded-md" value="{{ old('author', $bookFind->author) }}">
                    </div> 
                    
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="publisher" class="block text-sm font-medium text-gray-700">Publisher</label>
                        @error('publisher')
                            <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                        @enderror
                      <input required type="text" name="publisher" id="publisher" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 px-2 shadow-md sm:text-sm border-gray-300 rounded-md" value="{{ old('publisher', $bookFind->publisher) }}">
                    </div> 
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</main>
@endsection