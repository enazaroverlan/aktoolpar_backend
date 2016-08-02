/**
 * Created by Эрлан on 31.07.2016.
 */
//====================== Vars ===========================
var entBtn1 = '.entrance-1';
var entBtn2 = '.entrance-2';

var ent1Block = '#ent1';
var ent2Block = '#ent2';
//====================== End Var ========================
$(entBtn1).on('click', function () {
    if (!$(entBtn1).hasClass('entrance_active')) {
        $(entBtn2).removeClass('entrance_active');
        $(entBtn1).addClass('entrance_active');
        $(ent2Block).animate({
            opacity: 0
        }, 200, function () {
            $(ent2Block).fadeOut('fast', function () {
                $(ent1Block).fadeIn('fast');
                $(ent1Block).animate({
                    opacity: 1
                }, 200);
            });
        });
    }
});

$(entBtn2).on('click', function () {
    if (!$(entBtn2).hasClass('entrance_active')) {
        $(entBtn1).removeClass('entrance_active');
        $(entBtn2).addClass('entrance_active');
        $(ent1Block).animate({
            opacity: 0
        }, 200, function () {
            $(ent1Block).fadeOut('fast', function () {
                $(ent2Block).fadeIn('fast');
                $(ent2Block).animate({
                    opacity: 1
                }, 200);
            });

        });
    }
});
