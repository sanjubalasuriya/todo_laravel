@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Todo Page</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title"
                                    aria-describedby="emailHelp" placeholder="Enter email">

                            </div>
                        </div>
                        <div class="col-lg-4"><button type="submit" class="btn btn-primary">Submit</button></div>

                    </div>

                </form>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            
                        
                      <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $task->title }}</td>
                        <td>@if ($task->done == 0)
                            <span class="badge badge-warning">Not Completed</span>
                            
                        @else
                        <span class="badge badge-success">Completed</span>
                        @endif</td>
                        <td>
                            <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="{{ route('todo.done',$task->id) }}" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
        }
    </style>
@endpush
