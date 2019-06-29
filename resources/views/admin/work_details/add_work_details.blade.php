@extends('layouts.admin')


@section('content')

<div class="row">
<div class="col-sm-7 register-right m-auto">
    <h2>Create New Work Offer</h2>
    <div class="register-form pl-4">
        <form action="{{route('work_details.store')}}" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
               <label for="work_title">Work Title:</label>
                <input type="text" class="form-control d-inline" name="work_title" placeholder="Enter Work Title" required>
            </div>
            <div class="form-group">
               <label for="photo">Choose an image:</label>
              <input type="file" name="photo" id="photo">
            </div>
            <div class="form-group">
               <label for="work_details">Work Description:</label>
               <textarea  class="form-control" id="body" name="work_description" required ></textarea>
            </div>
            <div class="form-group">
                <label for="work_urgency">Work Urgency (Within days):</label>
                <input type="number" class="form-control d-inline" name="work_urgency" placeholder="Enter Urgency Within Days" required>
            </div>
            <button type="submit" class="btn btn-primary w-25" name="add_user">Offer Submit</button>
       </form>
    </div>
</div>
</div>

@stop