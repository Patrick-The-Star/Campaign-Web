<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inlatis - Campaign</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .clear {
            clear:both;
            line-height:0;
        }

        #logoTitle{
            margin:1.2em 0 0 10.5em; 
            font-size: 3em;
            
        }

        #introduction{
            font-size:1.5em;
            margin: 1em 2em 1em 2em;
            font-family: 'Comic Sans MS'
        }

        #logo{
            float:left;
            margin:1em 0 0 0;

        }

        .fa-btn {
            margin-right: 6px;
        }

        .campaign-table{
            width:20%;
            float:left;
            margin-right: 8em;
        }

        .campaign-panel{
            position:relative;
            width:160%;
            margin-left:-18em;
        }

        .content-table{
            width:65%;
            float:left;
            margin-left: 0em;
        }

        #contentForm{
            height:25em;
            width:60%;
            margin:auto;
            position:absolute;
            top:0;left:0;bottom:0;right:0;
            
        }

        #cancelContent{
            margin-left:-0.7em;
        }

        #addContent{
            float:right;
            margin-right:8em;
            margin-top: -3em;
            margin-bottom:0em;
        }

        #campaignForm{
            height:32em;
            width:60%;
            margin:auto;
            position:absolute;
            top:3em;left:0;bottom:0;right:0;
            
        }

        #addCampaign{
            float:right;
            margin-right:60em;
            margin-top: -3em;
        }

        #cancelCampaign{
            margin-left: -0.7em;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Campaign List
                </a>

                <a class="navbar-brand" href="{{ url('/campaign_contents')}}">
                    Campaign Contents
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $(document).ready(function(){
            $("#contentForm").hide();
            $("#campaignForm").hide();
            $(".update").click(function(){
                var $item = $(this).closest("tr")
                var str = $item[0].textContent;

                str = str.replace(/  +/g, '$');
                console.log(str);
                arr = str.trim("$").split("$");
                arr.shift();arr.pop();
                console.log(arr);
                $.ajax({type: "GET",url: "/ajaxCall",data:{id:arr[0],content_type:arr[1],content:arr[2]},dataType:"JSONP",success:function(result){

                    console.log(result);
                }});


            }); 



            $("#addContent").find("button").click(function(){
                $("#addCampaign").hide();
                $("#contentForm").show();
                $("#addContent").hide();
            });

            $("#addCampaign").find("button").click(function(){
                $("#addContent").hide();
                $("#campaignForm").show();
                $("#addCampaign").hide();
            });

            $("#cancelContent").find("button").click(function(){
                $("#contentForm").find("form").trigger("reset");
                $("#contentForm").hide();
                $("#addContent").show();
                $("#addCampaign").show();
            });

            $("#cancelCampaign").find("button").click(function(){
                $("#campaignForm").find("form").trigger("reset");
                $("#campaignForm").hide();
                $("#addCampaign").show();
                $("#addContent").show();
            });

        });
    </script>

</body>
</html>
