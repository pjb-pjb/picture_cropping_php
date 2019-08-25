<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .root{
        width: 100vw;
        height: 100vh;
        background: #eee;
        overflow: hidden;
    }
    .img-box{
        width: 280px;
        height: 180px;
        background: #fff;
        margin: 8vh auto 0;
        border-radius: 5px;
        box-shadow: 0 0 20px 3px rgba(0,0,0,0.1);
        border: none;
    }
    iframe{
        width: 100%;
        height: 100%;
        border: none;
    }
    .button{
        height: 50px;
        width: 200px;
        background: #3b8cff;
        border-radius: 50px;
        margin: 40px auto 0;
        font-size: 20px;
        text-align: center;
        line-height: 50px;
        color: #fff;
    }
</style>
<body>
    <div class="root">
        <div class="img-box">
            <iframe src="/html/uploadimg1.html" class="img1" name="img1"></iframe>
        </div>
        <div class="img-box">
            <iframe src="/html/uploadimg2.html" name="img2" class="img2"></iframe>
        </div>
        <div class="button button1">保存</div>
        <div class="button2 button">重新上传</div>
    </div>
    <script src="/static/js/jquery-3.3.1.js"></script>
    <script>
        let eleImg1 = $(".img1")[0].contentWindow;
        let eleImg2 = $(".img2")[0].contentWindow;
        $(".button2").toggle();
        $(".button1").click(function () {

            if((eleImg2.isClip())&&(eleImg1.isClip())){
                eleImg2.clip();
                eleImg1.clip();
                $(".button2").toggle();
                $(".button1").toggle();
            }else {
                alert("请选择图片上传");
            }
        });
        $(".button2").click(function () {
            eleImg1.avatar.resetImage();
            eleImg2.avatar.resetImage();
            $(".img1").contents().find(".box").addClass("box-img");
            $(".img2").contents().find(".box").addClass("box-img");
            $(".button2").toggle();
            $(".button1").toggle();
        });
    </script>
</body>
</html>