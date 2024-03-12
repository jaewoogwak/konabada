<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";

$search_keyword = $_GET['search_keyword'];

if($search_keyword){
    $search_where = " and (subject like '%".$search_keyword."%' or content like '%".$search_keyword."%')";
}

$sql = "select * from board where 1=1";
$sql .= " and status=1";
$sql .= $search_where;
$order = " order by bid desc";
$query = $sql.$order;
//echo "query=>".$query."<br>";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
while($rs = $result->fetch_object()){
    $rsc[]=$rs;
}

?>



<head>
    <title>KONABADA</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/board.css" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <div class="nav-container">
            <div class=logo>
                <a href="/course/index.php">KONABADA</a>
            </div>
            <div class="function">
                <a href="/course/sell.php">물건 판매하기</a>
                <a href="/course/items.php">물건 구매하기</a>

                <a href="/course/cart.php">장바구니</a>
                <a href="/course/board.php">자유게시판</a>
                <a href="/course/hotboard.php">HOT 게시판</a>
                <a href="/course/mypage.php">내 정보</a>
            </div>
            <div class="login">

                <?php if (!isset($_SESSION['UID'])) { ?>
                <a href="/course/member/login.php">로그인</a>
                <a href="/course/member/signup.php">회원가입</a>
                <?php } else { ?>
                <a href="/course/member/logout.php">로그아웃</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <h1>자유게시판</h1>
    <div class="board-wrapper">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">글쓴이</th>
                    <th scope="col">제목</th>
                    <th scope="col">등록일</th>
                </tr>
            </thead>
            <tbody>
                <?php
$i=1;
foreach($rsc as $r){
    //검색어만 하이라이트 해준다.
    $subject = str_replace($search_keyword,"<span style='color:red;'>".$search_keyword."</span>",$r->subject);
?>

                <tr>
                    <th scope="row"><?php echo $i++;?></th>
                    <td><?php echo $r->userid?></td>
                    <td><a class="post" href="/course/boardView.php?bid=<?php echo $r->bid;?>"><?php echo $subject?></a>
                    </td>
                    <td><?php echo $r->regdate?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>


        <p style="text-align:right;">

            <?php
if($_SESSION['UID']){
?>
            <a href="/course/write.php"><button type="button" class="btn-login">등록</button><a>
                    <a href="/course/member/logout.php"><button type="button" class="btn-logout">로그아웃</button><a>
                            <?php
}else{
?>
                            <a href="/course/member/login.php"><button type="button" class="btn-login">로그인</button><a>
                                    <a href="/course/member/signup.php"><button type="button"
                                            class="btn-signup">회원가입</button><a>
                                            <?php
}
?>
        </p>
        <form class="search" method="get" action="<?php echo $_SERVER["PHP_SELF"]?>">
            <div class="search-input">
                <input type="text" class="form-control" name="search_keyword" id="search_keyword"
                    placeholder="제목과 내용에서 검색합니다." value="<?php echo $search_keyword;?>"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn" type="submit" id="button-addon2">검색</button>
            </div>
        </form>
    </div>

</body>