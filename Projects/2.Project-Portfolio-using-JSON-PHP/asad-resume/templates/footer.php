                
                <!-- Footer Start -->
                <div class="footer">
                    <div class="content-inner">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p>
                                    <?= $cv["footer"]["copyright"] ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= $cv["footer"]["dev_text"] ?>
                                    <a 
                                        href="<?= $cv["footer"]["dev_link"] ?>"
                                        target="<?php 
                                        $http_has = str_contains($cv["footer"]["dev_link"], 'http'); 
                                        echo $http_has == true ? '_blank' : '_self' ?>"
                                    >
                                        <?= $cv["footer"]["dev_name"] ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Start -->
            </div>
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <script src="lib/typed/typed.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
