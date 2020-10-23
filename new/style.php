<div class='card-body'>
    <div class='row mb-2'>
        <div class="col-md-2">
            <div class="mb-3">
                <img src='https://placehold.it/300x300' class='card-img d-inline-block '>
            </div>
        </div>
        <div class='col-md-10'>
            <button type="button" class="close">
                <span>&times;</span>
            </button>
            <h5 class='card-title'>
                <a href='ahmed'> ahmed </a> to <a href='saad'> saad </a> <small class='text-muted'>31
                    minutes ago</small>
            </h5>
            <div class='card-text'>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, quidem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, quidem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, quidem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, quidem.
            </div>
            <hr>
            <div class="card-text ">
                comments (1)
            </div>
        </div>
    </div>
</div>
<hr>


<?php
$str .= "
<div class='card-body'>
    <button type='button' class='close'>
        <span>&times;</span>
    </button>
    <div class='row '>
        <div class='col-md-2 px-md-0'>
            <div class='img mb-3 mb-md-0'>
                <img src='$profile_pic' class='card-img d-inline-block '>
            </div>
        </div>
        <div class='col-md-10'>
            <div class='d-flex flex-column justify-content-between h-100'>
                <h5 class='card-title m-0 d-sm-flex justify-content-between '>
                    <div>
                        <a href='$added_by'> $first_name $last_name </a> $user_to 
                    </div>
                    <div>
                        <small class='text-muted'>$time_message</small>
                    </div>
                </h5>
                <div class='card-text'>
                    $body  
                </div>
                <div class='card-text'>
                    <hr>
                    comments (1)
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
";
?>




<div class='card-body'>
            <button type='button' class='close'>
                <span>&times;</span>
            </button>
            <div class='row '>
                <div class='col-md-2 px-md-0'>
                    <div class='img mb-3 mb-md-0'>
                        <img src='https://placehold.it/300x300' class='card-img d-inline-block '>
                    </div>
                </div>
                <div class='col-md-10'>
                    <div class='d-flex flex-column justify-content-between h-100'>
                        <h5 class='card-title m-0 d-sm-flex justify-content-between '>
                            <div>
                                <a href='$added_by'>ahmed </a> 
                            </div>
                            <div>
                                <small class='text-muted'>13 hours ago</small>
                            </div>
                        </h5>
                        <div class='card-text'>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, fugit. 
                        </div>
                        <div class='card-text'>
                            <hr class=''>
                            <span>comments</span>
                        </div>
                    </div>
                    <div class='post_comment' id='toggleComment1'>
                        <form action='comment_frame.php?post_id=1' id='comment_form' method='POST'>
                            <textarea class='form-control' name='post_body'></textarea>
                            <input class='btn btn-primary' type='submit' name='postComment1' value='Post'>
                        </form>
                    </div>
                    
                </div>
            </div>
 </div>
<hr>