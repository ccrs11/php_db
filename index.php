<?php

use App\Contollers\IncomesController;
use App\Enumbs\IncomesTypeEnum;
use App\Enumbs\PaymentMethodEnum;

require("vendor/autoload.php");

$incomes_controller = new IncomesController();
$incomes_controller->store(
    [
        "payment_method" => PaymentMethodEnum::BankAccount->value,
        "type" => IncomesTypeEnum::Salary->value,
        "date" => date("Y-m-d H:i:s"),
        "amount" => 1000000,
        "description" => "salario devengado por buena papa"
    ]
    );


?>