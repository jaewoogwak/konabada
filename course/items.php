<!DOCTYPE html>
<html>

<head>
    <title>KONABADA - 물건 구매하기</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/items.css" rel="stylesheet">

</head>


<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";

// url로부터 태그 값 가져오기
$tag = $_GET['tag'];

// $tag가 전체면 
if ($tag == '전체') {
    $sql = "SELECT * FROM totalItems";
    $result = mysqli_query($mysqli, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $tag = '전체';
    $tagdesc = '전체';
} else {
    $sql = "SELECT * FROM totalItems WHERE tag LIKE '%$tag%'";
    $result = mysqli_query($mysqli, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $tagdesc = $tag;
}


// 세션 시작
session_start();
$userid = $_SESSION['UID'];

// 쿼리 실행

$result = mysqli_query($mysqli, $sql);

// 결과를 배열로 변환
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

    <div>
        <h1>
            물건 구매하기
        </h1>

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

            <div class="hot-items">
                <div class="hot-items-text">
                    <?php if ($tag == "전체") { ?>
                    <div class="hot-items-title"> 아이템 모두 보기</div>
                    <?php } else { ?>
                    <div class="hot-items-title"> <?php echo $tag ?> 아이템 보기</div>
                    <?php } ?>



                    <div class="hot-items-desc">발매 상품</div>
                </div>
                <div class="item-container">
                    <?php foreach ($items as $item) { ?>
                    <form class="item" method="post" action="/course/cart_add.php">
                        <div class="item-card">
                            <input type="hidden" value="<?php echo $item["image_url"]; ?>" name="image_url">
                            <img src=<?php echo $item["image_url"]; ?> alt="Item 1">
                            <div class="item-info">
                                <div class="item-name"><?php echo $item["name"]?></div>

                                <input type="hidden" name="name" class="item-name" value="<?php echo $item["name"]?>">
                                <div class="item-desc">
                                    <?php echo $item["description"] ?>
                                </div>
                                <input name="price" class="item-price"
                                    value="<?php echo "".number_format($item["price"])."원" ?>">
                                <input type="hidden" name="user_id" value=<?php echo $userid ?>>
                                <div class="item-seller">
                                    판매자: <?php echo $item["sellerId"] ?>
                                </div>
                                <input type='hidden' name='seller' value="<?php echo $item["sellerId"] ?>">

                                <button type="submit" name="id" value=<?php echo $item["id"]; ?>>장바구니에 담기</button>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
                <div>

                </div>


            </div>

        </div>







</body>

</html>