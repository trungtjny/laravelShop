<div class="text-center">
    <div class="card">
        <div class="card-body">
            <form action="">
                <input type="text" style="width: 90%">
                <button style="margin-left: -10%" style="width: 20%"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-body text-center">
        <h3>Lọc theo giá</h3>
        <div id="slider-range" class="d-inline-block"  style="width:200px"></div>
        <input type="text" id="amount" readonly style="border:0; color:red; font-weight:bold; font-size: 20px ; text-align:center" >
    </div>
</div>
<div class="card text-center">
<h4 class="py-2">Danh mục sản phẩm</h4>
@php
    echo '<ul class="list-group list-group-flush">';
        foreach ($category as $key => $value) {
            if($value->parent_id == 0){
                echo '<li style = "    list-style: none;" ><a class = "list-group-item  text-bold" href="'.route("products").'?category='.$value->id.'">'.$value->name."</a>";
                $id = $value->id;
                foreach ($category as $key => $value) {
                    if($value->parent_id == $id){
                        echo '<li style = "    list-style: none;" ><a class = "list-group-item" href="'.route("products").'?category='.$value->id.'">'.'--- '.$value->name."</a>";
                    }
                }
            }
        }
        echo "</li>";
    echo "<ul>";
@endphp
</div>
