<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<title>掲示板</title>
<style type="text/css">
    body {

background: #006633;
border-bottom: 32px solid #b2771f; /* 枠線 */
border-radius: 3px; /* 角の丸み */
margin-left: 0%;
margin-bottom: 0%;
margin-right: 0%;

}

    #board {
        width: 50%;
        margin-top: 20px;
        padding: 20px;
        box-shadow: 0px 0px 10px #333;
        color: #555;

       margin: 2em auto;
       padding:2em;
       background-image: linear-gradient(0deg, transparent 19px, #ccc 20px),linear-gradient(90deg,  transparent 19px, #ccc 20px);
       background-size: 20px 20px;
       background-color: #f0e68c;




    }



    h1 {
        text-align: center;
        color: #555;
    }
    h2 {
        color: #777;
    }
    ul {
        color: #777;
    }
</style>
</head>




<body>



    <div id="board">
        <h1>掲示板</h1>
    <!-- エラーメッセージエリア -->
    @if ($errors->any())
        <h2>エラーメッセージ</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- 投稿表示エリア（編集するのはここ！） -->
    @isset($bbs)
    @foreach ($bbs as $d)
        <h2>{{ $d->name }}さんの投稿</h2>
        {{ $d->comment }}
        <br><hr>
    @endforeach
    @endisset

    <!-- フォームエリア -->
    <h2>書き込み</h2>
    <form action="/bbs" method="POST">
        名前:<br>
        <input name="name">
        <br>
        コメント:<br>
        <textarea name="comment" rows="4" cols="40"></textarea>
        <br>
        <div class="button">
        {{ csrf_field() }}
        <button class="btn btn-success"> つぶやく </button>
</div>
    </form>
</div>

</body>
</html>

