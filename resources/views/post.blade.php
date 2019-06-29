@extends('layouts.welcome')


@section('content')

 <!-- Page Content -->
    <div class="row" >

        <!-- Blog Post Content Column -->
        <div class="col-lg-8 m-auto">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$work_details->work_title}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">{{$work_details->user_name}}</a>
            </p>    

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" style="max-height: 350px; max-width: 100%;" src="../images/{{ $work_details->photo_path }}" alt="">

            <hr>

            <!-- Post Content -->
            <h5><?php echo $work_details->work_description; ?></h5>
            
            <span class="bg-white p-2"> Work limit: Within {{$work_details->work_urgency}} days</span>
            <span class="bg-white p-2 ml-5"> Location: {{$work_details->area_name}}</span>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="POST" action="{{route('comment',$work_details->id)}}">
                   @csrf
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="comment_content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach($comments as $comment)
            <hr>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->user_name}}
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    {{$comment->comment_content}}
                </div>
                 <a class="pull-right" href="{{ route('work.deal',['user_id'=>$comment->user_id,'work_details_id'=>$comment->work_details_id]) }}">
                   <button class="bg-info p-3">Deal</button>
                </a>
            </div>
            @endforeach
        </div>

        <!-- Blog Sidebar Widgets Column -->
<!--        <div class="col-md-4">-->

            <!-- Blog Categories Well -->
<!--
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                </div>
-->
                <!-- /.row -->
<!--            </div>-->

            <!-- Side Widget Well -->
<!--
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>
-->

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>


@stop