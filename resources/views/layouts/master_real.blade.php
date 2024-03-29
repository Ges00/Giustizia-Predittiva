<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/stili.css" >

        <title>Giustizia Predittiva</title>
    </head>
    <body>
        <div class="head">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 col-8 headsx">
                        <img src="{{ url('/') }}/img/logo_tribunale.png" alt="Logo Tribunale" />
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-4 headdx">
                        <a href="https://www.unibs.it/"><img src="{{ url('/') }}/img/logounibs.png" alt="Logo unibs" /></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="blue">
            <div class="container">
                @yield('corpo')
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <h6 class="collab">In collaborazione con</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 footdx">
                        <a href="https://www.digitaluniversitas.com/"><img src="{{ url('/') }}/img/logo_du.png" alt="Logo Uni BS" class="img-fluid" /></a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 footdx">
                        <a href="https://www.unibs.it/dipartimenti/ingegneria-della-informazione"><img src="{{ url('/') }}/img/logo_dii.png" alt="Logo dii" class="img-fluid" /></a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 footdx">
                        <a href="http://www.bs.camcom.it/" class="img-fluid"><img src="{{ url('/') }}/img/logo_camera_commercio_brescia.jpg" alt="Logo Camera Commercio Brescia" /></a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 footdx">
                        <a href="https://www.aib.bs.it/"><img src="{{ url('/') }}/img/aib-brescia-logo-dark-share.png" alt="Logo Associazione Industriali Bresciani" class="img-fluid"/></a>
                    </div> 
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>