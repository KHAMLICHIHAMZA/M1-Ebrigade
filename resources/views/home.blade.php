@extends('layouts.master')

@section('content')
<div class="container">
    <div class=" justify-content-center">
        <div class="col-md-12">
            <div class="card"> 

                <div class="card-header">
                    <h1 class="display-4 text-center" style="font-size: 2.5rem">   @lang("title") {{ session('P_NOM') }}
                    </h1>
                </div>
               <div class="card-body">
                  
                  <div style="background-color: #f8f9fa;">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
                                     <h3 class="display-4 text-center" style="font-size: 1.5rem">@lang("langage")</h3>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @php $locale = App::getLocale(); @endphp
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @switch($locale)
                                            @case('en')
                                            <img src="{{asset('us.jpg')}}"> English
                                            @break
                                            @case('fr')
                                            <img src="{{asset('fr.png')}}"> Français
                                            @break
                                            @case('de')
                                            <img src="{{asset('de.jpg')}}"> Deutsh
                                            @break
                                            @default
                                            <img src="{{asset('us.jpg')}}"> English
                                            @endswitch
                                        <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="lang/en"><img src="{{asset('us.jpg')}}"> English</a>
                                        <a class="dropdown-item" href="lang/de"><img src="{{asset('de.jpg')}}"> Deutsh</a>
                                        <a class="dropdown-item" href="lang/fr"><img src="{{asset('fr.png')}}"> French</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </nav>
                </div>

             
                </div>

                    


                </div>     
                
                

            </div>
      </div>

        <div class="col-md-12  justify-content-center">
            <div class="card" >
                <div class="card-header"><h1 class="display-4 text-center" style="font-size: 2.5rem">@lang("Meteo")</h1>
                </div>
                    <div class="card-body">
                     <!-- widget meteo -->
                    <div id="widget_9320e3e6519132f14855360293d07cb9">
                            <span id="l_9320e3e6519132f14855360293d07cb9"><a href="http://www.mymeteo.info/r/mulhouse_u">Mulhouse France donn&eacute;es m&eacute;t&eacute;o</a></span>
                            <script type="text/javascript">
                            
                            (function() {
                                var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
                                my.src = "https://services.my-meteo.com/widget/js_design?ville=632&format=horizontal&nb_jours=5&ombre1=000000&c1=ffffff&c2=a9a9a9&c3=ffffff&c4=ffffff&c5=ffffff&police=0&t_icones=2&fond=1&masque=3&x=784&y=150&d=0&id=9320e3e6519132f14855360293d07cb9";
                                var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
                            })();
                            </script>
                            </div>
                            <!-- widget meteo -->

                                            </div>

                                        


                                    </div>     
            
            

        </div>
        <div class="col-md-12 justify-content-center">
            <div class="card" >
                <div class="card-header"><h1 class="display-4 text-center" style="font-size: 2.5rem">@lang("Carte")</h1>
                </div>
                    <div class="card-body">
                     
                                        
                        @map([
                            'lat' => 47.757651,
                            'lng' => 7.335735,
                            'zoom' => 16,
                            'markers' => [
                                [
                                    'title' => 'SDIS68', 
                                    'lat' => 47.757651,
                                    'lng' => 7.335735,
                                    
                                ],
                            ],
                        ])

                     </div>     
            
            

             </div>










        </div>
    </div>
</div>
@endsection
