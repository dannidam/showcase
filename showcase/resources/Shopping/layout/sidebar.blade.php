    <div class="sideBar" style="">
        <div class="logo row"><i class="fa fa-shopping-bag icons"></i><h6>Indkøb</h6></div>
        <div class="all-items">
            <div class="item"><a href="/shopping">Hjem</a></div>
            <div class="item" id="lists">Indkøbs Lister<i class="fa fa-angle-down" style="margin-left: 10px; font-size: 13px;"></i></div>
            <div class="sub-item item child_lists"><a href="{{$data['dListLink']}}">Dagens Liste</a></div>
            <div class="sub-item item child_lists"><a href="#">Ugens Liste</a></div>
            <div class="item"><a href="#">Opskrifter</a></div>
            <div class="item" id="products">Produkter <i class="fa fa-angle-down" style="margin-left: 10px; font-size: 13px;"></i></div>
            <div class="sub-item item child_products"><a href="/shopping/products">se produkter</a></div>
            @if($data['user']->role == '1')
            <div class="sub-item item child_products"><a href="/shopping/addProduct">tilføj produkt</a></div>
            @endif
            <div class="item"><a href="#">Lager</a></div>
        </div>
    </div>

<style>
a{
    display: block;
}
.home{
    position: absolute;
    left: 10px;
}

.icons{
    margin-left: 15px; 
    margin-right: 8px; 
    font-size: 18px;
    line-height: 43px;
    color: #82c91e; 
}

.icon-home{
    margin-left: -22px; 
    margin-right: 7px; 
    font-size: 18px;
}

.sub-item{
    display: none;
    font-size: 12px;
    margin-left: 10px;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    var shown = false;
    $(document).ready(function(){
        $("#lists").click(function(){
            revealChild('lists');
        });
        $("#products").click(function(){
            revealChild('products');
        });
    });

    function revealChild(name){
        if(!shown){
                $(".child_" + name).css("display", "block");
                $("#" + name).find("i").removeClass("fa fa-angle-down");
                $("#" + name).find("i").addClass("fa fa-angle-up");
                shown = true;
            }
            else{
                $(".child_" + name).css("display", "none");
                $("#" + name).find("i").removeClass("fa fa-angle-up");
                $("#" + name).find("i").addClass("fa fa-angle-down");
                shown = false;
            }
    }
</script>