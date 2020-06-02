    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer fixed-bottom bg-dark text-light">

        <div class="container">
            <div class="footer__inner d-flex flex-row justify-content-between">
                <p class="mb-3 mt-3">Copyright © 2015</p>
                <p class="mb-3 mt-3">Курс PHP Start</p>
            </div>
        </div>
</footer>



<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
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