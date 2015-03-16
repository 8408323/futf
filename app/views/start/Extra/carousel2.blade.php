<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
  <ul class="slides">
     @foreach($eventsWithPictures as $key => $picEvent)
     <li>
        <img src="{{$picEvent->pictureUrl}}">
                <h4>{{$picEvent->name}}
                </h4>
                {{--<p>--}}
                    {{--{{$picEvent->description}}--}}
                {{--</p>--}}
                <p>
                {{ link_to_route('event', 'Läs mer', array($picEvent->id), array('class'=>'btn btn-primary btn-md', 'role' =>'button')) }}
                </p>

     </li>
     @endforeach
  </ul>
</div>