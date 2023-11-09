@extends('layouts.app')
@section('title', 'Department Agency Manager')
@section('content')

<form>
    <fieldset class="border p-4 bg-gray-50">
        <legend>View Filter</legend>
        <div class="sm:gid-cols-3 mb-3 grid gap-4 md:grid-cols-3 lg:grid-cols-3">

            <div class="mb-3">
                <label for="sectorToggle">Sector</label>
                <select id="sectorToggle" name="sectorToggle">
                    <option value="">Select Sector</option>
                    @foreach ($sector as $data)
                    <option value="{{ $data->sectorid }}" {{ $data->sectorid == $sectorToggle ? 'selected' : ''}}>
                        {{ $data->title }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center mt-3 gap-2">
                <button class="btn btn-primary" type="submit">Search</button>
                <a class="btn btn-secondary" href="{{ route('library-department-manager.index') }}">Reset</a>
            </div>
        </div>
    </fieldset>

    <div class="lg:flex lg:justify-between my-3">
        <div>
            @include('admin.plantilla.library.search')
        </div>
        <a href="#" class="text-blue-500 uppercase text-2xl">
            @yield('title')
        </a>
        <div class="flex items-center">
            <a href="{{ route('library-department-manager.trash') }}">
                <lord-icon src="https://cdn.lordicon.com/jmkrnisz.json" trigger="hover" colors="primary:#DC3545"
                    style="width:34px;height:34px">
                </lord-icon>
            </a>

            <a class="btn btn-primary" href="{{ route('library-department-manager.create') }}">Add record</a>
        </div>
    </div>
</form>

<div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
    <table class="w-full text-left text-sm text-gray-500">
        <thead class="bg-blue-500 text-xs uppercase text-gray-700 text-white">
            <tr>
                {{-- <th class="px-6 py-3" scope="col">Department ID</th> --}}
                {{-- <th class="px-6 py-3" scope="col">Sector</th> --}}
                <th class="px-6 py-3" scope="col">Agency / Bureau</th>
                <th class="px-6 py-3" scope="col">Agency / Bureau Acronym</th>
                <th class="px-6 py-3" scope="col">Mother Agency</th>
                <th class="px-6 py-3" scope="col">Office type</th>
                <th class="px-6 py-3" scope="col">Agency website</th>

                <th class="px-6 py-3" scope="col">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($datas as $data)
            <tr>
                <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                    {{ $data->title }}
                </td>
                <td class="px-6 py-3">
                    {{ $data->acronym }}
                </td>
                <td class="px-6 py-3">
                    {{ $data->motherDepartment->title ?? 'N/A'}}
                </td>
                <td class="px-6 py-3">
                    {{ $data->departmentAgencyType->title ?? 'N/A' }}
                </td>
                <td class="px-6 py-3">
                    <a href="{{ $data->website ?? 'N/A' }}" target="_blank" class="hover:text-blue-500">
                        {{ $data->website ?? 'N/A' }}
                    </a>
                </td>

                <td class="px-6 py-4 text-right uppercase">
                    <div class="flex justify-end">
                        <a class="hover:bg-slate-100 rounded-full"
                            href="{{ route('library-department-manager.edit', $data->deptid) }}">
                            <lord-icon src="https://cdn.lordicon.com/hbvgknxo.json" trigger="hover"
                                colors="primary:#ebe6ef,secondary:#4bb3fd,tertiary:#3a3347"
                                style="width:24px;height:24px">
                            </lord-icon>
                        </a>
                        <form class="hover:bg-slate-100 rounded-full"
                            action="{{ route('library-department-manager.destroy', $data->deptid) }}" method="POST"
                            onsubmit="return window.confirm('Are you sure you want to delete this item?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="mx-1 font-medium text-red-600 hover:underline">
                                <lord-icon src="https://cdn.lordicon.com/jmkrnisz.json" trigger="hover"
                                    colors="primary:#DC3545" style="width:24px;height:24px">
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

<div class="m-5">
    {{ $datas->links() }}
</div>

@endsection