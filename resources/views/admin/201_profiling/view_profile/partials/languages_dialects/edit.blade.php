@extends('layouts.app')
@section('title', 'Create 201 profile')
@section('content')

<div class="relative my-10 overflow-x-auto shadow-lg sm:rounded-lg">
    <div class="w-full text-left text-gray-500">
        <div class="bg-blue-500 uppercase text-gray-700 text-white">
            <h1 class="px-6 py-3">
               Update Form Language Dialect
            </h1>
        </div>

        <div class="bg-white px-6 py-3">
            <form action="{{ route('language.update', ['ctrlno'=>$profileTblLanguages->ctrlno]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="mb-3">
                        <label for="language_dialect">Language Dialect<sup>*</sup></label>
                        <select id="language_dialect" name="language_dialect" required>
                            <option disabled selected>Select language</option>
                            @foreach($profileLibTblLanguageRef as $profileLibTblLanguageRefs)
                                @if ($profileLibTblLanguageRefs->title == $profileTblLanguages->language_description)
                                    <option value="{{ $profileLibTblLanguageRefs->title}}" selected>
                                        {{ $profileLibTblLanguageRefs->title }}
                                    </option>
                                @else
                                    <option value="{{ $profileLibTblLanguageRefs->title}}">
                                        {{ $profileLibTblLanguageRefs->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('language_dialect')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">
                        Update Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection