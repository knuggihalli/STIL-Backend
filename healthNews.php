<?php
    include 'func.php';
    
    //header('Content-type: application/json; charset=utf-8');

    $feed = get_Health();
    $data = $feed['channel']['item'][0]['description'];
    $link = $feed['channel']['item'][0]['link'];
    $pubDate = $feed['channel']['item'][0]['pubDate'];
    $return = new ArrayObject();

    //Feed Beast
    for ($x=0; $x<=9; $x++) {
        $data = $feed['channel']['item'][$x]['description'];
        $source = getSource($data);
        $title = $feed['channel']['item'][$x]['title'];
        $title = str_replace("- ".$source,"",$title);
        $link = $feed['channel']['item'][$x]['link'];
        $pubDate = $feed['channel']['item'][$x]['pubDate'];
        $img_data = getImage($data);
        $img_data = str_replace("//","https://",$img_data);
        $img_data = str_replace("80","150",$img_data);
        $sum = getSummary($data);
        $sum = str_replace("()","",$sum);
        $key = "article".$x;
        
        $content = '        

        <h3>'.$title.'</h3>
        <hr>

        
        <div class="row">
        <div class="col-xs-4">  
        <br>
            <button type="button" class="btn btn-default btn-circle btn-lg" onclick="prevArt()"><i class="fa fa-chevron-left"></i>
										</button>
        
        </div>
       <div class="col-xs-4">'.$img_data.'</div>
        <div class="col-xs-4">
        <br>
        <button type="button" class="btn btn-default btn-circle btn-lg right" onclick="nextArt()"><i class="fa fa-chevron-right"></i>
										</button>
        
        </div>

        </div>
        <br>
        <div class="row">
        <div class="col-xs-12"> <h4>'.$sum.' - <b>'.$source.'</b></h4></div>
        </div>
        <hr>
        <style type="text/css">
        .centerd{
        float: left;
        color: #fff !important;
        font-size: 18px;
        }
        </style>   
        <a class="btn btn-block btn-primary btn-dropbox" href="'.$link.'" data-dismiss="alert">
        Read More on '.$source.'
        </a>
       



        <hr>


        ';
        
        $return[$key] = array($content);
    }
    $jsonp = json_encode($return);
   if(isset($_GET['callback'])){
    echo $_GET['callback'] . '(' . $jsonp . ')';
}else{
   echo $jsonp;
}
?>
               
