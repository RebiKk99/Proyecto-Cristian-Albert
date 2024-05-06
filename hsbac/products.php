<div class="row mt-1">
    <?php
    $where = "";
    $name = mysqli_real_escape_string($con,$_REQUEST['name']??'');
    if( empty($name)==false ){
    $where = "WHERE p.name LIKE '%$name%' ";
    }

    $queryCuenta = "SELECT COUNT(*) as cuenta FROM products p $where; ";
    $resCuenta = mysqli_query($con,$queryCuenta);
    $rowCuenta = mysqli_fetch_assoc($resCuenta);
    $registerTotal = $rowCuenta['cuenta'];

    $elementsByPage = 6;

    $pageTotal = ceil($registerTotal/$elementsByPage);

    $selectedPage = $_REQUEST['page']?? 1;

    $limitStart = ($selectedPage - 1) * $elementsByPage;

    $limit = " LIMIT $limitStart,$elementsByPage ";

    $query = "SELECT p.id, p.name, p.price, p.stock, MIN(f.web_path) AS web_path
    FROM products p
    INNER JOIN products_files pf ON pf.product_id = p.id
    INNER JOIN files f ON f.id = pf.file_id
    $where
    GROUP BY p.id, p.name, p.price, p.stock
    $limit";

    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="card border-primary">
        <div class="imagen-1-container">
            <img class="imagen-1" src="<?php echo $row['web_path'] ?>" alt="">
        </div>
        <div class="card-body cardmargin">
            <h2 class="card-title"><strong><?php echo $row['name'] ?></strong></h2>
            <p class="card-text"><strong>Price:</strong><?php echo $row['price'] ?></p>
            <p class="card-text"><strong>Stock:</strong><?php echo $row['stock'] ?></p>
            <a href="index.php?module=productdetail&id=<?php echo $row['id'] ?>" class="btn btn-primary">See</a>
        </div>
        </div>
    </div>
    <?php
    }
    ?>
    </div>
    <?php
    if($pageTotal>0){
    ?>

    <nav aria-label="Page navigation">
        <ul class="pagination">
        <?php
            if( $selectedPage!=1 ){

            
        ?>
        <li class="page-item">
            <a class="page-link" href="index.php?module=products&page=<?php echo ($selectedPage-1) ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo</span>
            <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php
        }
        ?>

        <?php
            for ($i=1;$i<=$pageTotal;$i++){

        ?>
        <li class="page-item <?php echo ($selectedPage==$i)?" active ":" "; ?>">
            <a class="page-link" href="index.php?module=products&page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
        <?php
            }
        ?>
        <?php
            if ($selectedPage!=$pageTotal ){
            
        ?>
        <li class="page-item">
            <a class="page-link" href="index.php?module=products&page=<?php echo ($selectedPage+1) ?>" aria-label="Next">
            <span aria-hidden="true">&raquo</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
        <?php
            }
        ?>
        </ul>
    </nav>

    <?php
    }
    ?>