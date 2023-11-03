@extends('layouts.app')
@section('title', 'CES Training')
@section('sub', 'CES Training')
@section('content')
@include('admin.201_profiling.view_profile.header', ['cesno' => $cesno])

<div class="my-5 flex justify-end">
    <a href="{{ route('ces-training-201.index', ['cesno' => $cesno]) }}" class="btn btn-primary">Go Back</a>
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
            @foreach ($competencyCesTraining as $competencyCesTrainings)
            <tr class="border-b bg-white">
                <td scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                    {{ $competencyCesTrainings->participantTrainingSession->title ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->sessionid ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->category ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->specialization ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ \Carbon\Carbon::parse($competencyCesTrainings->participantTrainingSession->from_dt)->format('m/d/Y') ?? 'No Record' }}
                    {{ \Carbon\Carbon::parse($competencyCesTrainings->participantTrainingSession->to_dt)->format('m/d/Y') ?? 'No Record' }}
                    
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->venuePersonalData->name ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->no_hours ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->barrio ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->resourceSpeakerPersonalData->lastname ?? 'No Record' }}, 
                    {{ $competencyCesTrainings->participantTrainingSession->resourceSpeakerPersonalData->firstname ?? 'No Record' }}, 
                    {{ $competencyCesTrainings->participantTrainingSession->resourceSpeakerPersonalData->mi ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->session_director ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->status ?? 'No Record' }}
                </td>

                <td class="px-6 py-3">
                    {{ $competencyCesTrainings->participantTrainingSession->remarks ?? 'No Record' }}
                </td>

                <td class="px-6 py-4 text-right uppercase">
                    <div class="flex">
                        <form action="{{ route('ces-training-201.restore', ['ctrlno'=>$competencyCesTrainings->pid]) }}"
                            method="POST" id="restore_ces_training_201_form{{$competencyCesTrainings->pid}}">
                            @csrf
                            <button type="button" id="restoreCesTraining201Button{{$competencyCesTrainings->pid}}"
                                onclick="openConfirmationDialog(this, 'Confirm Restoration', 'Are you sure you want to restore this info?')">
                                <lord-icon src="https://cdn.lordicon.com/nxooksci.json" trigger="hover"
                                    colors="primary:#121331" style="width:24px;height:24px">
                                </lord-icon>
                            </button>
                        </form>

                        <form
                            action="{{ route('ces-training-201.forceDelete', ['ctrlno'=>$competencyCesTrainings->pid]) }}"
                            method="POST" id="delete_ces_training_201_form{{$competencyCesTrainings->pid}}">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                id="permanentDeleteCesTraining201Button{{$competencyCesTrainings->pid}}"
                                onclick="openConfirmationDialog(this, 'Confirm Permanent Deletion', 'Are you sure you want to delete this info?')">
                                <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                <lord-icon src="https://cdn.lordicon.com/jmkrnisz.json" trigger="hover"
                                    colors="primary:#880808" style="width:24px;height:24px">
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
    {{ $competencyCesTraining->links() }}
</div>

@endsection