@extends('layouts.app')
@section('title', 'Office Type - Edit')
@section('content')

<div class="my-5 flex justify-between gap-4">
    <a href="#" class="text-blue-500 uppercase text-2xl">
        @yield('title')
    </a>
    <a class="btn btn-primary" href="{{ route('library-office-type.index') }}">Go back</a>
</div>

<div class="relative my-10 overflow-x-auto shadow-lg sm:rounded-lg">
    <div class="w-full text-left text-gray-500">
        <div class="bg-blue-500 uppercase text-gray-700 text-white">
            <h1 class="px-6 py-3">
                Office Type
            </h1>
        </div>

        <div class="bg-white px-6 py-3">
            <form action="{{ route('library-office-type.update', $datas->agency_typeid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="mb-3">
                        <label for="sectorid">Sector name<sup>*</span></label>
                        <select id="sectorid" name="sectorid" required>
                            @foreach ($sectors as $data)
                            <option value="{{ $data->sectorid }}" {{ $data->sectorid === $datas->sectorid ? 'selected' :
                                '' }}>
                                {{ $data->title }}
                            </option>
                            @endforeach
                        </select>
                        @error('sectorid')
                        <span class="invalid" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title">Title<sup>*</span></label>
                        <input id="title" name="title" type="text" value="{{ $datas->title }}" required>
                        @error('title')
                        <span class="invalid" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between">
                    <h1 class="text-slate-400 text-sm font-semibold">
                        Last update at {{ \Carbon\Carbon::parse($datas->lastupd_dt)->format('m/d/Y \a\t g:iA') }}
                    </h1>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection