<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <script language="JavaScript" src="{{url('/js/jquery-2.1.3.min.js')}}"></script>

</head>
<body>
<div class="container">
    {{--<div class="content">--}}
    {{--<div class="title">Laravel 5</div>--}}
    {{--</div>--}}
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th></th>
            <th>name</th>
        </tr>
        </thead>
        <tbody id="result">
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>-----</td>
                <td>{{ $test->name }}</td>
            </tr>
        @endforeach
        </tbody>

        <div id="index-page">
            {!! $tests->links() !!}
        </div>

    </table>
</div>
<script>
    $(function () {
        paginationHtml = $(".pagination").prop('outerHTML');
        result = RegxReplace(paginationHtml);
        $("#index-page").children().remove();
        $("#index-page").append(result2);
    })


    function pagination(index) {
        $.ajax({
            type: "get",
            url: '/fy?page=' + index,
            dataType: "json",
            success: function (ret) {
                paginationHtml = ret['links'];

                result = RegxReplace(paginationHtml);

                $("#result").children().remove();
                $("#index-page").children().remove();

                tmp = '';
                console.log(ret['tests']['data']);
                for (i = 0; i < ret['tests']['data'].length; i++) {
                    tmp += '<tr><td>' + ret['tests']['data'][i]['id'] + '</td>' +
                            '<td>-----</td>' +
                            '<td>' + ret['tests']['data'][i]['name'] + '</td></tr>';
                }
                $("#result").append(tmp);
                $("#index-page").append(result);
            },
            error: function () {
                alert('errot');
            }
        });
    }

    /**
     * 正则替换
     * @param origin
     * @returns {string|XML|*}
     * @constructor
    */
    function RegxReplace(origin) {

        regx = /<a.*?page=/g
        result = origin.replace(regx,'<a href="javascript:void(0)" onclick="pagination(');

        regx2 = /([0-9]{1,4})"/g
        result2 = result.replace(regx2,'$1)"');

        return result2;
    }


</script>
</body>
</html>
