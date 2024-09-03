@extends('admin.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Verification Requests</h1>
        <div class="p-3 py-5 bg-gray-200 rounded">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>NIN</th>
                    <th>TIN</th>
                    <th>Business Reg</th>
                    <th>Verification Status</th>
                    <th>Date Requested</th>
                    <th>Approve</th>
                    <th>Nin Details</th>
{{--                    <th>Reject</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{ $user->verification->nin_document ?? 'N/A' }}">View Nin Document</a></td>
                        <td><a href="{{ $user->verification->tin_document ?? 'N/A' }}">View Tin Document</a></td>
                        <td><a href="{{ $user->verification->business_certificate ?? 'N/A' }}">View Cac Document</a></td>
                        <td>{{ ucfirst($user->verification->status) }}</td>
                        <td>{{$user->verification->created_at->diffForHumans()}}</td>
                        <td>
                            @if($user->verification->status == 'pending')
                                <form action="{{ route('admin.verifications.approve', $user->verification->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            @endif
                        </td>

                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModalBvn{{$user->id}}">
                                View
                            </button>
                        </td>

{{--                        <td>--}}
{{--                            @if($user->verification->status == 'pending')--}}
{{--                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal{{$user->id}}">--}}
{{--                                    Reject--}}
{{--                                </button>--}}
{{--                            @endif--}}
{{--                        </td>--}}



                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Reject Modal Template -->
        @foreach($users as $user)
            <div class="modal fade" id="rejectModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.verifications.reject', $user->verification->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel{{$user->id}}">Reject Verification Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Reason for Rejection</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach








        <!-- Reject Modal Template -->
        @foreach($users as $user)
            <div class="modal fade" id="rejectModalBvn{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.verifications.reject', $user->verification->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel{{$user->id}}">Reject Verification Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Reason for Rejection</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="4" required></textarea>
                                </div>

                                <!-- BVN Data Display -->
                                <h5>BVN Details</h5>
                                <p><strong>Full Name:</strong> {{$user->bvnData->first_name}} {{$user->bvnData->middle_name}} {{$user->bvnData->last_name}}</p>
                                <p><strong>BVN:</strong> {{$user->bvnData->bvn}}</p>
                                <p><strong>Date of Birth:</strong> {{$user->bvnData->date_of_birth}}</p>
                                <p><strong>Phone Number 1:</strong> {{$user->bvnData->phone_number1}}</p>
                                <p><strong>Phone Number 2:</strong> {{$user->bvnData->phone_number2}}</p>
                                <p><strong>Gender:</strong> {{$user->bvnData->gender}}</p>
                                <img src="{{$user->bvnData->image}}" alt="BVN Image" width="100" height="100">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <!-- /.container-fluid -->
@endsection
