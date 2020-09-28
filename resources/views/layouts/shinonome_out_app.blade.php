<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta
            name="description"
            content="しののめは朝に特化した朝限定のSNSです。"
        />
    </head>
    <body>
        <style>
            .container {
                display: -webkit-flex;
                display: flex;
                -webkit-justify-content: center;
                /* justify-content: space-around; */
            }

            /* メインコンテンツ */
            .main {
                /* position: absolute; */
                flex-basis: 838px;
                height: 1024px;
                text-align: center;
                order: 2; /* flexboxの順番*/
                border: 1px ridge;
                /* left: 302px;
top: 0px;             */
                /* display: block; */
                /* width: 830px; */
                /* margin-right: 20px; */
                /* background-color: pink; */
                /* align-self: stretch; */
            }

            /* 左サイドバー */
            .left_sidebar {
                /* position: absolute; */
                flex-basis: 300px;
                height: 500px;
                /* left: 0px;
            top: 0px; */

                /* box-sizing: border-box; */
                text-align: center;
                order: 1; /* flexboxの順番*/
                position: sticky; /* //固定*/
                top: 0; /*  上部 0px の位置に固定*/
                /* position: sticky; */
                /* margin:0 0 0 auto; */
                /* width: 300px;
        background-color: green; */
                /* align-self: stretch; */
            }
            .left_sidebar__item {
                /* margin-bottom: 20px; */
                position: sticky;
            }

            /* 右サイドバー */
            .right_sidebar {
                /* position: absolute; */
                flex-basis: 300px;
                height: 500px;
                /* left: 1140px;
            top: 0px; */

                /* box-sizing: border-box; */
                text-align: center;
                order: 3; /* flexboxの順番*/
                position: sticky; /* //固定*/
                top: 0; /*  上部 0px の位置に固定*/
                /* width: 30em; */
                /* background-color: blue; */
                /* align-self: stretch; */
            }
            .right_sidebar__item {
                /* margin-bottom: 20px; */
                position: sticky;
            }
            .profile_photo {
                border-radius: 50%;
                border-width: 2px;
                border-style: solid;
                border-color: black;
                width: 56px;
                object-fit: cover;
            }
            .logo {
                margin: 80px 80px;
            }
            .left-menu {
                margin: 80px 80px;
            }
            li {
                list-style: none;
            }
        </style>
        <div class="container">
            <!-- 中央 -->
            <main class="main">
                <!-- メインコンテンツ -->
                @yield('content')
            </main>

            <!-- 左サイドバー-->
            <div class="left_sidebar">
                <div class="left_sidebar__item">
                    <!-- 中身 -->
                    <div class="logo">
                        <P href="{{ url('/greet') }}">
                            <img
                                src="/img/logos/しののめロゴ20200924.png"
                                width="150px"
                                height="60px"
                                class="logo"
                                alt="しののめのロゴです"
                            />
                        </P>
                    </div>
                    <div class="left-menu">
                        <ul>
                            <li>
                                <a href=""
                                    ><img src="" />
                                    <p>ホーム</p></a
                                >
                            </li>
                        </ul>
                    </div>

                    <img class="profile_photo" src="{{ Auth::user()->profile_photo_path }}"/>
                    {{ Auth::user()->name }}
                    <a
                        class="dropdown-item"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                    >
                        {{ __("Logout") }}
                    </a>
                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;"
                    >
                        @csrf
                    </form>
                    @yield('left')
                </div>
            </div>

            <!-- 右サイドバー-->
            <div class="right_sidebar">
                <div class="right_sidebar__item">
                    <!-- 中身 -->
                    <p>右サイドバーふれっくす</p>
                    @yield('right')
                </div>
            </div>
        </div>
    </body>
</html>
