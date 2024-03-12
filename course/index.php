<!DOCTYPE html>
<html>

<head>
    <title>KONABADA</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>


<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";
// "items" 테이블에서 데이터 가져오기
$sql = "SELECT * FROM items";

// 쿼리 실행
$result = mysqli_query($mysqli, $sql);

// 결과를 배열로 변환
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

session_start();
$userid = $_SESSION['UID'];



$sql = "select * from board where 1=1";
$sql .= " and status=1";
$sql .= $search_where;
$order = " order by bid desc";
$query = $sql.$order;
//echo "query=>".$query."<br>";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
$count = 5;
$idx = 0;
while($rs = $result->fetch_object()){
    $idx += 1;
    $rsc[]=$rs;

    if ($idx == $count) break;
}


?>


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

    <div class="container">
        <div class="tag-wrapper">
            <div class="hot-items-text">

                <div class="hot-items-title"> 태그 모음</div>
                <div class="hot-items-desc">추천 태그</div>
                <div class="tag-container">
                    <div class="tag" onclick="location.href='/course/items.php?tag=전체'">
                        <div class="tag-name">전체</div>
                    </div>
                    <div class="tag" onclick="
                        location.href='/course/items.php?tag=전자기기'">
                        <div class="tag-name">전자기기</div>
                    </div>

                    <div class="tag" onclick="location.href='/course/items.php?tag=생활용품'">
                        <div class="tag-name">생활용품</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=패션'">

                        <div class="tag-name">패션</div>
                    </div>
                    <div class="tag" onclick="
                        location.href='/course/items.php?tag=책'
                            ">
                        <div class="tag-name">책</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=가구'">
                        <div class="tag-name">가구</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=스포츠용품'">
                        <div class="tag-name">스포츠용품</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=식품/간식'">
                        <div class="tag-name">식품/간식</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=헬스/운동용품'">
                        <div class="tag-name">헬스/운동용품</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=음악/악기'">
                        <div class="tag-name">기타</div>
                    </div>

                </div>
            </div>
        </div>


        <?php
        $sql = "SELECT * FROM totalItems ORDER BY created_at DESC LIMIT 3";
        $result = mysqli_query($mysqli, $sql);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <div class="hot-items">
            <div class="hot-items-text">
                <div class="hot-items-title"> 지금 뜨는 아이템</div>
                <div class="hot-items-desc">발매 상품</div>
            </div>
            <div class="item-container">
                <?php foreach ($items as $item) { ?>
                <form class="item" method="post" action="/course/cart_add.php">
                    <div class="item-card">
                        <input type="hidden" value="<?php echo $item["image_url"]; ?>" name="image_url">
                        <img src=<?php echo $item["image_url"]; ?> alt="Item 1">
                        <div class="item-info">
                            <input readonly class="item-name" value=<?php echo $item["name"]?>>
                            <div class="item-desc">
                                <?php echo $item["description"] ?>
                            </div>
                            <input name="price" class="item-price"
                                value=<?php echo "".number_format($item["price"])."원" ?>>
                            <input type="hidden" name="user_id" value=<?php echo $_SESSION["UID"] ?>>
                            <button type="submit" name="id" value=<?php echo $item["id"]; ?>>Buy Now</button>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>






        <!-- <div>
            <img src="./image/banner.jpg" alt="banner" class="banner">
        </div> -->


        <div class="posts">
            <div class="hot-items-text">
                <div class="hot-items-title">최신 게시글</div>
                <div class="hot-items-desc">방금 막 올라온 글 모음</div>

                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">번호</th> -->
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
                            <!-- <th scope="row"><?php echo $i++;?></th> -->
                            <td><?php echo $r->userid?></td>
                            <td><a class="post"
                                    href="/course/boardView.php?bid=<?php echo $r->bid;?>"><?php echo $subject?></a>
                            </td>
                            <td><?php echo $r->regdate?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    </div>


</body>

</html>