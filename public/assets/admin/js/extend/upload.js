/**
 * Created by pc on 2017/7/5.
 */
var handle = function () {
    var
        fileInput = document.getElementById('image-file'),
        info = document.getElementById('file-info'),
        preview = document.getElementById('image-preview'),
        img = document.getElementById('img');
    // 监听change事件:
    fileInput.addEventListener('change', function () {
        // 清除背景图片:
        preview.style.backgroundImage = '';
        // 检查文件是否选择:
        if (!fileInput.value) {
            info.innerHTML = '没有选择文件';
            return;
        }
        // 获取File引用:
        var file = fileInput.files[0];
        console.log(file);
        // 获取File信息:
        info.innerHTML = '文件: ' + file.name + '<br>' +
            '大小: ' + file.size + '<br>' +
            '修改: ' + file.lastModifiedDate;
        if (file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/gif') {
            alert('不是有效的图片文件!');
            return;
        }
        // 读取文件:
        var reader = new FileReader();
        reader.onload = function(e) {
            var
                data = e.target.result; // 'data:image/jpeg;base64,/9j/4AAQSk...(base64编码)...'
            img.src = data;
        };
        // 以DataURL的形式读取文件:
        reader.readAsDataURL(file);
    });
};

var upload = function () {
    "use strict";
    return {
        init: function () {
            handle()
        }
    }
}();
