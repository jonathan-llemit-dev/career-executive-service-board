<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="png" href="{{ asset('images/branding.png') }}">
    <title>@yield('title')</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css'>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js'></script>

    {{-- sweet alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script> {{-- lord icons --}}
</head>

<body>
    @include('layouts.tailwindcss')
    @include('layouts.modals')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    {{-- @include('layouts.partials.preloader') --}}

    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg p-4">
            @yield('content')
        </div>
    </div>

    {{-- js script for personal data interaction and validation --}}
    <script src="{{ asset('js/form-interaction-validation.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- end --}}

    {{-- js script for location api integration --}}
    <script src="{{ asset('js/location-api-integration.js') }}"></script>
    {{-- end --}}

    {{-- js script for uploading image --}}
    <script src="{{ asset('js/profile-avatar.js') }}"></script>
    {{-- end --}}

    {{-- js script for adding medical history --}}
    <script src="{{ asset('js/medical-history.js') }}"></script>
    {{-- end --}}

    {{-- js script for adding languages --}}
    <script src="{{ asset('js/languages.js') }}"></script>
    {{-- end --}}

    {{-- js script for confirmation button --}}
    <script src="{{ asset('js/confirmation.js') }}"></script>
    {{-- end --}}

    {{-- toast for personal data success --}}
    @if (Session::has('message'))

        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.success("{{ Session::get('message') }}",'Success!',{timeOut:7000});
        </script>

    @endif

    @if (Session::has('info'))

        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.info("{{ Session::get('info') }}",'Success!',{timeOut:7000});
        </script>

    @endif

    @if (Session::has('error'))

        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.error("{{ Session::get('error') }}",'Error!',{timeOut:7000});
        </script>

    @endif
    {{-- end toast --}}

    <!-- Modal for Avatar Upload -->
    <div id="profile-avatar-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
            <form id="uploadFormAvatar" action="{{ route('/upload-avatar-profile-201', ['cesno'=>$cesno]) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                @csrf
                <span class="close-avatar absolute top-2 right-2 text-gray-600 cursor-pointer">&times;</span>
                <h2 class="text-2xl font-bold mb-4 text-center">Upload New Avatar</h2>
                <input type="file" id="imageInputAvatar" name="imageInput" class="mb-4 p-2 border border-gray-300 rounded">
                <p class="text-red-600" id="ErrorMessageAvatar"></p>
                <div class="flex justify-center items-center mb-4">
                    <img id="imagePreviewAvatar" src="#" alt="Image Preview" class="hidden w-32 h-32 rounded-full">
                </div>
                <button type="submit" name="submit" id="uploadButtonAvatar" class="px-6 py-3 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 transition-colors duration-300">Upload</button>
            </form>
        </div>
    </div>
    {{-- end --}}

    {{-- confirmation dialog --}}
    <div id="confirmationBackdrop" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div id="confirmationDialog" class="bg-white w-1/3 p-6 rounded-lg shadow-lg hidden" data-form-id="">
            <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
            <p class="mb-4">Are you sure you want to delete this item?</p>
            <div class="text-right">
                <button class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg mr-2" onclick="closeConfirmationDialog()">Cancel</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg" onclick="deleteItem()">Delete</button>
            </div>
        </div>
    </div>
    {{-- end --}}

</body>

</html>
