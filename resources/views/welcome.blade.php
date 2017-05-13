@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <img id="logo" src="images/inlatis.png">
                <h1 id="logoTitle">Campaign web app</h1>
                <br><br>
                <div id="introduction">
                    <p>
                    Hello there. This website is under construction and this is the development stage of the website.
                    Any suggestions and criticisms are welcomed at saugat.awale@gmail.com
                    <br><br>
                    You can use these credentials: {username:"demo.login@gmail.com",password:"demopassword"} <br><br> or you can register your own account.
                    There are two models in this web-app 'Campaign' and 'Camapign_contents'. Campaign has one-to-many relationship with Campaign_contents 
                    in the mysql database.
                    I am trying to abstract those two models as one object in the front-end so that the user will not have to worry about the relationship between the two and can 
                    store the information about the models with limited knowledge about the relational database.
                    <br><br>
                    P.S. Please do not flood huge amount of data since the server capacity is limited. However you can check its functionality as much as you want.
                    Thank you for your co-operation.
                    </p>
                </div>
                

            </div>
        </div>
    </div>
</div>
@endsection
