<div class="relative my-10 overflow-x-auto shadow-lg sm:rounded-lg">
    <div class="w-full text-left text-gray-500">
        <div class="bg-blue-500 uppercase text-gray-700 text-white">
            <h1 class="px-6 py-3">
                Form Major Civic and Professional Affiliations
            </h1>
        </div>

        <div class="bg-white px-6 py-3">
            <form action="{{ route('affiliation.store', ['cesno'=>$mainProfile->cesno]) }}" method="POST">
                @csrf

                <div class="sm:gid-cols-1 mb-3 grid gap-4 md:grid-cols-2 lg:grid-cols-3">

                    <div class="mb-3">
                        <label for="organization">Organization<sup>*</sup></label>
                        <input id="organization" name="organization" required type="text">
                        @error('organization')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position">Position<sup>*</sup></label>
                        <input id="position" name="position" required type="text">
                        @error('position')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="date_from">Date from<sup>*</sup></label>
                        <input id="date_from" name="date_from" required type="date">
                        @error('date_from')
                            <span class="invalid" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="date_to">Date to<sup>*</sup></label>
                        <input id="date_to" name="date_to" required type="date">
                        @error('date_to')
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
