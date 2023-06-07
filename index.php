<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Enumbs\IncomesTypeEnum;
use App\Enumbs\PaymentMethodEnum;
use App\Enumbs\WithdrawalsTypeEnum;

require("vendor/autoload.php");

/* $incomes_controller = new IncomesController();
$incomes_controller->store(
    [
        "payment_method" => PaymentMethodEnum::BankAccount->value,
        "type" => IncomesTypeEnum::Salary->value,
        "date" => date("Y-m-d H:i:s"),
        "amount" => 1000000,
        "description" => "salario devengado por buena papa"
    ]
    ); */

//* use the store method from the controller Withdrawals to store information in the database
/* $withdrawals_controller=new WithdrawalsController();
$withdrawals_controller->store([
    "payment_method" => PaymentMethodEnum::CreditCard->value,
    "type" => WithdrawalsTypeEnum::Purchase->value,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 20,
    "description" => "Hi this is the first credit card payment"
]); */

//$withdrawals_controller=new WithdrawalsController();
//$withdrawals_controller->index();
//$withdrawals_controller->show(2);
$incomes_controller = new IncomesController();
/* $incomes_controller->store([
    "payment_method" => PaymentMethodEnum::CreditCard->value,
    "type" => WithdrawalsTypeEnum::Purchase->value,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 20,
    "description" => "Hi this is the first credit card payment"
]); */
$incomes_controller->index();




?>