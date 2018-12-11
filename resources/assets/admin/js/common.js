params = {
    divClass:'permission_checkbox_list',
    checkLevel1:'checkAll',
    checkLevel2:'checkAllItem',
    checkLevel3:'item',
    checkSkin:'green',
};

option = {
    ajax:function(url,method,data,callback){
        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: "json",
            success: callback
        });
    },
    setCheckBox:function(checkSkin){
        if (checkSkin === undefined) {
            checkSkin = params.checkSkin;
        }
        //加载checkbox样式
        $('.'+params.divClass+' input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-'+checkSkin});
        //一级全选
        $('.permission_checkbox_list input[class="'+params.checkLevel1+'"]').on('ifChanged', function(){
            if($(this).is(':checked')){
                $(this).parents('span').parent('li').next('li').find('input').iCheck('check');
                $(this).parents('span').parent('li').next('li').find('input').prop('checked','checked');
            }else{
                $(this).parents('span').parent('li').next('li').find('input').iCheck('uncheck');
                $(this).parents('span').parent('li').next('li').find('input').removeAttr('checked');
            }
        });
        //二级全选
        $('.'+params.divClass+' input[class="'+params.checkLevel2+'"]').on('ifChanged', function(){
            if($(this).is(':checked')){
                $(this).parents('td').parents('tr').next('tr').find('input').iCheck('check');
                $(this).parents('td').parents('tr').next('tr').find('input').prop('checked','checked');
            }else{
                $(this).parents('td').parents('tr').next('tr').find('input').iCheck('uncheck');
                $(this).parents('td').parents('tr').next('tr').find('input').removeAttr('checked');
            }
        });
    },
    timeOut:function (target,completeTxt) {
        var time = Math.round(new Date().getTime() / 1000);
        var timeout = parseInt(target.attr('data-time'));
        var balanceTime = timeout - time;
        if(balanceTime > 0) {
            var dd = parseInt(balanceTime / 60 / 60 / 24, 10);
            var hh = parseInt(balanceTime / 60 /60 % 24, 10);
            var mm = parseInt(balanceTime / 60 % 60, 10);
            var str = '';
            if(dd > 0){
                str += dd + '天';
            }
            if(hh > 0){
                str += hh + '时';
            }
            if(mm > 0){
                str += mm + '分';
            }
            if(balanceTime < 60){
                str += balanceTime + '秒';
            } else {
                str += Math.floor(balanceTime) - (dd * 24 * 60 * 60) - (hh * 60 * 60) - (mm * 60) + '秒';
            }
            target.text(str);
        } else {
            target.parents('td').text(completeTxt);
        }
    }
};

$(function () {
    if ($('.select2').length > 0) {
        $('.select2').select2();
    }
});