$(function(){
    $(".tag_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    })

    $(".category_select_choose").select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    })


})



