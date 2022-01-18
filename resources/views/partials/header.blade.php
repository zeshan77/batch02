<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="#">
                    <span class="sr-only">Workflow</span>
                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                </a>
            </div>

            <nav class="flex space-x-10">

                <a href="/users/create" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    Users
                </a>

            </nav>
            <div class="flex items-center justify-end md:flex-1 lg:w-0">
                @guest
                    <a href="/login" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                        Sign in
                    </a>
                    <a href="/register" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Sign up
                    </a>
                @endguest

                @auth
                    <a href="/dashboard" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        {{ auth()->user()->name }}
                    </a>
                @endauth

            </div>
        </div>
    </div>

</div>
