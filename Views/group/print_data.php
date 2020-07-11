<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <style>
        .tables{
            width: 50%;
            font-family: 'SakkalMajalla' !important;
            margin: 0 auto;
            border-collapse: collapse;
        }
        .tables  tr {
            margin: 0px  !important;
        }
        .tables  tr td{
            border: 1px solid #ddd;
            padding: 4px;
        }
        @page {
    margin-left: 2cm;
    margin-right: 2cm;
}
    </style>
</head>
<body class="direction:rtl;">
    <?php $op = new Khas();?>
    <?php $dataitem = json_decode($viewmodel); ?>
    <table class="table" cellspacing="0">
        <tr>
            <td> المجموعة </td>
            <td> المجموعة </td>
        </tr>
    </table>
     <table  width="100%" class="tables" >
        <tr>
            <td> # </td>
            <td> المجموعة </td>
            <td> الحالة </td>
        </tr>
        <?php foreach ($dataitem as $val) : ?>
            <tr>
                <td><?php echo $val->grp_id; ?> </td>
                <td> <?php echo $val->group_name; ?> </td>
                <td> <?php echo $val->active;?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

