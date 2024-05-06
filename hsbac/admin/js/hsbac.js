$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "ajax/readCart.php",
        dataType: "json",
        success: function (response) {
            fillCart(response);
        }
    });
    $.ajax({
        type: "post",
        url: "ajax/readCart.php",
        dataType: "json",
        success: function (response) {
            fillCartTable(response);
        }
    });
    function fillCartTable(response) {
        $("#tableCart tbody").text("");
        var TOTAL=0;
        response.forEach(element => {
            var price=parseFloat(element['price']);
            var totalProduct=element['quantity']*price;
            TOTAL=TOTAL+totalProduct;

            $("#tableCart tbody").append(
                `
                <tr>
                    <td><img src="${element['web_path']}" class=""/></td>
                    <td>${element['name']}</td>
                    <td>
                        ${element['quantity']}
                        <button type="button" class="btn-xs btn-primary more"
                        data-id="${element['id']}"
                        data-type="more"
                        >+</button>
                        <button type="button" class="btn-xs btn-danger less"
                        data-id="${element['id']}"
                        data-type="less"
                        >-</button>

                    </td>
                    <td>${price.toFixed(2)} €</td>
                    <td>${totalProduct.toFixed(2)} €</td>
                    <td><i class="fa fa-trash text-danger deleteProduct" data-id="${element['id']}"></i></td>
                </tr>
                `
            );

        });
        $("#tableCart tbody").append(
            `
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td>${TOTAL.toFixed(2)} €</td>
                <td></td>
            </tr>
            `
        );
    }
    $(document).on("click",".more,.less",function(e){
        e.preventDefault();
        var id=$(this).data('id');
        var type=$(this).data('type');
        $.ajax({
            type: "post",
            url: "ajax/changeQuantityProducts.php",
            data: {"id":id,"type":type},
            dataType: "json",
            success: function (response) {
                fillCartTable(response);
                fillCart(response);
            }
        });
    });
    $(document).on("click",".deleteProduct",function(e){
        e.preventDefault();
        var id=$(this).data('id');
        $.ajax({
            type: "post",
            url: "ajax/deleteCartProduct.php",
            data: {"id":id},
            dataType: "json",
            success: function (response) {
                fillCartTable(response);
                fillCart(response);
            }
        });
    });
    $("#addCart").click(function (e) {
        e.preventDefault();
        var id=$(this).data('id');
        var name=$(this).data('name');
        var web_path=$(this).data('web_path');
        var quantity=$("#quantityProduct").val();
        var price=$(this).data('price');
        $.ajax({
            type: "post",
            url: "ajax/addCart.php",
            data: {"id":id,"name":name,"web_path":web_path,"quantity":quantity,"price":price},
            dataType: "json",
            success: function (response) {
                fillCart(response);
                $("#badgeProduct").hide(250).show(250).hide(250).show(250).hide(250).show(250);
                $("#cartIcon").click();
            }
        });
    });
    function fillCart(response) {
        var quantity=Object.keys(response).length;
        if(quantity>0){
            $("#badgeProduct").text(quantity);
        }else{
            $("#badgeProduct").text("");
        }
        $("#listCart").text("");
        response.forEach(element => {
            $("#listCart").append(
                `
                <a href="index.php?module=productdetail&id=${element['id']}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="${element['web_path']}" class="img-size-50 mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title cartd">
                            ${element['name']}
                                
                            </h3>
                            <span class="float-right text-sm text-primary" ><i class="fas fa-eye"></i></span>
                            <p class="text-sm">Quantity ${element['quantity']}</p>
                        </div>
                    </div>
                <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                `
            );
        });
        $("#listCart").append(
            `
            <a href="index.php?module=cart" class="dropdown-item dropdown-footer text-primary">
            See Cart
            <i class="fa fa-cart-plus" ></i>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer text-danger" id="emptyCart">
            Empty Cart
            <i class="fa fa-trash" ></i>
            </a>
            `
        );
    }
    $(document).on("click","#emptyCart",function (e){
        
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/emptyCart.php",
            dataType: "json",
            success: function (response){
                fillCart(response);
            }
        });
    });
});