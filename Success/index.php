
<!DOCTYPE html>
<html>

<head>  
    <link href='css\index.css' rel='stylesheet' type='text/css'>
    <link href='css\header.css' rel='stylesheet' type='text/css'>
    <link href='css\font.css' rel='stylesheet' type='text/css'>
    <style>
    </style>
</head>
<body>
    <div id="main-container-div">
        <div class="header">
            <a id="pageTitle" class="logo-title">Success Stories</a>
            <p class="middleText">Explore, Imagine, Create</p>
        </div>
           
            <div class="postButtons">
                <a href="bloglist.php">
            <input id="allPostsClick" class="middleButtons" type="button" onclick="getAllPosts()" value="All Posts"></a>
            <input id="newPostClick" class="middleButtons" type="button" onclick="openCreatePost()" value="Create Post">
        </div>
    </div>



    <div id="newPostModal" class="newPostBox">
        <div class="newPost-Content">
            <span onclick="onCloseNewPost()" class="close_newPost">&times;</span>
            <h1 id="formHeader">Create Your Post</h1>
            <form id="newPostForm" action="files/details.php" method="post" enctype="multipart/form-data">
                <label for="newPostTitle">Name : </label>
                <br />
                <input id="newPostTitle" type="text" name="name" class="post-title" required="">
                <br/>

                <label for="newPostTitle">Email : </label>
                <br />
                <input id="newPostTitle" type="email" name="email" class="post-title" required="">
                <br/><br>

                <label for="newPostTitle">Phone No. : </label>
                <br />
                <input id="newPostTitle" type="number" name="phone" class="post-title" required="">
                <br/><br>

                <label for="newPostTitle">LinkedIn  : </label>
                <br />
                <input id="newPostTitle" type="text" name="link" class="post-title" required="">
                <br/>

                <label for="postContent">Content : </label>
                <textarea id="postContent" rows="10" cols="10" name="content" required=""></textarea>
                <input id="newPostSubmit" type="submit" name="submit" value="Create" align="right">
            </form>
        </div>
    </div>
    <script src=".\js\index.js"></script>
</body>

</html>