<?php 
/**
 * foot.php
 * Author: Ajen Shireman
 * 
 * common EOF for all pages
 * 
 * 21 February 2014
 *  Added div.wrap around main content for sticky foot at bottom of the page
 *  Added copyright and address info to the footer
 */
?>

</div> <!-- /wrapper -->

<footer id="footer">
    <div class="row">
        <div class="small-12 columns copyright">
                &copy 2014 Pelissippi State Community College - Ajen Shireman
        </div>
    </div>
    <div class="row">
        <div class="small-12 coumns address">
                10915 Hardin Valley Rd * P.O. Box 22990
        </div>
    </div>
</footer>

<!--  javaScript -->
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/fastclick.js"></script>

<!-- Foundation -->
<script src="js/foundation.min.js"></script>

<!-- Custom javaScript -->
<script src="js/script.js"></script>

<!-- Initialize Foundation -->
<script>
    $(document).foundation();
</script>
</body>
</html>