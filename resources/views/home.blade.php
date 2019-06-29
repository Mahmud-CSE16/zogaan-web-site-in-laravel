@if(session('role'))


@extends('layouts.welcome')


@section('content')

<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-10 m-auto">

    <h1 class="page-header">
        Work Offers
        <small style="font-size:16px;">Find your sweetable job offer here.</small>
    </h1>
    <hr>

    <!-- First Blog Post -->
    
    <?php
         $results = DB::select('select work_details.id, work_details.user_id, work_details.work_title,work_details.work_description,work_details.work_status,work_details.work_urgency,work_details.photo_path, users.name,(SELECT area_name FROM area WHERE users.area_id = area.id) as area_name from work_details INNER JOIN users ON users.id=work_details.user_id and work_details.work_status="published" ORDER BY work_details.id DESC ;');
         $raw_count = DB::table('work_details')->where('work_status', 'published')->count();
    
    
         if($raw_count == 0){
             echo "<h1 class='display-1 text-center'>No Post Sorry</h1>";
         }else{
         foreach($results as $work_details){
         ?>
         <h2>
        <a href="{{route('work_details.show',$work_details->id)}}">{{ $work_details->work_title}}</a>
        </h2>
        <p class="lead">
            by <a href="#">{{ $work_details->name}}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
        <hr>
        <img style="max-height: 350px; max-width: 100%;" src="../images/{{ $work_details->photo_path }}" alt="">
        <p><?php echo $work_details->work_description; ?></p>
        <span class="bg-white p-2"> Work limit: Within {{$work_details->work_urgency}} days</span>
         <span class="bg-white p-2 ml-5"> Location: {{$work_details->area_name}}</span>
        <hr>
        <a class="btn btn-primary" style="margin-left: 70%;" href="{{route('work_details.show',$work_details->id)}}">Read More </a>

        <hr>    
         <?php
         }
         }
    ?>

    <!-- Pager -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>

</div>
    </div>

    <!-- /.row -->

@stop


@section('footer')

<hr>
<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>
@stop


@else
  <?php
   header("location: /");
   ?>

@endif