/**
 * Created by pc on 2017/7/31.
 */
function avoid_zero(m){return m<10?'0'+m:m }
function get_format(timestamp)
{
    //timestamp是整数，否则要parseInt转换,不会出现少个0的情况
    timestamp = parseInt(timestamp);
    return new Date(parseInt(timestamp) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
}

