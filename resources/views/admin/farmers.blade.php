@extends('layouts.administrator')
@section('content')
    @include('partials.navbar')
    
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="grid lg:grid-cols-2 mb-6">
                <div>
                    <h4 class="mb-1 text-xl font-semibold tracking-tight text-gray-900 dark:text-white group">{{$gp->group_name}}</h4>
                    <p class="text-md text-gray-500 lg:mb-0 dark:text-gray-400 lg:max-w-2xl">{{$gp->members_count}} members</p>
                </div>
                <div class="flex-wrap items-end justify-end hidden lg:flex">
                    
                </div>
            </div>

            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Farmer Name</th>
                            <th scope="col" class="px-4 py-3">Phone</th>
                            <th scope="col" class="px-4 py-3">Gender</th>
                            <th scope="col" class="px-4 py-3">DoB</th>
                            <th scope="col" class="px-4 py-3">Location</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($farmers as $farmer)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$farmer->member_name}}</th>
                            <td class="px-4 py-3">{{$farmer->member_phone}}</td>
                            <td class="px-4 py-3">{{$farmer->gender}}</td>
                            <td class="px-4 py-3">{{$farmer->member_dob}}</td>
                            <td class="px-4 py-3">
                                Village: {{$farmer->hh_village}}<br/>
                                Parish: {{$farmer->hh_parish}}<br/>
                                Subcounty: {{$farmer->hh_subcounty}}<br/>
                                District: {{$farmer->hh_district}}
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase dark:text-gray-400">
                {{ $farmers->links()}}
                </div>

            </div>
        </div>
    </section>
@endsection
