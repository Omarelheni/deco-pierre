
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Admin Dashboard - Preferences</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--
    Visual Admin Template
    https://templatemo.com/tm-455-visual-admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Left column -->

<div class="templatemo-flex-row">
@include('Layouts.SideBar')

    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
        @include('Layouts.topBar')
        <div class="templatemo-content-container">
            <div class="templatemo-content-widget no-padding">
                <div class="input-group" >
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->

                </div>
                <div class="panel panel-default table-responsive">
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>

                    <table class="table table-striped table-bordered templatemo-user-table table-list-search">
                        <thead>
                        <tr>
                            <td class="th"><a href="#" class="white-text templatemo-sort-by">E-mail <i class="fa fa-caret-down"></i></a></td>
                            <td class="th"><a href="#" class="white-text templatemo-sort-by">Sujet <i class="fa fa-caret-down"></i></a></td>
                            <td class="th"><a href="#" class="white-text templatemo-sort-by">Contenu <i class="fa fa-caret-down"></i></a></td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        @foreach($mesgs as $mesg)
                        <tr>
                            <td>{{$mesg->email}}</td>
                            <td>{{$mesg->sujet }}</td>
                            <td>{{$mesg->contenu }}</td>
                            <td>
                                <form action="{{ route('messages.destroy', $mesg->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>



                </div>

                <footer class="text-right">
                    <p>Copyright &copy; 2021 Hytaco</p>
                </footer>
            </div>
</div>


    <!-- JS -->
    <!-- Templatemo Script -->
     <!-- Templatemo Script -->
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Templatemo Script -->
<script>
    $(document).ready(function() {
        var order = 'ASC';
        function sortTable(column, type) {

            //Get and set order
            //Use -data to store wheater it will be sorted ascending or descending
            if (order === 'ASC'){
                $('.fa.fa-caret-down').each(function (i){
                    $(this).removeClass('fa-caret-down');
                    $(this).addClass('fa-caret-up');
                });
            }else {
                $('.fa.fa-caret-up').each(function (i){
                    $(this).removeClass('fa-caret-up');
                    $(this).addClass('fa-caret-down');
                });
            }
            order = order === 'ASC' ? 'DESC' : 'ASC';
            $('table thead tr>th:eq(' + column + ')').data('order', order);

            //Sort the table
            $('table tbody tr').sort(function(a, b) {
                //                                 ^  ^
                //                                 |  |
                //        The 2 parameters needed to be compared.
                //        Since you are sorting rows, a and b are <tr>

                //Find the <td> using the column number and get the text value.
                //Now, the a and b are the text of the <td>
                a = $(a).find('td:eq(' + column + ')').text();
                b = $(b).find('td:eq(' + column + ')').text();

                switch (type) {
                    case 'text':
                        //Proper way to compare text in js is using localeCompare
                        //If order is ascending you can - a.localeCompare(b)
                        //If order is descending you can - b.localeCompare(a);
                        return order === 'ASC' ? a.localeCompare(b) : b.localeCompare(a);
                        break;
                    case 'number':
                        //You can use deduct to compare if number.
                        //If order is ascending you can -> a - b.
                        //Which means if a is bigger. It will return a positive number. b will be positioned first
                        //If b is bigger, it will return a negative number. a will be positioned first
                        return order === 'ASC' ? a - b : b - a;
                        break;
                    case 'date':
                        var dateFormat = function(dt) {
                            [m, d, y] = dt.split('/');
                            return [y, m - 1, d];
                        }

                        //convert the date string to an object using `new Date`
                        a = new Date(...dateFormat(a));
                        b = new Date(...dateFormat(b));

                        //You can use getTime() to convert the date object into numbers.
                        //getTime() method returns the number of milliseconds between midnight of January 1, 1970
                        //So since a and b are numbers now, you can use the same process if the type is number. Just deduct the values.
                        return order === 'ASC' ? a.getTime() - b.getTime() : b.getTime() - a.getTime();
                        break;
                }

            }).appendTo('table tbody');
        }


        var table = $('table');

        $('.th')
            .wrapInner('<span title="sort this column"/>')
            .each(function() {

                var th = $(this),
                    thIndex = th.index(),
                    inverse = false;

                th.click(function () {
                    console.log(thIndex);

                        sortTable(thIndex, 'text');


                });
            });

        var activeSystemClass = $('.list-group-item.active');
        //something is entered in search form
        $('#system-search').keyup( function() {
            var that = this;
            // affect all table rows on in systems table
            var tableBody = $('.table-list-search tbody');

            var tableRowsClass = $('.table-list-search tbody tr');
            console.log(tableRowsClass);

            $('.search-sf').remove();
            tableRowsClass.each( function(i, val) {
                //Lower text for case insensitive
                var rowText = $(val).text().toLowerCase();
                var inputText = $(that).val().toLowerCase();
                console.log(rowText);
                console.log(inputText);

                if(inputText != '')
                {
                    $('.search-query-sf').remove();
                    tableBody.prepend('<tr class="search-query-sf"><strong>Searching for: "'
                        + $(that).val()
                        + '"</strong></tr>');
                }
                else
                {
                    $('.search-query-sf').remove();
                }
                if( rowText.indexOf( inputText ) == -1 )
                {
                    //hide rows
                    tableRowsClass.eq(i).hide();
                }
                else
                {
                    tableRowsClass.eq(i).show();
                }
            });
            //all tr elements are hidden
            if(tableRowsClass.children(':visible').length == 0)
            {
                tableBody.append('<td class="search-sf">No entries found.</td>');
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function(){
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".realprocode").remove();
        });
    });
</script>
</body>

</html>
