<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <style type="text/css">
        body {
            background: linear-gradient(45deg, rgba(240,249,255,1) 0%,rgba(203,235,255,1) 47%,rgba(161,219,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>
    <body>
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <h2 class="ui teal image header">
                    {{-- <img src="" class="image"> --}}
                    <div class="content">
                        Log-in to your account
                    </div>
                </h2>
            <form action="{{ url('/login') }}" class="ui large form" method="post" role="form" >
                {{csrf_field()}}
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="E-mail address" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button type="submit" class="ui fluid large teal submit button">Login</button>
                </div>

                <div class="ui error message">123456</div>

            </form>

            <div class="ui message">
            New to us? <a href="#">Sign Up</a>
            </div>
            </div>
        </div>
    </body>
</html>
