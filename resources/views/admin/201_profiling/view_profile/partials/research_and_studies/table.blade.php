<div class="my-5 flex justify-end">
    <button class="btn btn-primary" onclick="openFormResearchAndStudies()">Add Research and Studies</button>
    <button class="btn btn-primary hidden" onclick="openTableResearchAndStudies()">Go back</button>
</div>

<div class="form-research-and-studies hidden">
    @include('admin.201_profiling.view_profile.partials.research_and_studies.form')
</div>

<div class="table-research-and-studies relative overflow-x-auto sm:rounded-lg shadow-lg">
    <table class="w-full text-left text-sm text-gray-500">
        <thead class="bg-blue-500 text-xs uppercase text-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Research Title
                </th>

                <th scope="col" class="px-6 py-3">
                    Publisher
                </th>

                <th scope="col" class="px-6 py-3">
                    Inclusive Dates
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
        </thead>
        <tbody>

            <tr class="border-b bg-white">
                <td scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                    Lorem ipsum
                </td>

                <td class="px-6 py-3">
                    Lorem ipsum
                </td>

                <td class="px-6 py-3">
                    Lorem ipsum
                </td>

                <td class="px-6 py-4 text-right uppercase">
                    <a href="#" class="mx-1 font-medium text-blue-600 hover:underline">Update</a>
                    <a href="#" class="mx-1 font-medium text-red-600 hover:underline">Delete</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>
