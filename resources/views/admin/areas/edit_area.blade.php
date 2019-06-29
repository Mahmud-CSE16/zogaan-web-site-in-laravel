
@extends('layouts.admin')


@section('content')

        <div class="row">
            <div class="col-sm-8 m-auto register-right">
                <h2>Work Areas</h2>
                <div class="register-form pl-4">
                    <form action="{{ route('areas.update',$area->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-8">
                               <div class="form-group">
                                <input type="text" class="form-control d-inline w-100" name="area_name" placeholder="Create New Work Area" value="{{$area->area_name}}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary w-100 m-0" name="update_area">Update Area</button>
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
                    @foreach($areas as $area)
                        <tr>
                          <th scope="row">{{$area->area_name}}</th>
                          <td><a href="{{ route('areas.edit',$area->id) }}">Update</a></td>
                          <td><form method="post" action="{{ route('areas.destroy',$area->id) }}">
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

