<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/diegoStyle.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/stili.css" >


        <!-- CODICE PER WYSIWYG-->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
tinymce.init({
    selector: 'textarea',
    menubar: false
});
        </script>
        
<!--        simple tree
        <link rel="stylesheet" href="tree.css">
        -->
        <!-- CODICE PER ALBERO DELLE CATEGORIA DINAMICO -->
        <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="//cdn.jsdelivr.net/npm/jquery.fancytree@2.27/dist/skin-win8/ui.fancytree.min.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/jquery.fancytree@2.27/dist/jquery.fancytree-all-deps.min.js"></script>
        <!-- Initialize the tree when page is loaded -->


        <!-- CODICE PER WYSIWYG include libraries(jQuery, bootstrap)
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

         include summernote css/js 
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
        
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

        -->

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
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        @yield('loginlogout')
                    </div>
                </div>
            </nav>
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