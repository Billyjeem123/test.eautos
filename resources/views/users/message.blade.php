@extends('users.layouts.master')




@section('page.content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Messages</h1>
        <div class="">

        </div>
        <div class="table-responsive bg-gray-100 p-2 py-4">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Sender</th>
                    <th>Sender Phone</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>View Message</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{$message->user->name}}</td>
                        <td>{{$message->phone_number}}</td>
                        <td>{{$message->message}}</td>
                        <td>{{$message->created_at->diffForHumans()}}</td>
                        <td><p>{{$message->is_seen === 0 ? "Pending" : "Seen"}}</p></td>
                        <td><a href="{{route('all.message.id', $message->id)}}" class="btn btn-info btn-sm">View Message</a></td>
                        <form action="{{ route('all.message.delete', $message->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
