@extends('layouts.app')
@section('title', 'Educational Attainment')
@section('sub', 'Educational Attainment')
@section('content')
@include('admin.201_profiling.view_profile.header', ['cesno' => $cesno])


<div class="flex justify-end">
    <a href="{{ route('educational-attainment.index', ['cesno' => $cesno]) }}" class="btn btn-primary">Go Back</a>
</div>

<div class="relative my-10 overflow-x-auto shadow-lg sm:rounded-lg">
    <div class="w-full text-left text-gray-500">
        <div class="bg-blue-500 uppercase text-gray-700 text-white">
            <h1 class="px-6 py-3">
                Form Educational Attainment
            </h1>
        </div>

        <div class="bg-white px-6 py-3">
            <form action="{{ route('educational-attainment.store', ['cesno'=>$cesno]) }}" method="POST" id="educational_attainment" onsubmit="return checkErrorsBeforeSubmit(educational_attainment)">
                @csrf
    
                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="mb-3">
                        <label for="level">Level<sup>*</sup></label>
                        <select id="level" name="level" required>
                            <option disabled selected>Select Level</option>
                            <option value="Elementary">Elementary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="College">College</option>
                            <option value="Graduate Studies">Graduate Studies</option>
                            <option value="Vocation/Trade Course">Vocation/Trade Course</option>
                        </select>
                        @error('level')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="mb-3">
                        <label for="school_code">School</label>
                        <select id="school_code" name="school_code" required>
                            <option disabled selected>Select School</option>
                            @foreach($profileLibTblEducSchool as $profileLibTblEducSchools)
                                <option value="{{ $profileLibTblEducSchools->CODE }}">
                                    {{ $profileLibTblEducSchools->SCHOOL }}
                                </option>
                            @endforeach
                        </select>
                        @error('school_code')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="major_code">Course<sup>*</span></label>
                        <select id="major_code" name="major_code" required>
                            <option disabled selected>Select Specialization</option>
                            @foreach($profileLibTblEducMajor as $profileLibTblEducMajors)
                                <option value="{{ $profileLibTblEducMajors->CODE }}">
                                    {{ $profileLibTblEducMajors->COURSE }}
                                </option>
                            @endforeach
                        </select>
                        @error('major_code')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="degree_code">Degree<sup>*</span></label>
                        <select id="degree_code" name="degree_code" required>
                            <option disabled selected>Select Degree</option>
                            @foreach($profileLibTblEducDegree as $profileLibTblEducDegrees)
                                <option value="{{ $profileLibTblEducDegrees->CODE }}">
                                    {{ $profileLibTblEducDegrees->DEGREE }}
                                </option>
                            @endforeach
                        </select>
                        @error('degree_code')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="school_type">School type<sup>*</span></label>
                        <select id="school_type" name="school_type" required>
                            <option disabled selected>Select School type</option>
                            <option value="Local">Local</option>
                            <option value="Foreign">Foreign</option>
                        </select>
                        @error('school_type')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="mb-3">
                        <label for="period_of_attendance_from">Period of attendance (From)<sup>*</span></label>
                        <input type="date" id="period_of_attendance_from" name="period_of_attendance_from" oninput="validateDateInput(period_of_attendance_from)" required>
                        <p class="input_error text-red-600"></p>
                        @error('period_of_attendance_from')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="period_of_attendance_to">Period of attendance (To)<sup>*</span></label>
                        <input type="date" id="period_of_attendance_to" name="period_of_attendance_to" oninput="validateDateInput(period_of_attendance_to)" required>
                        <p class="input_error text-red-600"></p>
                        @error('period_of_attendance_to')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="highest_level">Highest Level / Unit earned (if not graduated)</label>
                        <input id="highest_level" name="highest_level" type="text">
                        @error('highest_level')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="mb-3">
                        <label for="year_graduate">Year Graduate<sup>*</span></label>
                        <input type="text" id="year_graduate" name="year_graduate" oninput="validateInput(year_graduate, 4, 'numbers')" onkeypress="validateInput(year_graduate, 4, 'numbers')" onblur="checkErrorMessage(year_graduate)" required>
                        <p class="input_error text-red-600"></p>
                        @error('year_graduate')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="academics_honor_received">Academic Honors Received</label>
                        <input id="academics_honor_received" name="academics_honor_received" type="text">
                        @error('academics_honor_received')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
