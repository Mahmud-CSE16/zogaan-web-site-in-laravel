
@extends('layouts.admin')

@section('content')

         <div class="row">
            <div class="w-100 register-right">
                <h2>Users <sub>All User:{{$user_count}}</sub></h2>
                
                <table class="table w-75 m-auto text-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone No</th>
                      <th scope="col">WorkZoneOrLiveIn</th>
                      <th scope="col">Role</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$user->name}}</th>
                          <th scope="row">{{$user->email}}</th>
                          <th scope="row">{{$user->phone_no}}</th>
                          <th scope="row">{{$user->area_name}}</th>
                          <th scope="row">{{$user->role}}</th>
                          <td><a href="{{ route('users.edit',$user->id) }}">Update</a></td>
                          <td><form method="post" action="{{ route('users.destroy',$user->id) }}">
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