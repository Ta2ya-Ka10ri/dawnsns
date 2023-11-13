<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="./js/script.js"></script>
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="/images/main_logo.png"></a></h1>

            <div id="">
                <div id="">
                    <p>
                    {{Auth::user()->username}}さん
                    <img src="/storage/img/{{Auth::user()->image}}" alt="">
                </p>
                </div>
                <div>
                <details>
                    <summary></summary>
                    <p><a href="/top">ホーム</a></p>
                    <p><a href="/profile">プロフィール</a></p>
                    <p><a href="/logout">ログアウト</a></p>
                </details>
            </div>
        </div>

    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{$follow_count}}名</p>
                </div>
               <button onclick="location.href='/followList'">フォローリスト</button>
                <div>
                <p>フォロワー数</p>
                <p>{{$follower_count}}名</p>
                </div>
                <button onclick="location.href='/followerList'">フォロワーリスト</button>
            </div>
                <button onclick="location.href='/search'">ユーザー検索</button>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>