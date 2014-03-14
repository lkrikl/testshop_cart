<?php
/**
 * Created by PhpStorm.
 * User: Коля
 * Date: 12.03.14
 * Time: 23:17
 */
echo '<p>Отделение<br /></p>';
echo CHtml::dropDownList('warehouses', '', $warehouses, array('empty'=>''));