<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="/dist/css/timeline.css" rel="stylesheet">
        <link href="/dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="/bower_components/morrisjs/morris.css" rel="stylesheet">
        <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <title>Login</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Effettua il login</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="login" role="form">
                                <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Usename" type="text" name="username" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" maxlenght="10" minlenght="6" name="password" type="password" value="">
                                    </div>
                                    <input type="submit" value="invia" class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('footer')
    </body>

</html>



        