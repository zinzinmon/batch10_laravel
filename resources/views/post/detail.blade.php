@extends('template')

@section('content')

<!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <!-- {{$post->user->name}} -->
        
    

          
          @if(Auth::check() && Auth::id() == $post->user_id)
          
          <form method="post" action="{{route('post.destroy',$post->id)}}">
            @csrf
            @method('DELETE')

            <p>Posted on January {{$post->created_at->toDayDateTimeString()}}
            
           <input type="submit" class="btn btn-danger float-right ml-1" value="Delete">
           <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning float-right">Edit</a>
          </form>
          @endif
          <span>{{$post->category->name}}</span>
          

          
        </p>



        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset($post->image)}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

        <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a review:</h5>
          <div class="card-body">
            @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
       </div>
       @endif
            <form method="post" action="{{route('review.store')}}">
              @csrf
              <div class="form-group">
                <textarea class="form-control" rows="3" name="content"></textarea>
                <input type="hidden" name="postid" value="{{$post->id}}">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
          </div>
        </div>
        
        @php
            $reviews = $post->reviews ;
        @endphp

        @foreach($reviews as $row)
        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="{{asset($row->user->avatar)}}" alt="" width="50" height="50">
          <div class="media-body">
            <h5 class="mt-0">{{$post->user->name}}</h5>
            {{$row->body}}
          </div>
        </div>

        @endforeach


        <!-- Comment with nested comments -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> -->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection