@extends('layouts.main')

@section('mainContainer')
<main class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 text-center uppercase">student data filling</h1>
    </div>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <div class="ml-4 divide-y divide-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Student information</h3>
                <p class="mt-1 text-sm text-gray-600">Contains student information</p>
              </div>
              
              <div class="ml-4 px-4 py-3 bg-gray-50 text-center sm:px-6">
                <a href="/students" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 no-underline">Back to Student list</a>
              </div>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="/students" method="POST">
                @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="name" class="block text-sm font-medium text-gray-700">Name Student</label>
                        @error('name')
                            <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                        @enderror
                      <input required type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 px-2 shadow-md sm:text-sm border-gray-300 rounded-md" value="{{ old('name') }}">
                    </div>
      
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                        @error('nis')
                            <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                        @enderror
                      <input required type="number" name="nis" id="nis" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 px-2 shadow-md sm:text-sm border-gray-300 rounded-md" value="{{ old('nis') }}">
                    </div> 

                    {{-- <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                      <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                      @error('class')
                          <span class="mt-2 text-center text-sm text-red-600">{{ $message }}</span>
                      @enderror
                      <select id="class" name="class" autocomplete="class" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">   
                          <option></option>
                          <option>Class IX</option>
                          <option>Class X</option>
                          <option>Class XI</option>
                      </select>
                    </div> --}}

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