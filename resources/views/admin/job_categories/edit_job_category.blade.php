
@extends('layouts.admin')


@section('content')

        <div class="row">
            <div class="col-sm-8 m-auto register-right">
                <h2>Work Areas</h2>
                <div class="register-form pl-4">
                    <form action="{{ route('job_categories.update',$job_category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-8">
                               <div class="form-group">
                                <input type="text" class="form-control d-inline w-100" name="job_name" placeholder="Create New Job Title" value="{{$job_category->job_name}}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary w-100 m-0" name="update_area">Update Job Title</button>
                            </div>
                        </div>
                   </form>
                </div>
                
                <table class="table w-75 m-auto text-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Work Zone</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($job_categories as $job_category)
                        <tr>
                          <th scope="row">{{$job_category->job_name}}</th>
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

