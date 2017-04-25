<?php
    echo "<div class='widget-wrapper'>";
    echo "<h4>Categories:</h4>";
    echo "<br>";
    echo "<div class='list-group'>";
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
                    
                    
                echo "<a href='{$id}' class='list-group-item'>{$name}</a>";

                        
                }
     echo "</div>";
    echo "</div>";
?>