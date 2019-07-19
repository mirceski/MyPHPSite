<?php include("includes/config.php");?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");?>

<?php
$strJsonFileContents = file_get_contents("files/portfolio.json");
$array = json_decode($strJsonFileContents, true);

?>
</br>
</br>



    <table width="100%" style="border: 1px solid #cccccc; font-family: Arial,Verdana,Helvetica,sans-serif;font-size: 11px">
        <tbody>

        <?php

        foreach ($array as $key => $value) {
            echo "<tr style=\"background-color: #cccccc; line-height: 25px;\">
                <td colspan=\"3\">
                    <img src=\"files/img/basic_search.gif\">
                    Портфолио: <span style='font-weight: bold'>  $value[portfolio_name]   </span> |
                    Продукна линија: <span style='font-weight: bold'> $value[product_line_name]  </span> |
                    Продуктен тип: <span style='font-weight: bold'> $value[product_type_name]  </span>
                </td>
                <td></td>
                <td></td>
                <td colspan=\"2\" align=\"right\">
                    Периодичен попуст: <span style='font-weight: bold'> $value[monthly_discount_percent]%</span> |
                    Еднократен попуст: <span style='font-weight: bold'> $value[onetime_discount_percent]%</span>
                </td>
                </tr>";

            echo "<tr style=\"background-color: #f6f6f6; font-weight: 600;\">
                <td>
                    SFA Продуктна понуда:
                </td>
                <td>
                    Количина:
                </td>
                <td>
                    Вкупна цена со попуст еднократна:
                </td>
                <td>
                    Вкупна цена со попуст периодична:
                </td>
                <td>
                    Контрибуциска маргина %:
                </td>
                <td>
                    Трошок:
                </td>
                <td>
                    Дополнителен трошок:
                </td>
                </tr>";

            foreach ($value["items"] as $item){
                echo "<tr style=\"line-height: 25px; border: 1px solid #cccccc;\">
                    <td>
                        <img src=\"files/img/basic_search.gif\">
                        <span style='font-weight: bold; color: #E20074'> $item[name] </span>
                    </td>
                    <td>
                        <span style='font-weight: bold;'> $item[quantity] </span>
                    </td>
                    <td>
                        " . number_format((float)$item["onetime_price"], 2, '.', '') . "ден.*
                    </td>
                    <td>
                        " . number_format((float)($item["recurring_price"] - ($item["recurring_price"] * 5 / 100)), 2, '.', '') . "ден.*
                    </td>
                    <td>
                        " .  number_format((float)$value["contribution_margin"], 2, '.', ''). "%
                    </td>
                    <td>
                        " .  number_format((float)$item["sales_cost"], 2, '.', ''). "ден.*
                    </td>
                    <td>
                        " .  number_format((float)$item["additional_cost"], 2, '.', ''). "ден.*
                    </td>
                    </tr>";


                $name = "";
                $priceType = "";
                $period = "";
                $priceAmount = "";
                $netPriceAmount = "";
                if(isset($item["prices"][0]) && isset($item["prices"][0]["child_prices"][0])){
                    $name = $item["prices"][0]["child_prices"][0]["name"];
                    $priceType = $item["prices"][0]["child_prices"][0]["price_type"];
                    $period = $item["prices"][0]["child_prices"][0]["period"];
                    $priceAmount = number_format((float)$item["prices"][0]["child_prices"][0]["price_amount"], 2, '.', '');
                    $netPriceAmount = number_format((float)($item["prices"][0]["child_prices"][0]["price_amount"] - ($item["prices"][0]["child_prices"][0]["price_amount"] * 5 / 100)), 2, '.', '');
                }


                echo "<tr style=\"border: 1px solid #cccccc;\">
                            <td colspan=\"7\">
                                <table width=\"100%\" style=\"border: 5px solid #ffffff; font-family: Arial,Verdana,Helvetica,sans-serif;font-size: 11px;padding-left: 10px; padding-right: 10px;\">
                                    <tr style=\"background-color: #f6f6f6; font-weight: 600;\">
                                        <td colspan=\"2\">
                                             Име
                                        </td>
                                        <td>
                                            Тип
                                        </td>
                                        <td>
                                            Период
                                        </td>
                                        <td>
                                            Цена
                                        </td>
                                        <td>
                                            Попуст
                                        </td>
                                        <td>
                                            Попуст %
                                        </td>
                                     </tr>
                                     <tr>
                                         <td colspan=\"2\">
                                             " . $name . "
                                         </td>
                                         <td>
                                             " . (($priceType == "recurring") ? 'Периодична' : "") . "
                                         </td>
                                         <td>
                                             " . (($period == "monthly") ? 'Месечно' : "") . "
                                         </td>
                                         <td>
                                             " . ($priceAmount != "" ? $priceAmount . "ден.*" : "" ) . "
                                         </td>
                                         <td>
                                             " . ($netPriceAmount != "" ? $netPriceAmount . "ден.*" : "" ) . "
                                         </td>
                                         <td>
                                             5%
                                         </td>
                                      </tr>
                                   </table>
                                </td>
                             </tr>";
             }

            $totalOneTimePrice = number_format((float)$value["total_onetime_price"], 2, '.', '');
            $totalRecurringPrice = number_format((float)($value["total_recurring_price"] - ($value["total_recurring_price"] * 5 / 100)), 2, '.', '');
            echo "<tr style=\"background-color: #f6f6f6; font-weight: 600;border: 1px solid #cccccc;\">
                <td colspan=\"2\">
                    Меѓузбир:
                </td>
                <td colspan=\"1\">
                    " . $totalOneTimePrice . "
                </td>
                <td colspan=\"4\">
                    " . $totalRecurringPrice . "
                </td>
            </tr>";
        }


        $sumTotalOneTimePrice = 0;
        $sumTotalRecurringPrice = 0;
        foreach ($array as $key => $value) {
            $sumTotalOneTimePrice += $value["total_onetime_price"];
            $sumTotalRecurringPrice += $value["total_recurring_price"];
        }

        $sumTotalOneTimePrice = number_format((float)$sumTotalOneTimePrice, 2, '.', '');
        $sumTotalRecurringPrice = number_format((float)($sumTotalRecurringPrice - ($sumTotalRecurringPrice * 5 / 100)), 2, '.', '');

        echo "<tr style=\"background-color: #cccccc; font-weight: 600;border: 1px solid #cccccc;line-height: 25px;\">
                <td colspan=\"2\">
                    Вкупно:
                </td>
                <td colspan=\"1\" align=\"center\">
                    " . $sumTotalOneTimePrice . "
                </td>
                <td align=\"center\" >
                    " . $sumTotalRecurringPrice . "
                </td>
                <td colspan=\"3\">
                    
                </td>
             </tr>";

        ?>

        </tbody>
    </table>

</body>

</html>
