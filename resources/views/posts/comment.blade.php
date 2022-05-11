<div class="container mb-5">
    <div class="row bootstrap snippets bootdeys">
        <div class="col-md-8 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Comment panel
                    </div>
                    <form method="post" action="{{route
                        ('comments.storeComment',$post->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div>
                                <input type="hidden" name="post_id" value="{{$post->id}}"> 
                            </div>
                            <textarea class="form-control" placeholder="write a comment..." rows="3" name="comment_body"></textarea>
                            <br>
                            <button type="submit" class="btn btn-info pull-right">Post</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                        <hr>
                        <div class="container mt-5">

                            <div class="row  d-flex justify-content-center">
                
                                <div class="col-md-12">
                
                                    <div class="card p-3">
                
                                        <div class="d-flex justify-content-between align-items-center">
                
                                      <div class="user d-flex flex-row align-items-center">
                
                                        <img src="https://www.clipartmax.com/png/middle/258-2582267_circled-user-male-skin-type-1-2-icon-male-user-icon.png" width="30" class="user-img rounded-circle mr-2">
                                        <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span>
                                          
                                      </div>
                                      <small>2 days ago</small>
                                      </div>
                                      <div class="action d-flex justify-content-between mt-2 align-items-center">
                
                                        <div class="reply px-4">
                                            <div class="icons align-items-center">
                                                <i style="padding: 10px; color: red; "class="fa-regular fa-heart fa-xl"></i> 
                                                <i style="padding: 10px; color: blue;"class="fa-regular fa-comment-dots fa-xl"></i>
                                            </div>

                                        </div>
                                      </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    </div>

