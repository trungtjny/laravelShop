<div class="text-center">
    <div class="card">
        <div class="card-body">
            <form action="" id="form-search">
                <input type="text" id="keyword" class="px-2 search" style="width: 90%" name="keyword" placeholder="Tìm kiếm">
                <div id="searchBtn" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i></div>
            </form>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-body text-center">
        {{-- <h6>Giá bán</h6> --}}
        <div id="slider-range" class="d-inline-block"  style="width:90%; margin-right:10px"></div>
        <div class="row mt-3">
            <div class="col-9">
                <input type="text" id="amount" readonly style="border:0; color:red; font-weight:bold; font-size: 16px ; text-align:center; width: 100%" >
                <input type="number" id="amount-begin" hidden >
                <input type="number" id="amount-end" hidden>
            </div>
            <div class="col-3">
                <button class="btn  btn-filter" id="filter-range-price">Lọc</button>
            </div>
        </div>
    </div>
</div>
<div class="card">
<h4 class="py-2 text-center">Danh mục sản phẩm</h4>
@php
    echo '<ul class="list-group list-group-flush">';
        foreach ($category as $key => $value) {
            if($value->parent_id == 0){
                echo '<li class="" style = "list-style: none;" ><a class = "list-group-item  text-bold " href="'.route("products").'/category/'.$value->id.'">'.$value->name."</a>";
                $id = $value->id;
                foreach ($category as $key => $value) {
                    if($value->parent_id == $id){
                        echo '<li style = "    list-style: none;" ><a class = "list-group-item" href="'.route("products").'/category/'.$value->id.'">'.'--- '.$value->name."</a>";
                    }
                }
            }
        }
        echo "</li>";
    echo "<ul>";
@endphp

</div>
