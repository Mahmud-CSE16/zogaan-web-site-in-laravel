
@extends('layouts.admin')

@section('content')

         <div class="row">
            <div class="w-100 register-right">
                <h2>All Work details</h2>
                
                <table class="table w-75 m-auto text-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Work Title</th>
                      <th scope="col">Service Provider</th>
                      <th scope="col">Work Status</th>
                      <th scope="col">Work Amount</th>
                      <th scope="col">Work Ratting</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($work_for as $work)
                        <tr>
                          <th scope="row"> <a href="{{ route('work_details.show',$work->id) }}">{{$work->work_title}}</a></th>
                          <th scope="row">{{ $work->service_provider_name }}</th>
                          <th scope="row">{{$work->work_status}}</th>
                          <th scope="row">{{$work->payment}}</th>
                          <th scope="row">{{$work->ratting}}</th>
                          
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>

@stop