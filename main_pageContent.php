 <!--Sidebar-->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

                <?php

                    $stmt = $category->read();
                    include_once "categories_menu.php";
                ?>
                    <div class="widget-wrapper wow fadeIn" data-wow-delay="0.4s">
                        <h4>Subscription form:</h4>
                        <br>
                        <div class="card">
                            <div class="card-block">
                                <p><strong>Subscribe to our newsletter</strong></p>
                                <p>Once a week we will send you a summary of the most useful news</p>
                                <div class="md-form">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="form1" class="form-control">
                                    <label for="form1">Your name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="form2" class="form-control">
                                    <label for="form2">Your email</label>
                                </div>
                                <button class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Sidebar-->

                <!--Main column-->
                <div class="col-lg-8">

                    <!--First row-->
                    <div class="row wow fadeIn" data-wow-delay="0.4s">
                        <div class="col-md-12">
                            <!--Product-->
                            <div class="product-wrapper">

                                <!--Featured image-->
                                <div class="view overlay hm-white-light z-depth-1-half">
                                    <img src="http://mdbootstrap.com/img/Photos/Slides/img%20(109).jpg" class="img-fluid " alt="">
                                    <div class="mask">
                                    </div>
                                    <h3 class="price"><span class="badge red darken-2">10 $</span></h3>
                                </div>
                                <!--/.Featured image-->

                                <br>

                                <!--Product data-->
                                <h2 class="h2-responsive">Product title</h2>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius totam, officiis doloremque velit nobis dolor nulla unde architecto alias praesentium, soluta error omnis sint, impedit, delectus ipsam eveniet debitis nemo.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius totam, officiis doloremque velit nobis dolor nulla unde architecto alias praesentium, soluta error omnis sint, impedit, delectus ipsam eveniet debitis nemo.</p>

                                <ul class="rating inline-ul">
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>

                            </div>
                            <!--Product-->

                        </div>
                    </div>
                    <!--/.First row-->

                    <!--Second row-->
                    <div class="row">
                        
                        <!--Heading-->
                            <div class="col reviews wow fadeIn" data-wow-delay="0.4s">
                                <h2 class="h2-responsive">Reviews</h2>
                            </div>

                        <!--First review-->
                        <div class="media wow fadeIn" data-wow-delay="0.2s">
                            <a class="media-left" href="#">
                                <img class="rounded-circle" src="http://mdbootstrap.com/img//Photos/Avatars/avatar-7.jpg" alt="Generic placeholder image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe</h4>
                                <ul class="rating inline-ul">
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
                            </div>
                        </div>

                        <!--Second review-->
                        <br><div class="media wow fadeIn" data-wow-delay="0.2s">
                            <a class="media-left" href="#">
                                <img class="rounded-circle" src="http://mdbootstrap.com/img//Photos/Avatars/avatar-5.jpg" alt="Generic placeholder image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Maria Casie</h4>
                                <ul class="rating inline-ul">
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
                            </div>
                        </div>

                        <!--Second review-->
                        <br><div class="media wow fadeIn" data-wow-delay="0.2s">
                            <a class="media-left" href="#">
                                <img class="rounded-circle" src="http://mdbootstrap.com/img//Photos/Avatars/avatar-10.jpg" alt="Generic placeholder image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Kate Snow</h4>
                                <ul class="rating inline-ul">
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star amber-text"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
                            </div>
                        </div>

                    </div>
                    <!--/.Second row-->

                </div>
                <!--/.Main column-->

            </div>
        </div>
        <!--/.Main layout-->

    </main>
