
@extends('layouts.admin')

@section('content')

         <div class="row">
            <div class="w-100 register-right">
                <h2>All Work details</h2>
                
                <table class="table w-75 m-auto text-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Work Title</th>
                      <th scope="col">Image</th>
                      <th scope="col">Service Receiver</th>
                      <th scope="col">Work Status</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($work_details as $work)
                        <tr>
                          <th scope="row"> <a href="{{ route('work_details.show',$work->id) }}">{{$work->work_title}}</a></th>
                          <th scope="row"><img src="../images/{{ $work->photo_path }}" height="35"alt=""></th>
                          <th scope="row">{{ $work->name }}</th>
                          <th scope="row">{{$work->work_status}}</th>
                          <th><a href="{{ route('work_details.edit',$work->id) }}">Update</a></th>
                          <td><form method="post" action="{{ route('work_details.destroy',$work->id) }}">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="Delete">
                          </form></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>

@stop