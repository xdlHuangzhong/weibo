<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>php无限级分类实战————评论及回复功能</title>
    <link rel="stylesheet" type="text/css" href="/css/comment.css">
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js" ></script>
    <script type="text/javascript" src="/js/comment.js" ></script>
</head>
<body>

<div class="comment-filed">
    <!--发表评论区begin-->
    <div>

        <div>
            <div>
                <textarea class="txt-commit" replyid="0"></textarea>
            </div>
            <div class="div-txt-submit">
                <a class="comment-submit" parent_id="0" style="" href="javascript:void(0);"><span style=''>发表评论</span></a>
            </div>
        </div>
    </div>
    <!--发表评论区end-->

    <!--评论列表显示区begin-->
    <!-- {$commentlist} -->
<div class="comment-filed-list" >
    <div><span>全部评论</span></div>
    <br>
    <div class="comment-list" >
    <!--一级评论列表begin-->
    <ul class="comment-ul">
    @if(isset($data))
    @foreach($data as $v1)
    <li comment_id="{{$v1->id}}">
        <div >
            <div>
                <img class="head-pic"  src="{{$v1->head_pic}}" alt="">
            </div>
            <div class="cm">
                <div class="cm-header">
                    <span>{{$v1->nickname}}</span>
                    <span>{{$v1->create_time}}</span>
                </div>
                <div class="cm-content">
                    <p>
                        {!! $v1->content !!}
                    </p>
                </div>
                <div class="cm-footer">
                    <a class="comment-reply" comment_id="{{$v1->id}}" href="javascript:void(0);">回复</a>
                </div>
            </div>
        </div>

        <!--二级评论begin-->
        <ul class="children">
            @if(isset($v1->children))
            @foreach($v1->children as $v2)
            <li comment_id="{{$v2->id}}">
            <div >
            <div>
                <img class="head-pic"  src="{{$v2->head_pic}}" alt="">
            </div>
            <div class="children-cm">
                <div  class="cm-header">
                    <span>{{$v2->nickname}}</span>
                    <span>{{$v2->create_time}}</span>
                </div>
                <div class="cm-content">
                    <p>
                        {!! $v2->content !!}
                    </p>
                </div>
                <div class="cm-footer">
                    <a class="comment-reply" replyswitch="off" comment_id="{{$v2->id}}"  href="javascript:void(0);">回复</a>
                </div>
            </div>
            </div>

            <!--三级评论begin-->
            <ul class="children">
                @if(isset($v2->children))
                @foreach($v2->children as $v3)
                <li comment_id="{{$v3->id}}">
                    <div >
                        <div>
                            <img class="head-pic"  src="{{$v3->head_pic}}" alt="">
                        </div>
                        <div class="children-cm">
                            <div  class="cm-header">
                                <span>{{$v3->nickname}}</span>
                                <span>{{$v3->create_time}}</span>
                            </div>
                            <div class="cm-content">
                                <p>
                                    {!! $v3->content !!}
                                </p>
                            </div>
                            <div class="cm-footer">
                                <!-- <a class="comment-reply" comment_id="1"  href="javascript:void(0);">回复</a> -->
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
                <!--三级评论end-->
            </li>
            @endforeach
            @endif
            </ul>
            <!--二级评论end-->

        </li>
        @endforeach
        @endif
    </ul>
        <!--一级评论列表end-->
    </div>
</div>
<!--评论列表显示区end-->
</div>
</body>
</html>