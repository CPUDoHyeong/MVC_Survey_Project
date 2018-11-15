            <div class="content">
                <div class="contentbox">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col" class="no">번호</th>
                                <th scope="col" class="title">제목</th>
                                <th scope="col" class="created">작성일</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- DB에 있는 값을 반복문으로 보여준다 -->
                            <?php foreach ($viewList as $row) : ?>
                            <?php
                                $row["title"] = str_replace(" ", "&nbsp;", $row["title"]);
                                $row["title"] = str_replace("<", "&lt", $row["title"]);
                                $row["title"] = str_replace(">", "&gt", $row["title"]);
                            ?>
                            <tr>
                                <td class="no"><?= $row['num']; ?></td>
                                <td class="title">
                                    <a href="<?= bdUrl('/help/view', $row['num'], $page) ?>"><?= $row['title']; ?></a>
                                </td>
                                <td class="created"><?= $row['regtime']; ?></td>
                            </tr>
                            <?php endforeach // 다 보여주고 반복문 종료 ?>
                        </tbody>
                    </table>
                </div>  

                <!-- 글 작성 버튼 보여주는 div -->
                <div class="write-btn-wrapper">
                    <?php if($name == 'master') : // 유저가 master라면 글 작성 버튼 생성 ?>
                        <a class="write-btn" href="/help/write_form/">글 작성</a>    
                    <?php endif ?>
                </div>

                <!-- pagination -->
                <div class="pagination">
                    <!-- 처음링크인 1 ~ 5까지 외에는 다음 링크로 넘어갈 수 있도록 >> 표시 -->
                    <?php if($firstLink > 1) : ?>
                        <a href="<?= bdUrl('/help/notices', -1, $firstLink - 1) ?>">&laquo;</a>
                    <?php endif ?>

                    <?php for($i = $firstLink; $i <= $lastLink; $i++) : ?>
                        <!-- 현재 페이지 -->
                        <?php if($i == $page) : ?>    
                            <a class="active" href="<?= bdUrl('/help/notices', -1, $i) ?>"><b><?= $i ?></b></a>
                        
                        <!-- 현재 페이지 외의 페이지 -->
                        <?php else : ?>
                            <a href="<?= bdUrl('/help/notices', -1, $i) ?>"><?= $i ?></a>

                        <?php endif ?>

                    <?php endfor ?>

                    <!-- 마지막링크인 외에는 이전 링크로 넘어갈 수 있도록 << 표시 -->
                    <?php if ($lastLink < $numPages) : ?>
                        <a href="<?= bdUrl('/help/notices', -1, $lastLink + 1) ?>">&raquo;</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>