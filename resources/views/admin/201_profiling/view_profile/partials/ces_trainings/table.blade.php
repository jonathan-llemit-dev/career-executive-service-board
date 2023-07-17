<div class="my-5 flex justify-end">
    <button class="btn btn-primary" onclick="openFormCesTraining()">Add Ces Training</button>
    <button class="btn btn-primary hidden" onclick="openTableCesTraining()">Go back</button>
</div>

<div class="form-ces-trainings hidden">
    @include('admin.201_profiling.view_profile.partials.ces_trainings.form')
</div>

<div class="table-ces-trainings relative overflow-x-auto sm:rounded-lg shadow-lg">
    <table class="w-full text-left text-sm text-gray-500">
        <thead class="bg-blue-500 text-xs uppercase text-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Session Title / Program
                </th>
                <th scope="col" class="px-6 py-3">
                    Session number
                </th>
                <th scope="col" class="px-6 py-3">
                    Training Category / Theme
                </th>
                <th scope="col" class="px-6 py-3">
                    Expertise / Field of Specialization
                </th>
                <th scope="col" class="px-6 py-3">
                    Inclusive dates
                </th>
                <th scope="col" class="px-6 py-3">
                    Venue
                </th>
                <th scope="col" class="px-6 py-3">
                    No. of Training Hours
                </th>
                <th scope="col" class="px-6 py-3">
                    Barrio
                </th>
                <th scope="col" class="px-6 py-3">
                    Resource Speaker
                </th>
                <th scope="col" class="px-6 py-3">
                    Session Director
                </th>
                <th scope="col" class="px-6 py-3">
                    Training Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Remarks
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
        </thead>
        <tbody>

            <tr class="border-b bg-white">
                <td scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>
                <td class="px-6 py-3">
                    Lorem ipsum dolor
                </td>

                <td class="px-6 py-4 text-right uppercase">
                    <div class="flex">
                        <a href="#" class="mx-1 font-medium text-blue-600 hover:underline">Update</a>
                        <a href="#" class="mx-1 font-medium text-red-600 hover:underline">
                            <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/jmkrnisz.json"
                                trigger="hover"
                                colors="primary:#880808"
                                style="width:24px;height:24px">
                            </lord-icon>
                        </a>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>
