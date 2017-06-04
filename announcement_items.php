<?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
                        echo"<div class='media wow fadeIn' data-wow-delay='0.2s'>";
                            echo"<a class='media-left' href='#'>";
                                echo"<img class='rounded-circle src='http://mdbootstrap.com/img//Photos/Avatars/avatar-5.jpg' alt='IMAGE'>";
                            echo"</a>";
                            echo"<div class='media-body'>";
                                echo"<h4 class='media-heading'>{$name}</h4>";
                                echo"<ul class='rating inline-ul'>";
                                    echo"<li><i class='fa fa-star amber-text'></i></li>";
                                    echo"<li><i class='fa fa-star amber-text'></i></li>";
                                echo"</ul>";
                                echo"<p>{$description} 
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!

                                </p>";
                            echo"</div>";
                        echo"</div>";

                }
?>