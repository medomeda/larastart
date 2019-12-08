<div class="clearfix"></div>
<div class="footerbar">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <h4>Logo</h4>
            </div>
            <div class="col-md-3">
                <h4>Pages</h4>
                <ul>
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Privacy policies</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Services</h4>
            </div>
            <div class="col-md-3">
                <h4>Restons en contact</h4>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="footerbottom">
    <div class="container">
        <div class="row">
            <p class="col-md-12">
                <p style="text-align: center">© Copyright 2013 Scotchy Scotch Scotch</p>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================= -->

<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
@yield('javascript')
<!-- Placed at the end of the document so the pages load faster
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 -->

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
