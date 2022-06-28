@extends('layouts.main')

@section('mainContainer')
<main class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">Welcome</h1>
      <h2 class="text-2xl font-bold text-gray-700">Book borrower list </h2>
    </div>
    <div class="overflow-auto rounded-lg shadow hidden lg:block">
      <table class="table-auto w-full ">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
          <tr>
            <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">#</th>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Student's name</th>
            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Student's nis</th>
            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Book title</th>
            <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Book borrowing date</th>
            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Admin</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach ($borrowings as $borrowing)    
            <tr>
              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $loop->iteration }}</td>
              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $borrowing->students->name }}</td>
              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $borrowing->students->nis }}</td>
              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $borrowing->books->title }}</td>
              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $borrowing->created_at }}</td>
              <td>
                <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-60">{{ $borrowing->status }}</span>
              </td>
              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $borrowing->admins->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="grid grid-cols-1 xl:grid-col-2 gap-4 lg:hidden">
      @foreach ($borrowings as $borrowing)
      <div class="bg-white space-y-3 p-4 rounded-lg shadow">
        <div class="flex flex-col items-center space-x-2 text-sm">
          <div class="text-blue-500 font-bold">{{ $loop->iteration }}</div>
          <div>{{ $borrowing->students->name }}</div>
          <div>{{ $borrowing->students->nis }}</div>
          <div class="text-center">{{ $borrowing->books->title }}</div>
        </div>
        <div class="flex justify-center">
          <div class="text-gray-500 mx-4">{{ $borrowing->created_at }}</div>
          <div>
            <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-60">{{ $borrowing->status }}
            </span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
@endsection