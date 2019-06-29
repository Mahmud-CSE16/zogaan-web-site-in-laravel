@extends('layouts.admin')


@section('content')

<div class="row">
<div class="col-sm-7 register-right m-auto">
    <h2>Add New User</h2>
    <div class="register-form pl-4">
        <form action="{{route('users.store')}}" method="POST">
           @csrf
            <div class="form-group">
                <input type="text" class="form-control d-inline" name="name" placeholder="Enter user name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control d-inline" name="email" placeholder="Enter user email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control d-inline" name="phone_no" placeholder="Enter user phone no." required>
            </div>
            <div class="form-group ml-3">
               <label for="area" style="color: #000;">Live in Or Work Zone</label>
               <select name="area_id" id="area" required>
                 <option value=''>Select Option</option>
                 @foreach($areas as $area)
                    <option value='{{$area->id}}'>{{$area->area_name}}</option>
                 @endforeach
               </select>
            </div>
            
            <span class="pl-3" style="color:#000;" >Skilled On(Optional):</span> <br>
            <div class="form-group bg-white pl-3 skilled_on_checkBox" style="border-radius: 1.5rem;">
              @foreach($job_categories as $job_category)
              <input type="checkbox" style="width:20px;" name="checkBoxArray[]" value="{{$job_category->id}}"><span style="color:#000;" >{{$job_category->job_name}}</span> <br>
              @endforeach
            </div>
            <div class="form-group">
                <input type="text" class="form-control d-inline" name="address" placeholder="Enter user address" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control d-inline" name="password" placeholder="Enter user password"required>
            </div>
            <button type="submit" class="btn btn-primary w-25" name="add_user">Add New User</button>
       </form>
    </div>
</div>
</div>

@stop