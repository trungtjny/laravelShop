<h3 class="mb-4">Danh mục sản phẩm</h3>
@php
    echo '<ul class="list-group list-group-flush">';
        foreach ($category as $key => $value) {
            if($value->parent_id == 0){
                echo '<li style = "    list-style: none;" ><a class = "list-group-item bg-secondary text-light" href="'.route("products").'?category='.$value->id.'">'.$value->name."</a>";
                $id = $value->id;
                foreach ($category as $key => $value) {
                    if($value->parent_id == $id){
                        echo '<li style = "    list-style: none;" ><a class = "list-group-item" href="'.route("products").'?category='.$value->id.'">'.'---'.$value->name."</a>";
                    }
                }
            }
        }
        echo "</li>";
    echo "<ul>";
@endphp

{{-- @php
    echo '<ul class="list-group list-group-flush">';
    function menuTree($menu, $parent = 0, $sub = ''){
        foreach ($menu as $key => $value) {
            if($value->parent_id == $parent){
                echo '<li style = "    list-style: none;" ><a class = "list-group-item" href="'.route("products").'?category='.$value->id.'">'.$sub.$value->name."</a>";
                $id = $value->id;
                menuTree($menu, $id,'    ||---');
            }
        }
        echo "</li>";
    }
    menuTree($category,0,"");
    echo "<ul>";
@endphp --}}