@if(Auth::check())
    <li id="start"> {{link_to('/','Start')}}</li>
    <li id="events"> {{link_to_route('events','Event')}}</li>
    <li id="admin"> {{link_to_route('admin','Styrelsemedlemmar')}}</li>
    <li id="menu"> {{link_to_route('menu.index','Menyer')}}</li>
    <li id="fileuploader"> {{link_to_route('fileuploader','Filer')}}</li>
    {{--Detta bör troligtvis göras snyggare--}}
    <?php
    $menus = Menu::orderBy('order')->get();
    ?>
    @foreach($menus as $menu)
        <?php
        $subMenusView = Submenu::where('menuId', '=', $menu->id)->orderBy('order')->get();
        ?>
        <li class="dropdown" id='{{$menu->url}}'>
            @if(count($subMenusView)!= 0)
                <a href="{{route('menu.dyn',$menu->url)}}" class="dropdown-toggle">{{$menu->name}} <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-fade">
                    @foreach($subMenusView as $subMenu)
                        <li id="{{$subMenu->id}}">{{link_to_route('menu.dyn',$subMenu->name, $subMenu->url)}}
                        </li>
                    @endforeach
                </ul>
            @else
                <a href= {{route('menu.dyn',$menu->url)}}>{{$menu->name}}</a>
            @endif
        </li>

    @endforeach
    <li><a href="#contact" data-toggle="modal">Kontakt</a></li>
    @else
            <!-- only if window width is =< 766 px

    <script language="javascript">
        width = screen.width;
    </script>

    <li id="futf"> {{link_to('/','Futf')}}</li>
    <li id="alumn"> {{link_to('http://alumn.futf.se/','Alumn')}}</li>
    <hr>-->
    <li id="start"> {{link_to('/','Start')}}</li>
    <li id="events"> {{link_to_route('events','Event')}}</li>
    <li id="create">{{link_to_route('new_admin', 'Skapa konto')}}</li>
    {{--<li> {{link_to_route('login','Login')}}</li>--}}
    @if(isset($showLogin))
        <li id="login"><a href="#modalLogin" data-toggle="modal">Login</a></li>
    @endif
    <li id="contactA"><a href="#contact" data-toggle="modal">Kontakt</a></li>
@endif