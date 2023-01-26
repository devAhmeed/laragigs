@extends('layout')

@section('content')

<x-card>
        <main>
            <!-- Search -->
            <form action="/">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i
                            class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                        ></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Search Laravel Gigs..."
                    />
                    <div class="absolute top-2 right-2">
                        <button
                            type="submit"
                            class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </form>

            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <header>
                        <h1
                            class="text-3xl text-center font-bold my-6 uppercase"
                        >
                            Manage Your Jobs
                        </h1>
                    </header>

                    <table class="w-full table-auto rounded-sm">
                        <tbody>
                        @unless($jobs->isEmpty())
                        @foreach($jobs as $job)
                                <tr class="border-gray-300">
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a href="show.html">
                                        {{$job->title}}
                                    </a>
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a
                                        href="/jobs/{{$job->id}}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"
                                        ><i
                                            class="fa-solid fa-pen-to-square"
                                        ></i>
                                        Edit</a
                                    >
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <form action="/jobs/{{$job->id}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="text-red-600">
                                            <i
                                                class="fa-solid fa-trash-can"
                                            ></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class ="text-center font-bold "><i class="fa-solid fa-right-from-bracket"></i> No Jobs Posted Yet</p>
                            </td>
                        </tr>
                        @endunless
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

</x-card>

@endsection
