<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EBook</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        nav {
            border-bottom: 1px solid #cccccc;
            background: #fff;
            z-index: 1000;
        }

        nav .right img {
            line-height: 45px;
        }

        /*-----------------main---------------*/

        .main .center {
            max-width: 740px;
        }

        .main .center .friends_post {
            background: #fff;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.2);
        }

        .main .center .friends_post>img {
            height: 450px;
        }

        .main .center .friends_post .comment_warpper .comment_search {
            width: 95%;
            border-radius: 30px;
        }

        .main .center .my_post {
            width: 100%;
            height: auto;
            background: #fff;
            padding: 10px 15px;
            border-radius: 7px;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.2);
            margin: 10px 0;
        }

        .main .center .my_post img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
        }

        .main .center .my_post .post_top {
            display: flex;
            align-items: center;
        }

        .main .center .my_post .post_top input {
            width: 100%;
            padding: 10px;
            margin-left: 20px;
            border: 0;
            outline: none;
            background: #efefef;
            border-radius: 30px;
            font-size: 17px;
        }

        .main .center .my_post .post_top input:hover {
            background: #e3e3e3;
            cursor: pointer;
        }

        .main .center .my_post hr {
            width: 100%;
            height: 1px;
            background: #cccccc;
            border: 0;
            margin: 10px 0;
        }

        .main .center .my_post .post_bottom {
            margin: 5px auto;
            position: relative;
        }

        .main .center .my_post .post_bottom div:first-child {
            position: absolute;
            top: 13px;
            left: 55px;
        }

        .main .center .my_post .post_bottom .post_icon {
            display: flex;
            align-items: self-start;
            flex-direction: column;

            padding: 7px 30px;
            position: relative;
            z-index: 100;
        }

        ::-webkit-file-upload-button {
            padding: 7px 16px;
            color: transparent;
            background-color: transparent;
            border: 0;
            outline: 0;

        }

        .main .center .my_post .post_bottom .post_icon i.red {
            font-size: 23px;
            color: red;
            margin-right: 8px;
        }

        .main .center .my_post .post_bottom i.green {
            font-size: 23px;
            color: #27cc37;
            margin-right: 8px;
        }

        .main .center .my_post .post_bottom .post_icon i.yellow {
            font-size: 23px;
            color: #f7b928;
            margin-right: 8px;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex">
    <nav class="w-full h-16 flex items-center justify-between fixed top-0">
        <div class="left flex items-center justify-center ml-5">
            <div class="logo">
                <img src="image/logo.png" class="w-24 cursor-pointer my-1 mx-0" />
            </div>
        </div>

        <div class="right flex items-center ml-2 mx-5">
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-door-closed"></i> Logout
                </button>
            </form>
            <img src="image/profile.png" class="w-8 h-8 object-cover object-center ml-2 cursor-pointe rounded-full" />
        </div>
    </nav>

    <div class="main flex mt-14 mx-auto justify-center">
        <div class="center w-full p-5">
            <div class="my_post">
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="post_top">
                        <img src="image/profile.png" />
                        <input type="text" placeholder="What's on you mind, John?" name="description"/>
                    </div>
                    <hr />
                    <div class="post_bottom flex items-center justify-between">
                        <div class="flex mb-3">
                            <i class="fa-solid fa-images green"></i>
                            <p>Photo</p>
                        </div>
                        <div class="post_icon">
                            <input type="file" name="image">
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded h-9">
                            Post
                        </button>
                    </div>
                </form>
            </div>
            <div class="friends_post rounded-md py-2 px-4 my-2 mx-0">
                <div class="friend_post_top mb-4">
                    <div class="img_and_name flex items-center">
                        <img src="image/post_1.jpg"
                            class="w-12 h-12 object-cover object-center mr-2 cursor-pointer rounded-full" />

                        <div class="friends_name">
                            <p class="font-bold cursor-pointer">Senuda De Silva</p>
                        </div>
                    </div>
                </div>

                <img src="image/post_1.jpg" class="w-full object-cover object-center rounded" />

                <div class="flex items-center justify-between my-2 mx-0"></div>

                <hr class="w-full h-px bg-gray-400 my-2 mx-0" />

                <div class="like flex items-center justify-evenly my-0 mx-auto w-11/12">
                    <div class="like_icon flex items-center">
                        <i class="fa-solid fa-thumbs-up text-xl mr-2 text-gray-600"></i>
                        <p>Like</p>
                    </div>

                    <div class="like_icon flex items-center">
                        <i class="fa-solid fa-message text-xl mr-2 text-gray-600"></i>
                        <p>Comments</p>
                    </div>
                </div>

                <hr class="w-full h-px bg-gray-400 my-2 mx-0" />

                <div class="comment_warpper flex items-center">
                    <img src="image/profile.png" class="w-8 h-8 object-cover object-center mr-4 rounded-full" />

                    <div class="comment_search py-1 px-4 bg-gray-200">
                        <input type="text" placeholder="Write a comment"
                            class="w-full h-8 outline-none border-0 bg-transparent" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
