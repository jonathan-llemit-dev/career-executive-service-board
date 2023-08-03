@extends('layouts.app')
@section('title', 'Work Experience Recyle Bin')
@section('sub', 'Work Experience Recyle Bin')
@section('content')
@include('admin.201_profiling.view_profile.header', ['cesno' => $cesno])

<div class="flex justify-end">
    <a href="{{ route('work-experience.index', ['cesno'=>$cesno]) }}" class="btn btn-primary mb-7">Go back</a>
</div>

<div class="table-work-experience relative overflow-x-auto sm:rounded-lg shadow-lg">
    <table class="w-full text-left text-sm text-gray-500">
        <thead class="bg-blue-500 text-xs uppercase text-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Control No
                </th>

                <th scope="col" class="px-6 py-3">
                    Inclusive Dates
                </th>

                <th scope="col" class="px-6 py-3">
                    Position Title
                </th>

                <th scope="col" class="px-6 py-3">
                    Department Agency
                </th>

                <th scope="col" class="px-6 py-3">
                    Monthly Salary
                </th>

                <th scope="col" class="px-6 py-3">
                    Salary Grade
                </th>

                <th scope="col" class="px-6 py-3">
                    Status of Appointment
                </th>

                <th scope="col" class="px-6 py-3">
                    Government Service
                </th>

                <th scope="col" class="px-6 py-3">
                    Remarks
                </th>

                <th scope="col" class="px-6 py-3">
                    Deleted At
                </th>

                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($workExperienceTrashedRecord as $workExperienceTrashedRecords)
                <tr class="border-b bg-white">
                    <td scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                        {{ $workExperienceTrashedRecords->ctrlno }}
                    </td>

                    <td scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                        {{ $workExperienceTrashedRecords->from_dt." - ".$workExperienceTrashedRecords->to_dt }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->designation }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->department }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->monthly_salary }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->salary }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->status }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->government_service }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->remarks }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $workExperienceTrashedRecords->deleted_at }}
                    </td>

                    <td class="px-6 py-4 text-right uppercase">
                        <div class="flex">
                            <form action="{{ route('work-experience.restore', ['ctrlno'=>$workExperienceTrashedRecords->ctrlno]) }}" method="POST">
                                @csrf
                                <button class="mx-1 font-medium text-blue-600 hover:underline" type="submit">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/nxooksci.json"
                                        trigger="hover"
                                        colors="primary:#121331"
                                        style="width:24px;height:24px">
                                    </lord-icon>
                                </button>
                            </form>

                            <form action="{{ route('work-experience.forceDelete', ['ctrlno'=>$workExperienceTrashedRecords->ctrlno]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mx-1 font-medium text-red-600 hover:underline" type="submit">
                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                    <lord-icon
                                        src="https://cdn.lordicon.com/jmkrnisz.json"
                                        trigger="hover"
                                        colors="primary:#880808"
                                        style="width:24px;height:24px">
                                    </lord-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection