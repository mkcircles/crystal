@extends('layouts.administrator')
@section('content')
    @include('partials.navbar')
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="grid lg:grid-cols-2 mb-6">
                <div>
                    <h4 class="mb-1 text-xl font-semibold tracking-tight text-gray-900 dark:text-white group">Groups</h4>
                    <p class="text-md text-gray-500 lg:mb-0 dark:text-gray-400 lg:max-w-2xl">List of registered groups</p>
                </div>
                <div class="flex-wrap items-end justify-end hidden lg:flex">
                    <a class="flex justify-center items-center py-2 px-4 text-sm font-medium text-center text-gray-600 rounded-lg border border-gray-200 bg-white-100 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:border-gray-600" href="#">
                        Add Group
                    </a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Group Name</th>
                            <th scope="col" class="px-4 py-3">Number of Members</th>
                            <th scope="col" class="px-4 py-3">District</th>
                            <th scope="col" class="px-4 py-3">Created At</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$group->group_name}}</th>
                            <td class="px-4 py-3">{{number_format($group->members_count)}}</td>
                            <td class="px-4 py-3">{{$group->district->district_name}}</td>
                            <td class="px-4 py-3">{{$group->created_at}}</td>
                            <td class="px-4 py-3 flex items-center">
                                <a href="{{route('group.show',['groupId'=>$group->id])}}" class="text-gray-500  hover:text-blue-400">Show Members</a>
                                
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase dark:text-gray-400">
                {{ $groups->links()}}
                </div>

            </div>
        </div>
    </section>
@endsection
