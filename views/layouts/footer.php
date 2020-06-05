    <div class="page-buffer"></div>
</div>

<footer class="fixed-bottom bg-dark text-light page-footer">

        <div class="container">
            <div class="footer__inner d-flex flex-row justify-content-between">
                <p class="mb-3 mt-3">Copyright © 2015</p>
                <p class="mb-3 mt-3">Курс PHP Start</p>
            </div>
        </div>
</footer>



<!-- <script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->

<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="/template/js/ajax_form.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            
            return false;
        });
    });
    $(document).ready(function(){
        $(".add-to-compare").click(function () {
            var id = $(this).attr("data-id");
            alert(id);
            $.post("/compare/addAjax/"+id, {}, function (data) {
                $("#compare-count").html(data);
            });
            
            return false;
        });
    });
</script>
<!-- <article id="wrap"> -->
<?php
/*
	<article id="lightings">
    	<section id="one">
            <section id="two">
                <section id="three">
                    <section id="four">
                        <section id="five">
                            
                        </section>
                    </section>
                </section>
            </section>
		</section>
    </article>
</article>
*/
?>
</body>
</html>