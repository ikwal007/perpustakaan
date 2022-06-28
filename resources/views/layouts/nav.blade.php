<nav class="bg-gray-800 shadow ">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/" class="{{ Request::is('/') ? 'bg-gray-900' : '' }} hover:bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium no-underline" aria-current="page">Dashboard</a>

            <a href="/borrowings" class="{{ Request::is('borrowings*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium no-underline">Borrowings</a>

            <a href="/books" class="{{ Request::is('books*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium no-underline">Books</a>

            <a href="/categories" class="{{ Request::is('categories*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium no-underline">Categories</a>

            <a href="/students" class="{{ Request::is('students*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium no-underline">Students</a>

            @can('admin')
            <a href="/admins" class="{{ Request::is('admins*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium no-underline">Admins</a> 
            @endcan
            

          </div>
        </div>
      </div>
      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
          

          <!-- Profile dropdown -->
          <div class="ml-3 relative">
            <div id="tombol-foto">
              <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="drop-down-profile">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 no-underline" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile, 
                {{ auth()->user()->name }}
              </a>

              <form action="/signout" method="POST">
                @csrf
                {{-- <input type="hidden" name="remember" value="true"> --}}
                  <div class="flex align-middle">
                      <button type="submit" class="cursor-pointer block px-4 py-2 text-sm text-gray-700 no-underline" role="menuitem" tabindex="-1" id="user-menu-item-2">
                          Sign out 
                          <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                          </svg>
                        </button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" id="btn-mobile">
          <span class="sr-only">Open main menu</span>
          <!--
            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="md:hidden hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="/" class="{{ Request::is('/') ? 'bg-gray-900' : '' }} text-white hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium no-underline" aria-current="page">Dashboard</a>

      <a href="/borrowings" class="{{ Request::is('borrowings*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium no-underline">Borrowings</a>

      <a href="/books" class="{{ Request::is('books**') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium no-underline">Books</a>

      <a href="/categories" class="{{ Request::is('categories*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium no-underline">Categories</a>

      <a href="/students" class="{{ Request::is('students*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium no-underline">Students</a>

      <a href="/admins" class="{{ Request::is('admins*') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium no-underline">Admins</a>
    </div>
    <div class="pt-4 pb-3 border-t border-gray-700">
      <div class="flex items-center px-5">
        <div class="flex-shrink-0">
          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        </div>
        <div class="ml-3">
          <div class="text-base font-medium leading-none text-white">
            {{ auth()->user()->name }}
          </div>
          <div class="text-sm font-medium leading-none text-gray-400">
            {{ auth()->user()->email }}
          </div>
        </div>
      </div>
      <div class="mt-3 px-2 space-y-1">
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 no-underline">Your Profile</a>

        <form action="/signout" method="POST">
          @csrf
              <div class="group block px-3 py-2 rounded-md hover:bg-gray-700 group-hover:text-white" >
                  <button type="submit" class="cursor-pointer text-gray-400 group-hover:text-white no-underline text-base font-medium  " role="menuitem" tabindex="-1" id="user-menu-item-2">
                    Sign out
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                  </button>
              </div>
        </form>
      </div>
    </div>
  </div>
</nav>