<?php
//Show Errors
function ShowError($errors,$name){
    if($errors->has($name)){
        return '
        <div class="alert alert-danger" role="alert">
        <strong>'.$errors->first($name).'</strong>
        </div>
            ';
    }
}

//Categorys

function GetCategorys($mang,$CateParent,$shift,$id_select)
{
    foreach($mang as $value)
    {
        if($value['CateParent']==$CateParent)
        {
            if($value['CateID']==$id_select)
            {
                echo "<option value=".$value['CateID']." selected>".$shift.$value['CateName']."</option>";
            }
            else
            {
                echo "<option value=".$value['CateID']." >".$shift.$value['CateName']."</option>";

            }
            GetCategorys($mang,$value['CateID'],$shift."---|",$id_select);
        }
    }
}

function ShowCategorys($mang,$CateParent,$shift)
{
    foreach($mang as $value)
    {
        if($value['CateParent']==$CateParent)
        {
                echo '<div class="item-menu"><span>'.$shift.$value['CateName'].'</span>

                <div class="category-fix">
                    <a class="btn-category btn-primary" href="/admin/category/edit/'.$value['CateID'].'"><i class="fa fa-edit"></i></a>
                    <a onclick="return del_category()" class="btn-category btn-danger" href="/admin/category/del/'.$value['CateID'].'"><i class="fas fa-times"></i></i></a>

                </div>
            </div>';


            ShowCategorys($mang,$value['CateID'],$shift."---|");
        }
    }
}
function ShowEditCategorys($mang,$CateParent,$shift)
{
    foreach($mang as $value)
    {
        if($value['CateParent']==$CateParent)
        {
                echo '<div class="item-menu"><span>'.$shift.$value['CateName'].'</span>
                        <div class="category-fix">
                        <a class="btn-category btn-primary" href="/admin/category/edit/'.$value['CateID'].'"><i class="fa fa-edit"></i></a>
                        </div>
                    </div>';
            ShowEditCategorys($mang,$value['CateID'],$shift."---|");
        }
    }
}


//check level Category
function GetLevel($mang,$CateParent,$count)
{
    foreach($mang as $value)
    {
        if($value['CateID']==$CateParent)
        {
            $count++;
            if($value['CateParent']==0)
            {
                return $count;
            }
            return GetLevel($mang,$value['CateParent'],$count);
        }
    }
}

//Product_size



function GetProductSize($mang)
{
    foreach($mang as $value){
        echo '
        <label style="margin-left:20px;" for=""><input type="checkbox" value="'.$value['SizeID'].'" name="size[]"  class="">'.$value['SizeType'].'</label>
        ';
    }

}
