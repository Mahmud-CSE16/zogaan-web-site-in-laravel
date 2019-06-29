@extends('layouts.admin')


@section('content')

        <div class="row">
            <div class="col-sm-8 m-auto register-right">
                <h2>Job Categories <sub>Total Job:{{$job_count}}</sub></h2>
                <div class="register-form pl-4">
                    <form action="/job_categories" method="POST">
                       @csrf
                        <div class="row">
                            <div class="col-sm-8">
                               <div class="form-group">
                                <input type="text" class="form-control d-inline w-100" name="job_name" placeholder="Create New Job title" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary w-100 m-0" name="create_area">Create New Job</button>
                            </div>
                        </div>
                   </form>
                </div>
                
                <table class="table w-75 m-auto text-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Work Zone</th>
                      <th scope="col">Number Of Worker</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($job_categories as $job_category)
                        <tr>
                          <th scope="row">{{$job_category->job_name}}</th>
                          <th scope="row">{{$job_category->numberOfWorker}}</th>
                          <td><a href="{{ route('job_categories.edit',$job_category->id) }}">Update</a></td>
                          <td><form method="post" action="{{ route('job_categories.destroy',$job_category->id) }}">
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

